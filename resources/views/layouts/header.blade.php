<header>
    <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800 shadow-sm">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <a href="https://flowbite.com" class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">{{ config('app.name') }}</span>
            </a>
            <div class="flex items-center lg:order-2">
                @auth
                <x-dropdown-profile/>
                @else
                <a href="{{ route('login') }}" class="text-gray-800 dark:text-white hover:text-white hover:bg-indigo-500 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-indigo-500 focus:outline-none dark:focus:ring-gray-800">Log in</a>
                @endauth
                <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <a href="{{ route('index') }}" class="block py-2 pr-4 pl-3 {{ Request::routeIs('index') ? 'text-white bg-indigo-500 lg:text-indigo-500' : 'text-gray-700' }} hover:text-indigo-500 rounded lg:bg-transparent lg:p-0 dark:text-white">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('user.wisata.index') }}" class="block py-2 pr-4 pl-3 {{ Request::routeIs('user.wisata.*') ? 'text-white bg-indigo-500 lg:text-indigo-500' : 'text-gray-700' }} hover:text-indigo-500 rounded lg:bg-transparent lg:p-0 dark:text-white">Wisata</a>
                    </li>
                    <li>
                        <a href="{{ route('hotel.user.index') }}" class="block py-2 pr-4 pl-3 {{ Request::routeIs('hotel.user.*') ? 'text-white bg-indigo-500 lg:text-indigo-500' : 'text-gray-700' }} hover:text-indigo-500 rounded lg:bg-transparent lg:p-0 dark:text-white">Hotel</a>
                    </li>
                    <li>
                        <div class="relative z-30 inline-flex" x-data="{ open: false }">
                            <button
                                class="inline-flex justify-center items-center group py-2 pr-4 pl-3 {{ Request::routeIs('tentang.*') ? 'text-white bg-indigo-500 lg:text-indigo-500' : 'text-gray-700' }} hover:text-indigo-500 rounded lg:bg-transparent lg:p-0 dark:text-white"
                                aria-haspopup="true"
                                @click.prevent="open = !open"
                                :aria-expanded="open"                        
                            >
                                <div class="flex items-center truncate">
                                    <span class="truncate ml-2 font-medium dark:text-slate-300 group-hover:text-slate-800 dark:group-hover:text-slate-200">Tentang</span>
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                            </button>
                            <div
                                class="origin-top-right z-10 absolute top-full min-w-44 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 py-1.5 rounded shadow-lg overflow-hidden mt-1"                
                                @click.outside="open = false"
                                @keydown.escape.window="open = false"
                                x-show="open"
                                x-transition:enter="transition ease-out duration-200 transform"
                                x-transition:enter-start="opacity-0 -translate-y-2"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-out duration-200"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"
                                x-cloak                    
                            >
                                <ul>
                                    <li>
                                        <a class="font-medium text-sm text-gray-700 hover:text-indigo-600 dark:hover:text-indigo-400 flex items-center py-1 px-3" href="{{ route('tentang.sejarah') }}" @click="open = false" @focus="open = true" @focusout="open = false">Sejarah Lembaga</a>
                                    </li>
                                    <li>
                                        <a class="font-medium text-sm text-gray-700 hover:text-indigo-600 dark:hover:text-indigo-400 flex items-center py-1 px-3" href="{{ route('tentang.visi-misi') }}" @click="open = false" @focus="open = true" @focusout="open = false">Visi & Misi</a>
                                    </li>
                                    <li>
                                        <a class="font-medium text-sm text-gray-700 hover:text-indigo-600 dark:hover:text-indigo-400 flex items-center py-1 px-3" href="{{ route('tentang.struktur') }}" @click="open = false" @focus="open = true" @focusout="open = false">Struktur Organisasi</a>
                                    </li>
                                </ul>                
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="block py-2 pr-4 pl-3 {{ Request::routeIs('contact') ? 'text-white bg-indigo-500 lg:text-indigo-500' : 'text-gray-700' }} hover:text-indigo-500 rounded lg:bg-transparent lg:p-0 dark:text-white">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>