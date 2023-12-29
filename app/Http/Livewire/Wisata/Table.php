<?php

namespace App\Http\Livewire\Wisata;

use App\Models\Picture;
use App\Models\Wisata;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Table extends Component
{
    use WithPagination;
    public $search;
    public $paginate=10;
    public $selectedType;

    public function render()
    {
        return view('livewire.wisata.table', [
            'data' => Wisata::query()->with('pictures')->when($this->search, function($query, $search){
                return $query->where('nama', 'LIKE', '%'.$search.'%');
            })->when($this->selectedType, function($query, $selected){
                return $query->where('kategori', $selected);
            })->latest()->paginate($this->paginate),
        ]);
    }

    public function delete(Wisata $wisata)
    {
        foreach($wisata->pictures as $picture){
            if(File::exists(public_path('storage/'.$picture->path))){
                File::delete(public_path('storage/'.$picture->path));
            }
            $picture->delete();
        }
        $wisata->delete();
        $this->dispatchBrowserEvent('messages', [
            'title' => 'Wisata Berhasil dihapus!',
            'icon' => 'success',
            'iconColor' => 'green'
        ]);
    }
}
