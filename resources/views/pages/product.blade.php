@extends('layouts.main')

@section('title', 'Products - CLOTHIFY')

@section('content')
<div class="max-w-screen-xl mx-auto px-4 py-8">

    <div class="flex flex-col md:flex-row gap-6">

        <!-- SIDEBAR FILTER -->
        <aside class="w-full md:w-64 flex-shrink-0">
            <div class="bg-white border border-gray-200 rounded-xl p-5 sticky top-24">

                <!-- Search Bar -->
                <div class="mb-6">
                    <div class="relative">
                        <input type="text"
                            placeholder="Search..."
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        <i class="fa-solid fa-search absolute left-3.5 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>

                <!-- Jenis Produk -->
                <div class="mb-6 pb-6 border-b border-gray-200">
                    <h3 class="font-bold text-gray-900 mb-3">Product Type</h3>
                    <div class="space-y-2">
                        <label class="flex items-center cursor-pointer group">
                            <input type="radio" name="jenis_produk" value="baju" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                            <span class="ml-2 text-gray-700 group-hover:text-indigo-600 transition">Shirts</span>
                        </label>
                        <label class="flex items-center cursor-pointer group">
                            <input type="radio" name="jenis_produk" value="celana" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                            <span class="ml-2 text-gray-700 group-hover:text-indigo-600 transition">Pants</span>
                        </label>
                    </div>
                </div>

                <!-- Harga -->
                <div class="mb-6">
                    <h3 class="font-bold text-gray-900 mb-3">Price</h3>
                    <div class="space-y-2">
                        <label class="flex items-center cursor-pointer group">
                            <input type="radio" name="harga" value="150-230" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                            <span class="ml-2 text-gray-700 text-sm group-hover:text-indigo-600 transition">Rp. 150.000 - 230.000</span>
                        </label>
                        <label class="flex items-center cursor-pointer group">
                            <input type="radio" name="harga" value="285-400" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                            <span class="ml-2 text-gray-700 text-sm group-hover:text-indigo-600 transition">Rp. 285.000 - 400.000</span>
                        </label>
                        <label class="flex items-center cursor-pointer group">
                            <input type="radio" name="harga" value="450-500" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                            <span class="ml-2 text-gray-700 text-sm group-hover:text-indigo-600 transition">Rp. 450.000 - 500.000</span>
                        </label>
                    </div>
                </div>

                <!-- Reset Filter Button -->
                <button class="w-full py-2 px-4 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-sm font-medium transition">
                    Reset Filter
                </button>
            </div>
        </aside>

        <!-- PRODUCT GRID -->
        <main class="flex-1">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                @include('components.productCard', [
                'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=400&h=600&fit=crop',
                'name' => 'T-shirt',
                'price' => 'Rp. 150.000',
                'category' => 'Baju'
                ])

                @include('components.productCard', [
                'image' => 'https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=400&h=600&fit=crop',
                'name' => 'Flannel Shirt',
                'price' => 'Rp. 230.000',
                'category' => 'Baju'
                ])

                @include('components.productCard', [
                'image' => 'https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?w=400&h=600&fit=crop',
                'name' => 'T-shirt Oversize',
                'price' => 'Rp. 400.000',
                'category' => 'Baju'
                ])

                @include('components.productCard', [
                'image' => 'https://images.unsplash.com/photo-1542272604-787c3835535d?w=400&h=600&fit=crop',
                'name' => 'Jeans Skinny',
                'price' => 'Rp. 285.000',
                'category' => 'Celana'
                ])

                @include('components.productCard', [
                'image' => 'https://images.unsplash.com/photo-1517438476312-10d79c077509?w=400&h=600&fit=crop',
                'name' => 'Training Pants',
                'price' => 'Rp. 450.000',
                'category' => 'Celana'
                ])

                @include('components.productCard', [
                'image' => 'https://images.unsplash.com/photo-1523381210434-271e8be1f52b?auto=format&fit=crop&w=800&q=80',
                'name' => 'Chinos Pants',
                'price' => 'Rp. 500.000',
                'category' => 'Celana'
                ])

                @include('components.productCard', [
                'image' => 'https://images.unsplash.com/photo-1618354691373-d851c5c3a990?w=400&h=600&fit=crop',
                'name' => 'Long Sleeve Shirt',
                'price' => 'Rp. 180.000',
                'category' => 'Baju'
                ])

                @include('components.productCard', [
                'image' => 'https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=400&h=600&fit=crop',
                'name' => 'Training Shirt',
                'price' => 'Rp. 350.000',
                'category' => 'Baju'
                ])

                @include('components.productCard', [
                'image' => 'https://images.unsplash.com/photo-1591195853828-11db59a44f6b?w=400&h=600&fit=crop',
                'name' => 'Short Pants',
                'price' => 'Rp. 200.000',
                'category' => 'Celana'
                ])

                @include('components.productCard', [
                'image' => 'https://images.unsplash.com/photo-1602810318383-e386cc2a3ccf?w=400&h=600&fit=crop',
                'name' => 'Polo Shirt',
                'price' => 'Rp. 220.000',
                'category' => 'Baju'
                ])

                @include('components.productCard', [
                'image' => 'https://images.unsplash.com/photo-1589310243389-96a5483213a8?w=400&h=600&fit=crop',
                'name' => 'Clothify Shirt',
                'price' => 'Rp. 300.000',
                'category' => 'Baju'
                ])

            </div>

            <!-- Pagination -->
            <div class="flex items-center justify-center mt-10 gap-4">
                <!-- Previous Button -->
                <a href="#" class="inline-flex items-center text-body bg-neutral-secondary-medium border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading shadow-xs 
                    font-medium leading-5 rounded-base text-sm px-3 py-2 focus:outline-none rounded-lg">
                    <svg class="w-4 h-4 me-1.5 -ms-0.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4" />
                    </svg>
                    Previous
                </a>

                <!-- Next Button -->
                <a href="#" class="inline-flex items-center text-body bg-neutral-secondary-medium border border-default-medium 
                    hover:bg-neutral-tertiary-medium hover:text-heading shadow-xs font-medium leading-5 rounded-base text-sm px-3 py-2 focus:outline-none rounded-lg">
                    Next
                    <svg class="w-4 h-4 ms-1.5 -me-0.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                    </svg>
                </a>
            </div>
        </main>
    </div>
</div>
@endsection