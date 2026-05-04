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
                <!-- Filter Button -->
                <button class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center hover:bg-gray-200 transition">
                    <i class="fa-solid fa-filter text-gray-600"></i>
                </button>
                <!-- Add Product Button -->
                <button class="px-4 py-2.5 bg-gray-900 text-white font-medium rounded-lg hover:bg-gray-800 transition
                 flex items-center gap-2" data-modal-target="addProductModal" data-modal-toggle="addProductModal">
                    <i class=" fa-solid fa-plus"></i>
                    ADD PRODUCT
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

                    <!-- Product 1 -->
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fa-solid fa-image text-gray-400 text-2xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">PRODUCT 1</p>
                                    <p class="text-xs text-gray-500 mt-0.5">BRG - 01</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm font-medium text-gray-900">T_SHIRT</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm font-medium text-gray-900">Rp. 50,000</span>
                        </td>
                        <td class="px-9 py-4">
                            <span class="text-sm font-medium text-gray-900">10</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1.5 text-xs font-semibold text-green-700 bg-green-100 rounded-full">
                                Active
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <button class="w-9 h-9 bg-gray-100 rounded-lg flex items-center justify-center hover:bg-gray-200 transition">
                                    <i class="fa-solid fa-pen-to-square text-gray-600 text-sm"></i>
                                </button>
                                <button class="w-9 h-9 bg-gray-100 rounded-lg flex items-center justify-center hover:bg-red-100 transition">
                                    <i class="fa-solid fa-trash text-gray-600 hover:text-red-600 text-sm"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Product 2 -->
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fa-solid fa-image text-gray-400 text-2xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">PRODUCT 2</p>
                                    <p class="text-xs text-gray-500 mt-0.5">BRG - 02</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm font-medium text-gray-900">PANTS</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm font-medium text-gray-900">Rp. 50,000</span>
                        </td>
                        <td class="px-9 py-4">
                            <span class="text-sm font-medium text-gray-900">10</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1.5 text-xs font-semibold text-gray-700 bg-gray-200 rounded-full">
                                Nonactive
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <button class="w-9 h-9 bg-gray-100 rounded-lg flex items-center justify-center hover:bg-gray-200 transition">
                                    <i class="fa-solid fa-pen-to-square text-gray-600 text-sm"></i>
                                </button>
                                <button class="w-9 h-9 bg-gray-100 rounded-lg flex items-center justify-center hover:bg-red-100 transition">
                                    <i class="fa-solid fa-trash text-gray-600 hover:text-red-600 text-sm"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-center gap-2 px-6 py-4 border-t border-gray-200">
            <button class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-gray-700 transition">
                <i class="fa-solid fa-chevron-left text-sm"></i>
            </button>
            <button class="w-8 h-8 flex items-center justify-center bg-gray-900 text-white font-medium rounded transition">
                1
            </button>
            <button class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-gray-700 transition">
                <i class="fa-solid fa-chevron-right text-sm"></i>
            </button>
        </div>
    </div>

</div>

@include('components.modal', ['modalToggle' => 'addProductModal', 'modalHeader' => 'ADD PRODUCT',
'modalBody' => '<form id="addProductForm" class="space-y-4">

    <!-- Product Name -->
    <div>
        <label for="product_name" class="block mb-2 text-sm font-medium text-gray-700">Product Name</label>
        <input type="text" id="product_name" name="product_name"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5"
            placeholder="Product Name" required>
    </div>

    <!-- Price -->
    <div>
        <label for="price" class="block mb-2 text-sm font-medium text-gray-700">Price</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <span class="text-gray-500 text-sm">Rp.</span>
            </div>
            <input type="number" id="price" name="price"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full pl-12 p-2.5"
                placeholder="0000" min="0" required>
        </div>
    </div>

    <!-- Product Type (Dropdown) -->
    <div>
        <label for="product_type" class="block mb-2 text-sm font-medium text-gray-700">Product Type</label>
        <select id="product_type" name="product_type"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5" required>
            <option value="" selected disabled>Select Product Type</option>
            <option value="T_SHIRT">T_SHIRT</option>
            <option value="PANTS">PANTS</option>
            <option value="HOODIE">HOODIE</option>
        </select>
    </div>

    <!-- Stock -->
    <div>
        <label for="stock" class="block mb-2 text-sm font-medium text-gray-700">Stock</label>
        <input type="number" id="stock" name="stock"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5"
            placeholder="0" min="0" required>
    </div>

    <!-- Status -->
    <div>
        <label for="product_status" class="block mb-2 text-sm font-medium text-gray-700">Product Status</label>
        <select id="product_status" name="product_status"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5">
            <option value="active">Active</option>
            <option value="nonactive">Nonactive</option>
        </select>
    </div>

</form>', 'modalFooter' => '
<div class="flex items-center justify-end gap-3 p-5 border-t border-gray-200 rounded-b-xl bg-gray-50">
    <button data-modal-hide="addProductModal"
        type="button"
        class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:ring-4 focus:outline-none focus:ring-gray-200 transition">
        Cancel
    </button>
    <button onclick="saveProduct()"
        type="button"
        class="px-5 py-2.5 text-sm font-medium text-white bg-gray-900 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 transition">
        Save Product
    </button>
</div>'])

@endsection