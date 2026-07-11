@extends('layouts.mainV2')

@section('title', 'Order History - CLOTHIFY')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8 md:py-12 min-h-screen">
    <h1 class="text-2xl font-bold text-gray-900 mb-6">Order History</h1>

    @if($orders->isEmpty())
    {{-- Empty State --}}
    <div class="bg-white rounded-xl border border-gray-200 p-12 text-center">
        <i class="fa-solid fa-receipt text-5xl text-gray-300 mb-4"></i>
        <p class="text-gray-500 text-base mb-6">You haven't placed any orders yet.</p>
        <a href="{{ route('product') }}"
            class="inline-block px-8 py-3 bg-gray-900 text-white text-sm font-semibold rounded-lg hover:bg-gray-800 transition">
            Start Shopping
        </a>
    </div>
    @else
    <div class="space-y-4">
        @foreach($orders as $order)
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
            
            {{-- Order Header --}}
            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
                {{-- Order Header --}}
                <div class="px-5 py-4 bg-gray-50 border-b border-gray-200 flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                    <div>
                        <p class="text-sm font-semibold text-gray-900">{{ \Carbon\Carbon::parse($order->tanggal)->format('d M Y') }}</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="px-3 py-1 text-xs font-semibold rounded-full
                @if($order->status === 'pending') bg-yellow-100 text-yellow-700
                @elseif($order->status === 'accepted') bg-green-100 text-green-700
                @elseif($order->status === 'processed') bg-blue-100 text-blue-700
                @elseif($order->status === 'completed') bg-emerald-100 text-emerald-700
                @elseif($order->status === 'denied') bg-red-100 text-red-700
                @else bg-gray-100 text-gray-600
                @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                        <span class="text-sm font-bold text-gray-900">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</span>

                        @if($order->status === 'processed')
                        <form method="POST" action="{{ route('history.done', $order->id_pemesanan) }}" class="inline">
                            @csrf
                            <button type="submit"
                                onclick="return confirm('Mark this order as completed?')"
                                class="px-3 py-1.5 bg-gray-900 text-white text-xs font-semibold rounded-lg hover:bg-gray-800 transition cursor-pointer whitespace-nowrap">
                                Done
                            </button>
                        </form>
                        @endif
                    </div>
                </div>

                {{-- Order Items --}}
                <div class="p-5 space-y-3">
                    @foreach($order->detailPemesanan as $detail)
                    @php
                    $fotoProduk = null;
                    $namaProduk = 'Product Deleted';

                    if ($detail->produk) {
                    $fotoProduk = $detail->produk->foto_produk;
                    $namaProduk = $detail->produk->nama_produk;
                    }
                    @endphp
                    <div class="flex gap-4 items-center">
                        <img src="{{ $fotoProduk ? asset('storage/' . $fotoProduk) : 'https://placehold.co/60x60/e2e8f0/64748b?text=NO+IMG' }}"
                            alt="{{ $namaProduk }}"
                            class="w-16 h-16 object-cover rounded-lg flex-shrink-0 border border-gray-100">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-gray-900 truncate">{{ $namaProduk }}</p>
                            <p class="text-xs text-gray-500 mt-0.5">Size: {{ strtoupper($detail->size_produk) }} × {{ $detail->jumlah_produk }}</p>
                        </div>
                        <p class="text-sm font-medium text-gray-900 flex-shrink-0">Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection