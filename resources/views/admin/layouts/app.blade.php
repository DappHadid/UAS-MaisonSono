<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="..." crossorigin="anonymous" />
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-[#dcd7c9] flex">
            <!-- Include Navbar -->
            @include('admin.layouts.navigation')

            <!-- Page Heading -->
            <div class="pl-64 sm:pl-0">
                @isset($header)
                    <header class="bg-white shadow py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </header>
                @endisset

            <!-- Page Content -->
            <main class="flex-1 min-h-screen p-6 ml-64">
                @yield('content')
            </main>
        </div>
    </body>
</html>
