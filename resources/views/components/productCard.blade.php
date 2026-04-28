<a href="{{ route('productDetail') }}" class="group block">
    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:scale-105 hover:-translate-y-1">
        <div class="aspect-[3/4] overflow-hidden bg-gray-100">
            <img src="{{ $image }}"
                alt="{{ $name }}"
                class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
        </div>
        <div class="p-4">
            <h3 class="font-semibold text-gray-900 mb-1 group-hover:text-indigo-600 transition">{{ $name }}</h3>
            <p class="text-sm text-gray-500 mb-2">{{ $category }}</p>
            <p class="text-lg font-bold text-indigo-600">{{ $price }}</p>
        </div>
    </div>
</a>

