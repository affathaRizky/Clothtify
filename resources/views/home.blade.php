@extends('layouts.app')

@section('content')

<!-- HERO -->
<section class="relative w-full h-screen overflow-hidden">
    <img src="{{ asset('images/BG_HOME_PBL.jpg') }}" alt="Background Image"
        class="absolute inset-0 w-full h-full object-cover object-center">
    <div class="absolute inset-0 bg-black/40"></div>
    <div class="relative z-10 flex items-center justify-center h-full text-white text-center">
        <div>
            <a href="{{ route('produk') }}" class="border-2 border-white px-8 py-3 rounded-full hover:bg-white hover:text-black transition duration-300">
            BELI SEKARANG
            </a>
        </div>
    </div>
</section>

@endsection