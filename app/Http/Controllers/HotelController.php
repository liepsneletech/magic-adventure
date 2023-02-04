<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelController extends Controller
{

    public function showHotels()
    {
        return view('pages.back.hotels');
    }

    public function addHotel()
    {
        return view('pages.back.add-hotel');
    }

    public function storeHotel()
    {
        return redirect()->back();
    }

    public function editHotel()
    {
        return view('pages.back.edit-hotel');
    }

    public function updateHotel()
    {
        return redirect()->back();
    }

    public function deleteHotel()
    {
        return redirect()->back();
    }
}
