@extends('layouts.mainV2')

@section('title', $produk->nama_produk . ' - CLOTHIFY')

@section('content')
<main class="flex-grow max-w-screen-xl mx-auto px-4 py-8 md:py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12">

        <!-- LEFT: IMAGE GALLERY -->
        <div class="space-y-4">
            <div class="aspect-[4/5] overflow-hidden rounded-xl bg-gray-100">
                <img id="main-image"
                    src="{{ $produk->foto_produk ? asset('storage/' . $produk->foto_produk) : 'https://placehold.co/800x1000/e2e8f0/64748b?text=No+Image' }}"
                    alt="{{ $produk->nama_produk }}"
                    class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
            </div>
        </div>

        <!-- RIGHT: PRODUCT INFO -->
        <div class="flex flex-col mt-10">

            <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">{{ $produk->nama_produk }}</h1>
            <p class="text-xl font-semibold text-gray-900 mb-4">Rp. {{ number_format($produk->harga_produk, 0, ',', '.') }}</p>

            <div class="mb-6 pb-6 border-b border-gray-200">
                <p class="text-sm text-gray-600 leading-relaxed mb-3">
                    {{ $produk->deskripsi_produk }}
                </p>
            </div>

            {{-- FORM PEMESANAN --}}
            <form id="pemesanan" class="space-y-6" action="{{ route('addorder') }}" method="POST">
                @csrf
                <input type="hidden" name="id_produk" value="{{ $produk->id_produk }}">

                @php
                $sizes = ['S', 'M', 'L', 'XL'];
                @endphp

                {{-- Size Dropdown + Stok --}}
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Size:</label>
                    <select name="size_produk" required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-gray-900 outline-none transition text-sm bg-white">
                        <option value="" disabled selected>Select size</option>
                        @foreach($sizes as $size)
                        @php
                        $kolomStok = 'stok_' . strtolower($size);
                        $stok = $produk->$kolomStok ?? 0;
                        @endphp
                        <option value="{{ $size }}" {{ $stok <= 0 ? 'disabled' : '' }}>
                            {{ $size }} — {{ $stok > 0 ? 'Stock: ' . $stok : 'Out of Stock' }}
                        </option>
                        @endforeach
                    </select>
                </div>

                {{-- Quantity Selector --}}
                <div class="mb-8">
                    <p class="text-sm font-medium text-gray-700 mb-3">Quantity:</p>
                    <div class="flex items-center border border-gray-300 rounded-lg w-32">
                        <button type="button" id="qty-minus" class="px-4 py-2 text-gray-600 hover:bg-gray-100 transition border-r border-gray-300">
                            <i class="fa-solid fa-minus text-xs"></i>
                        </button>
                        <input type="number" id="jumlah_produk" name="jumlah_produk" value="1" min="1" max="99"
                            class="w-12 text-center py-2.5 focus:outline-none text-base font-bold text-gray-900 bg-white 
                [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none">
                        <button type="button" id="qty-plus" class="px-4 py-2 text-gray-600 hover:bg-gray-100 transition border-l border-gray-300">
                            <i class="fa-solid fa-plus text-xs"></i>
                        </button>
                    </div>

                    {{-- Buttons --}}
                    <div class="space-y-3 mt-8">
                        <button type="submit" name="action" value="add_cart" class="w-full py-3 px-6 bg-gray-200 text-gray-900 font-semibold rounded-lg hover:bg-gray-300 transition">
                            Add to cart
                        </button>
                        <button type="submit" name="action" value="buy_now" class="block w-full py-3 px-6 bg-gray-900 text-white text-center font-semibold rounded-lg hover:bg-gray-800 transition">
                            BUY NOW
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection