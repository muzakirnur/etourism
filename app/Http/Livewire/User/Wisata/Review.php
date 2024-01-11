<?php

namespace App\Http\Livewire\User\Wisata;

use Livewire\Component;
use Livewire\WithPagination;

class Review extends Component
{
    use WithPagination;
    public $wisata;
    public $paginate=6;
    public function render()
    {
        return view('livewire.user.wisata.review', [
            'data' => $this->wisata->rating()->latest()->paginate($this->paginate)
        ]);
    }
}
