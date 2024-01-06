<div class="w-full">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-center text-xl">Cari Objek Wisata</h1>
        <div class="flex justify-center p-2">
            <input class="form-input w-full" type="text" id="searc" wire:model='cari' placeholder="Cari...">
        </div>
    </div>
    <div class="w-full p-4 mb-4">
        <div class="grid grid-cols-4 gap-4 w-full">
            @foreach ($data as $row)
            <a href="{{ route('user.wisata.show', Crypt::encrypt($row->id)) }}" class="relative">
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="{{ asset('storage/'.$row->pictures->first()->path) }}" alt="{{ $row->nama }}">
                    <div class="opacity-0 hover:opacity-100 duration-300 absolute inset-0 z-10 flex justify-center items-center text-center text-6xl text-white font-semibold">{{ $row->nama }}</div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="p-4">
            {{ $data->links() }}
        </div>
    </div>
</div>
