<x-guest-layout>
    <div class="jutify-center items-center p-2">
        <h2 class="font-semibold text-center text-3xl">{{ $hotel->nama }}</h2>
        <p class="italic text-center text-lg font-inter">{{ $hotel->alamat }}</p>
    </div>
    <div class="w-full lg:w-3/4 p-2 mx-auto mb-4">
        <div id="animation-carousel" class="relative w-full" data-carousel="static">
            <!-- Carousel wrapper -->
            <div class="relative h-40 overflow-hidden rounded-lg md:h-96">
                 <!-- Item 1 -->
                 @foreach ($hotel->pictures as $row)
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
    <div class="w-full lg:w-3/4 mx-auto mb-4">
        {!! $hotel->deskripsi !!}
    </div>
    <div class="w-full lg:w-3/4 mx-auto mb-8">
        <h1 class="font-semibold text-center">Rute Lokasi</h1>
        <div id="map" style="width: 100%; height: 600px;padding:0.5rem;"></div>
        <div id="distances" class="grid grid-rows-3">
        </div>
    </div>
    @if (count($hotel->rating) > 0)
    <div class="w-full lg:w-3/4 mx-auto mb-4">
        <div class="flex items-center justify-center">
            @for ($i = 1; $i < 6; $i++)
            <svg class="w-4 h-4 {{ $i <= round($hotel->totalRating()) ? 'text-yellow-300' : 'text-gray-500 dark:text-gray-400' }} me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
            </svg>
            @endfor
            <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">{{ $hotel->totalRating() }}</p>
            <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">dari</p>
            <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">{{ count($hotel->rating) }} Review</p>
        </div>
        <h3 class="font-semibold text-lg">Ulasan Terakhir</h3>
    </div>
    <div class="w-full md:w-3/4 flex mx-auto mb-8">
        <livewire:user.hotel.review :hotel="$hotel"/>
    </div>
    <div class="w-full md:w-3/4 mx-auto">
        @php
            $userHadReview = Auth::user()->hotelRating->where('hotel_id', $hotel->id)->first();
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
                <div class="w-full">
                    <p class="text-sm font-extralight italic">{{ date('d F Y', strtotime($userHadReview->tanggal)) }}</p>
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
            <livewire:user.add-review :wisata="$hotel->id"/>
        @endif
    </div>
    @endif
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            var lat = {{ $hotel->lat }};
            var lng = {{ $hotel->lng }};
            const lokasiWisata = {lat:lat, lng:lng};
            let map, infoWindow;

            function createCenterControl(map) {
                const controlButton = document.createElement("button");

                // Set CSS for the control.
                controlButton.style.backgroundColor = "#fff";
                controlButton.style.border = "2px solid #fff";
                controlButton.style.borderRadius = "3px";
                controlButton.style.boxShadow = "0 2px 6px rgba(0,0,0,.3)";
                controlButton.style.color = "rgb(25,25,25)";
                controlButton.style.cursor = "pointer";
                controlButton.style.fontFamily = "Roboto,Arial,sans-serif";
                controlButton.style.fontSize = "16px";
                controlButton.style.lineHeight = "38px";
                controlButton.style.margin = "8px 0 22px";
                controlButton.style.padding = "0 5px";
                controlButton.style.textAlign = "center";
                controlButton.textContent = "Center Map";
                controlButton.title = "Click to recenter the map";
                controlButton.type = "button";
                // Setup the click event listeners: simply set the map to Chicago.
                controlButton.addEventListener("click", () => {
                    map.setCenter(lokasiWisata);
                });
            return controlButton;
            }

            async function initMap() {
                // The location of Bireun
                const position = { lat: 5.221809197503294, lng: 96.71791035533619 };
                // Request needed libraries.
                //@ts-ignore
                const { Map } = await google.maps.importLibrary("maps");
                const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
                infoWindow = new google.maps.InfoWindow();
                var directionsService = new google.maps.DirectionsService();
                var directionsRenderer = new google.maps.DirectionsRenderer();
                let distanceDiv = document.getElementById('distances');
                
                // The map, centered at Uluru
                map = new Map(document.getElementById("map"), {
                    zoom: 15,
                    center: lokasiWisata,
                    mapId: "user",
                    mapTypeControl: true,
                    mapTypeControlOptions: {
                        style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
                        mapTypeIds: ["roadmap", "terrain"],
                    },
                });
                const locationButton = createCenterControl(map);
                const startButton = createCenterControl(map);

                const marker = new AdvancedMarkerElement({
                    map:map,
                    position:lokasiWisata,
                    title:"TES TITLE",
                })

                locationButton.textContent = "Menentukan Rute";
                locationButton.classList.add("custom-map-control-button");
                map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
                locationButton.addEventListener("click", () => {
                    if (navigator.geolocation) {
                    startButton.textContent = "Menuju Lokasi";
                    startButton.classList.add("custom-map-control-button");
                    startButton.title = "Mulai Perjalanan";
                    map.controls[google.maps.ControlPosition.BOTTOM_CENTER].push(startButton);
                    navigator.geolocation.getCurrentPosition(
                        (position) => {
                            const pos = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude,
                                // lat:5.1934632878968,
                                // lng:97.13799595273,
                            };

                            var request = {
                                origin: pos,
                                destination: lokasiWisata,
                                provideRouteAlternatives:true,
                                travelMode: 'DRIVING'
                            };
                            /* Distance Matrix */
                            var service = new google.maps.DistanceMatrixService();
                            directionsService.route(request, function(result, status) {
                                if (status == 'OK') {
                                    var routesSteps = [];
                                    var distances = [];
                                    var routes = result.routes;
                                    var colors = ['blue', 'red', 'green', 'orange', 'yellow', 'black'];
                                    var stroke = ['#F6D8AE', '#F4D35E'];
                                    for(var i=0;i<routes.length; i++){
                                        new google.maps.DirectionsRenderer({
                                            map:map,
                                            directions:result,
                                            routesIndex:i,
                                            polylineOptions: {
                                                strokeColor: colors[i],
                                                strokeWeight:4,
                                                strokeOpacity:.3
                                            }
                                        });
                                        
                                        var steps = routes[i].legs[0].steps;
                                        var stepsCoords = [];
                                        var distance = [];
                                        for (var j=0;j<steps.length;j++){
                                            stepsCoords[j] = new google.maps.LatLng(steps[j].start_location.lat(), steps[j].start_location.lng());
                                            new google.maps.Marker({
                                                position: stepsCoords[j],
                                                map: map,
                                                label:[i+1].toString(),
                                                title: steps[j].maneuver,
                                            });
                                        }
                                        for(var d=0;d<steps.length;d++){
                                           distance[d] = steps[d].distance.value;
                                        }
                                        distances[i] = distance;
                                        routesSteps[i] = stepsCoords;
                                        let divCols = document.createElement("div");
                                        let h2Text = document.createElement("h2");
                                        var totalDistances = 0;
                                        h2Text.textContent="Jalur "+[i+1]
                                        divCols.append(h2Text);
                                        distanceDiv.append(divCols)
                                        for(var p=0;p<distances[i].length;p++){
                                            let li = document.createElement("span");
                                            let km = (p==distances[i].length-1) ? "Km " : "Km + ";
                                            li.textContent=(distances[i][p]/1000).toFixed(2)+km;
                                            divCols.append(li);
                                            totalDistances = totalDistances+distances[i][p];
                                        }
                                        let TotalText = document.createElement('span');
                                        TotalText.textContent="= "+(totalDistances/1000).toFixed(2)+"Km"
                                        divCols.append(TotalText);
                                    }
                                }
                            });

                            infoWindow.setPosition(pos);
                            infoWindow.setContent("Lokasi Anda");
                            infoWindow.open(map);
                            map.setCenter(pos);
                            var url = "https://www.google.com/maps/dir/?api=1&origin="+pos.lat+","+pos.lng+"&destination="+lokasiWisata.lat+","+lokasiWisata.lng;
                                startButton.addEventListener('click', () => {
                                    window.open(url, "_blank");
                                })
                        },
                        () => {
                            handleLocationError(true, infoWindow, map.getCenter());
                        },
                    );
                    } else {
                        // Browser doesn't support Geolocation
                        handleLocationError(false, infoWindow, map.getCenter());
                    }
                })

                function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                infoWindow.setPosition(pos);
                infoWindow.setContent(
                    browserHasGeolocation
                    ? "Error: The Geolocation service failed."
                    : "Error: Your browser doesn't support geolocation.",
                );
                infoWindow.open(map);
                }
            }
            initMap();

        })
    </script>
    @endpush
</x-guest-layout>