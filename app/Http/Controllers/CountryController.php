<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function showCountries()
    {
        return view('pages.back.countries');
    }

    public function addCountry()
    {
        return view('pages.back.add-country');
    }

    public function storeCountry()
    {
        return redirect()->back();
    }

    public function editCountry()
    {
        return view('pages.back.edit-country');
    }

    public function updateCountry()
    {
        return redirect()->back();
    }

    public function deleteCountry()
    {
        return redirect()->back();
    }
}
