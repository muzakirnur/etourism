<?php

namespace App\Http\Livewire\User;

use App\Models\WisataRating;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddReview extends Component
{
    use WithFileUploads;
    public $wisata;
    public $date;
    public $ulasan;
    public $photo;
    public $jenis;
    public $bintang;

    public function render()
    {
        return view('livewire.user.add-review');
    }

    public function submit()
    {
        $rating = WisataRating::create([
            'wisata_id' => $this->wisata,
            'user_id' => Auth::user()->id,
            'bintang' => $this->bintang,
            'ulasan' => $this->ulasan,
            'jenis_kunjungan' => $this->jenis,
            'tanggal' => $this->date,
            'gambar' => $this->photo != null ? $this->photo->store('ulasan/'.Auth::user()->id, 'public') : null,
        ]);
        $this->reset();
        $this->dispatchBrowserEvent('messages', [
            'title' => 'Review Berhasil ditambah!',
            'icon' => 'success',
            'iconColor' => 'green'
        ]);
        $this->dispatchBrowserEvent('reviewAdded');
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
