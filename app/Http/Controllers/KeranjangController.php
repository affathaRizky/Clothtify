<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk;
use App\Models\Keranjang;

class CartController extends Controller
{
    public function showCart()
    {
        $cartItems = collect();
        $cartTotal = 0;

        if (Auth::check()) {
            $cartItems = Keranjang::with('produk')
                ->where('id_pembeli', Auth::id())
                ->get();

            $cartTotal = $cartItems->sum(function ($item) {
                return $item->produk->harga_produk * $item->jumlah_produk;
            });
        }

        return view('pages.cartShow', compact('cartItems', 'cartTotal'));
    }

    public function updateCartQty(Request $request, $id)
    {
        $cart = Keranjang::where('id_keranjang', $id)
            ->where('id_pembeli', Auth::id())
            ->firstOrFail();

        $newQty = (int) $request->jumlah_produk;

        if ($newQty < 1) {
            $cart->delete();
            return redirect()->route('cart.show')
                ->with('success', 'Item dihapus dari keranjang!');
        }

        $produk = Produk::findOrFail($cart->id_produk);
        $kolomStok = 'stok_' . strtolower($cart->size_produk);

        if ($produk->$kolomStok < $newQty) {
            return redirect()->back()
                ->with('error', 'Stok tidak mencukupi! Stok tersedia: ' . $produk->$kolomStok);
        }

        $cart->jumlah_produk = $newQty;
        $cart->save();

        return redirect()->back()
            ->with('success', 'Jumlah produk diperbarui!');
    }

    public function removeCart($id)
    {
        $cart = Keranjang::where('id_keranjang', $id)
            ->where('id_pembeli', Auth::id())
            ->firstOrFail();

        $cart->delete();

        return redirect()->back()
            ->with('success', 'Item berhasil dihapus dari keranjang!');
    }

    public function checkoutAll()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu!');
        }

        $cartItems = Keranjang::with('produk')
            ->where('id_pembeli', Auth::id())
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.show')
                ->with('error', 'Keranjang kosong!');
        }

        $orderItems = [];
        foreach ($cartItems as $item) {
            $orderItems[] = [
                'id_produk'     => $item->id_produk,
                'size_produk'   => $item->size_produk,
                'jumlah_produk' => $item->jumlah_produk,
                'harga_satuan'  => $item->produk->harga_produk,
            ];
        }

        session(['order' => $orderItems]);

        return redirect()->route('checkout');
    }

    public function checkoutSingle($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu!');
        }

        $cart = Keranjang::with('produk')
            ->where('id_keranjang', $id)
            ->where('id_pembeli', Auth::id())
            ->firstOrFail();

        session(['order' => [
            'id_pembeli'    => Auth::id(),
            'id_produk'     => $cart->id_produk,
            'size_produk'   => $cart->size_produk,
            'jumlah_produk' => $cart->jumlah_produk,
            'total_harga'   => $cart->produk->harga_produk * $cart->jumlah_produk,
            'tanggal'       => date('Y-m-d'),
            'status'        => 'pending',
        ]]);

        return redirect()->route('checkout');
    }
}
