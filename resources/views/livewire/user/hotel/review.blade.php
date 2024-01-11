<div class="w-full mx-auto mb-8">
    <div class="w-full md:grid md:grid-cols-3 gap-4">
        @foreach ($data as $row)
        <figure class="max-w-screen-md border p-4 rounded-lg mb-4">
            <div class="flex flex-wrap items-center mb-4">
                <figcaption class="flex items-center space-x-3 rtl:space-x-reverse w-3/4 align-middle">
                    <img class="w-6 h-6 rounded-full" src="{{ $row->user->profile_photo_url}}" alt="profile picture">
                    <div class="flex items-center divide-x-2 rtl:divide-x-reverse divide-gray-300 dark:divide-gray-700">
                        <cite class="pe-3 font-medium text-gray-900 dark:text-white">{{ $row->user->name }}</cite>
                        <cite class="ps-3 text-sm text-gray-500 dark:text-gray-400">{{ $row->jenis_kunjungan }}</cite>
                    </div>
                </figcaption>
                <div class="flex items-center mb-4 text-yellow-300 w-1/4 justify-end align-top">
                    @for ($i = 1; $i < 6; $i++)
                    <svg class="w-4 h-4 {{ $i <= ceil($row->bintang) ? 'text-yellow-300' : 'text-gray-500 dark:text-gray-400' }} me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    @endfor
                </div>
                <div class="w-full">
                    <p class="text-sm font-extralight italic">{{ date('d F Y', strtotime($row->tanggal)) }}</p>
                </div>
            </div>
            <blockquote>
                <p class="text-lg font-semibold text-gray-900 dark:text-white">"{{ $row->ulasan }}"</p>
            </blockquote>
            @if ($row->gambar != null)
            <div class="p-4">
                <img src="{{ asset('storage/'.$row->gambar) }}" alt="Photo" class="rounded-lg w-48 h-23">
            </div>
            @endif
        </figure>
        @endforeach
    </div>
    <div class="w-full">
        {{ $data->links() }}
    </div>
</div>