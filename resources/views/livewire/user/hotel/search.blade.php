<div class="w-full">
    <div class="max-w-3xl mx-auto">
        <h2 class="font-extrabold text-2xl text-center mb-4">Rekomendasi Akomodasi Terbaik</h2>
        <div class="flex justify-center p-2">
            <input class="form-input w-full" type="text" id="searc" wire:model='cari' placeholder="Cari...">
        </div>
    </div>
    <div class="w-full p-4 mb-4">
        <div class="w-full md:grid md:grid-cols-4 md:gap-4 mb-4">
            @foreach ($data as $row)
                <div class="max-w-sm rounded overflow-hidden shadow-lg">
                    <img class="w-full" src="{{ asset('storage/' . $row->pictures->first()->path) }}"
                        alt="{{ $row->nama }}">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">{{ $row->nama }}</div>
                        <p class="text-gray-700 text-base">
                            {{ $row->short_desc }}
                        </p>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                        <span
                            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#akomodasi</span>

                    </div>
                </div>
            @endforeach
        </div>
        <div class="p-4">
            {{ $data->links() }}
        </div>
    </div>
</div>
