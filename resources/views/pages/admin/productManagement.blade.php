@extends('layouts.mainAdmin')

@section('title', 'Product Management - Admin Clothify')

@section('content')

<div class="flex-grow p-6 md:p-8 bg-gray-50">

    <!-- Inventory Management Section -->
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm">

        <!-- Header -->
        <div class="flex items-center justify-between p-6 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900">INVENTORY MANAGEMENT</h2>
            <div class="flex items-center gap-3">
                <button class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center hover:bg-gray-200 transition">
                    <i class="fa-solid fa-filter text-gray-600"></i>
                </button>
                <button class="px-4 py-2.5 bg-gray-900 text-white font-medium rounded-lg hover:bg-gray-800 transition flex items-center gap-2"
                    data-modal-target="addProductModal" data-modal-toggle="addProductModal">
                    <i class="fa-solid fa-plus"></i> ADD PRODUCT
                </button>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Product</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Category</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Price</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Stock</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @if(isset($produk) && count($produk) > 0)
                    @foreach($produk as $item)
                    <tr class="hover:bg-gray-50 transition">
                        <!-- Product -->
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">

                                {{-- Info Produk --}}
                                <div class="min-w-0">
                                    <p class="text-sm font-semibold text-gray-900 truncate">{{ $item->nama_produk }}</p>
                                    <p class="text-xs text-gray-500 mt-0.5">BRG - {{ $item->id_produk }}</p>
                                </div>
                            </div>
                        </td>
                        <!-- Category -->
                        <td class="px-6 py-4">
                            <span class="text-sm font-medium text-gray-900">{{ $item->kategori->nama_kategori ?? '-' }}</span>
                        </td>
                        <!-- Price -->
                        <td class="px-6 py-4">
                            <span class="text-sm font-medium text-gray-900">Rp {{ number_format($item->harga_produk, 0, ',', '.') }}</span>
                        </td>
                        <!-- Stock -->
                        <td class="px-6 py-4">
                            <span class="text-sm font-medium text-gray-900">
                                {{ ($item->stok_s ?? 0) + ($item->stok_m ?? 0) + ($item->stok_l ?? 0) + ($item->stok_xl ?? 0) }}
                            </span>
                        </td>
                        <!-- Status -->
                        <td class="px-6 py-4">
                            @if($item->status_produk === 'active')
                            <span class="px-3 py-1.5 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Active</span>
                            @else
                            <span class="px-3 py-1.5 text-xs font-semibold text-red-700 bg-red-100 rounded-full">Nonactive</span>
                            @endif
                        </td>
                        <!-- Action -->
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <button type="button"
                                    data-modal-target="editProductModal{{ $item->id_produk }}"
                                    data-modal-toggle="editProductModal{{ $item->id_produk }}"
                                    class="w-9 h-9 bg-gray-100 rounded-lg flex items-center justify-center hover:bg-gray-200 transition cursor-pointer">
                                    <i class="fa-solid fa-pen-to-square text-gray-600 text-sm"></i>
                                </button>

                                <form action="{{ route('deleteProduk', $item->id_produk) }}" method="POST" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button class="w-9 h-9 bg-gray-100 rounded-lg flex items-center justify-center hover:bg-red-100 transition">
                                        <i class="fa-solid fa-trash text-gray-600 hover:text-red-600 text-sm"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-400 text-sm">
                            <i class="fa-solid fa-box-open text-4xl mb-3 text-gray-300"></i>
                            <p>Belum ada produk. Klik tombol ADD PRODUCT untuk menambah.</p>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-center gap-2 px-6 py-4 border-t border-gray-200">
            <button class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-gray-700 transition">
                <i class="fa-solid fa-chevron-left text-sm"></i>
            </button>
            <button class="w-8 h-8 flex items-center justify-center bg-gray-900 text-white font-medium rounded transition">1</button>
            <button class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-gray-700 transition">
                <i class="fa-solid fa-chevron-right text-sm"></i>
            </button>
        </div>
    </div>

</div>

<!-- MODAL ADD PRODUCT -->
<x-modal id="addProductModal" title="ADD PRODUCT">
    <form class="space-y-4" method="POST" action="{{ route('addProduk') }}" enctype="multipart/form-data">
        @csrf

        <div>
            <label class="block mb-1.5 text-sm font-medium text-gray-700">Product Name</label>
            <input type="text" name="nama_produk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required>
        </div>

        <div class="flex gap-4">
            <div class="w-1/2">
                <label class="block mb-1.5 text-sm font-medium text-gray-700">Price</label>
                <input type="number" name="harga_produk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" min="0" required>
            </div>
            <div class="w-1/2">
                <label class="block mb-1.5 text-sm font-medium text-gray-700">Category</label>
                <select name="id_kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required>
                    <option value="" selected disabled>Select Category</option>
                    @foreach($kategori as $kat)
                    <option value="{{ $kat->id_kategori }}">{{ $kat->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div>
            <label class="block mb-1.5 text-sm font-medium text-gray-700">Stock per Size</label>
            <div class="space-y-2">
                @foreach(['S', 'M', 'L', 'XL'] as $size)
                <div class="flex items-center gap-3">
                    <span class="w-12 text-sm font-bold text-gray-700 text-center bg-gray-100 py-2 rounded-md border">{{ $size }}</span>
                    <input type="number" name="stok[{{ $size }}]" min="0" value="0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                </div>
                @endforeach
            </div>
        </div>

        <div class="flex gap-4">
            <div class="w-1/2">
                <label class="block mb-1.5 text-sm font-medium text-gray-700">Image</label>
                <input type="file" name="gambar" accept="image/*" class="block w-full text-xs border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2" required>
            </div>
            <div class="w-1/2">
                <label class="block mb-1.5 text-sm font-medium text-gray-700">Status</label>
                <select name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                    <option value="active">Active</option>
                    <option value="nonactive">Nonactive</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block mb-1.5 text-sm font-medium text-gray-700">Description</label>
            <textarea name="deskripsi" rows="3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required></textarea>
        </div>

        <button type="submit" onclick="this.disabled=true; this.innerText='Menyimpan...'; this.form.submit();"
            class="w-full text-white bg-gray-900 hover:bg-gray-800 font-medium rounded-lg text-sm px-5 py-2.5">
            Save Product
        </button>
    </form>
</x-modal>


{{-- Modal Edit - DI DALAM foreach --}}
@foreach($produk as $p)
<x-modal id="editProductModal{{ $p->id_produk }}" title="EDIT PRODUCT">
    <form class="space-y-4" method="POST" action="{{ route('updateProduk', $p->id_produk) }}" enctype="multipart/form-data">
        @csrf

        <div>
            <label class="block mb-1.5 text-sm font-medium text-gray-700">Product Name</label>
            <input type="text" name="edit_nama_produk" value="{{ old('nama_produk', $p->nama_produk) }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required>
        </div>

        <div class="flex gap-4">
            <div class="w-1/2">
                <label class="block mb-1.5 text-sm font-medium text-gray-700">Price</label>
                <input type="number" name="edit_harga_produk" value="{{ old('harga_produk', $p->harga_produk) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" min="0" required>
            </div>
            <div class="w-1/2">
                <label class="block mb-1.5 text-sm font-medium text-gray-700">Category</label>
                <select name="id_kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required>
                    <option value="" disabled>Select Category</option>
                    @foreach($kategori as $kat)
                    <option value="{{ $kat->id_kategori }}" {{ $p->id_kategori == $kat->id_kategori ? 'selected' : '' }}>
                        {{ $kat->nama_kategori }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div>
            <label class="block mb-1.5 text-sm font-medium text-gray-700">Stock per Size</label>
            <div class="space-y-2">
                @foreach(['S', 'M', 'L', 'XL'] as $size)
                <div class="flex items-center gap-3">
                    <span class="w-12 text-sm font-bold text-gray-700 text-center bg-gray-100 py-2 rounded-md border">{{ $size }}</span>
                    @php
                    $kolomStok = 'stok_' . strtolower($size);
                    $stokValue = old("stok.$size", $p->$kolomStok ?? 0);
                    @endphp
                    <input type="number" name="edit_stok[{{ $size }}]" min="0" value="{{ $stokValue }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                </div>
                @endforeach
            </div>
        </div>

        <div class="flex gap-4">
            <div class="w-1/2">
                <label class="block mb-1.5 text-sm font-medium text-gray-700">Image</label>
                @if($p->foto_produk)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $p->foto_produk) }}" alt="Preview" class="h-16 w-16 object-cover rounded border">
                    <p class="text-xs text-gray-500 mt-1">Current Image</p>
                </div>
                @endif
                <input type="file" name="edit_gambar_produk" accept="image/*"
                    class="block w-full text-xs border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2">
                <p class="text-xs text-gray-400 mt-1">Leave empty to keep current image</p>
            </div>
            <div class="w-1/2">
                <label class="block mb-1.5 text-sm font-medium text-gray-700">Status</label>
                <select name="edit_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                    <option value="active" {{ $p->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="nonactive" {{ $p->status == 'nonactive' ? 'selected' : '' }}>Nonactive</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block mb-1.5 text-sm font-medium text-gray-700">Description</label>
            <textarea name="edit_deskripsi" rows="3"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required>{{ old('deskripsi', $p->deskripsi) }}</textarea>
        </div>

        <button type="submit" onclick="this.disabled=true; this.innerText='Menyimpan...'; this.form.submit();"
            class="w-full text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5">
            Update Product
        </button>
    </form>
</x-modal>
@endforeach

@endsection