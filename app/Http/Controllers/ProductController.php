<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Produk::with('kategori');

        // ✅ Search by name
        if ($request->filled('search')) {
            $query->where('nama_produk', 'like', '%' . $request->search . '%');
        }

        // ✅ Filter by kategori (sesuai name="id_kategori" di Blade)
        if ($request->filled('id_kategori')) {
            $query->where('id_kategori', (int) $request->id_kategori);
        }

        // ✅ Filter by price range
        if ($request->filled('harga')) {
            [$min, $max] = explode('-', $request->harga);
            $query->whereBetween('harga_produk', [(int) $min, (int) $max]);
        }

        $products = $query->orderByDesc('id_produk')->paginate(6)->withQueryString();
        $kategori = Kategori::all();

        return view('pages.product', compact('products', 'kategori'));
    }

    public function detail($id)
    {
        $produk = Produk::with('kategori')->findOrFail($id);

        return view('pages.productDetail', compact('produk'));
    }
}
