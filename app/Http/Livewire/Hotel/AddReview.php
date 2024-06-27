<?php

namespace App\Http\Livewire\Hotel;

use App\Models\HotelRating;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddReview extends Component
{
    use WithFileUploads;
    public $hotel;
    public $date;
    public $ulasan;
    public $photo;
    public $bintang;

    protected $rules = [
        'date' => ['required', 'date'],
        'ulasan' => ['required', 'string'],
        'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        'bintang' => ['required']
    ];

    public function render()
    {
        return view('livewire.hotel.add-review');
    }

    public function submit()
    {
        $this->validate();
        $rating = HotelRating::create([
            'hotel_id' => $this->hotel,
            'user_id' => auth()->id(),
            'bintang' => $this->bintang,
            'ulasan' => $this->ulasan,
            'tanggal' => $this->date,
            'gambar' => $this->photo != null ? $this->photo->store('ulasan/'.auth()->id(), 'public') : null,
        ]);
        $this->reset();
        $this->dispatchBrowserEvent('messages', [
            'title' => 'Review Berhasil ditambah!',
            'icon' => 'success',
            'iconColor' => 'green'
        ]);
        $this->emit('reviewAdded');
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
