<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackController extends Controller
{
    public function showOrders()
    {
        return view('pages.back.orders');
    }

    public function showHotels()
    {
        return view('pages.back.hotels');
    }

    public function showCountries()
    {
        return view('pages.back.countries');
    }
}
