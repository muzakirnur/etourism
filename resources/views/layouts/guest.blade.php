<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <script src="https://kit.fontawesome.com/e5736c35e5.js" crossorigin="anonymous"></script>

    @livewireStyles
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />

    {{-- Google Maps --}}

    @stack('headScripts')

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
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XHBMR6KHMV"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-XHBMR6KHMV');
    </script>
</head>

<body class="font-inter antialiased bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-400">
    <main class="bg-white">

        <!-- Content -->
        <div class="w-full">

            <div class="min-h-screen h-full">

                <!-- Header -->
                {{-- <div class="bg-indigo-100"> --}}
                <!-- Logo -->
                {{-- <a class="block" href="{{ route('dashboard') }}">
                                <svg width="32" height="32" viewBox="0 0 32 32">
                                    <defs>
                                        <linearGradient x1="28.538%" y1="20.229%" x2="100%" y2="108.156%" id="logo-a">
                                            <stop stop-color="#A5B4FC" stop-opacity="0" offset="0%" />
                                            <stop stop-color="#A5B4FC" offset="100%" />
                                        </linearGradient>
                                        <linearGradient x1="88.638%" y1="29.267%" x2="22.42%" y2="100%" id="logo-b">
                                            <stop stop-color="#38BDF8" stop-opacity="0" offset="0%" />
                                            <stop stop-color="#38BDF8" offset="100%" />
                                        </linearGradient>
                                    </defs>
                                    <rect fill="#6366F1" width="32" height="32" rx="16" />
                                    <path d="M18.277.16C26.035 1.267 32 7.938 32 16c0 8.837-7.163 16-16 16a15.937 15.937 0 01-10.426-3.863L18.277.161z" fill="#4F46E5" />
                                    <path d="M7.404 2.503l18.339 26.19A15.93 15.93 0 0116 32C7.163 32 0 24.837 0 16 0 10.327 2.952 5.344 7.404 2.503z" fill="url(#logo-a)" />
                                    <path d="M2.223 24.14L29.777 7.86A15.926 15.926 0 0132 16c0 8.837-7.163 16-16 16-5.864 0-10.991-3.154-13.777-7.86z" fill="url(#logo-b)" />
                                </svg>
                            </a>
                            <div class="flex flex-wrap justify-evenly">
                                <a href="/" class="p-2 hidden md:block hover:bg-indigo-400 rounded-lg hover:text-white ease-in-out transition duration-300">Home</a>
                                <a href="/wisata" class="p-2 hidden md:block hover:bg-indigo-400 rounded-lg hover:text-white ease-in-out transition duration-300">Wisata</a>
                                <a href="{{ route('hotel.user.index') }}" class="p-2 hidden md:block hover:bg-indigo-400 rounded-lg hover:text-white ease-in-out transition duration-300">Hotel</a>
                                <a href="{{ route('contact') }}" class="p-2 hidden md:block hover:bg-indigo-400 rounded-lg hover:text-white ease-in-out transition duration-300">Contact</a>
                                @auth
                                    <hr class="w-px h-6 bg-slate-600 mt-2 mr-2 ml-2 dark:bg-slate-700 border-none" />
                                    <x-dropdown-profile align="right" />
                                    @else
                                    <a href="{{ route('login') }}" class="p-2 hover:bg-indigo-400 rounded-lg hover:text-white ease-in-out transition duration-300">Login</a>
                                @endauth
                            </div> --}}
                @include('layouts.header')
                {{-- </div> --}}

                <div class="w-full mx-auto px-4 py-8">
                    {{ $slot }}
                </div>

            </div>

        </div>

        </div>

    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    @livewireScripts
    @stack('scripts')
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            window.addEventListener("messages", function(e) {
                Swal.fire({
                    title: e.detail.title,
                    icon: e.detail.icon,
                    iconColor: e.detail.iconColor,
                    timer: 3000,
                    toast: true,
                    position: "top-right",
                    timerProgressBar: true,
                    showConfirmButton: false,
                });
            });
        })
    </script>
    <script>
        (g => {
            var h, a, k, p = "The Google Maps JavaScript API",
                c = "google",
                l = "importLibrary",
                q = "__ib__",
                m = document,
                b = window;
            b = b[c] || (b[c] = {});
            var d = b.maps || (b.maps = {}),
                r = new Set,
                e = new URLSearchParams,
                u = () => h || (h = new Promise(async (f, n) => {
                    await (a = m.createElement("script"));
                    e.set("libraries", [...r] + "");
                    for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
                    e.set("callback", c + ".maps." + q);
                    a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                    d[q] = f;
                    a.onerror = () => h = n(Error(p + " could not load."));
                    a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                    m.head.append(a)
                }));
            d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() =>
                d[l](f, ...n))
        })
        ({
            key: "AIzaSyDxe3H5gALnxBFOhlc9F3Q38_fw-TGqSB4",
            v: "weekly"
        });
    </script>
</body>

</html>
