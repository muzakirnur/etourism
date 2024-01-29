<x-guest-layout>
    <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-16 lg:px-6">
        <dl class="grid max-w-screen-md gap-8 mx-auto text-gray-900 sm:grid-cols-3 dark:text-white">
            <div class="flex flex-col items-center justify-center">
                <dt class="mb-2 text-3xl md:text-4xl font-extrabold">{{ $wisata }}</dt>
                <dd class="font-light text-gray-500 dark:text-gray-400">Wisata</dd>
            </div>
            <div class="flex flex-col items-center justify-center">
                <dt class="mb-2 text-3xl md:text-4xl font-extrabold">{{ $hotel }}</dt>
                <dd class="font-light text-gray-500 dark:text-gray-400">Akomodasi</dd>
            </div>
            <div class="flex flex-col items-center justify-center">
                <dt class="mb-2 text-3xl md:text-4xl font-extrabold">{{ $user }}</dt>
                <dd class="font-light text-gray-500 dark:text-gray-400">Pengguna</dd>
            </div>
        </dl>
    </div>
    <livewire:frontend.wisata/>
    <livewire:frontend.hotel/>
</x-guest-layout>