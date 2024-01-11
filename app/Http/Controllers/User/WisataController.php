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
        return view('pages.user.wisata.index');
    }
    
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $wisata = Wisata::findOrFail($id);
        return view('pages.user.wisata.show', compact('wisata'));
    }
}
