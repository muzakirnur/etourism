<?php

namespace App\Http\Livewire\Wisata;

use App\Models\Picture;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public $wisata;
    public $nama;
    public $shortDesc;
    public $kategori;
    public $deskripsi;
    public $photos = [];
    public $lat;
    public $lng;

    public function mount()
    {
        $this->nama = $this->wisata->nama;
        $this->shortDesc = $this->wisata->short_desc;
        $this->deskripsi = $this->wisata->deskripsi;
        $this->lat = $this->wisata->lat;
        $this->lng = $this->wisata->lng;
        $this->kategori = $this->wisata->kategori;
    }

    protected $rules = [
        'nama' => ['required', 'string', 'max:255'],
        'shortDesc' => ['required', 'string'],
        'kategori' => ['required'],
        'deskripsi' => ['required'],
        'photos.*' => ['image'],
        'lat' => ['required'],
        'lng' => ['required']
    ];

    public function render()
    {
        return view('livewire.wisata.edit');
    }

    public function submit()
    {
        try{
            $this->validate();
            $this->wisata->update([
                'nama' => $this->nama,
                'short_desc' => $this->shortDesc,
                'deskripsi' => $this->deskripsi,
                'kategori' => $this->kategori,
                'lat' => $this->lat,
                'lng' => $this->lng,
            ]);
            if($this->photos){
                foreach($this->wisata->pictures as $picture){
                    if(File::exists(public_path('storage/'.$picture->path))){
                        File::delete(public_path('storage/'.$picture->path));
                    }
                    $picture->delete();
                }
                for($i=0;$i<count($this->photos);$i++){
                    $pictures[$i] = Picture::create([
                        'wisata_id' => $this->wisata->id,
                        'path' => $this->photos[$i]->store('wisata/'.$this->wisata->id, 'public')
                    ]);
                }
            }
            $this->dispatchBrowserEvent('messages', [
                'title' => 'Wisata Berhasil diupdate!',
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
