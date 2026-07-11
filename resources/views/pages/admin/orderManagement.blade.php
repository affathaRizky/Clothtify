@extends('layouts.mainAdmin')

@section('title', 'Order Management - Admin Clothify')

@section('content')
<div class="flex-grow p-6 md:p-8 bg-gray-50 min-h-screen">

    {{-- ==================== PENDING ORDERS ==================== --}}
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm mb-8">
        <div class="flex items-center gap-2 p-6 border-b border-gray-200">
            <i class="fa-regular fa-clock text-yellow-600 text-xl"></i>
            <h2 class="text-lg font-semibold text-gray-900">PENDING ORDERS</h2>
            <span class="ml-auto px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-bold rounded-full">{{ $pendingOrders->count() }}</span>
        </div>

        @if($pendingOrders->isEmpty())
            <div class="p-8 text-center text-gray-400 text-sm">No pending orders yet.</div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Customer</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($pendingOrders as $order)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">#{{ $order->id_pemesanan }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                        <span class="text-xs font-medium text-gray-600">{{ strtoupper(substr($order->pembeli->username ?? '?', 0, 2)) }}</span>
                                    </div>
                                    <span class="text-sm text-gray-900">{{ $order->pembeli->username ?? '-' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ \Carbon\Carbon::parse($order->tanggal)->format('d/m/Y') }}</td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    {{-- ✅ Tombol Detail → Buka Modal --}}
                                    <button type="button"
                                        onclick='openDetailModal(@json($order->load("detailPemesanan.produk")))'
                                        class="px-3 py-1.5 text-xs font-medium text-white bg-gray-900 rounded hover:bg-gray-800 transition">
                                        Detail
                                    </button>

                                    {{-- ✅ Accept/Deny Tetap di Tabel (Route Lama) --}}
                                    <form action="{{ route('admin.orders.updateStatus', $order->id_pemesanan) }}" method="POST" class="flex gap-1">
                                        @csrf
                                        <button type="submit" name="status" value="processed"
                                            class="px-3 py-1.5 text-xs font-medium text-white bg-green-600 rounded hover:bg-green-700 transition">
                                            Accept
                                        </button>
                                        <button type="submit" name="status" value="denied"
                                            class="px-3 py-1.5 text-xs font-medium text-white bg-red-600 rounded hover:bg-red-700 transition">
                                            Deny
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    {{-- ==================== PROCESSED ORDERS ==================== --}}
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm mb-8">
        <div class="flex items-center gap-2 p-6 border-b border-gray-200">
            <i class="fa-solid fa-spinner text-blue-600 text-xl"></i>
            <h2 class="text-lg font-semibold text-gray-900">PROCESSED ORDERS</h2>
            <span class="ml-auto px-3 py-1 bg-blue-100 text-blue-700 text-xs font-bold rounded-full">{{ $processedOrders->count() }}</span>
        </div>

        @if($processedOrders->isEmpty())
            <div class="p-8 text-center text-gray-400 text-sm">No processed orders yet.</div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Customer</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($processedOrders as $order)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">#{{ $order->id_pemesanan }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $order->pembeli->username ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ \Carbon\Carbon::parse($order->tanggal)->format('d/m/Y') }}</td>
                            <td class="px-6 py-4">
                                <button type="button"
                                    onclick='openDetailModal(@json($order->load("detailPemesanan.produk")))'
                                    class="px-3 py-1.5 text-xs font-medium text-white bg-gray-900 rounded hover:bg-gray-800 transition">
                                    Detail
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    {{-- ==================== COMPLETED ORDERS ==================== --}}
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm">
        <div class="flex items-center gap-2 p-6 border-b border-gray-200">
            <i class="fa-solid fa-check text-green-600 text-xl"></i>
            <h2 class="text-lg font-semibold text-gray-900">COMPLETED ORDERS</h2>
            <span class="ml-auto px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full">{{ $completedOrders->count() }}</span>
        </div>

        @if($completedOrders->isEmpty())
            <div class="p-8 text-center text-gray-400 text-sm">No completed orders yet.</div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Customer</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($completedOrders as $order)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">#{{ $order->id_pemesanan }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $order->pembeli->username ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ \Carbon\Carbon::parse($order->tanggal)->format('d/m/Y') }}</td>
                            <td class="px-6 py-4">
                                <button type="button"
                                    onclick='openDetailModal(@json($order->load("detailPemesanan.produk")))'
                                    class="px-3 py-1.5 text-xs font-medium text-white bg-gray-900 rounded hover:bg-gray-800 transition">
                                    Detail
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

</div>

{{-- ==================== MODAL DETAIL ORDER (READ ONLY) ==================== --}}
<div id="orderDetailModal" class="fixed inset-0 z-50 hidden">
    {{-- Backdrop --}}
    <div class="absolute inset-0 bg-black/50" onclick="closeDetailModal()"></div>

    {{-- Modal Content --}}
    <div class="absolute inset-0 flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto relative">

            {{-- Header --}}
            <div class="sticky top-0 bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between rounded-t-xl z-10">
                <h3 class="text-lg font-bold text-gray-900">Order #<span id="modalOrderId"></span></h3>
                <button onclick="closeDetailModal()" class="text-gray-400 hover:text-gray-600 transition">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>

            {{-- Body --}}
            <div class="p-6 space-y-6">

                {{-- Order Info --}}
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <p class="text-gray-500">Customer</p>
                        <p class="font-semibold text-gray-900" id="modalCustomer"></p>
                    </div>
                    <div>
                        <p class="text-gray-500">Date</p>
                        <p class="font-semibold text-gray-900" id="modalDate"></p>
                    </div>
                    <div>
                        <p class="text-gray-500">Status</p>
                        <span id="modalStatus" class="inline-block px-2 py-0.5 text-xs font-bold rounded-full"></span>
                    </div>
                    <div>
                        <p class="text-gray-500">Payment Method</p>
                        <p class="font-semibold text-gray-900 uppercase" id="modalPayment"></p>
                    </div>
                </div>

                {{-- Shipping Address --}}
                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-xs font-bold text-gray-500 uppercase mb-2">Shipping Address</p>
                    <p class="text-sm text-gray-900 font-medium" id="modalBuyerName"></p>
                    <p class="text-sm text-gray-600 mt-1" id="modalAddress"></p>
                </div>

                {{-- Order Items --}}
                <div>
                    <p class="text-xs font-bold text-gray-500 uppercase mb-3">Order Items</p>
                    <div id="modalItems" class="space-y-3"></div>
                </div>

                {{-- Payment Proof --}}
                <div id="modalProofSection" class="hidden">
                    <p class="text-xs font-bold text-gray-500 uppercase mb-2">Payment Proof</p>
                    <a id="modalProofLink" href="#" target="_blank"
                        class="inline-flex items-center gap-2 text-sm text-blue-600 hover:text-blue-800 underline">
                        <i class="fa-regular fa-image"></i> View Payment Proof
                    </a>
                </div>

                {{-- Total --}}
                <div class="border-t border-gray-200 pt-4 flex justify-between items-center">
                    <span class="text-base font-bold text-gray-900">TOTAL</span>
                    <span class="text-xl font-bold text-gray-900" id="modalTotal"></span>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection