<x-guest-layout>
    <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-16 lg:px-6">
        <dl class="grid max-w-screen-md gap-8 mx-auto text-gray-900 sm:grid-cols-3 dark:text-white">
            <a href="{{ route('user.wisata.index') }}"
                class="flex flex-col rounded-lg items-center justify-center hover:shadow-md hover:shadow-indigo-400 transition ease-in-out duration-300">
                <div class="w-full bg-indigo-200 rounded-lg shadow-lg p-4">
                    <i class="fa-solid fa-map-location-dot text-indigo-600 text-3xl"></i>
                    <dd class="font-light text-gray-500 dark:text-gray-400">Wisata</dd>
                    <dt class="mb-2 text-3xl md:text-4xl font-extrabold">{{ $wisata }}</dt>
                </div>
            </a>
            <a href="{{ route('hotel.user.index') }}"
                class="flex flex-col rounded-lg items-center justify-center hover:shadow-md hover:shadow-indigo-400 transition ease-in-out duration-300">
                <div class="w-full bg-indigo-200 rounded-lg shadow-lg p-4">
                    <i class="fa-solid fa-hotel text-indigo-600 text-3xl"></i>
                    <dd class="font-light text-gray-500 dark:text-gray-400">Hotel</dd>
                    <dt class="mb-2 text-3xl md:text-4xl font-extrabold">{{ $hotel }}</dt>
                </div>
            </a>
            <div
                class="flex flex-col rounded-lg items-center justify-center hover:shadow-md hover:shadow-indigo-400 transition ease-in-out duration-300">
                <div class="w-full bg-indigo-200 rounded-lg shadow-lg p-4">
                    <i class="fa-solid fa-users text-indigo-600 text-3xl"></i>
                    <dd class="font-light text-gray-500 dark:text-gray-300">Pengguna</dd>
                    <dt class="mb-2 text-3xl md:text-4xl font-extrabold">{{ $user }}</dt>
                </div>
            </div>
        </dl>
    </div>
    <livewire:frontend.wisata />
    <livewire:frontend.hotel />
</x-guest-layout>
