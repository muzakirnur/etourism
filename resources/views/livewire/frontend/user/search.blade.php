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
            <a href="{{ route('user.wisata.show', Crypt::encrypt($row->id)) }}">
                <div class="max-w-sm rounded overflow-hidden shadow-lg max-h-[240] min-h-max">
                    <img class="w-full" src="{{ asset('storage/'.$row->pictures->first()->path) }}" alt="Sunset in the mountains">
                    <div class="px-6 py-4">
                      <div class="font-bold text-xl mb-2">{{ $row->nama }}</div>
                      <p class="text-gray-700 text-base">
                        {!! Str::limit($row->deskripsi, 240) !!}
                      </p>
                    </div>
                  </div>
            </a>
            @endforeach
        </div>
        <div class="p-4">
            {{ $data->links() }}
        </div>
    </div>
</div>
