<div class="w-full p-4 mb-4">
    <h2 class="font-extrabold text-2xl text-center mb-8">Rekomendasi Objek Wisata</h2>
    <div class="w-full md:grid md:grid-cols-4 md:gap-4 mb-4">
        @foreach ($data as $row)
            {{-- <a href="{{ route('user.wisata.show', Crypt::encrypt($row->id)) }}" class="relative">
            <div>
                <img class="h-auto max-w-full rounded-lg mb-4" src="{{ asset('storage/'.$row->pictures->first()->path) }}" alt="{{ $row->nama }}">
                <div class="opacity-100 md:hover:opacity-100 duration-300 absolute inset-0 z-10 flex justify-center items-center text-center text-lg md:text-2xl lg:text-4xl text-white font-semibold">{{ $row->nama }}</div>
            </div>
        </a> --}}
            <div
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-4">
                <a href="{{ route('user.wisata.show', Crypt::encrypt($row->id)) }}">
                    <img class="rounded-t-lg h-1/2 object-cover w-full"
                        src="{{ asset('storage/' . $row->pictures->first()?->path) }}" alt="{{ $row->nama }}" />
                </a>
                <div class="p-5">
                    <a href="{{ route('user.wisata.show', Crypt::encrypt($row->id)) }}">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $row->nama }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 overflow-hidden">{{ $row->short_desc }}
                    </p>
                    <a href="{{ route('user.wisata.show', Crypt::encrypt($row->id)) }}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Lihat
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
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
