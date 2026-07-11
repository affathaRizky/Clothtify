@extends('layouts.mainV2')

@section('title', 'Product Detail - CLOTHIFY')

@section('content')
<main class="flex-grow max-w-screen-xl mx-auto px-4 py-8 md:py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12">

        <!-- LEFT: IMAGE GALLERY -->
        <div class="space-y-4">
            <div class="aspect-[4/5] overflow-hidden rounded-xl bg-gray-100">
                <img id="main-image"
                    src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?q=80&w=800&auto=format&fit=crop"
                    alt="Product Main"
                    class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
            </div>

            <div class="grid grid-cols-3 gap-3">
                <button type="button" class="thumb-btn active aspect-square overflow-hidden rounded-lg border-2 border-gray-900 bg-gray-100"
                    data-src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?q=80&w=800&auto=format&fit=crop">
                    <img src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?q=80&w=200&auto=format&fit=crop" alt="Thumb 1" class="w-full h-full object-cover">
                </button>
                <button type="button" class="thumb-btn aspect-square overflow-hidden rounded-lg border-2 border-gray-200 bg-gray-100 hover:border-gray-400 transition"
                    data-src="https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=400&h=600&fit=crop">
                    <img src="https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=400&h=600&fit=crop" alt="Thumb 2" class="w-full h-full object-cover">
                </button>
                <button type="button" class="thumb-btn aspect-square overflow-hidden rounded-lg border-2 border-gray-200 bg-gray-100 hover:border-gray-400 transition"
                    data-src="https://images.unsplash.com/photo-1542272604-787c3835535d?w=400&h=600&fit=crop">
                    <img src="https://images.unsplash.com/photo-1542272604-787c3835535d?w=400&h=600&fit=crop" alt="Thumb 3" class="w-full h-full object-cover">
                </button>
            </div>
        </div>

        <!-- RIGHT: PRODUCT INFO -->
        <div class="flex flex-col mt-10">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">PRODUCT 1</h1>
            <p class="text-xl font-semibold text-gray-900 mb-4">Rp. 300,000</p>

            <div class="mb-6 pb-6 border-b border-gray-200">
                <p class="text-sm text-gray-600 leading-relaxed mb-3">
                    Premium quality cotton kaos dengan bahan yang nyaman dan breathable.
                    Cocok untuk daily wear dengan fit yang modern dan stylish.
                </p>
                <ul class="text-sm text-gray-600 space-y-1">
                    <li class="flex items-start gap-2">
                        <i class="fa-solid fa-check text-green-600 mt-0.5 text-xs"></i>
                        <span>100% Cotton Combed 30s</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <i class="fa-solid fa-check text-green-600 mt-0.5 text-xs"></i>
                        <span>Pre-shrunk & anti-germelung</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <i class="fa-solid fa-check text-green-600 mt-0.5 text-xs"></i>
                        <span>Double needle stitching</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <i class="fa-solid fa-check text-green-600 mt-0.5 text-xs"></i>
                        <span>Unisex fit (cocok untuk pria & wanita)</span>
                    </li>
                </ul>
            </div>

            <div class="mb-6">
                <p class="text-sm font-medium text-gray-700 mb-3">Size:</p>
                <div class="flex gap-3">
                    <button type="button" class="size-btn active w-10 h-10 rounded-md border border-gray-300 text-sm font-medium text-gray-700 hover:border-gray-900 transition" data-size="S">S</button>
                    <button type="button" class="size-btn w-10 h-10 rounded-md border border-gray-300 text-sm font-medium text-gray-700 hover:border-gray-900 transition" data-size="M">M</button>
                    <button type="button" class="size-btn w-10 h-10 rounded-md border border-gray-300 text-sm font-medium text-gray-700 hover:border-gray-900 transition" data-size="L">L</button>
                </div>
            </div>

            <div class="mb-8">
                <p class="text-sm font-medium text-gray-700 mb-3">Quantity:</p>
                <div class="flex items-center border border-gray-300 rounded-lg w-32">
                    <button type="button" id="qty-minus" class="px-4 py-2 text-gray-600 hover:bg-gray-100 transition border-r border-gray-300">
                        <i class="fa-solid fa-minus text-xs"></i>
                    </button>
                    <input type="number" id="qty-input" value="1" min="1" max="99"
                        class="w-12 text-center py-2.5 focus:outline-none text-base font-bold text-gray-900 bg-white 
                      [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none">

                    <button type="button" id="qty-plus" class="px-4 py-2 text-gray-600 hover:bg-gray-100 transition border-l border-gray-300">
                        <i class="fa-solid fa-plus text-xs"></i>
                    </button>
                </div>
            </div>

            <div class="space-y-3">
                <button type="button" class="w-full py-3 px-6 bg-gray-200 text-gray-900 font-semibold rounded-lg hover:bg-gray-300 transition">
                    Add to cart
                </button>
                <button type="button" class="w-full py-3 px-6 bg-gray-900 text-white font-semibold rounded-lg hover:bg-gray-800 transition">
                    BUY NOW
                </button>
            </div>
        </div>
    </div>
</main>
@endsection