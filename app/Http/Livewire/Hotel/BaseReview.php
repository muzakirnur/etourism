<?php

namespace App\Http\Livewire\Hotel;

use App\Models\HotelRating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class BaseReview extends Component
{
    use WithFileUploads;
    public $hotel;
    public $edit=false;
    public $rating;
    public $date;
    public $ulasan;
    public $photo;
    public $bintang;
    public $strPhoto;


    public function mount($hotel)
    {
        $this->hotel = $hotel;
        $this->rating = $hotel->rating->where('user_id', auth()->id())->first();
        if($this->rating){
            $this->date = $this->rating->tanggal;
            $this->ulasan = $this->rating->ulasan;
            $this->bintang = $this->rating->bintang;
            $this->strPhoto = $this->rating->gambar;
        }
    }

    protected $rules = [
        'date' => ['required', 'date'],
        'ulasan' => ['required', 'string'],
        'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png'],
        'strPhoto' => ['nullable', 'string'],
        'bintang' => ['required', 'numeric'], 
    ];

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
        $this->emit('reloadBintang');
    }

    public function update()
    {
        $this->validate();
        if($this->photo){
            $this->updatePhoto();
        }

        $this->rating->update([
            'bintang' => $this->bintang,
            'tanggal' => $this->date,
            'ulasan' => $this->ulasan
        ]);
        $this->dispatchBrowserEvent('messages', [
            'title' => 'Rating Berhasil diupdate!',
            'icon' => 'success',
            'iconColor' => 'green'
        ]);
        $this->edit = false;
    }

    public function setStar($star)
    {
        $this->bintang = $star;
    }

    public function updatePhoto()
    {
        if($this->strPhoto){
            if(File::exists(public_path('storage/'.$this->strPhoto))){
                File::delete(public_path('storage/'.$this->strPhoto));
            }
        }
        $this->rating->update([
            'gambar' => $this->photo->store('ulasan/'.auth()->id(), 'public'),
        ]);
    }
}
