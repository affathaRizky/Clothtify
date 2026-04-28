<!-- FOOTER Guest -->
<footer class="bg-[#1a1a1a] text-white pt-8 pb-6">
    <div class="max-w-screen-xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
        <div>
            @include('components.logo', ['size' => 'text-3xl text-white'])
            <p class="text-sm text-body mt-3">Outfit goals? We got you.</p>
        </div>
    </div>
    <hr class="border-gray-700 my-6" />
    <div class="text-center text-sm text-gray-500 py-0">
        © {{ date('Y') }} <a href="#" class="hover:text-white transition">Clothify™</a>. All Rights Reserved.
    </div>
</footer>