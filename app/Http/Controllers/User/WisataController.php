<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\User;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class WisataController extends Controller
{
    public function index()
    {
        $wisata = count(Wisata::all());
        $user = count(User::all());
        $hotel = count(Hotel::all());
        return view('pages.user.index', compact('wisata', 'user', 'hotel'));
    }
    
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $wisata = Wisata::findOrFail($id);
        return view('pages.user.wisata.show', compact('wisata'));
    }
}
