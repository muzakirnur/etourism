<header class="sticky top-0 bg-white dark:bg-[#182235] border-b border-slate-200 dark:border-slate-700 z-30">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 -mb-px">

            <!-- Header: Left side -->
            <div class="flex">
                <h1 class="font-semibold">{{ config('app.name') }}</h1>
            </div>

            <!-- Header: Right side -->
            <div class="flex items-center space-x-3">       
                
                <a href="/">Home</a>

                <hr class="w-px h-6 bg-slate-200 dark:bg-slate-700 border-none" />


                <a href="#">Contact</a>

                <!-- Divider -->
                <hr class="w-px h-6 bg-slate-200 dark:bg-slate-700 border-none" />

                <!-- User button -->
                @auth
                <x-dropdown-profile align="right" />
                @else
                    <a href="{{ route('login') }}">Login</a>
                @endauth

            </div>

        </div>
    </div>
</header>