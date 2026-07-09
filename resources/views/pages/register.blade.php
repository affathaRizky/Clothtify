@extends('layouts.loginRegister')

@section('title', 'Register - CLOTHIFY')

@section('content')

@section('left-side')
<div class="hidden md:flex md:w-1/2 bg-gray-100 relative overflow-hidden m">

    <img src="{{ asset('images/BG_HOME_PBL.jpg') }}" alt="Background Image"
        class="absolute inset-0 w-full h-full object-cover object-center">
</div>

@endsection


@section('right-side')

<!-- RIGHT SIDE: FORM -->
<div class="w-full md:w-1/2 flex items-center justify-center p-6 sm:p-8 overflow-y-auto">

    @section('right-side')

    <!-- RIGHT SIDE: FORM -->
    <div class="w-full md:w-1/2 flex items-center justify-center p-6 sm:p-8 overflow-y-auto">

        <div class="w-full max-w-md">

            @include('components.alert2')

            <div class="text-center">
                <!-- Logo -->
                @include('components.logo', ['size' => 'text-4xl'])

                <div class="text-center mt-5 mb-10">
                    <p class="text-gray-500 mt-2 text-sm">Create Your Account</p>
                </div>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('process.register') }}" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <div class="relative">
                        <input type="email"
                            id="email"
                            name="email"
                            placeholder="name@email.com"
                            class="custom-input w-full px-4 py-3 bg-gray-100 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:bg-white focus:border-gray-400 focus:ring-2 focus:ring-gray-200 transition-all"
                            required
                            value="{{ old('email') }}">
                        <i class="fa-regular fa-envelope absolute right-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>

                <!-- USERNAME -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                    <div class="relative">
                        <input type="text"
                            id="username"
                            name="username"
                            placeholder="Username"
                            class="custom-input w-full px-4 py-3 bg-gray-100 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:bg-white focus:border-gray-400 focus:ring-2 focus:ring-gray-200 transition-all"
                            required
                            value="{{ old('username') }}">
                        <i class="fa-regular fa-user absolute right-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <div class="relative">
                        <input type="password"
                            id="password"
                            name="password"
                            placeholder="Minimum 8 characters"
                            class="custom-input w-full px-4 py-3 bg-gray-100 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:bg-white focus:border-gray-400 focus:ring-2 focus:ring-gray-200 transition-all"
                            required>
                        <button type="button" id="toggle-password" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition">
                            <i class="fa-regular fa-eye" id="eye-icon"></i>
                        </button>
                    </div>
                </div>

                <!-- Links -->
                <div class="flex items-center justify-between text-sm">
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900 transition hover:underline">
                        have an account? Login
                    </a>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full py-3.5 px-4 bg-gray-900 hover:bg-gray-800 text-white font-semibold rounded-xl 
                            transition-all duration-200 hover:shadow-lg active:scale-[0.98] mt-2">
                    Create Account
                </button>
            </form>

        </div>
    </div>
    @endsection
    @endsection