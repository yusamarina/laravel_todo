<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="flex flex-col sm:justify-center items-center pt-3 sm:pt-0 bg-rose-50 min-h-screen">
            <div class="shrink-0 flex items-center">
                <a href="/">
                    <img src="{{ asset('img/todo.png') }}" alt="TOP PAGE" class="block h-25 w-auto fill-current">
                </a>
            </div>

            <div class="w-full sm:max-w-md mb-6 px-6 py-3 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
            <footer class="text-center text-indigo-900 bg-rose-50">
                Illustration by <a href="https://icons8.com/illustrations/author/JTmm71Rqvb2T">Dani Grapevine</a> from <a href="https://icons8.com/illustrations">Ouch!</a>
                <p>Copyright © 2022 ToDo App</p>
            </footer>
        </div>
    </body>
</html>
