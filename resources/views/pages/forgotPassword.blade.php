@extends('layouts.loginRegister')

@section('title', 'Forgot Password - CLOTHIFY')

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

<!-- RIGHT SIDE: FORM -->
<div class="w-full md:w-1/2 flex items-center justify-center p-6 sm:p-8 overflow-y-auto">
    <div class="w-full max-w-md">

        <div class="text-center">
            <!-- Logo -->
            @include('components.logo', ['size' => 'text-4xl'])

            <div class="text-center mt-5 mb-10">
                <p class="text-gray-500 mt-2 text-sm">Enter your email to reset your password.</p>
            </div>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
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

            <!-- KODE OTP -->
            <div>
                <label for="otp" class="block text-sm font-medium text-gray-700 mb-2">OTP Code</label>
                <div class="relative">
                    <input type="text"
                        id="otp"
                        name="otp"
                        placeholder="6 digit code"
                        class="custom-input w-full px-4 py-3 bg-gray-100 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:bg-white focus:border-gray-400 focus:ring-2 focus:ring-gray-200 transition-all"
                        required
                        maxlength="6"
                        inputmode="numeric"
                        value="{{ old('otp') }}">
                    <!-- Ganti icon amplop jadi shield/key (lebih sesuai untuk OTP) -->
                    <i class="fa-solid fa-shield-halved absolute right-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>

                <!-- Tombol Kirim Ulang (Dipisah dari relative wrapper agar tidak berantakan) -->
                <div class="flex items-center justify-between mt-3 text-sm bg-gray-50 px-4 py-2.5 rounded-lg border border-gray-100">
                    <span class="text-gray-600">Haven't received the code?</span>
                    <button type="button" id="resend-btn" class="font-semibold text-gray-900 hover:underline disabled:text-gray-400 disabled:no-underline transition">
                        Resend
                    </button>
                </div>
                <p id="countdown-text" class="hidden mt-2 text-xs text-center text-gray-500">
                    Resend in <span id="timer" class="font-bold">60</span> seconds
                </p>
            </div>

            <!-- Password Baru -->
            <div>
                <label for="passwordBaru" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                <div class="relative">
                    <input type="password"
                        id="passwordBaru"
                        name="passwordBaru"
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
                    ← Back to Login
                </a>
                <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-900 transition hover:underline">
                    Don't have an account?
                </a>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full py-3.5 px-4 bg-gray-900 hover:bg-gray-800 text-white font-semibold rounded-xl 
                                        transition-all duration-200 hover:shadow-lg active:scale-[0.98] mt-2">
                Reset Password
            </button>
        </form>

    </div>
</div>

@endsection