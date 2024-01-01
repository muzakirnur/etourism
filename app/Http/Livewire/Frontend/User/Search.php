<?php

namespace App\Http\Livewire\Frontend\User;

use App\Models\Wisata;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;
    public $cari;
    public $tipe;
    public $paginate=12;

    public function render()
    {
        return view('livewire.frontend.user.search', [
            'data' => Wisata::query()->when($this->cari, function($query, $cari){
                return $query->where('nama', 'LIKE', '%'.$cari.'%');
            })->latest()->paginate($this->paginate),
        ]);
    }
}
