<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        
        <!-- Welcome banner -->
        <x-dashboard.welcome-banner />

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Avatars -->
            {{-- <x-dashboard.dashboard-avatars /> --}}

            <!-- Right: Actions -->
            {{-- <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                <!-- Filter button -->
                <x-dropdown-filter align="right" />

                <!-- Datepicker built with flatpickr -->
                <x-datepicker />

                <!-- Add view button -->
                <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                    <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                        <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                    </svg>
                    <span class="hidden xs:block ml-2">Add View</span>
                </button>
                
            </div> --}}

        </div>
        
        <!-- Cards -->
        <div class="grid grid-cols-12 gap-6">

            <div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
                <div class="px-5 pt-5 pb-5">
                    <h2 class="text-lg font-semibold text-slate-800 dark:text-slate-100 mb-2">Users</h2>
                    <div class="text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase mb-1">Total</div>
                    <div class="flex items-start">
                        <div class="text-3xl font-bold text-slate-800 dark:text-slate-100 mr-2">{{$users}}</div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
                <div class="px-5 pt-5 pb-5">
                    <h2 class="text-lg font-semibold text-slate-800 dark:text-slate-100 mb-2">Wisata</h2>
                    <div class="text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase mb-1">Total</div>
                    <div class="flex items-start">
                        <div class="text-3xl font-bold text-slate-800 dark:text-slate-100 mr-2">{{$hotel}}</div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
                <div class="px-5 pt-5 pb-5">
                    <h2 class="text-lg font-semibold text-slate-800 dark:text-slate-100 mb-2">Hotel</h2>
                    <div class="text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase mb-1">Total</div>
                    <div class="flex items-start">
                        <div class="text-3xl font-bold text-slate-800 dark:text-slate-100 mr-2">{{$wisata}}</div>
                    </div>
                </div>
            </div>
            

            <!-- Line chart (Acme Plus) -->
            {{-- <x-dashboard.dashboard-card-01 :dataFeed="$dataFeed" /> --}}

            <!-- Line chart (Acme Advanced) -->
            {{-- <x-dashboard.dashboard-card-02 :dataFeed="$dataFeed" /> --}}

            <!-- Line chart (Acme Professional) -->
            {{-- <x-dashboard.dashboard-card-03 :dataFeed="$dataFeed" /> --}}

            <!-- Bar chart (Direct vs Indirect) -->
            {{-- <x-dashboard.dashboard-card-04 /> --}}

            <!-- Line chart (Real Time Value) -->
            {{-- <x-dashboard.dashboard-card-05 /> --}}

            <!-- Doughnut chart (Top Countries) -->
            {{-- <x-dashboard.dashboard-card-06 /> --}}

            <!-- Table (Top Channels) -->
            {{-- <x-dashboard.dashboard-card-07 /> --}}

            <!-- Line chart (Sales Over Time)  -->
            {{-- <x-dashboard.dashboard-card-08 /> --}}

            <!-- Stacked bar chart (Sales VS Refunds) -->
            {{-- <x-dashboard.dashboard-card-09 /> --}}

            <!-- Card (Customers)  -->
            {{-- <x-dashboard.dashboard-card-10 /> --}}

            <!-- Card (Reasons for Refunds)   -->
            {{-- <x-dashboard.dashboard-card-11 />              --}}

            <!-- Card (Recent Activity) -->
            {{-- <x-dashboard.dashboard-card-12 /> --}}
            
            <!-- Card (Income/Expenses) -->
            {{-- <x-dashboard.dashboard-card-13 /> --}}

        </div>

    </div>
</x-app-layout>
