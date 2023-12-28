<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div class="flex flex-wrap justify-between mb-4">
            <h2 class="text-lg font-semibold">Wisata</h2>
            <a href="{{ route('wisata.create') }}" class="btn bg-indigo-500 hover:bg-indigo-600 text-white whitespace-nowrap">Tambah Wisata</a>
        </div>
        <livewire:wisata.table/>
    </div>
</x-app-layout>