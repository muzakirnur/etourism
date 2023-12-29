<?php

namespace App\Http\Livewire\Wisata;

use App\Models\Picture;
use App\Models\Wisata;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $nama;
    public $kategori;
    public $deskripsi;
    public $photos = [];
    public $lat;
    public $lng;

    protected $rules = [
        'nama' => ['required', 'string', 'max:255'],
        'kategori' => ['required'],
        'deskripsi' => ['required'],
        'photos.*' => ['mimes:jpg,png,jpeg'],
        'lat' => ['required'],
        'lng' => ['required']
    ];

    public function render()
    {
        return view('livewire.wisata.create');
    }

    public function submit()
    {
        try{
            $this->validate();
            $wisata = Wisata::create([
                'nama' => $this->nama,
                'deskripsi' => $this->deskripsi,
                'kategori' => $this->kategori,
                'lat' => $this->lat,
                'lng' => $this->lng,
            ]);
            for($i=0;$i<count($this->photos);$i++){
                $pictures[$i] = Picture::create([
                    'wisata_id' => $wisata->id,
                    'path' => $this->photos[$i]->store('wisata/'.$wisata->nama, 'public')
                ]);
            }
            $this->dispatchBrowserEvent('messages', [
                'title' => 'Wisata Berhasil ditambahkan!',
                'icon' => 'success',
                'iconColor' => 'green'
            ]);
            $this->emit('wisataAdded');
            $this->reset();
        }catch(\Exception $e){
            dd($e->getMessage());
            if(isset($wisata)){
                if($wisata->pictures){
                    foreach($wisata->pictures as $picture){
                        $picture->delete();
                    }
                }
                $wisata->delete();
            }
            $this->dispatchBrowserEvent('messages', [
                'title' => 'Wisata Gagal ditambahkan!',
                'icon' => 'danger',
                'iconColor' => 'red'
            ]);
        }
    }
}
