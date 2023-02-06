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
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-rose-50">
            @include('layouts.navigation')
            <main>
                {{ $slot }}
            </main>
            <footer class="py-6 text-center text-indigo-900">
                Illustration by <a href="https://icons8.com/illustrations/author/A7iGlOUD5Neq">dekob2</a> from <a href="https://icons8.com/illustrations">Ouch!</a>
                <p>Copyright © 2022 ToDo App</p>
            </footer>
        </div>
    </body>
</html>
