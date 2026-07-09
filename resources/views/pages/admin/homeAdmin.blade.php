@extends('layouts.mainAdmin')

@section('title', 'Home - Admin Clothify')

@section('content')
<div class="max-w-screen-xl mx-auto px-4 py-12">

    {{-- Statistics Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

        {{-- Total Products --}}
        <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-sm hover:shadow-md transition">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fa-solid fa-box text-blue-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-gray-500">Updated now</span>
            </div>
            <p class="text-3xl font-bold text-gray-900 mb-1">{{ $totalProducts }}</p>
            <p class="text-sm font-medium text-gray-600">TOTAL PRODUCTS</p>
        </div>

        {{-- Pending Orders --}}
        <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-sm hover:shadow-md transition">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <i class="fa-solid fa-clock text-yellow-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-gray-500">Just now</span>
            </div>
            <p class="text-3xl font-bold text-gray-900 mb-1">{{ $pendingOrders }}</p>
            <p class="text-sm font-medium text-gray-600">PENDING ORDERS</p>
        </div>

        {{-- Completed Orders --}}
        <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-sm hover:shadow-md transition">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fa-solid fa-check text-green-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-gray-500">Today</span>
            </div>
            <p class="text-3xl font-bold text-gray-900 mb-1">{{ $completedOrders }}</p>
            <p class="text-sm font-medium text-gray-600">COMPLETED ORDERS</p>
        </div>

        {{-- Monthly Revenue --}}
        <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-sm hover:shadow-md transition">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i class="fa-solid fa-dollar-sign text-purple-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-gray-500">This month</span>
            </div>
            <p class="text-3xl font-bold text-gray-900 mb-1">Rp {{ number_format($monthlyRevenue, 0, ',', '.') }}</p>
            <p class="text-sm font-medium text-gray-600">MONTHLY REVENUE</p>
        </div>
    </div>

    {{-- Latest Orders Section --}}
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm mb-8">
        <div class="flex items-center justify-between p-6 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900">LATEST ORDERS</h2>
            <a href="{{ route('admin.orders') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition">VIEW ALL</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($latestOrders as $order)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#{{ $order->id_pemesanan }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center mr-3">
                                    <i class="fa-solid fa-user text-gray-600 text-xs"></i>
                                </div>
                                <span class="text-sm text-gray-900">{{ $order->pembeli->username ?? 'Unknown' }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ \Carbon\Carbon::parse($order->tanggal)->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 text-xs font-medium rounded-full
                                @if($order->status === 'pending') text-yellow-700 bg-yellow-100
                                @elseif($order->status === 'accepted') text-green-700 bg-green-100
                                @elseif($order->status === 'processed') text-blue-700 bg-blue-100
                                @elseif($order->status === 'completed') text-emerald-700 bg-emerald-100
                                @elseif($order->status === 'denied') text-red-700 bg-red-100
                                @else text-gray-600 bg-gray-100
                                @endif">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-sm text-gray-500">No orders yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Products Management Section --}}
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm">
        <div class="flex items-center justify-between p-6 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900">PRODUCTS MANAGEMENT</h2>
            <a href="{{ route('productManagement') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition flex items-center gap-2">
                VIEW ALL <i class="fa-solid fa-chevron-right text-xs"></i>
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Item Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($lowStockProducts as $produk)
                    @php
                    $totalStock = ($produk->stok_s ?? 0) + ($produk->stok_m ?? 0) + ($produk->stok_l ?? 0) + ($produk->stok_xl ?? 0);
                    @endphp
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#{{ $produk->id_produk }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $produk->nama_produk }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $totalStock }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 text-xs font-medium text-red-700 bg-red-100 rounded-full">Low Stock</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-sm text-gray-500">All products have sufficient stock.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection