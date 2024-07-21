<?php

namespace App\Http\Livewire\Hotel;

use App\Models\HotelRating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class BaseReview extends Component
{
    public $hotel;
    public $edit=false;

    public function mount($hotel)
    {
        $this->hotel = $hotel;
    }

    public function render()
    {
        return view('livewire.hotel.base-review', [
            'hotelRating' => Auth::user()->hotelRating->where('hotel_id', $this->hotel->id)->first(),
        ]);
    }
    
    public function delete(HotelRating $rating)
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

    public function setEdit()
    {
        $this->edit = true;
    }
}
