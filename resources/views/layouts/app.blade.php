<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Santiago's Monster Manual</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <footer>
            <div class="m-h-screen bg-neutral-800">
                <div class="container max-w-7xl mx-auto p-7">
                    <div class="lg:flex gap-10">

                        <div class="py-6">
                            <h5 class="font-bold uppercase text-sm text-white pb-1">Footer test</h5>
                            <ul class="text-gray-500">
                                <li>Help portal</li>
                                <li>Support Forum</li>
                                <li>Cookie Settings</li>
                                <li>Privacy Policy</li>
                            </ul>
                        </div>

                        <div class="py-6">
                            <h5 class="font-bold uppercase text-sm text-white pb-1">About</h5>
                            <ul class="text-gray-500">
                                <li>Contact Us</li>
                                <li>Careers</li>
                                <li>Laravel Documentation</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
