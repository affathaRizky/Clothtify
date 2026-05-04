@extends('layouts.mainAdmin')

@section('title', 'Order Management - Admin Clothify')

@section('content')

<div class="flex-grow p-6 md:p-8 bg-gray-50">

    <!-- 1. PENDING ORDERS -->
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm mb-8">
        <div class="flex items-center gap-2 p-6 border-b border-gray-200">
            <i class="fa-regular fa-clock text-gray-600 text-xl"></i>
            <h2 class="text-lg font-semibold text-gray-900">PENDING ORDERS</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Customer Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">ORD - 001</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                    <span class="text-xs font-medium text-gray-600">RS</span>
                                </div>
                                <span class="text-sm text-gray-900">Rudi Santoso</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">Rp. 500.000</td>
                        <td class="px-6 py-4 text-sm text-gray-600">22/01/2027</td>
                        <td class="px-6 py-4">
                            <button class="px-3 py-1.5 text-xs font-medium text-gray-700 bg-gray-100 rounded hover:bg-gray-200 transition"
                                data-modal-target="pendingOrderModal" data-modal-toggle="pendingOrderModal">
                                Detail
                            </button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">ORD - 002</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                    <span class="text-xs font-medium text-gray-600">AS</span>
                                </div>
                                <span class="text-sm text-gray-900">Affatha Rizky Sena</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">Rp. 550.000</td>
                        <td class="px-6 py-4 text-sm text-gray-600">22/01/2027</td>
                        <td class="px-6 py-4">
                            <button onclick="openOrderDetail('ORD-002')" class="px-3 py-1.5 text-xs font-medium text-gray-700 bg-gray-100 rounded hover:bg-gray-200 transition">
                                Detail
                            </button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">ORD - 003</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                    <span class="text-xs font-medium text-gray-600">RS</span>
                                </div>
                                <span class="text-sm text-gray-900">Rudi Santoso</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">Rp. 500.000</td>
                        <td class="px-6 py-4 text-sm text-gray-600">22/01/2027</td>
                        <td class="px-6 py-4">
                            <button onclick="openOrderDetail('ORD-003')" class="px-3 py-1.5 text-xs font-medium text-gray-700 bg-gray-100 rounded hover:bg-gray-200 transition">
                                Detail
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-center gap-2 px-6 py-4 border-t border-gray-200">
            <button class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-gray-700">
                <i class="fa-solid fa-chevron-left text-sm"></i>
            </button>
            <button class="w-8 h-8 flex items-center justify-center bg-gray-900 text-white rounded text-sm font-medium">1</button>
            <button class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-gray-700">
                <i class="fa-solid fa-chevron-right text-sm"></i>
            </button>
        </div>
    </div>

    <!-- 2. PROCESSED ORDERS -->
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm mb-8">
        <div class="flex items-center gap-2 p-6 border-b border-gray-200">
            <i class="fa-solid fa-spinner fa-spin text-gray-600 text-xl"></i>
            <h2 class="text-lg font-semibold text-gray-900">PROCESSED ORDERS</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Customer Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">ORD - 004</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                    <span class="text-xs font-medium text-gray-600">RS</span>
                                </div>
                                <span class="text-sm text-gray-900">Rudi Santoso</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">Rp. 500.000</td>
                        <td class="px-6 py-4 text-sm text-gray-600">22/01/2027</td>
                        <td class="px-6 py-4">
                            <button onclick="openOrderDetail('ORD-004')" class="px-3 py-1.5 text-xs font-medium text-gray-700 bg-gray-100 rounded hover:bg-gray-200 transition">
                                Detail
                            </button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">ORD - 005</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                    <span class="text-xs font-medium text-gray-600">AS</span>
                                </div>
                                <span class="text-sm text-gray-900">Affatha Rizky Sena</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">Rp. 500.000</td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            <a href="#" class="text-blue-600 hover:text-blue-800 underline">22/01/2027</a>
                        </td>
                        <td class="px-6 py-4">
                            <button onclick="openOrderDetail('ORD-005')" class="px-3 py-1.5 text-xs font-medium text-gray-700 bg-gray-100 rounded hover:bg-gray-200 transition">
                                Detail
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-center gap-2 px-6 py-4 border-t border-gray-200">
            <button class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-gray-700">
                <i class="fa-solid fa-chevron-left text-sm"></i>
            </button>
            <button class="w-8 h-8 flex items-center justify-center bg-gray-900 text-white rounded text-sm font-medium">1</button>
            <button class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-gray-700">
                <i class="fa-solid fa-chevron-right text-sm"></i>
            </button>
        </div>
    </div>

    <!-- 3. COMPLETED ORDERS -->
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm">
        <div class="flex items-center gap-2 p-6 border-b border-gray-200">
            <i class="fa-solid fa-check text-green-600 text-xl"></i>
            <h2 class="text-lg font-semibold text-gray-900">COMPLETED ORDERS</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Customer Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">ORD - 006</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                    <span class="text-xs font-medium text-gray-600">RS</span>
                                </div>
                                <span class="text-sm text-gray-900">Rudi Santoso</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">Rp. 500.000</td>
                        <td class="px-6 py-4 text-sm text-gray-600">22/01/2027</td>
                        <td class="px-6 py-4">
                            <button onclick="openOrderDetail('ORD-006')" class="px-3 py-1.5 text-xs font-medium text-gray-700 bg-gray-100 rounded hover:bg-gray-200 transition">
                                Detail
                            </button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">ORD - 007</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                    <span class="text-xs font-medium text-gray-600">AS</span>
                                </div>
                                <span class="text-sm text-gray-900">Affatha Rizky Sena</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">Rp. 500.000</td>
                        <td class="px-6 py-4 text-sm text-gray-600">22/01/2027</td>
                        <td class="px-6 py-4">
                            <button onclick="openOrderDetail('ORD-007')" class="px-3 py-1.5 text-xs font-medium text-gray-700 bg-gray-100 rounded hover:bg-gray-200 transition">
                                Detail
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-center gap-2 px-6 py-4 border-t border-gray-200">
            <button class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-gray-700">
                <i class="fa-solid fa-chevron-left text-sm"></i>
            </button>
            <button class="w-8 h-8 flex items-center justify-center bg-gray-900 text-white rounded text-sm font-medium">1</button>
            <button class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-gray-700">
                <i class="fa-solid fa-chevron-right text-sm"></i>
            </button>
        </div>
    </div>

</div>

@include('components.modal', ['modalToggle' => 'pendingOrderModal', 'modalHeader' => 'ORDER DETAIL',
'modalBody' => '<div class="p-5 space-y-6">

    <!-- Order Info -->
    <div>
        <p class="text-sm text-gray-500 mb-1">#ORD - 001</p>
        <h4 class="text-base font-semibold text-gray-900">Affatha Rizky Sena</h4>
    </div>

    <!-- Product Items -->
    <div class="space-y-4">

        <!-- Product Item 1 -->
        <div class="flex gap-4 p-4 bg-gray-100 rounded-lg">
            <div class="w-24 h-24 bg-gray-300 rounded-lg flex items-center justify-center flex-shrink-0">
                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <div class="flex-1 space-y-2">
                <p class="text-sm font-medium text-gray-900">Long Sleeve T - Shirt</p>
                <div class="space-y-1 text-sm text-gray-600">
                    <p>XL</p>
                    <p>Red</p>
                </div>
                <p class="text-sm font-semibold text-gray-900">Rp. 50,000</p>
            </div>
        </div>

        <!-- Product Item 2 -->
        <div class="flex gap-4 p-4 bg-gray-100 rounded-lg">
            <div class="w-24 h-24 bg-gray-300 rounded-lg flex items-center justify-center flex-shrink-0">
                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <div class="flex-1 space-y-2">
                <p class="text-sm font-medium text-gray-900">Long Sleeve T - Shirt</p>
                <div class="space-y-1 text-sm text-gray-600">
                    <p>XL</p>
                    <p>Red</p>
                </div>
                <p class="text-sm font-semibold text-gray-900">Rp. 50,000</p>
            </div>
        </div>

    </div>

    <!-- Price Breakdown -->
    <div class="border-t border-gray-200 pt-4 space-y-2">
        <div class="flex justify-between text-sm">
            <span class="text-gray-600">Subtotal :</span>
            <span class="text-gray-900">Rp. 50,000</span>
        </div>
        <div class="flex justify-between text-sm">
            <span class="text-gray-600"></span>
            <span class="text-gray-900">Rp. 50,000</span>
        </div>
    </div>
    <div class="flex justify-between text-sm border-b border-gray-200 pb-2">
        <span class="text-gray-600"></span>
        <span class="text-gray-900 font-medium">Rp. 100,000 +</span>
    </div>

</div>', 'modalFooter' => '<!-- Modal Footer -->
<div class="flex items-center justify-between p-5 border-t border-gray-200 rounded-b-xl bg-gray-50">
    <div>
        <span class="text-base font-semibold text-gray-900">TOTAL AMOUNT :</span>
    </div>
    <div>
        <span class="text-lg font-bold text-gray-900">Rp. 100,000</span>
    </div>
</div>

<!-- Accept Order Button -->
<div class="p-5 pt-0">
    <button onclick="acceptOrder()"
        type="button"
        class="w-full py-2.5 text-sm font-medium text-gray-700 bg-gray-300 rounded-lg hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-gray-200 transition">
        Accept Order
    </button>
</div>'])

@endsection