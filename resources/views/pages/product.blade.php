@extends('layouts.main')

@section('title', 'Products - CLOTHIFY')

@section('content')
<div class="max-w-screen-xl mx-auto px-4 py-8">

    <div class="flex flex-col md:flex-row gap-6">

        <!-- SIDEBAR FILTER -->
        <aside class="w-full md:w-64 flex-shrink-0">
            <div class="bg-white border border-gray-200 rounded-xl p-5 sticky top-24">

                <form method="GET" action="{{ route('product') }}" id="filterForm">

                    <!-- Search Bar -->
                    <div class="mb-6">
                        <div class="relative">
                            <input type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Search..."
                                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            <i class="fa-solid fa-search absolute left-3.5 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>

                    <!-- Kategori Produk -->
                    <div class="mb-6 pb-6 border-b border-gray-200">
                        <h3 class="font-bold text-gray-900 mb-3">Product Category</h3>
                        <div class="space-y-2">
                            @foreach($kategori as $item)
                            <label class="flex items-center cursor-pointer group">
                                <input type="radio" name="id_kategori" value="{{ $item->id_kategori }}"
                                    {{ request('id_kategori') == $item->id_kategori ? 'checked' : '' }}
                                    class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500"
                                    onchange="this.form.submit()">
                                <span class="ml-2 text-gray-700 group-hover:text-indigo-600 transition">{{ $item->nama_kategori }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Harga -->
                    <div class="mb-6">
                        <h3 class="font-bold text-gray-900 mb-3">Price</h3>
                        <div class="space-y-2">
                            @foreach([
                            '0-230000' => 'Under Rp 230.000',
                            '230001-400000' => 'Rp 230.000 - 400.000',
                            '400001-999999999' => 'Above Rp 400.000'
                            ] as $val => $label)
                            <label class="flex items-center cursor-pointer group">
                                <input type="radio" name="harga" value="{{ $val }}"
                                    {{ request('harga') === $val ? 'checked' : '' }}
                                    class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500"
                                    onchange="this.form.submit()">
                                <span class="ml-2 text-gray-700 text-sm group-hover:text-indigo-600 transition">{{ $label }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Reset Filter Button -->
                    <a href="{{ route('product') }}"
                        class="block w-full py-2 px-4 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-sm font-medium transition text-center">
                        Reset Filter
                    </a>

                </form>
            </div>
        </aside>

        <!-- PRODUCT GRID -->
        <main class="flex-1">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                @forelse($products as $item)
                @include('components.productCard', [
                'image' => $item->foto_produk
                ? asset('storage/' . $item->foto_produk)
                : 'https://placehold.co/400x600/e2e8f0/64748b?text=No+Image',
                'name' => $item->nama_produk,
                'price' => 'Rp. ' . number_format($item->harga_produk, 0, ',', '.'),
                'category' => $item->kategori->nama_kategori ?? 'Uncategorized',
                'id' => $item->id_produk,
                ])
                @empty
                <div class="col-span-full text-center py-20">
                    <i class="fa-solid fa-box-open text-gray-300 text-5xl mb-4"></i>
                    <p class="text-gray-500 text-lg">Belum ada produk tersedia.</p>
                </div>
                @endforelse

            </div>

            {{-- Pagination --}}
            @if($products->hasPages())
            <div class="flex items-center justify-center mt-10 gap-2">
                {{-- Previous Button --}}
                @if($products->onFirstPage())
                <span class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-200 rounded-lg cursor-not-allowed">
                    <svg class="w-4 h-4 me-1.5 -ms-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M5 12l4-4m-4 4 4 4" />
                    </svg>
                    Previous
                </span>
                @else
                <a href="{{ $products->previousPageUrl() }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition shadow-sm">
                    <svg class="w-4 h-4 me-1.5 -ms-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M5 12l4-4m-4 4 4 4" />
                    </svg>
                    Previous
                </a>
                @endif

                {{-- Page Numbers --}}
                @foreach($products->getUrlRange(max(1, $products->currentPage() - 2), min($products->lastPage(), $products->currentPage() + 2)) as $page => $url)
                @if($page == $products->currentPage())
                <span class="inline-flex items-center justify-center w-10 h-10 text-sm font-bold text-white bg-gray-900 rounded-lg shadow-sm">
                    {{ $page }}
                </span>
                @else
                <a href="{{ $url }}"
                    class="inline-flex items-center justify-center w-10 h-10 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition shadow-sm">
                    {{ $page }}
                </a>
                @endif
                @endforeach

                {{-- Next Button --}}
                @if($products->hasMorePages())
                <a href="{{ $products->nextPageUrl() }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition shadow-sm">
                    Next
                    <svg class="w-4 h-4 ms-1.5 -me-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m14 0-4 4m4-4-4-4" />
                    </svg>
                </a>
                @else
                <span class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-200 rounded-lg cursor-not-allowed">
                    Next
                    <svg class="w-4 h-4 ms-1.5 -me-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m14 0-4 4m4-4-4-4" />
                    </svg>
                </span>
                @endif
            </div>

            {{-- Info: Showing X of Y --}}
            <p class="text-center text-xs text-gray-500 mt-3">
                Showing {{ $products->firstItem() }}-{{ $products->lastItem() }} of {{ $products->total() }} products
            </p>
            @endif
        </main>
    </div>
</div>
@endsection