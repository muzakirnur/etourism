<?php

namespace App\Http\Livewire\Hotel;

use App\Models\Hotel;
use Livewire\Component;

class Table extends Component
{
    public $search;
    public $paginate=10;

    public function render()
    {
        return view('livewire.hotel.table', [
            'data' => Hotel::query()->when($this->search, function($query, $search){
                return $query->where('nama', 'LIKE', '%'.$search.'%');
            })->latest()->paginate($this->paginate),
        ]);
    }
}
