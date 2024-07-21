<?php

namespace App\Http\Livewire\Wisata;

use App\Models\WisataRating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class BaseReview extends Component
{
    public $wisata;

    public function mount($wisata)
    {
        $this->wisata = $wisata;
    }

    public function render()
    {
        return view('livewire.wisata.base-review', [
            'wisataReview' => Auth::user()->wisataRating->where('wisata_id', $this->wisata->id)->first(),
        ]);
    }

    public function delete(WisataRating $rating)
    {
        try{
            if($rating->gambar){
                if(File::exists(public_path('storage/'.$rating->gambar))){
                    File::delete(public_path('storage/'.$rating->gambar));
                }
            }
            $rating->delete();
            $this->dispatchBrowserEvent('messages', [
                'title' => 'Rating Berhasil dihapus!',
                'icon' => 'success',
                'iconColor' => 'green'
            ]);
            $this->emit('reviewAdded');
        }catch(\Exception $e){
            $this->dispatchBrowserEvent('messages', [
                'title' => $e->getMessage(),
                'icon' => 'error',
                'iconColor' => 'red'
            ]);
        }
    }
}
