<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Laravel'))</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8UoGIt0thomMV7/V44kwtLGNVsfympxML5XRlrd-Q==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
        
        {{-- SCRIPT UNTUK DETEKSI DARK MODE AWAL (PENTING!) --}}
        <script>
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        </script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @stack('head')
    </head>


    <body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 transition-colors duration-300">
        
        {{-- State untuk collapsible sidebar & dark mode ada di sini --}}
        <div x-data="{ sidebarOpen: true }">
            
            {{-- File navigasi akan membaca state 'sidebarOpen' --}}

            @include('admin.layouts.navigation')

            {{--  Margin kiri konten dikontrol oleh state 'sidebarOpen' --}}
            <div :class="sidebarOpen ? 'ml-64' : 'ml-20'" class="transition-all duration-300 ease-in-out">

                @isset($header)
                    <header class="bg-white dark:bg-gray-800 shadow transition-colors duration-300">
                        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                {{ $header }}
                            </h2>
                        </div>
                    </header>
                @endisset

                <main class="p-4 sm:p-6 lg:p-8">
                    @yield('content')
                </main>

            </div>
        </div>

        {{-- SCRIPT UNTUK MENGONTROL TOMBOL TOGGLE DARK MODE --}}
        <script>
            var themeToggleBtn = document.getElementById('theme-toggle');

            function toggleTheme() {
                var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
                var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

                themeToggleDarkIcon.classList.toggle('hidden');
                themeToggleLightIcon.classList.toggle('hidden');

                if (localStorage.getItem('color-theme')) {
                    if (localStorage.getItem('color-theme') === 'light') {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('color-theme', 'dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('color-theme', 'light');
                    }
                } else {
                    if (document.documentElement.classList.contains('dark')) {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('color-theme', 'light');
                    } else {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('color-theme', 'dark');
                    }
                }
            }

            function setInitialIcon() {
                var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
                var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
                if (!themeToggleDarkIcon || !themeToggleLightIcon) return;

                if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                    themeToggleLightIcon.classList.remove('hidden');
                    themeToggleDarkIcon.classList.add('hidden');
                } else {
                    themeToggleDarkIcon.classList.remove('hidden');
                    themeToggleLightIcon.classList.add('hidden');
                }
            }

            if(themeToggleBtn) {
                themeToggleBtn.addEventListener('click', toggleTheme);
            }
            
            document.addEventListener('DOMContentLoaded', setInitialIcon);
        </script>
    </body>
</html>