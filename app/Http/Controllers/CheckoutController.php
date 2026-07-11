<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk;
use App\Models\Pemesanan;
use App\Models\DetailPemesanan;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Ongkir;
use App\Models\Keranjang;

class CheckoutController extends Controller
{
    private function PaymentCalc(int $hargaProduk, int $jumlahProduk, string $kotaId): array
    {
        $subtotal = $hargaProduk * $jumlahProduk;
        $ongkir   = Ongkir::getTarif($kotaId);
        $total    = $subtotal + $ongkir;

        return [
            'subtotal' => $subtotal,
            'ongkir'   => $ongkir,
            'total'    => $total,
        ];
    }

    public function AddressHandler(Request $request)
    {
        $order = session('order');

        if (!$order) {
            return redirect()->route('product')
                ->with('error', 'Please select a product first.');
        }

        if (!isset($order[0])) {
            $order = [$order];
        }

        // ✅ Ambil semua produk, keyBy string, tapi variabel tetap $produk (tanpa s)
        $produkIds = collect($order)->pluck('id_produk')->unique();
        $produk = Produk::with('kategori')
            ->whereIn('id_produk', $produkIds)
            ->get()
            ->keyBy(fn($p) => (string) $p->id_produk);

        // ✅ Hitung total subtotal dari SEMUA item
        $subtotal = 0;
        foreach ($order as $item) {
            $harga = $item['harga_satuan'] ?? ($produk[$item['id_produk']]?->harga_produk ?? 0);
            $subtotal += $harga * $item['jumlah_produk'];
        }

        $selectedProvince = $request->input('provinsi_id');
        $selectedCity = $request->input('kota_id');
        $selectedDistrict = $request->input('kecamatan_id');
        $selectedPayment  = $request->input('payment_method', 'qris');

        // ✅ Auto-reset kecamatan jika tidak belong to kota yang dipilih
        if ($selectedDistrict && $selectedCity) {
            $districtBelongsToCity = District::where('id', $selectedDistrict)
                ->where('regency_id', $selectedCity)
                ->exists();

            if (!$districtBelongsToCity) {
                $selectedDistrict = null;
            }
        }

        // ✅ Auto-reset kota & kecamatan jika tidak belong to provinsi yang dipilih
        if ($selectedProvince && $selectedCity) {
            $cityBelongsToProvince = Regency::where('id', $selectedCity)
                ->where('province_id', $selectedProvince)
                ->exists();

            if (!$cityBelongsToProvince) {
                $selectedCity = null;
                $selectedDistrict = null;
            }
        }

        $paymentCalc = $this->PaymentCalc(
            $subtotal,
            1,
            $selectedCity ?? ''
        );

        $provinces = Province::orderBy('name')->get(['id', 'name']);

        $cities = collect();
        if ($selectedProvince) {
            $cities = Regency::where('province_id', $selectedProvince)
                ->orderBy('name')
                ->get(['id', 'name']);
        }

        $districts = collect();
        if ($selectedCity) {
            $districts = District::where('regency_id', $selectedCity)
                ->orderBy('name')
                ->get(['id', 'name']);
        }

        return view('pages.checkoutPage', compact(
            'provinces',
            'produk',
            'subtotal',
            'order',
            'cities',
            'districts',
            'selectedProvince',
            'selectedCity',
            'selectedDistrict',
            'paymentCalc',
            'selectedPayment'
        ));
    }

    public function storeData(Request $request)
    {
        $order = session('order');

        if (!$order) {
            return redirect()->route('product')
                ->with('error', 'Session order kosong.');
        }

        if (!isset($order[0])) {
            $order = [$order];
        }

        if (empty($order[0]['id_produk']) || empty($order[0]['size_produk'])) {
            return redirect()->route('product')
                ->with('error', 'Data order tidak lengkap.');
        }

        if (!$request->filled('provinsi_id') || !$request->filled('kota_id') || !$request->filled('kecamatan_id')) {
            return back()->with('error', 'Please select province, city, and district before placing order.');
        }

        if (!$request->filled('full_name') || !$request->filled('phone') || !$request->filled('address_detail')) {
            return back()->with('error', 'Please fill in your complete shipping address.');
        }

        $totalSubtotal = 0;
        foreach ($order as $item) {
            $harga = $item['harga_satuan'] ?? Produk::find($item['id_produk'])->harga_produk;
            $totalSubtotal += $harga * $item['jumlah_produk'];
        }

        $paymentCalc = $this->PaymentCalc(
            $totalSubtotal,
            1,
            $request->kota_id
        );

        $paymentPath = null;
        if ($request->hasFile('bukti_pembayaran')) {
            $request->validate([
                'bukti_pembayaran' => 'image|mimes:jpg,jpeg,png|max:2048',
            ]);
            $paymentPath = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        }

        $pemesanan = Pemesanan::create([
            'id_pembeli'       => Auth::id(),
            'tanggal'          => now()->toDateString(),
            'total_harga'      => $paymentCalc['total'],
            'status'           => 'pending',
            'bukti_pembayaran' => $paymentPath,
        ]);

        foreach ($order as $item) {
            $produk = Produk::findOrFail($item['id_produk']);
            $kolomStok = 'stok_' . strtolower($item['size_produk']);
            $harga = $item['harga_satuan'] ?? $produk->harga_produk;
            $subtotal = $harga * $item['jumlah_produk'];

            DetailPemesanan::create([
                'id_pemesanan'       => $pemesanan->id_pemesanan,
                'id_produk'          => $item['id_produk'],
                'id_provinsi'        => $request->provinsi_id,
                'id_kota'            => $request->kota_id,
                'id_kecamatan'       => $request->kecamatan_id,
                'nama_pembeli'       => $request->full_name,
                'size_produk'        => $item['size_produk'],
                'jumlah_produk'      => $item['jumlah_produk'],
                'detail_alamat'      => $request->address_detail,
                'metode_pengantaran' => $request->shipping_method,
                'metode_pembayaran'  => $request->payment_method,
                'subtotal'           => $subtotal,
                'ongkir'             => 0,
            ]);

            Produk::where('id_produk', $item['id_produk'])
                ->decrement($kolomStok, $item['jumlah_produk']);

            Keranjang::where('id_pembeli', Auth::id())
                ->where('id_produk', $item['id_produk'])
                ->where('size_produk', $item['size_produk'])
                ->delete();
        }

        session()->forget('order');

        return redirect()->route('product')
            ->with('success', 'Order created successfully!');
    }
}
