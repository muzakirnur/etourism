<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search;
    public $paginate=10;
    
    public function render()
    {
        return view('livewire.user.index', [
            'data' => User::query()->where('id', '!=', auth()->id())->when($this->search, function($query, $search){
                return $query->where('name', 'LIKE', '%'.$search.'%');
            })->paginate($this->paginate),
        ]);
    }

    public function delete(User $user)
    {
        $user->delete();
        $this->dispatchBrowserEvent('messages', [
            'title' => 'User Berhasil dihapus!',
            'icon' => 'success',
            'iconColor' => 'green'
        ]);
    }
}
