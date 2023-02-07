<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        return view('pages.back.offers.offers');
    }

    public function create()
    {
        return view('pages.back.offers.edit-offers');
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
