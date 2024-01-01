<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.user.index');
    }

    public function wisataShow($id)
    {
        $id = Crypt::decrypt($id);
        $wisata = Wisata::findOrFail($id);
        return view('pages.user.wisata.show', compact('wisata'));
    }
}
