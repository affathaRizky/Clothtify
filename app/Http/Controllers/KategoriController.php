<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function addKategori(Request $request)
    {
        if (!$request->filled('nama_kategori')) {
            return back()->with('error', 'Category name is required.');
        }

        if (Kategori::where('nama_kategori', $request->nama_kategori)->exists()) {
            return back()->with('error', 'Category already exists.');
        }

        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        return back()->with('success', 'Category added successfully!');
    }

    public function showKategori()
    {
        $kategori = Kategori::all();
        return view('pages.admin.categoryManagement', compact('kategori'));
    }

    public function deleteKategori($id)
    {
        $kategori = Kategori::find($id);

        if (!$kategori) {
            return redirect()->route('categoryManagement')->with('error', 'Category not found.');
        }

        $kategori->delete();

        return redirect()->route('categoryManagement')->with('success', 'Category deleted successfully!');
    }
}
