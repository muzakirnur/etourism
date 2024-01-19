<div class="w-full">
    <div class="max-w-3xl mx-auto">
        <h2 class="font-extrabold text-2xl text-center mb-4">Rekomendasi Objek Wisata</h2>
        <div class="flex justify-center p-2 mx-auto">
            <div class="w-1/2 md:w-3/4 p-2">
                <input class="form-input w-full" type="text" id="searc" wire:model='cari' placeholder="Cari...">
            </div>
            <div class="w-1/2 md:w-1/4 p-2">
                <select class="form-select" wire:model='kategori'>
                    <option value="">Pilih Kategori</option>
                    <option value="Religi">Religi</option>
                    <option value="Alam">Alam</option>
                    <option value="Budaya">Budaya</option>
                    <option value="Kuliner">Kuliner</option>
                </select>
            </div>
        </div>
    </div>
    <div class="w-full p-4 mb-4">
        <div class="w-full md:grid md:grid-cols-4 md:gap-4 mb-4">
            @foreach ($data as $row)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="{{ route('user.wisata.show', Crypt::encrypt($row->id)) }}">
                    <img class="rounded-t-lg" src="{{ asset('storage/'.$row->pictures->first()->path) }}" alt="{{ $row->nama }}" />
                </a>
                <div class="p-5">
                    <a href="{{ route('user.wisata.show', Crypt::encrypt($row->id)) }}">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $row->nama }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 overflow-hidden">{{ $row->shortDesc() }}</p>
                    <a href="{{ route('user.wisata.show', Crypt::encrypt($row->id)) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Lihat
                         <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="p-4">
            {{ $data->links() }}
        </div>
    </div>
</div>
