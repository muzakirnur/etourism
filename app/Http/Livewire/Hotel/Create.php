<?php

namespace App\Http\Livewire\Hotel;

use App\Models\Hotel;
use App\Models\HotelPicture;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $photos=[];
    public $nama;
    public $deskripsi;
    public $lat;
    public $lng;
    public $alamat;

    protected $rules = [
        'photos.*' => ['required', 'mimes:jpg,jpeg,png'],
        'nama' => ['required', 'string', 'max:255'],
        'deskripsi' => ['required'],
        'lat' => ['required'],
        'lng' => ['required'],
        'alamat' => ['required', 'string', 'max:255']
    ];

    public function render()
    {
        return view('livewire.hotel.create');
    }

    public function submit()
    {
        try{
            $this->validate();
            $hotel = Hotel::create([
                'nama' => $this->nama,
                'deskripsi' => $this->deskripsi,
                'alamat' => $this->alamat,
                'lat' => $this->lat,
                'lng' => $this->lng,
            ]);
            for($i=0;$i<count($this->photos);$i++){
                $pictures[$i] = HotelPicture::create([
                    'hotel_id' => $hotel->id,
                    'path' => $this->photos[$i]->store('hotel/'.$hotel->nama, 'public')
                ]);
            }
            $this->dispatchBrowserEvent('messages', [
                'title' => 'Hotel Berhasil ditambahkan!',
                'icon' => 'success',
                'iconColor' => 'green'
            ]);
            $this->emit('wisataAdded');
            $this->reset();
        }catch(\Exception $e){
            if(isset($hotel)){
                if($hotel->pictures){
                    foreach($hotel->pictures as $picture){
                        if(File::exists(public_path('storage/'.$picture->path))){
                            File::delete(public_path('storage/'.$picture->path));
                        }
                        $picture->delete();
                    }
                }
                $hotel->delete();
            }
            $this->dispatchBrowserEvent('messages', [
                'title' => 'Hotel Gagal ditambahkan!',
                'icon' => 'error',
                'iconColor' => 'red'
            ]);
        }
    }
}
