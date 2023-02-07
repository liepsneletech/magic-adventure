<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Country;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        return view('pages.back.offers.offers');
    }

    public function create()
    {
        $countries = Country::all();
        $hotels = Hotel::all();
        return view('pages.back.offers.create-offer', compact('countries', 'hotels'));
    }

    public function store()
    {
        return redirect()->back()->with('success', 'Sėkmingai pridėjote viešbutį!');
    }

    public function edit()
    {
        return view('pages.back.hotels.edit-hotel', compact('hotel', 'countries', 'country'));
    }

    public function update()
    {
        return redirect()->back()->with('success', 'Sėkmingai atnaujinote šalį');
    }

    public function delete()
    {
    }
}
