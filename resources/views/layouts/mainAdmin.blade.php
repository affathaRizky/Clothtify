<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin - CLOTHIFY')</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-gray-50 min-h-screen flex flex-col">

    <header>
        @include('components.headerAdmin')
    </header>

    <!-- ✅ Main sudah ada flex-grow (bagus!) -->
    <main class="flex-grow pt-20">
        @yield('content')
    </main>

    <footer>
        @include('components.footerV2')
    </footer>

</body>

</html>