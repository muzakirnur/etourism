<div class="bg-white p-4">
    <form wire:submit.prevent='submit' enctype="multipart/form-data">
        <div class="p-2">
            <label for="photo" class="'block text-sm font-medium mb-1">Gambar</label>
            <div class="p-2">
                <label class="block">
                    <span class="sr-only">Pilih Gambar</span>
                    <input type="file" wire:model='photos'
                        class="block w-full text-sm text-slate-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-full file:border-0
                    file:text-sm file:font-semibold
                    file:bg-indigo-50 file:text-indigo-700
                    hover:file:bg-indigo-100
                "
                        multiple />
                </label>
                @error('photos.*')
                    <span class="error text-red-500">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
        <div class="p-2">
            <x-jet-label for="nama" value="{{ __('Nama') }}" />
            <input class="form-input w-full" type="text" id="nama" wire:model='nama'
                placeholder="Nama Tempat Wisata">
            @error('nama')
                <span class="error text-red-500">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="p-2">
            <x-jet-label for="shortDesc" value="{{ __('Short Description') }}" />
            <textarea placeholder="Masukkan Deskripsi Singkat" class="form-input w-full" name="shortDesc" id="shortDesc"
                cols="30" rows="3" wire:model='shortDesc'></textarea>
        </div>
        <div class="p-2 h-max w-full mb-8" wire:ignore>
            <x-jet-label for="deskripsi" value="{{ __('Deskripsi') }}" />
            <textarea id="myeditorinstance" wire:model='deskripsi'></textarea>
            @error('deskripsi')
                <span class="error text-red-500">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="p-2">
            <x-jet-label for="nama" value="{{ __('Alamat') }}" />
            <input class="form-input w-full" type="text" id="alamat" wire:model='alamat'
                placeholder="Alamat Lengkap">
            @error('alamat')
                <span class="error text-red-500">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div wire:ignore>
            <div class="pac-card" id="pac-card">
                <div id="title">
                    Cari Lokasi
                </div>
                <div id="pac-container">
                    <input id="pac-input" type="text" placeholder="Cari...">
                </div>
            </div>
            <div class="p-2">
                <x-jet-label for="maps" value="{{ __('Lokasi') }}" />
                <div wire:ignore id="map" style="width: 100%; height: 400px;padding:0.5rem;"></div>
                @error('lat')
                    <span class="error text-red-500">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
        <div class="p-2 text-end">
            <button type="submit"
                class="btn bg-indigo-500 hover:bg-indigo-600 text-white whitespace-nowrap">Simpan</button>
        </div>
    </form>
</div>
@push('scripts')
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
            forced_root_block: false,
            plugins: 'code table lists',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.set('deskripsi', editor.getContent());
                });
            }
        });
    </script>
    <script>
        var marker;
        var lat;
        var lng;

        function placeMarker(location, map) {
            if (marker) {
                marker.setPosition(location);
            } else {
                marker = new google.maps.Marker({
                    position: location,
                    map: map,
                });
            }
            lat = marker.getPosition().lat();
            lng = marker.getPosition().lng();
            @this.set('lat', lat);
            @this.set('lng', lng);
        }
    </script>
@endpush
