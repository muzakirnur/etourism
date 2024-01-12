<?php

namespace App\Http\Livewire\User;

use App\Mail\Contact as MailContact;
use App\Notifications\Contact as NotificationsContact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class Contact extends Component
{
    public $pesan;
    public $nama;
    public $phone;
    public $email;

    protected $rules = [
        'nama' => ['required', 'string', 'max:255'],
        'phone' => ['required', 'numeric'],
        'pesan' => ['required'],
    ];

    public function render()
    {
        return view('livewire.user.contact');
    }

    public function submit()
    {
        $this->validate();
        $mailData = [
            'nama' => $this->nama,
            'email' => $this->email,
            'phone' => $this->phone,
            'pesan' => $this->pesan
        ];
        Notification::route('mail', env('MAIL_FROM_ADDRESS', 'muzakir.nurr@gmail.com'))->notify(new NotificationsContact($mailData));
        $this->dispatchBrowserEvent('messages', [
            'title' => 'Pesan Berhasil dikirim!',
            'icon' => 'success',
            'iconColor' => 'green'
        ]);
        $this->reset();
    }
}
