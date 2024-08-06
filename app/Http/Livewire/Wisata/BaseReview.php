<?php

namespace App\Http\Livewire\Wisata;

use App\Models\WisataRating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class BaseReview extends Component
{
    use WithFileUploads;
    public $wisata;
    public $edit = false;
    public $rating;
    public $date;
    public $ulasan;
    public $photo;
    public $bintang;
    public $strPhoto;
    public $jenis;

    public function mount($wisata)
    {
        $this->wisata = $wisata;
        $this->rating = $wisata->rating->where('user_id', auth()->id())->first();
        if($this->rating){
            $this->date = $this->rating->tanggal;
            $this->ulasan = $this->rating->ulasan;
            $this->bintang = $this->rating->bintang;
            $this->strPhoto = $this->rating->gambar;
            $this->jenis = $this->rating->jenis_kunjungan;
        }
    }

    protected $rules = [
        'date' => ['required', 'date'],
        'ulasan' => ['required', 'string'],
        'photo' => ['nullable', 'mimes:jpg,jpeg,png'],
        'strPhoto' => ['nullable'],
        'jenis' => ['required'],
        'bintang' => ['required']
    ];

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

    public function setEdit()
    {
        $this->edit = true;
        $this->emit('reloadBintang');
    }

    public function setStar($star)
    {
        $this->bintang = $star;
    }

    public function update()
    {
        $this->validate();
        if($this->photo){
            $this->updatePhoto();
        }
        $this->rating->update([
            'bintang' => $this->bintang,
            'ulasan' => $this->ulasan,
            'tanggal' => $this->date,
            'jenis_kunjungan' => $this->jenis,
        ]);
        $this->dispatchBrowserEvent('messages', [
            'title' => 'Rating Berhasil diupdate!',
            'icon' => 'success',
            'iconColor' => 'green'
        ]);
        $this->edit = false;
        $this->emit('reviewAdded');

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
