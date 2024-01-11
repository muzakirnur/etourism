<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Wisata as WisataModel;
use Livewire\Component;
use Livewire\WithPagination;

class Wisata extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.frontend.wisata', [
            'data' => WisataModel::query()->withCount('rating')->orderBy('rating_count', 'DESC')->paginate(12),
        ]);
    }
}
