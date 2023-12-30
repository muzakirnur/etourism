<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script>
            if (localStorage.getItem('dark-mode') === 'false' || !('dark-mode' in localStorage)) {
                document.querySelector('html').classList.remove('dark');
                document.querySelector('html').style.colorScheme = 'light';
            } else {
                document.querySelector('html').classList.add('dark');
                document.querySelector('html').style.colorScheme = 'dark';
            }
        </script>          
    </head>
    <body class="font-inter antialiased bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-400">

        <main class="bg-white">

            <div class="relative flex">

                <!-- Content -->
                <div class="w-full">

                    <div class="min-h-screen h-full flex flex-col after:flex-1">

                        <!-- Header -->
                        <div class="flex-1 bg-indigo-100">
                            <div class="flex items-center justify-between h-16 px-4 sm:px-6 lg:px-8">
                                <!-- Logo -->
                                <a class="block font-semibold" href="{{ route('dashboard') }}">
                                    {{ config('app.name') }}
                                </a>
                                <div class="flex flex-wrap justify-evenly">
                                    <a href="/" class="p-2 hover:bg-indigo-400 rounded-lg hover:text-white ease-in-out transition duration-300">Home</a>
                                    <a href="{{ route('contact') }}" class="p-2 hover:bg-indigo-400 rounded-lg hover:text-white ease-in-out transition duration-300">Contact</a>
                                    <a href="{{ route('login') }}" class="p-2 hover:bg-indigo-400 rounded-lg hover:text-white ease-in-out transition duration-300">Login</a>
                                </div>
                            </div>
                        </div>

                        <div class="w-full max-w-sm mx-auto px-4 py-8">
                            {{ $slot }}
                        </div>

                    </div>

                </div>

            </div>

        </main>        
    </body>
</html>
