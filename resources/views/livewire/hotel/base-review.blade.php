<div class="w-full md:w-3/4 mx-auto">
    @if ($hotelRating)
        @if ($edit == false)
            <h2 class="font-semibold text-lg mb-4">Ulasan Anda</h2>
            <figure class="w-2/3 border p-4 rounded-lg mx-auto">
                <div class="flex flex-wrap items-center mb-4">
                    <figcaption class="flex items-center space-x-3 rtl:space-x-reverse w-3/4 align-middle">
                        <img class="w-6 h-6 rounded-full" src="{{ $hotelRating->user->profile_photo_url }}"
                            alt="profile picture">
                        <div
                            class="flex items-center divide-x-2 rtl:divide-x-reverse divide-gray-300 dark:divide-gray-700">
                            <cite
                                class="pe-3 font-medium text-gray-900 dark:text-white">{{ $hotelRating->user->name }}</cite>
                            <cite
                                class="ps-3 text-sm text-gray-500 dark:text-gray-400">{{ $hotelRating->jenis_kunjungan }}</cite>
                        </div>
                    </figcaption>
                    <div class="flex items-center mb-4 text-yellow-300 w-1/4 justify-end align-top">
                        @for ($i = 1; $i < 6; $i++)
                            <svg class="w-4 h-4 {{ $i <= $hotelRating->bintang ? 'text-yellow-300' : 'text-gray-500 dark:text-gray-400' }} me-1"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                        @endfor
                    </div>
                    <div class="w-full">
                        <p class="text-sm font-extralight italic">
                            {{ date('d F Y', strtotime($hotelRating->tanggal)) }}</p>
                    </div>
                </div>
                <div class="flex justify-end">
                    <div class="w-full text-end">
                        <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white whitespace-nowrap"
                            wire:click='setEdit'>Edit</button>
                        <button class="btn bg-red-500 hover:bg-red-600 text-white whitespace-nowrap"
                            wire:click='delete({{ $hotelRating }})'>Hapus</button>
                    </div>
                </div>
                <blockquote>
                    <p class="text-lg font-semibold text-gray-900 dark:text-white">"{{ $hotelRating->ulasan }}"
                    </p>
                </blockquote>
                @if ($hotelRating->gambar != null)
                    <div class="p-4">
                        <img src="{{ asset('storage/' . $hotelRating->gambar) }}" alt="Photo"
                            class="rounded-lg w-48 h-23">
                    </div>
                @endif
            </figure>
        @else
            <div id="reviewForm">
                <h2 class="font-semibold">Tambah Ulasan Anda</h2>
                <form wire:submit.prevent='update'>
                    <div class="w-full p-2 md:grid md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="message"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu
                                Kunjungan</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input wire:model='date' type="date" id="datepickerInput"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Select date">
                            </div>
                            @error('date')
                                <span class="error text-red-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="message"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ulasan
                                Anda</label>
                            <textarea wire:model='ulasan' id="message" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Write your thoughts here..."></textarea>
                            @error('ulasan')
                                <span class="error text-red-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="file_input">Upload
                                Gambar</label>
                            <input wire:model='photo'
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="file_input" type="file">
                            @error('photo')
                                <span class="error text-red-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4" wire:ignore>
                            <label for="message"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kepuasan
                                Berwisata</label>
                            <div class="flex flex-row p-4">
                                @for ($i = 1; $i < 6; $i++)
                                    <svg wire:click="setStar({{ $i }})" id="{{ $i }}"
                                        class="w-4 h-4 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                @endfor
                            </div>
                            @error('bintang')
                                <span class="error text-red-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        {{-- <div class="mb-4">
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                            Kunjungan</label>
                        <select wire:model='jenis' id="jenis"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Pilih</option>
                            <option value="Sendiri">Sendiri</option>
                            <option value="Bersama Pasangan">Bersama Pasangan</option>
                            <option value="Bersama Keluarga">Bersama Keluarga</option>
                            <option value="Bersama Kelompok">Bersama Kelompok</option>
                        </select>
                        @error('jenis')
                            <span class="error text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div> --}}

                    </div>
                    <div class="mb-4 text-end">
                        <button type="submit"
                            class="btn bg-indigo-500 hover:bg-indigo-600 text-white whitespace-nowrap">Simpan</button>
                    </div>
                </form>
            </div>

        @endif
    @else
        <livewire:hotel.add-review :hotel="$hotel->id" />
    @endif
</div>
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            Livewire.on('reloadBintang', () => {
                bintang();
            })

            function bintang() {
                var bintang = @this.get('bintang');
                if (bintang) {
                    for (let i = 1; i <= bintang; i++) {
                        if (i <= bintang) {
                            $("#" + i).addClass("text-yellow-500");
                        } else {
                            $("#" + i).removeClass("text-yellow-500");
                        }
                    }
                }
                $("svg").hover(function() {
                    const number = parseInt($(this).attr('id'))
                    for (let i = 1; i <= number + 1; i++) {
                        if (i <= number) {
                            $("#" + i).addClass("text-yellow-500");
                        } else {
                            $("#" + i).removeClass("text-yellow-500");
                        }
                    }
                })
                $("svg").click(function() {
                    const number = parseInt($(this).attr('id'))
                    bintang = number;
                    for (let i = 1; i <= number + 1; i++) {
                        if (i <= number) {
                            $("#" + i).addClass("text-yellow-500");
                        } else {
                            $("#" + i).removeClass("text-yellow-500");
                        }
                    }
                    @this.set('bintang', bintang);
                })
            }
        })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>
    <script>
        Livewire.on('reviewAdded', () => {
            setTimeout(() => {
                location.reload();
            }, 3000);
        });
    </script>
@endpush
