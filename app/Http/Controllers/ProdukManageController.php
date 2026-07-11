<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;

class ProdukManageController extends Controller
{
   public function index()
   {
      $kategori = Kategori::all();
      $produk = Produk::with('kategori')->get();
      return view('pages.admin.productManagement', compact('kategori', 'produk'));
   }

   public function addProduk(Request $request)
   {
      $path = $request->file('gambar')->store('produk', 'public');

      $produk = new Produk();
      $produk->nama_produk = $request['nama_produk'];
      $produk->harga_produk = $request['harga_produk'];
      $produk->id_kategori = $request['id_kategori'];
      $produk->stok_s = $request->stok['S'];
      $produk->stok_m = $request->stok['M'];
      $produk->stok_l = $request->stok['L'];
      $produk->stok_xl = $request->stok['XL'];
      $produk->deskripsi_produk = $request['deskripsi'];
      $produk->status_produk = $request['status'];

      $produk->foto_produk = $path;

      $produk->save();
      return redirect()->back()->with('success', 'New Product Added!');
   }

   public function detail($id)
   {
      $produk = Produk::with('kategori')->findOrFail($id);

      return view('pages.productDetail', compact('produk'));
   }

   public function deleteProduct($id)
   {
      $produk = Produk::findOrFail($id);
      $produk->delete();

      if ($produk->delete()) {
         return redirect()->route('productManagement')->with('success', 'Product Deleted');
      } else {
         return redirect()->route('productManagement')->with('error', 'Unable to Delete Product,Try Again Later');
      }
   }

   public function updateProduk(Request $request, $id)
   {
      if (!session('admin_id')) {
         return redirect()->route('login')
            ->with('error', 'Silakan login sebagai admin terlebih dahulu!');
      }

      $produk = Produk::findOrFail($id);

      if ($request->hasFile('gambar')) {
         if ($produk->foto_produk) {
            Storage::disk('public')->delete($produk->foto_produk);
         }
         $produk->foto_produk = $request->file('gambar')->store('produk', 'public');
      }

      // Update data produk
      $produk->nama_produk  = $request->edit_nama_produk;
      $produk->harga_produk = $request->edit_harga_produk;
      $produk->id_kategori  = $request->id_kategori;
      $produk->deskripsi_produk   = $request->edit_deskripsi;
      $produk->status_produk     = $request->edit_status;

      if ($request->has('edit_stok')) {
         foreach ($request->edit_stok as $size => $jumlah) {
            $kolomStok = 'stok_' . strtolower($size);
            if (\Schema::hasColumn('produk', $kolomStok)) {
               $produk->$kolomStok = max(0, (int) $jumlah);
            }
         }
      }

      $produk->save();

      return redirect()->route('productManagement')
         ->with('success', 'Produk berhasil diupdate!');
   }
}
