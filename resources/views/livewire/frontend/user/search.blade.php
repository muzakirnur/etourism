<div class="w-full">
    <div class="max-w-3xl mx-auto">
        <h2 class="text-center text-xl">Cari Objek Wisata</h2>
        <div class="flex justify-center p-2">
            <input class="form-input w-full" type="text" id="searc" wire:model='cari' placeholder="Cari...">
        </div>
    </div>
    <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-16 lg:px-6">
        <dl class="grid max-w-screen-md gap-8 mx-auto text-gray-900 sm:grid-cols-3 dark:text-white">
            <div class="flex flex-col items-center justify-center">
                <dt class="mb-2 text-3xl md:text-4xl font-extrabold">{{ $wisata }}</dt>
                <dd class="font-light text-gray-500 dark:text-gray-400">Wisata</dd>
            </div>
            <div class="flex flex-col items-center justify-center">
                <dt class="mb-2 text-3xl md:text-4xl font-extrabold">{{ $hotel }}</dt>
                <dd class="font-light text-gray-500 dark:text-gray-400">Hotel</dd>
            </div>
            <div class="flex flex-col items-center justify-center">
                <dt class="mb-2 text-3xl md:text-4xl font-extrabold">{{ $user }}</dt>
                <dd class="font-light text-gray-500 dark:text-gray-400">Pengguna</dd>
            </div>
        </dl>
    </div>
    <div class="w-full p-4 mb-4">
        <h2 class="font-extrabold text-2xl text-center mb-8">Rekomendasi Objek Wisata</h2>
        <div class="w-full md:grid md:grid-cols-4 md:gap-4 mb-4">
            @foreach ($data as $row)
            <a href="{{ route('user.wisata.show', Crypt::encrypt($row->id)) }}" class="relative">
                <div>
                    <img class="h-auto max-w-full rounded-lg mb-4" src="{{ asset('storage/'.$row->pictures->first()->path) }}" alt="{{ $row->nama }}">
                    <div class="opacity-100 md:hover:opacity-100 duration-300 absolute inset-0 z-10 flex justify-center items-center text-center text-lg md:text-2xl lg:text-4xl text-white font-semibold">{{ $row->nama }}</div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="p-4">
            {{ $data->links() }}
        </div>
    </div>
</div>
