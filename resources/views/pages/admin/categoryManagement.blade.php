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
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($kategori as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"> CAT - {{ $item->id_kategori }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->nama_kategori }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <form action="{{ route('deleteKategori', $item->id_kategori) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 transition">
                                    <i class="fa-solid fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
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

@include('components.modal', ['modalToggle' => 'addCategoryModal', 'modalHeader' => 'ADD CATEGORY',
'modalBody' => '<form id="addCategoryForm" class="space-y-4" action="' . route('addKategori') . '" method="POST">

    <!-- Category Name -->
    <div>
        <label for="category_name" class="block mb-2 text-sm font-medium text-gray-700">Category Name</label>
        <input type="text" id="nama_kategori" name="nama_kategori"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5"
            placeholder="Category Name" required>
    </div>

    ', 'modalFooter' => '
    <div class="flex items-center justify-end gap-3 p-5 border-t border-gray-200 rounded-b-xl bg-gray-50">
        <button data-modal-hide="addCategoryModal"
            type="button"
            class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:ring-4 focus:outline-none focus:ring-gray-200 transition">
            Cancel
        </button>
        <button
            type="submit"
            class="px-5 py-2.5 text-sm font-medium text-white bg-gray-900 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 transition">
            Save Category
        </button>
    </div>
</form>'
])]

@endsection