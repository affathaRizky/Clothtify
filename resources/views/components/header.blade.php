<!-- NAVBAR GUEST -->
<nav class="bg-white fixed w-full z-40 top-0 start-0 border-b border-default py-1">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

        @include('components.logo', ['size' => 'text-2xl'])

        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <div class="flex items-center gap-x-10">

                <a href="{{ route('cart') }}" class="relative p-2 text-gray-800 hover:text-gray-600 focus:outline-none cursor-pointer">
                    <i class="fa-solid fa-bag-shopping text-2xl"></i>
                    <span class="sr-only">Keranjang</span>
                </a>

                <!-- PROFILE BUTTON -->
                <button type="button"
                    class="flex text-sm bg-neutral-primary"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                    <i class="fa-solid fa-user text-2xl"></i>
                </button>
            </div>

            <!-- Dropdown menu -->
            <div class="z-50 hidden bg-white border border-gray-200 rounded-lg shadow-lg w-48" id="user-dropdown">
                @auth
                <div class="px-4 py-3 text-sm border-b border-gray-100">
                    <p class="font-semibold text-gray-900 truncate">{{ auth()->user()->username ?? auth()->user()->name ?? 'User' }}</p>
                    <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</p>
                </div>

                <ul class="p-2 text-sm font-medium text-gray-700">
                    <li>
                        <a href="{{ route('history') }}"
                            class="inline-flex items-center w-full p-2 hover:bg-gray-100 hover:text-gray-900 rounded transition cursor-pointer">
                            <i class="fa-solid fa-clock-rotate-left mr-2 text-xs"></i>
                            My Orders
                        </a>
                    </li>
                </ul>

                <ul class="p-2 text-sm font-medium text-gray-700">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="inline-flex items-center w-full p-2 hover:bg-gray-100 hover:text-gray-900 rounded transition cursor-pointer">
                                <i class="fa-solid fa-right-from-bracket mr-2 text-xs"></i>
                                Sign out
                            </button>
                        </form>
                    </li>
                </ul>
                @else
                <div class="px-4 py-3 text-sm border-b border-gray-100">
                    <a href="{{ route('login') }}" class="block font-semibold text-gray-900 hover:text-gray-700 transition">Login</a>
                </div>
                <ul class="p-2 text-sm font-medium text-gray-700">
                    <li>
                        <a href="{{ route('register') }}" class="inline-flex items-center w-full p-2 hover:bg-gray-100 hover:text-gray-900 rounded transition cursor-pointer">
                            <i class="fa-solid fa-user-plus mr-2 text-xs"></i>
                            Register
                        </a>
                    </li>
                </ul>
                @endauth
            </div>

            <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-body 
                 rounded-base md:hidden hover:bg-neutral-secondary-soft hover:text-heading focus:outline-none focus:ring-2 focus:ring-neutral-tertiary"
                aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14" />
                </svg>
            </button>
        </div>

        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-default rounded-base bg-neutral-secondary-soft 
                 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-neutral-primary">
                <li>
                    <a href="{{ route('home') }}" class="group relative py-2 px-3 text-heading font-bold transition-transform duration-200 hover:-translate-y-0.5 text-sm">
                        HOME
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-8 h-0.5 bg-gray-900 opacity-0 group-hover:opacity-100 group-hover:bottom-1 transition-all duration-300"></span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('product') }}" class="group relative py-2 px-3 text-heading font-bold transition-transform duration-200 hover:-translate-y-0.5 text-sm">
                        PRODUCTS
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-8 h-0.5 bg-gray-900 opacity-0 group-hover:opacity-100 group-hover:bottom-1 transition-all duration-300"></span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('gallery') }}" class="group relative py-2 px-3 text-heading font-bold transition-transform duration-200 hover:-translate-y-0.5 text-sm">
                        GALLERY
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-8 h-0.5 bg-gray-900 opacity-0 group-hover:opacity-100 group-hover:bottom-1 transition-all duration-300"></span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('aboutUs') }}" class="group relative py-2 px-3 text-heading font-bold transition-transform duration-200 hover:-translate-y-0.5 text-sm">
                        ABOUT US
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-8 h-0.5 bg-gray-900 opacity-0 group-hover:opacity-100 group-hover:bottom-1 transition-all duration-300"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>