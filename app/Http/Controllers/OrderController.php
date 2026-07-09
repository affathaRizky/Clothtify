<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk;
use App\Models\Keranjang;

class OrderController extends Controller
{
    public function AddOrder(Request $request)
    {
        $produk = Produk::findOrFail($request->id_produk);
        $kolomStok = 'stok_' . strtolower($request->size_produk);

        if ($produk->$kolomStok < $request->jumlah_produk) {
            return redirect()->back()
                ->with('error', 'Stok tidak mencukupi!');
        }

        // FUNCTION ADD TO CART
        if ($request->input('action') === 'add_cart') {

            if (!Auth::check()) {
                return redirect()->route('login')
                    ->with('error', 'Silakan login terlebih dahulu untuk menambahkan ke keranjang!')
                    ->with('url_intended', url()->current());
            }

            $existingCart = Keranjang::where('id_pembeli', Auth::id())
                ->where('id_produk', $request->id_produk)
                ->where('size_produk', $request->size_produk)
                ->first();

            if ($existingCart) {
                $existingCart->jumlah_produk += $request->jumlah_produk;
                $existingCart->save();
            } else {
                Keranjang::create([
                    'id_pembeli'    => Auth::id(),
                    'id_produk'     => $request->id_produk,
                    'size_produk'   => $request->size_produk,
                    'jumlah_produk' => $request->jumlah_produk,
                ]);
            }

            return redirect()->route('product')
                ->with('success', 'Produk berhasil ditambahkan ke keranjang!');
        }

        // FUNCTION BUY NOW
        if ($request->input('action') === 'buy_now') {

            if (!Auth::check()) {
                return redirect()->route('login')
                    ->with('error', 'You Must Login Before Create Order!')
                    ->with('url_intended', url()->current());
            }

            session(['order' => [
                'id_pembeli'    => Auth::id(),
                'id_produk'     => $request->id_produk,
                'tanggal'       => date('Y-m-d'),
                'size_produk'   => $request->size_produk,
                'jumlah_produk' => $request->jumlah_produk,
                'total_harga'   => $produk->harga_produk * $request->jumlah_produk,
                'status'        => 'pending',
            ]]);

            return redirect()->route('checkout')
                ->with('success', 'Product added to order!');
        }
    }

}
