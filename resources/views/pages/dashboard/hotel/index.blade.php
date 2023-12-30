<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div class="flex flex-wrap justify-between mb-4">
            <h2 class="text-lg font-semibold">Hotel</h2>
            <a href="{{ route('hotel.create') }}" class="btn bg-indigo-500 hover:bg-indigo-600 text-white whitespace-nowrap">Tambah Hotel</a>
        </div>
        <livewire:hotel.table/>
    </div>
</x-app-layout>