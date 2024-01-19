<?php

namespace App\Http\Livewire\Frontend\User;

use App\Models\Hotel;
use App\Models\User;
use App\Models\Wisata;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;
    public $cari;
    public $kategori;
    public $paginate=12;

    public function render()
    {
        return view('livewire.frontend.user.search', [
            'data' => Wisata::query()->withCount('rating')->when($this->cari, function($query, $cari){
                return $query->where('nama', 'LIKE', '%'.$cari.'%');
            })->when($this->kategori, function($query, $kategori){
                return $query->where('kategori', $kategori);
            })->orderBy('rating_count', 'DESC')->paginate($this->paginate),
            'hotel' => count(Hotel::all()),
            'user' => count(User::all()->except('id', 1)),
            'wisata' => count(Wisata::all()),
        ]);
    }
}
