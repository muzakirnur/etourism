<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\User;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.user.index', compact('wisata', 'user', 'hotel'));
    }
}
