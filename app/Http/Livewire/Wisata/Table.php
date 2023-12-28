<?php

namespace App\Http\Livewire\Wisata;

use App\Models\Wisata;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;
    public $search;
    public $paginate=10;
    public $selectedType;

    public function render()
    {
        return view('livewire.wisata.table', [
            'data' => Wisata::query()->when($this->search, function($query, $search){
                return $query->where('nama', 'LIKE', '%'.$search.'%');
            })->when($this->selectedType, function($query, $selected){
                return $query->where('kategori', $selected);
            })->latest()->paginate($this->paginate),
        ]);
    }
}
