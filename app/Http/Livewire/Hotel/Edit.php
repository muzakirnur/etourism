<?php

namespace App\Http\Livewire\Hotel;

use App\Models\HotelPicture;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public $hotel;
    public $photos=[];
    public $nama;
    public $shortDesc;
    public $deskripsi;
    public $lat;
    public $lng;
    public $alamat;

    public function mount()
    {
        $this->nama = $this->hotel->nama;
        $this->shortDesc = $this->hotel->short_desc;
        $this->deskripsi = $this->hotel->deskripsi;
        $this->lat = $this->hotel->lat;
        $this->lng = $this->hotel->lng;
        $this->alamat = $this->hotel->alamat;
    }

    protected $rules = [
        'photos.*' => ['mimes:jpg,jpeg,png'],
        'nama' => ['required', 'string', 'max:255'],
        'shortDesc' => ['required', 'string'],
        'deskripsi' => ['required'],
        'lat' => ['required'],
        'lng' => ['required'],
        'alamat' => ['required', 'string', 'max:255']
    ];
    public function render()
    {
        return view('livewire.hotel.edit');
    }

    public function submit()
    {
        try{
            $this->validate();
            $this->hotel->update([
                'nama' => $this->nama,
                'short_desc' => $this->shortDesc,
                'deskripsi' => $this->deskripsi,
                'alamat' => $this->alamat,
                'lat' => $this->lat,
                'lng' => $this->lng,
            ]);
            if($this->photos){
                foreach($this->hotel->pictures as $picture){
                    if(File::exists(public_path('storage/'.$picture->path))){
                        File::delete(public_path('storage/'.$picture->path));
                    }
                    $picture->delete();
                }
                for($i=0;$i<count($this->photos);$i++){
                    $pictures[$i] = HotelPicture::create([
                        'hotel_id' => $this->hotel->id,
                        'path' => $this->photos[$i]->store('hotel/'.$this->hotel->nama, 'public')
                    ]);
                }
            }
            $this->dispatchBrowserEvent('messages', [
                'title' => 'Akomodasi Berhasil diupdate!',
                'icon' => 'success',
                'iconColor' => 'green'
            ]);
        }catch(\Exception $e){
            $this->dispatchBrowserEvent('messages', [
                'title' => $e->getMessage(),
                'icon' => 'error',
                'iconColor' => 'red'
            ]);
        }
    }
}
