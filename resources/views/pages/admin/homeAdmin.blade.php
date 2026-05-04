@extends('layouts.mainAdmin')

@section('title', 'Home - Admin Clothify')

@section('content')

<!-- Main Content -->
<div class="max-w-screen-xl mx-auto px-4 py-12">

    <!-- Statistics Cards (2 Kolom x 2 Baris) -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

        <!-- Total Products -->
        <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-sm hover:shadow-md transition">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fa-solid fa-box text-blue-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-gray-500">Updated now</span>
            </div>
            <p class="text-3xl font-bold text-gray-900 mb-1">5</p>
            <p class="text-sm font-medium text-gray-600">TOTAL PRODUCTS</p>
        </div>

        <!-- Pending Orders -->
        <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-sm hover:shadow-md transition">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <i class="fa-solid fa-clock text-yellow-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-gray-500">Just now</span>
            </div>
            <p class="text-3xl font-bold text-gray-900 mb-1">5</p>
            <p class="text-sm font-medium text-gray-600">PENDING ORDERS</p>
        </div>

        <!-- Completed Orders -->
        <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-sm hover:shadow-md transition">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fa-solid fa-check text-green-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-gray-500">Today</span>
            </div>
            <p class="text-3xl font-bold text-gray-900 mb-1">5</p>
            <p class="text-sm font-medium text-gray-600">COMPLETED ORDERS</p>
        </div>

        <!-- Monthly Revenue -->
        <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-sm hover:shadow-md transition">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i class="fa-solid fa-dollar-sign text-purple-600 text-xl"></i>
                </div>
                <span class="text-xs font-medium text-gray-500">This month</span>
            </div>
            <p class="text-3xl font-bold text-gray-900 mb-1">Rp. 5.000.000</p>
            <p class="text-sm font-medium text-gray-600">MONTHLY REVENUE</p>
        </div>
    </div>

    <!-- Latest Orders Section -->
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm mb-8">
        <div class="flex items-center justify-between p-6 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900">LATEST ORDERS</h2>
            <a href="{{ route('orderManagement') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition">
                VIEW ALL
            </a>
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
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">ORD - 001</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center mr-3">
                                    <i class="fa-solid fa-user text-gray-600 text-xs"></i>
                                </div>
                                <span class="text-sm text-gray-900">Rudi Santoso</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp. 500.000</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">22/01/2027</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 text-xs font-medium text-yellow-700 bg-yellow-100 rounded-full">Pending</span>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">ORD - 002</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center mr-3">
                                    <i class="fa-solid fa-user text-gray-600 text-xs"></i>
                                </div>
                                <span class="text-sm text-gray-900">Arthur Ricky Sanjaya</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp. 550.000</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">22/01/2027</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 text-xs font-medium text-yellow-700 bg-yellow-100 rounded-full">Pending</span>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">ORD - 003</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center mr-3">
                                    <i class="fa-solid fa-user text-gray-600 text-xs"></i>
                                </div>
                                <span class="text-sm text-gray-900">Rudi Santoso</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp. 500.000</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">22/01/2027</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 text-xs font-medium text-yellow-700 bg-yellow-100 rounded-full">Pending</span>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">ORD - 004</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center mr-3">
                                    <i class="fa-solid fa-user text-gray-600 text-xs"></i>
                                </div>
                                <span class="text-sm text-gray-900">Rudi Santoso</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp. 500.000</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">22/01/2027</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 text-xs font-medium text-yellow-700 bg-yellow-100 rounded-full">Pending</span>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">ORD - 005</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center mr-3">
                                    <i class="fa-solid fa-user text-gray-600 text-xs"></i>
                                </div>
                                <span class="text-sm text-gray-900">Rudi Santoso</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp. 500.000</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">22/01/2027</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 text-xs font-medium text-green-700 bg-green-100 rounded-full">Completed</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Inventory Management Section -->
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm">
        <div class="flex items-center justify-between p-6 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900">PRODUCTS MANAGEMENT</h2>
            <a href="{{ route('productManagement') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition flex items-center gap-2">
                VIEW ALL
                <i class="fa-solid fa-chevron-right text-xs"></i>
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
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">BRG - 001</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Green Apple</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">3</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 text-xs font-medium text-red-700 bg-red-100 rounded-full">Low Stock</span>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">BRG - 002</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Green Apple</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">3</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 text-xs font-medium text-red-700 bg-red-100 rounded-full">Low Stock</span>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">BRG - 003</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Green Apple</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">3</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 text-xs font-medium text-red-700 bg-red-100 rounded-full">Low Stock</span>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">BRG - 004</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Green Apple</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">3</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 text-xs font-medium text-red-700 bg-red-100 rounded-full">Low Stock</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection