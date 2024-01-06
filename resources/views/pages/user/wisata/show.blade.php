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
        <div class="w-3/4 mx-auto mb-4">
            <div id="map" style="width: 100%; height: 400px;padding:0.5rem;"></div>
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