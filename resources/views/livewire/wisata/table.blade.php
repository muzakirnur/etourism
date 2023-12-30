<div class="bg-white p-4">
    <div class="w-full mb-2 flex flex-wrap">
        <div class="w-1/2">
            <select id="paginate" wire:model='paginate' class="form-select">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            <select id="selectedTyope" wire:model='selectedType' class="form-select">
                <option value="">Pilih Kategori</option>
                <option value="Alam">Alam</option>
                <option value="Religi">Religi</option>
                <option value="Budaya">Budaya</option>
                <option value="Kuliner">Kuliner</option>
            </select>
        </div>
        <div class="w-1/2 text-end">
            <input class="form-input" type="text" id="searc" wire:model='search' placeholder="Cari...">
        </div>
    </div>
    <table class="table-auto w-full dark:text-slate-300">
        <!-- Table header -->
        <thead class="text-xs uppercase text-slate-400 dark:text-slate-500 bg-slate-50 dark:bg-slate-700 dark:bg-opacity-50 rounded-sm">
            <tr>
                <th class="p-2">
                    <div class="font-semibold text-left">Gambar</div>
                </th>
                <th class="p-2">
                    <div class="font-semibold text-center">Nama</div>
                </th>
                <th class="p-2">
                    <div class="font-semibold text-center">Kategori</div>
                </th>
                <th class="p-2">
                    <div class="font-semibold text-end">Action</div>
                </th>
            </tr>
        </thead>
        <!-- Table body -->
        <tbody class="text-sm font-medium divide-y divide-slate-100 dark:divide-slate-700">
            <!-- Row -->
            @foreach ($data as $row) 
            <tr>
                <td class="p-2">
                    @if ($row->pictures)
                    <img class="w-96 h-48" src="{{ asset('storage/'.$row->pictures->first()->path) }}" alt="{{ $row->name }}">
                    @endif
                </td>
                <td class="p-2">
                    <div class="text-center">{{ $row->nama }}</div>
                </td>
                <td class="p-2">
                    <div class="text-center">{{ $row->kategori }}</div>
                </td>
                <td class="p-2">
                    <div class="w-full text-end">
                        <button class="btn bg-red-500 hover:bg-red-600 text-white whitespace-nowrap" wire:click='delete({{ $row->id }})'>Delete</button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
</div>
