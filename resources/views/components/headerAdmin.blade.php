<!-- NAVBAR -->
<nav class="bg-white fixed w-full z-20 top-0 start-0 border-b border-gray-200 py-1">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            <!-- Logo -->
            <div class="flex-shrink-0">
                @include('components.logo', ['size' => 'text-2xl'])
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8">

                <!-- HOME -->
                <a href="{{ route('homeAdmin') }}"
                    class="text-gray-900 font-semibold hover:text-gray-600 transition px-3 py-2">
                    HOME
                </a>

                <!-- MANAGEMENT DROPDOWN -->
                <div class="relative">
                    <button type="button"
                        id="management-menu-button"
                        data-dropdown-toggle="management-dropdown"
                        class="text-gray-900 font-semibold hover:text-gray-600 transition px-3 py-2 flex items-center gap-1">
                        MANAGEMENT
                        <i class="fa-solid fa-chevron-down text-xs"></i>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="management-dropdown" class="hidden absolute left-0 mt-2 w-44 bg-white border border-gray-200 rounded-lg shadow-lg z-50">
                        <ul class="py-2 text-sm">
                            <li>
                                <a href="{{ route('productManagement') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 text-gray-700">
                                    <i class="fa-solid fa-box mr-2"></i>PRODUCT
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('orderManagement') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 text-gray-700">
                                    <i class="fa-solid fa-layer-group mr-2"></i>ORDERS
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('categoryManagement') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 text-gray-700">
                                    <i class="fa-solid fa-layer-group mr-2"></i>CATEGORY
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Profile Icon -->
            <div class="flex items-center">
                <button type="button"
                    id="profile-menu-button"
                    data-dropdown-toggle="profile-dropdown"
                    class="flex items-center justify-center w-10 h-10 rounded-full hover:bg-gray-100 transition">
                    <i class="fa-solid fa-user text-gray-700 text-xl"></i>
                </button>

                <!-- Profile Dropdown -->
                <div id="profile-dropdown" class="hidden absolute right-4 mt-2 w-44 bg-white border border-gray-200 rounded-lg shadow-lg z-50">
                    <div class="px-4 py-3 border-b border-gray-200">
                        <p class="text-sm font-medium text-gray-900">Guest User</p>
                    </div>
                    <ul class="py-2 text-sm">
                        <li>
                            <a href="{{ route('login') }}" class="block px-4 py-2 hover:bg-gray-100 text-gray-700">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>