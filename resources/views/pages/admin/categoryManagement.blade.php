@extends('layouts.mainAdmin')

@section('title', 'Category Management - Admin Clothify')

@section('content')

<main class="flex-grow p-6 md:p-8 bg-gray-50">

    <!-- Category Management Section -->
    <div class="bg-white rounded-xl border border-gray-200 shadow-md">

        <!-- Header -->
        <div class="flex items-center justify-between p-6 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900">CATEGORY MANAGEMENT</h2>
            <div class="flex items-center gap-3">
                <!-- Filter Button -->
                <button class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center hover:bg-gray-200 transition">
                    <i class="fa-solid fa-filter text-gray-600"></i>
                </button>
                <!-- ADD CATEGORY BUTTON -->
                <button data-modal-target="addCategoryModal" data-modal-toggle="addCategoryModal"
                    class="px-4 py-2.5 bg-gray-900 text-white font-medium rounded-lg hover:bg-gray-800 transition flex items-center gap-2"
                    type="button">
                    <i class="fa-solid fa-plus"></i>
                    ADD CATEGORY
                </button>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Category ID</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">

                    <!-- Category 1 -->
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4"><span class="text-sm font-medium text-gray-900">001</span></td>
                        <td class="px-6 py-4"><span class="text-sm font-medium text-gray-900">T_SHIRT</span></td>
                        <td class="px-6 py-4"><span class="px-3 py-1.5 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Active</span></td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <button class="w-9 h-9 bg-gray-100 rounded-lg flex items-center justify-center hover:bg-gray-200 transition"><i class="fa-solid fa-pen-to-square text-gray-600 text-sm"></i></button>
                                <button class="w-9 h-9 bg-gray-100 rounded-lg flex items-center justify-center hover:bg-red-100 transition"><i class="fa-solid fa-trash text-gray-600 hover:text-red-600 text-sm"></i></button>
                            </div>
                        </td>
                    </tr>

                    <!-- Category 2 -->
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4"><span class="text-sm font-medium text-gray-900">002</span></td>
                        <td class="px-6 py-4"><span class="text-sm font-medium text-gray-900">PANTS</span></td>
                        <td class="px-6 py-4"><span class="px-3 py-1.5 text-xs font-semibold text-gray-700 bg-gray-200 rounded-full">Nonactive</span></td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <button class="w-9 h-9 bg-gray-100 rounded-lg flex items-center justify-center hover:bg-gray-200 transition"><i class="fa-solid fa-pen-to-square text-gray-600 text-sm"></i></button>
                                <button class="w-9 h-9 bg-gray-100 rounded-lg flex items-center justify-center hover:bg-red-100 transition"><i class="fa-solid fa-trash text-gray-600 hover:text-red-600 text-sm"></i></button>
                            </div>
                        </td>
                    </tr>

                    <!-- Category 3 -->
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4"><span class="text-sm font-medium text-gray-900">003</span></td>
                        <td class="px-6 py-4"><span class="text-sm font-medium text-gray-900">HOODIE</span></td>
                        <td class="px-6 py-4"><span class="px-3 py-1.5 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Active</span></td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <button class="w-9 h-9 bg-gray-100 rounded-lg flex items-center justify-center hover:bg-gray-200 transition"><i class="fa-solid fa-pen-to-square text-gray-600 text-sm"></i></button>
                                <button class="w-9 h-9 bg-gray-100 rounded-lg flex items-center justify-center hover:bg-red-100 transition"><i class="fa-solid fa-trash text-gray-600 hover:text-red-600 text-sm"></i></button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-center gap-2 px-6 py-4 border-t border-gray-200">
            <button class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-gray-700 transition"><i class="fa-solid fa-chevron-left text-sm"></i></button>
            <button class="w-8 h-8 flex items-center justify-center bg-gray-900 text-white font-medium rounded transition">1</button>
            <button class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-gray-700 transition"><i class="fa-solid fa-chevron-right text-sm"></i></button>
        </div>
    </div>
</main>

<!-- MODAL ADD CATEGORY -->
@include('components.modal', ['modalToggle' => 'addCategoryModal', 'modalHeader' => 'ADD CATEGORY'
, 'modalBody' =>
' <div>
    <label for="category_name" class="block mb-2 text-sm font-medium text-gray-700">Name</label>
    <input type="text" id="category_name" name="category_name"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5"
        placeholder="Category Name" required>
</div>',
'modalFooter' =>
'<div class="flex items-center justify-end gap-3 p-5 border-t border-gray-200 rounded-b-xl bg-gray-50">
    <button data-modal-hide="addCategoryModal"
        type="button"
        class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:ring-4 focus:outline-none focus:ring-gray-200">
        Cancel
    </button>
    <button onclick="saveCategory()"
        type="button"
        class="px-5 py-2.5 text-sm font-medium text-white bg-gray-900 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300">
        Add
    </button>
</div>'])

@endsection