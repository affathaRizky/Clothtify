@extends('layouts.app')

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
                    <h3 class="font-bold text-gray-900 mb-3">Jenis Produk</h3>
                    <div class="space-y-2">
                        <label class="flex items-center cursor-pointer group">
                            <input type="radio" name="jenis_produk" value="baju" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                            <span class="ml-2 text-gray-700 group-hover:text-indigo-600 transition">BAJU</span>
                        </label>
                        <label class="flex items-center cursor-pointer group">
                            <input type="radio" name="jenis_produk" value="celana" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                            <span class="ml-2 text-gray-700 group-hover:text-indigo-600 transition">CELANA</span>
                        </label>
                    </div>
                </div>

                <!-- Harga -->
                <div class="mb-6">
                    <h3 class="font-bold text-gray-900 mb-3">Harga</h3>
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

                <!-- Product Card 1 -->
                <a href="#" class="group block">
                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:scale-105 hover:-translate-y-1">
                        <div class="aspect-[3/4] overflow-hidden bg-gray-100">
                            <img src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?q=80&w=800&auto=format&fit=crop"
                                alt="Product 1"
                                class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-900 mb-1 group-hover:text-indigo-600 transition">Kaos Polos Premium</h3>
                            <p class="text-sm text-gray-500 mb-2">Baju</p>
                            <p class="text-lg font-bold text-indigo-600">Rp. 185.000</p>
                        </div>
                    </div>
                </a>

                <!-- Product Card 2 -->
                <a href="#" class="group block">
                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:scale-105 hover:-translate-y-1">
                        <div class="aspect-[3/4] overflow-hidden bg-gray-100">
                            <img src="https://images.unsplash.com/photo-1542272604-787c3835535d?q=80&w=800&auto=format&fit=crop"
                                alt="Product 2"
                                class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-900 mb-1 group-hover:text-indigo-600 transition">Jeans Slim Fit</h3>
                            <p class="text-sm text-gray-500 mb-2">Celana</p>
                            <p class="text-lg font-bold text-indigo-600">Rp. 320.000</p>
                        </div>
                    </div>
                </a>

                <!-- Product Card 3 -->
                <a href="#" class="group block">
                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:scale-105 hover:-translate-y-1">
                        <div class="aspect-[3/4] overflow-hidden bg-gray-100">
                            <img src="https://images.unsplash.com/photo-1596755094514-f87e34085b2c?q=80&w=800&auto=format&fit=crop"
                                alt="Product 3"
                                class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-900 mb-1 group-hover:text-indigo-600 transition">Kemeja Casual</h3>
                            <p class="text-sm text-gray-500 mb-2">Baju</p>
                            <p class="text-lg font-bold text-indigo-600">Rp. 275.000</p>
                        </div>
                    </div>
                </a>

                <!-- Product Card 4 -->
                <a href="#" class="group block">
                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:scale-105 hover:-translate-y-1">
                        <div class="aspect-[3/4] overflow-hidden bg-gray-100">
                            <img src="https://images.unsplash.com/photo-1551028919-34073ae6fd7b?q=80&w=800&auto=format&fit=crop"
                                alt="Product 4"
                                class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-900 mb-1 group-hover:text-indigo-600 transition">Jacket Denim</h3>
                            <p class="text-sm text-gray-500 mb-2">Baju</p>
                            <p class="text-lg font-bold text-indigo-600">Rp. 450.000</p>
                        </div>
                    </div>
                </a>

                <!-- Product Card 5 -->
                <a href="#" class="group block">
                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:scale-105 hover:-translate-y-1">
                        <div class="aspect-[3/4] overflow-hidden bg-gray-100">
                            <img src="https://images.unsplash.com/photo-1473966968600-fa384fa7f336?q=80&w=800&auto=format&fit=crop"
                                alt="Product 5"
                                class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-900 mb-1 group-hover:text-indigo-600 transition">Chino Pants</h3>
                            <p class="text-sm text-gray-500 mb-2">Celana</p>
                            <p class="text-lg font-bold text-indigo-600">Rp. 295.000</p>
                        </div>
                    </div>
                </a>

                <!-- Product Card 6 -->
                <a href="#" class="group block">
                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:scale-105 hover:-translate-y-1">
                        <div class="aspect-[3/4] overflow-hidden bg-gray-100">
                            <img src="https://images.unsplash.com/photo-1602810318383-e386cc2a3ccf?q=80&w=800&auto=format&fit=crop"
                                alt="Product 6"
                                class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-900 mb-1 group-hover:text-indigo-600 transition">Polo Shirt</h3>
                            <p class="text-sm text-gray-500 mb-2">Baju</p>
                            <p class="text-lg font-bold text-indigo-600">Rp. 225.000</p>
                        </div>
                    </div>
                </a>

                <!-- Product Card 7 -->
                <a href="#" class="group block">
                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:scale-105 hover:-translate-y-1">
                        <div class="aspect-[3/4] overflow-hidden bg-gray-100">
                            <img src="https://images.unsplash.com/photo-1551488852-b920ecf40346?q=80&w=800&auto=format&fit=crop"
                                alt="Product 7"
                                class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-900 mb-1 group-hover:text-indigo-600 transition">Cargo Pants</h3>
                            <p class="text-sm text-gray-500 mb-2">Celana</p>
                            <p class="text-lg font-bold text-indigo-600">Rp. 385.000</p>
                        </div>
                    </div>
                </a>

                <!-- Product Card 8 -->
                <a href="#" class="group block">
                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:scale-105 hover:-translate-y-1">
                        <div class="aspect-[3/4] overflow-hidden bg-gray-100">
                            <img src="https://images.unsplash.com/photo-1618354691373-d851c5c3a990?q=80&w=800&auto=format&fit=crop"
                                alt="Product 8"
                                class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-900 mb-1 group-hover:text-indigo-600 transition">Hoodie Basic</h3>
                            <p class="text-sm text-gray-500 mb-2">Baju</p>
                            <p class="text-lg font-bold text-indigo-600">Rp. 350.000</p>
                        </div>
                    </div>
                </a>

                <!-- Product Card 9 -->
                <a href="#" class="group block">
                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:scale-105 hover:-translate-y-1">
                        <div class="aspect-[3/4] overflow-hidden bg-gray-100">
                            <img src="https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?q=80&w=800&auto=format&fit=crop"
                                alt="Product 9"
                                class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-900 mb-1 group-hover:text-indigo-600 transition">Sweater Knit</h3>
                            <p class="text-sm text-gray-500 mb-2">Baju</p>
                            <p class="text-lg font-bold text-indigo-600">Rp. 425.000</p>
                        </div>
                    </div>
                </a>

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
