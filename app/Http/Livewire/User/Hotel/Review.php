<?php

namespace App\Http\Livewire\User\Hotel;

use Livewire\Component;
use Livewire\WithPagination;

class Review extends Component
{
    use WithPagination;
    public $hotel;
    public $paginate=6;
    public function render()
    {
        return view('livewire.user.hotel.review',[
            'data' => $this->hotel->rating()->latest()->paginate($this->paginate),
        ]);
    }
}
