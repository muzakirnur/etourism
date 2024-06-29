<div class="w-full p-4 mb-4">
    <h2 class="font-extrabold text-2xl text-center mb-8">Rekomendasi Objek Wisata</h2>
    <div class="w-full md:grid md:grid-cols-4 md:gap-4 mb-4">
        @foreach ($data as $row)
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                @if ($row->pictures->first() != null)
                    <img class="w-full" src="{{ asset('storage/' . $row->pictures->first()->path) }}"
                        alt="{{ $row->nama }}">
                @endif
                <div class="px-6 py-4">
                    <a href="{{ route('user.wisata.show', Crypt::encrypt($row->id)) }}" class="hover:text-blue-500">
                        <div class="font-bold text-xl mb-2">{{ $row->nama }}</div>
                    </a>
                    <p class="text-gray-700 text-base">
                        {{ $row->short_desc }}
                    </p>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <span
                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $row->kategori }}</span>
                </div>
            </div>
        @endforeach
    </div>
    <div class="p-4">
        {{ $data->links() }}
    </div>
</div>
