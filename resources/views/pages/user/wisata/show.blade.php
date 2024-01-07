<x-guest-layout>
        <div class="jutify-center items-center mb-4 p-4">
            <h2 class="font-semibold text-center text-3xl">{{ $wisata->nama }}</h2>
        </div>
        <div class="w-3/4 p-2 mx-auto mb-4">
            <div id="animation-carousel" class="relative w-full" data-carousel="static">
                <!-- Carousel wrapper -->
                <div class="relative h-96 overflow-hidden rounded-lg md:h-96">
                     <!-- Item 1 -->
                     @foreach ($wisata->pictures as $row)
                     <div class="hidden duration-200 ease-linear" data-carousel-item>
                         <img src="{{ asset('storage/'.$row->path) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                     </div>
                     @endforeach
                </div>
                <!-- Slider controls -->
                <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        </div>
        <div class="w-3/4 mx-auto mb-4">
            {!! $wisata->deskripsi !!}
        </div>
        <div class="w-3/4 mx-auto mb-8">
            <div id="map" style="width: 100%; height: 400px;padding:0.5rem;"></div>
        </div>
        <div class="w-3/4 mx-auto mb-4">
            <div class="flex items-center justify-center">
                @for ($i = 1; $i < 6; $i++)
                <svg class="w-4 h-4 {{ $i <= round($wisata->totalRating()) ? 'text-yellow-300' : 'text-gray-500 dark:text-gray-400' }} me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                </svg>
                @endfor
                <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">{{ $wisata->totalRating() }}</p>
                <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">dari</p>
                <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">{{ count($wisata->rating) }} Review</p>
            </div>
            <h3 class="font-semibold text-lg">Ulasan Terakhir</h3>
        </div>
        <div class="w-3/4 flex mx-auto mb-8">
            <div class="grid grid-cols-3 gap-4">
                @foreach ($wisata->rating->sortByDesc('updated_at')->take(6) as $row)
                <figure class="max-w-screen-md border p-4 rounded-lg">
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
        </div>
        <div class="w-3/4 mx-auto">
            @php
                $userHadReview = Auth::user()->wisataRating->where('wisata_id', $wisata->id)->first();
            @endphp
            @if ($userHadReview)
            <h2 class="font-semibold text-lg mb-4">Ulasan Anda</h2>
            <figure class="w-2/3 border p-4 rounded-lg mx-auto">
                <div class="flex flex-wrap items-center mb-4">
                    <figcaption class="flex items-center space-x-3 rtl:space-x-reverse w-3/4 align-middle">
                        <img class="w-6 h-6 rounded-full" src="{{ $userHadReview->user->profile_photo_url }}" alt="profile picture">
                        <div class="flex items-center divide-x-2 rtl:divide-x-reverse divide-gray-300 dark:divide-gray-700">
                            <cite class="pe-3 font-medium text-gray-900 dark:text-white">{{ $userHadReview->user->name}}</cite>
                            <cite class="ps-3 text-sm text-gray-500 dark:text-gray-400">{{ $userHadReview->jenis_kunjungan }}</cite>
                        </div>
                    </figcaption>
                    <div class="flex items-center mb-4 text-yellow-300 w-1/4 justify-end align-top">
                        @for ($i = 1; $i < 6; $i++)
                        <svg class="w-4 h-4 {{ $i <= $userHadReview->bintang ? 'text-yellow-300' : 'text-gray-500 dark:text-gray-400' }} me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                        </svg>
                        @endfor
                    </div>
                </div>
                    <blockquote>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white">"{{ $userHadReview->ulasan }}"</p>
                    </blockquote>
                    @if ($userHadReview->gambar != null)
                    <div class="p-4">
                        <img src="{{ asset('storage/'.$userHadReview->gambar) }}" alt="Photo" class="rounded-lg w-48 h-23">
                    </div>
                    @endif
            </figure>
                @else
                <livewire:user.add-review :wisata="$wisata->id"/>
            @endif
        </div>
        @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function(){
                var lat = {{ $wisata->lat }};
                var lng = {{ $wisata->lng }};
                const location = {lat:lat, lng:lng};
                let map;

                async function initMap() {
                    // The location of Uluru
                    const position = { lat: 5.221809197503294, lng: 96.71791035533619 };
                    // Request needed libraries.
                    //@ts-ignore
                    const { Map } = await google.maps.importLibrary("maps");
                    const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

                    // The map, centered at Uluru
                    map = new Map(document.getElementById("map"), {
                        zoom: 15,
                        center: location,
                        mapId: "user",
                    });

                    const marker = new AdvancedMarkerElement({
                        map:map,
                        position:location,
                        title:"{{ $wisata->nama }}"
                    })

                    const infowindow = new google.maps.InfoWindow({
                        ariaLabel: "{{ $wisata->nama }}",
                    });
                }
                initMap();

            })
        </script>
        @endpush
</x-guest-layout>