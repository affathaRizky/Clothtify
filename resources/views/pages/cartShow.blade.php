@extends('layouts.mainV2')

@section('title', 'Shopping Cart - CLOTHIFY')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8 md:py-12 min-h-screen">
    <h1 class="text-2xl font-bold text-gray-900 mb-6">Shopping Cart</h1>

    @if($cartItems->isEmpty())
        {{-- Empty State --}}
        <div class="bg-white rounded-xl border border-gray-200 p-12 text-center">
            <i class="fa-solid fa-cart-arrow-down text-5xl text-gray-300 mb-4"></i>
            <p class="text-gray-500 text-base mb-6">Your cart is currently empty.</p>
            <a href="{{ route('product') }}"
                class="inline-block px-8 py-3 bg-gray-900 text-white text-sm font-semibold rounded-lg hover:bg-gray-800 transition">
                Start Shopping
            </a>
        </div>
    @else
        {{-- Cart Items --}}
        <div class="space-y-4">
            @foreach($cartItems as $item)
            <div class="bg-white rounded-xl border border-gray-200 p-5 flex gap-4 items-center">
                {{-- Product Image --}}
                <img src="{{ $item->produk->foto_produk ? asset('storage/' . $item->produk->foto_produk) : 'https://placehold.co/100x100/e2e8f0/64748b?text=IMG' }}"
                    alt="{{ $item->produk->nama_produk }}"
                    class="w-24 h-24 object-cover rounded-lg flex-shrink-0 border border-gray-100">

                {{-- Product Info --}}
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-gray-900 truncate">{{ $item->produk->nama_produk }}</p>
                    <p class="text-xs text-gray-500 mt-1">Size: {{ strtoupper($item->size_produk) }}</p>
                    <p class="text-xs text-gray-400 mt-0.5">Rp {{ number_format($item->produk->harga_produk, 0, ',', '.') }} / pc</p>
                </div>

                {{-- Qty Controls --}}
                <div class="flex items-center gap-2 flex-shrink-0">
                    <form method="POST" action="{{ route('cart.updateQty', $item->id_keranjang) }}" class="inline">
                        @csrf
                        <input type="hidden" name="jumlah_produk" value="{{ max(1, $item->jumlah_produk - 1) }}">
                        <button type="submit"
                            class="w-8 h-8 bg-gray-100 border border-gray-200 rounded-lg flex items-center justify-center hover:bg-gray-200 transition cursor-pointer text-gray-600">
                            <i class="fa-solid fa-minus text-xs"></i>
                        </button>
                    </form>
                    <span class="text-sm font-bold text-gray-900 w-8 text-center">{{ $item->jumlah_produk }}</span>
                    <form method="POST" action="{{ route('cart.updateQty', $item->id_keranjang) }}" class="inline">
                        @csrf
                        <input type="hidden" name="jumlah_produk" value="{{ $item->jumlah_produk + 1 }}">
                        <button type="submit"
                            class="w-8 h-8 bg-gray-100 border border-gray-200 rounded-lg flex items-center justify-center hover:bg-gray-200 transition cursor-pointer text-gray-600">
                            <i class="fa-solid fa-plus text-xs"></i>
                        </button>
                    </form>
                </div>

                {{-- Subtotal --}}
                <div class="text-right flex-shrink-0 w-28">
                    <p class="text-sm font-bold text-gray-900">Rp {{ number_format($item->produk->harga_produk * $item->jumlah_produk, 0, ',', '.') }}</p>
                </div>

                {{-- Action Buttons: Checkout Per Item + Remove --}}
                <div class="flex flex-col gap-2 flex-shrink-0">
                    <form method="POST" action="{{ route('cart.remove', $item->id_keranjang) }}">
                        @csrf
                        <button type="submit"
                            class="px-3 py-1.5 bg-gray-50 border border-gray-200 text-gray-500 text-xs font-semibold rounded-lg hover:bg-red-50 hover:border-red-200 hover:text-red-500 transition cursor-pointer whitespace-nowrap">
                            Remove
                        </button>
                    </form>

                    <form method="POST" action="{{ route('cart.checkoutSingle', $item->id_keranjang) }}">
                        @csrf
                        <button type="submit"
                            class="px-3 py-1.5 bg-gray-900 text-white text-xs font-semibold rounded-lg hover:bg-gray-800 transition cursor-pointer whitespace-nowrap">
                            Checkout
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Summary --}}
        <div class="mt-6 bg-white rounded-xl border border-gray-200 p-6">
            <div class="flex justify-between items-center mb-4 pb-4 border-b border-gray-100">
                <span class="text-sm text-gray-600">Total Items</span>
                <span class="text-sm font-semibold text-gray-900">{{ $cartItems->count() }} products</span>
            </div>
            <div class="flex justify-between items-center mb-6">
                <span class="text-base font-semibold text-gray-900">Subtotal</span>
                <span class="text-xl font-bold text-gray-900">Rp {{ number_format($cartTotal, 0, ',', '.') }}</span>
            </div>
        </div>
    @endif
</div>
@endsection