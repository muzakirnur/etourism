<?php

namespace App\Http\Livewire\Hotel;

use Livewire\Component;
use Livewire\WithFileUploads;

class EditReview extends Component
{
    use WithFileUploads;
    public $rating;
    public $hotel;
    public $date;
    public $ulasan;
    public $photo;
    public $bintang;
    public $strPhoto;

    protected $rules = [
        'date' => ['required', 'date'],
        'ulasan' => ['required', 'string'],
        'photo' => ['required_without:strPhoto', 'nullable', 'image', 'mimes:jpg,jpeg,png'],
        'strPhoto' => ['nullable', 'string'],
        'bintang' => ['required', 'numeric'], 
    ];

    public function mount($hotelRating)
    {
        $this->rating = $hotelRating;
        $this->hotel = $hotelRating->id;
        $this->date = $hotelRating->tanggal;
        $this->ulasan = $hotelRating->ulasan;
        $this->bintang = $hotelRating->bintang;
        $this->strPhoto = $hotelRating->gambar;
    }
    
    public function render()
    {
        return view('livewire.hotel.edit-review');
    }

    public function setStar($star)
    {
        $this->bintang = $star;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }
}
