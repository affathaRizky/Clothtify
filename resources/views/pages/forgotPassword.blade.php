@extends('layouts.loginRegister')

@section('title', 'Forgot Password - CLOTHIFY')

@section('left-side')
<div class="hidden md:flex md:w-1/2 bg-gray-100 relative overflow-hidden">
    <img src="{{ asset('images/BG_HOME_PBL.jpg') }}" alt="Background Image"
        class="absolute inset-0 w-full h-full object-cover object-center">
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
<div class="w-full md:w-1/2 flex items-center justify-center p-6 sm:p-8 overflow-y-auto">
    <div class="w-full max-w-md">

        <div class="text-center">
            @include('components.logo', ['size' => 'text-4xl'])
            <div class="mt-5 mb-10">
                <p class="text-gray-500 mt-2 text-sm">
                    @if(session('otp_email'))
                    Enter the OTP code sent to <strong>{{ session('otp_email') }}</strong>
                    @else
                    Enter your email to reset your password.
                    @endif
                </p>
            </div>
        </div>

        @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-700 rounded-lg text-sm">{{ session('success') }}</div>
        @endif

        @if(session('error'))
        <div class="mb-4 p-3 bg-red-100 border border-red-300 text-red-700 rounded-lg text-sm">{{ session('error') }}</div>
        @endif

        @if($errors->any())
        <div class="mb-4 p-3 bg-red-100 border border-red-300 text-red-700 rounded-lg text-sm">
            @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif

        @if(!session('otp_email'))
        <form method="POST" action="{{ route('forgot.password.send.otp') }}" class="space-y-5">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <div class="relative">
                    <input type="email" id="email" name="email" placeholder="name@gmail.com" required
                        value="{{ old('email') }}"
                        class="custom-input w-full px-4 py-3 bg-gray-100 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:bg-white focus:border-gray-400 focus:ring-2 focus:ring-gray-200 transition-all">
                    <i class="fa-regular fa-envelope absolute right-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>
            <button type="submit"
                class="w-full py-3.5 px-4 bg-gray-900 hover:bg-gray-800 text-white font-semibold rounded-xl transition-all duration-200 hover:shadow-lg active:scale-[0.98] mt-2 cursor-pointer">
                Send OTP Code
            </button>
        </form>
        @else
        <form method="POST" action="{{ route('forgot.password.verify.otp') }}" class="space-y-5">
            @csrf
            <input type="hidden" name="email" value="{{ session('otp_email') }}">

            <div>
                <label for="otp" class="block text-sm font-medium text-gray-700 mb-2">OTP Code</label>
                <div class="relative">
                    <input type="text" id="otp" name="otp" placeholder="6 digit code" required
                        maxlength="6" inputmode="numeric" value="{{ old('otp') }}"
                        class="custom-input w-full px-4 py-3 bg-gray-100 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:bg-white focus:border-gray-400 focus:ring-2 focus:ring-gray-200 transition-all tracking-widest text-center text-lg font-bold">
                    <i class="fa-solid fa-shield-halved absolute right-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
                <div class="flex items-center justify-between mt-3 text-sm bg-gray-50 px-4 py-2.5 rounded-lg border border-gray-100">
                    <span class="text-gray-600">Haven't received the code?</span>
                    <form method="POST" action="{{ route('forgot.password.send.otp') }}" class="inline">
                        @csrf
                        <input type="hidden" name="email" value="{{ session('otp_email') }}">
                        <button type="submit" class="font-semibold text-gray-900 hover:underline transition cursor-pointer">Resend</button>
                    </form>
                </div>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                <div class="relative">
                    <input type="password" id="password" name="password" placeholder="Minimum 8 characters" required
                        class="custom-input w-full px-4 py-3 bg-gray-100 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:bg-white focus:border-gray-400 focus:ring-2 focus:ring-gray-200 transition-all">
                    <i class="fa-solid fa-lock absolute right-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                <div class="relative">
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Re-enter new password" required
                        class="custom-input w-full px-4 py-3 bg-gray-100 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:bg-white focus:border-gray-400 focus:ring-2 focus:ring-gray-200 transition-all">
                    <i class="fa-solid fa-lock absolute right-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>

            <button type="submit"
                class="w-full py-3.5 px-4 bg-gray-900 hover:bg-gray-800 text-white font-semibold rounded-xl transition-all duration-200 hover:shadow-lg active:scale-[0.98] mt-2 cursor-pointer">
                Reset Password
            </button>
        </form>
        @endif

        <div class="flex items-center justify-between text-sm mt-6">
            <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900 transition hover:underline">← Back to Login</a>
            <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-900 transition hover:underline">Don't have an account?</a>
        </div>

    </div>
</div>
@endsection