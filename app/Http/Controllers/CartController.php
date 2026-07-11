<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Keranjang;

class CartController extends Controller
{
    public function showCart()
    {
        $cartItems = Keranjang::with('produk')
            ->where('id_pembeli', Auth::id())
            ->get();

        $cartTotal = $cartItems->sum(function ($item) {
            return $item->produk->harga_produk * $item->jumlah_produk;
        });

        return view('pages.cartShow', compact('cartItems', 'cartTotal'));
    }

    public function updateCartQty(Request $request, $id)
    {
        $request->validate([
            'jumlah_produk' => 'required|integer|min:1',
        ]);

        $cart = Keranjang::where('id_keranjang', $id)
            ->where('id_pembeli', Auth::id())
            ->firstOrFail();

        $cart->jumlah_produk = $request->jumlah_produk;
        $cart->save();

        return back()->with('success', 'Quantity updated.');
    }

    public function removeCart($id)
    {
        Keranjang::where('id_keranjang', $id)
            ->where('id_pembeli', Auth::id())
            ->delete();

        return back()->with('success', 'Item removed from cart.');
    }

    public function checkoutSingle($id)
    {
        $cart = Keranjang::with('produk')
            ->where('id_keranjang', $id)
            ->where('id_pembeli', Auth::id())
            ->firstOrFail();

        session(['order' => [
            'id_produk'     => $cart->id_produk,
            'size_produk'   => $cart->size_produk,
            'jumlah_produk' => $cart->jumlah_produk,
            'harga_satuan'  => $cart->produk->harga_produk,
        ]]);

        $cart->delete();

        return redirect()->route('checkout');
    }

    public function checkoutAll()
    {
        $cartItems = Keranjang::with('produk')
            ->where('id_pembeli', Auth::id())
            ->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Cart is empty!');
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

        Keranjang::where('id_pembeli', Auth::id())->delete();

        return redirect()->route('checkout');
    }
}
