<!-- NAVBAR GUEST -->
<nav class="bg-white fixed w-full z-20 top-0 start-0 border-b border-default py-1">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

        @include('components.logo', ['size' => 'text-2xl']) 

        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">

            <div class="flex items-center gap-x-10">

                <!-- CART ICON -->
                <button type="button" id="cart-trigger" class="relative p-2 text-gray-800 hover:text-gray-600 focus:outline-none">
                    <i class="fa-solid fa-bag-shopping text-2xl"></i>
                    <span class="sr-only">Keranjang</span>
                </button>

                <!-- PROFILE BUTTON -->
                <button type="button"
                    class="flex text-sm bg-neutral-primary"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                    <i class="fa-solid fa-user text-2xl"></i>
                </button>

            </div>

            <!-- Dropdown menu -->
            <div class="z-50 hidden bg-white border border-default-medium rounded-base shadow-lg w-44" id="user-dropdown">
                <div class="px-4 py-3 text-sm border-b border-default">
                    <a href="{{route('login')}}" class="block text-heading font-medium">Login</a>
                </div>
                <ul class="p-2 text-sm text-body font-medium" aria-labelledby="user-menu-button">
                    <li>
                        <a href="#" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Sign out</a>
                    </li>
                </ul>
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
                    <a href="{{ route('home') }}"
                        class="group relative py-2 px-3 text-heading font-bold transition-transform duration-200 hover:-translate-y-0.5 text-sm">
                        HOME
                        <!-- Hover Effect -->
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-8 h-0.5
                             bg-gray-900 opacity-0 group-hover:opacity-100 group-hover:bottom-1 transition-all duration-300"></span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('product') }}"
                        class="group relative py-2 px-3 text-heading font-bold transition-transform duration-200 hover:-translate-y-0.5 text-sm">
                        PRODUCTS
                        <!-- Hover Effect -->
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-8 h-0.5
                             bg-gray-900 opacity-0 group-hover:opacity-100 group-hover:bottom-1 transition-all duration-300"></span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('gallery') }}"
                        class="group relative py-2 px-3 text-heading font-bold transition-transform duration-200 hover:-translate-y-0.5 text-sm">
                        GALLERY
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-8 h-0.5
                             bg-gray-900 opacity-0 group-hover:opacity-100 group-hover:bottom-1 transition-all duration-300"></span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('aboutUs') }}"
                        class="group relative py-2 px-3 text-heading font-bold transition-transform duration-200 hover:-translate-y-0.5 text-sm">
                        ABOUT US
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-8 h-0.5
                             bg-gray-900 opacity-0 group-hover:opacity-100 group-hover:bottom-1 transition-all duration-300"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- CART SIDEBAR -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden transition-opacity opacity-0"></div>

    <!-- Sidebar Panel -->
    <div id="cart-sidebar" class="fixed top-0 right-0 h-full w-full md:w-[400px] bg-white z-50 transform translate-x-full transition-transform duration-300 shadow-2xl">
        <div class="flex items-center justify-between p-4 border-b border-gray-200">
            <h1 class="text-xl font-bold uppercase">CART</h1>
            <button id="close-sidebar" class="p-2 text-gray-500 hover:text-black hover:bg-gray-100 rounded-full transition">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>
        </div>

        <!-- Cart Content Placeholder -->
        <div class="p-6 text-center text-gray-500 mt-10">
            <i class="fa-solid fa-cart-arrow-down text-4xl mb-3 opacity-30"></i>
            <p>Your cart is currently empty.</p>
        </div>
    </div>
</nav>