<div class="w-full p-4 mb-4">
    <h2 class="font-extrabold text-2xl text-center mb-8">Rekomendasi Hotel</h2>
    <div class="w-full md:grid md:grid-cols-4 md:gap-4 mb-4">
        @foreach ($data as $row)
        <a href="{{ route('user.wisata.show', Crypt::encrypt($row->id)) }}" class="relative">
            <div>
                <img class="h-auto max-w-full rounded-lg mb-4" src="{{ asset('storage/'.$row->pictures->first()->path) }}" alt="{{ $row->nama }}">
                <div class="opacity-100 md:hover:opacity-100 duration-300 absolute inset-0 z-10 flex justify-center items-center text-center text-lg md:text-2xl lg:text-4xl text-white font-semibold">{{ $row->nama }}</div>
            </div>
        </a>
        @endforeach
    </div>
    <div class="p-4">
        {{ $data->links() }}
    </div>
</div>