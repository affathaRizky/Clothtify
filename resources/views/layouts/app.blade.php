<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CLOTHIFY</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-white font-[Inter] text-gray-800 flex flex-col min-h-screen">

    <!-- NAVBAR -->
    <nav class="bg-white fixed w-full z-20 top-0 start-0 border-b border-default py-1">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center text-xl text-heading font-semibold whitespace-nowrap">CLOTHIFY</span>
            </a>

            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">

                <div class="flex items-center gap-x-10">

                    <!-- CART ICON -->
                    <button type="button" id="cart-trigger" class="relative p-2 text-gray-800 hover:text-gray-600 focus:outline-none">
                        <i class="fa-solid fa-bag-shopping text-2xl"></i>
                        <span class="sr-only">Keranjang</span>
                    </button>

                    <!-- PROFILE BUTTON -->
                    <button type="button"
                        class="flex text-sm bg-neutral-primary rounded-full focus:ring-4 focus:ring-neutral-tertiary"
                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                        <i class="fa-solid fa-user text-2xl"></i>
                    </button>

                </div>

                <!-- Dropdown menu -->
                <div class="z-50 hidden bg-white border border-default-medium rounded-base shadow-lg w-44" id="user-dropdown">
                    <div class="px-4 py-3 text-sm border-b border-default">
                        <span class="block text-heading font-medium">Affatha Rizky Sena</span>
                    </div>
                    <ul class="p-2 text-sm text-body font-medium" aria-labelledby="user-menu-button">
                        <li>
                            <a href="#" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Sign out</a>
                        </li>
                    </ul>
                </div>
                <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-body 
                 rounded-base md:hidden hover:bg-neutral-secondary-soft hover:text-heading focus:outline-none focus:ring-2 focus:ring-neutral-tertiary" aria-controls="navbar-user" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-default rounded-base bg-neutral-secondary-soft md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-neutral-primary">
                    <li>
                        <a href="{{ route('produk') }}" class="block py-2 px-3 text-heading rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0 md:dark:hover:bg-transparent">PRODUK</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-heading rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0 md:dark:hover:bg-transparent">GALERI</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-heading rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0 md:dark:hover:bg-transparent">TENTANG</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- CONTENT -->
    <main class="flex-grow pt-20">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-[#1a1a1a] text-white pt-8 pb-6">
        <div class="max-w-screen-xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div>
                <h1 class="text-2xl font-bold mb-2">CLOTHIFY</h1>
                <p class="text-sm text-body">Memenuhi Kebutuhan Fashion Anda.</p>
            </div>
        </div>
        <hr class="border-gray-700 my-6" />
        <div class="text-center text-sm text-gray-500 py-0">
            © {{ date('Y') }} <a href="#" class="hover:text-white transition">Clothify™</a>. All Rights Reserved.
        </div>
    </footer>

    <!-- CART SIDEBAR -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden transition-opacity opacity-0"></div>

    <!-- Sidebar Panel -->
    <div id="cart-sidebar" class="fixed top-0 right-0 h-full w-full md:w-[400px] bg-white z-50 transform translate-x-full transition-transform duration-300 shadow-2xl">
        <div class="flex items-center justify-between p-4 border-b border-gray-200">
            <h1 class="text-xl font-bold uppercase">Keranjang</h1>
            <button id="close-sidebar" class="p-2 text-gray-500 hover:text-black hover:bg-gray-100 rounded-full transition">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>
        </div>

        <!-- Cart Content Placeholder -->
        <div class="p-6 text-center text-gray-500 mt-10">
            <i class="fa-solid fa-cart-arrow-down text-4xl mb-3 opacity-30"></i>
            <p>Keranjang Anda masih kosong.</p>
        </div>
    </div>

</body>

</html>