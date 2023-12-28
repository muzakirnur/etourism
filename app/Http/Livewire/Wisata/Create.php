<?php

namespace App\Http\Livewire\Wisata;

use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $nama;
    public $kategori;
    public $deskripsi;
    public $totalPhotos=1;
    public $photos = [];

    protected $rules = [
        'nama' => ['required', 'string', 'max:255'],
        'kategori' => ['required'],
        'deskripsi' => ['required'],
        'photos.*' => ['mimes:jpg,png,jpeg'],
    ];

    public function render()
    {
        return view('livewire.wisata.create');
    }

    public function addTotal()
    {
        $this->totalPhotos++;
    }
}
