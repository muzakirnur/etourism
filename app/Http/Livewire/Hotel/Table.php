<?php

namespace App\Http\Livewire\Hotel;

use App\Models\Hotel;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;
    public $search;
    public $paginate=10;

    public function render()
    {
        return view('livewire.hotel.table', [
            'data' => Hotel::query()->with('pictures')->when($this->search, function($query, $search){
                return $query->where('nama', 'LIKE', '%'.$search.'%');
            })->latest()->paginate($this->paginate),
        ]);
    }

    public function delete(Hotel $hotel)
    {
        foreach($hotel->pictures as $picture){
            if(File::exists(public_path('storage/'.$picture->path))){
                File::delete(public_path('storage/'.$picture->path));
            }
            $picture->delete();
        }
        $hotel->delete();
        $this->dispatchBrowserEvent('messages', [
            'title' => 'Hotel Berhasil dihapus!',
            'icon' => 'success',
            'iconColor' => 'green'
        ]);
    }
}
