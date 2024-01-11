<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Hotel as HotelModel;

class Hotel extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.frontend.hotel', [
            'data' => HotelModel::query()->withCount('rating')->orderBy('rating_count', 'DESC')->paginate(12)
        ]);
    }
}
