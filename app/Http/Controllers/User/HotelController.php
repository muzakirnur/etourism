<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class HotelController extends Controller
{
    public function index()
    {
        return view('pages.user.hotel.index');
    }

    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $hotel = Hotel::findOrFail($id);
        return view('pages.user.hotel.show', compact('hotel'));
    }
}
