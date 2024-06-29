<?php

namespace App\Http\Livewire\User\Hotel;

use App\Models\Hotel;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;
    public $cari;
    public $paginate=12;

    public function render()
    {
        return view('livewire.user.hotel.search', [
            'data' => Hotel::query()->withCount('rating')->when($this->cari, function($query, $cari){
                return $query->where('nama', 'LIKE', '%'.$cari.'%');
            })->orderBy('rating_count', 'DESC')->paginate($this->paginate),
        ]);
    }
}
