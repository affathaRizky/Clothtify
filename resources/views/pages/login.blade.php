@extends('layouts.loginRegister')

@section('title', 'Login - CLOTHIFY')

@section('left-side')
<div class="hidden md:flex md:w-1/2 bg-gray-100 relative overflow-hidden">

    <!-- Gambar Background -->
    <img src="{{ asset('images/BG_HOME_PBL.jpg') }}" alt="Background Image"
        class="absolute inset-0 w-full h-full object-cover object-center">

    <!-- Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

    <div class="absolute bottom-0 left-0 p-8 md:p-10 z-10">
        <h2 class="text-white text-4xl md:text-4xl font-bold tracking-tight leading-tight drop-shadow-lg">
            Next Level You
        </h2>
        <p class="text-white/80 text-xs md:text-base mt-2 font-light tracking-wide">
            Elevate your everyday style
        </p>
    </div>

</div>

@endsection

@section('right-side')

<div class="w-full md:w-1/2 flex items-center justify-center p-8">
    <div class="w-full max-w-md">

        <div class="text-center">
            <!-- Logo -->
            @include('components.logo', ['size' => 'text-4xl'])

            <div class="text-center mt-5 mb-10">
                <p class="text-gray-500 mt-2 text-sm">Welcome Back!</p>
            </div>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('login') }}">

            <!-- Username -->
            <div class="mb-10">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                <div class="relative">
                    <input type="text"
                        id="username"
                        name="username"
                        placeholder="Your username"
                        class="input-focus w-full px-4 py-3 bg-gray-100 border border-gray-200 rounded-xl text-gray-900
                                    placeholder-gray-400 focus:outline-none focus:bg-white focus:border-gray-400 transition-all"
                        required
                        autofocus
                        value="{{ old('email') }}">
                </div>
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <div class="relative">
                    <input type="password"
                        id="password"
                        name="password"
                        placeholder="Your password"
                        class="custom-input w-full px-4 py-3 bg-gray-100 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:bg-white focus:border-gray-400 focus:ring-2 focus:ring-gray-200 transition-all"
                        required>
                    <button type="button" id="toggle-password" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition">
                        <i class="fa-regular fa-eye" id="eye-icon"></i>
                    </button>
                </div>
            </div>

            <!-- Links & Button -->
            <div class="flex items-center justify-between mb-3 mt-6">
                <a href="{{ route('forgotPassword') }}" class="text-sm text-gray-500 hover:text-gray-900 transition">
                    Forgot password?
                </a>
                <a href="{{ route('register') }}" class="text-sm text-gray-500 hover:text-gray-900 transition">
                    Don't have an account?
                </a>
            </div>

            <!-- Login Button -->
            <button type="submit"
                class="w-full py-3 px-4 bg-gray-900 hover:bg-gray-800 text-white font-semibold rounded-xl 
                            transition-all duration-200 hover:shadow-lg active:scale-[0.98]">
                Login
            </button>
        </form>

    </div>
</div>
@endsection