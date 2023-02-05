<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{

    public function showHotels()
    {
        $hotels = Hotel::all();
        return view('pages.back.hotels', compact('hotels'));
    }

    public function addHotel()
    {
        $countries = Country::all();
        return view('pages.back.add-hotel', compact('countries'));
    }

    public function storeHotel(Request $request)
    {
        $incomingFields = $request->validate(
            [
                'country' => ['required'],
                'title' => ['required'],
                'desc' => ['required'],
                'price' => ['required'],
                'image' => [],
                'duration' => ['required'],
            ],
            [
                'country' => 'Šalies laukelis privalomas',
                'title.required' => 'Viešbučio pavadinimo laukelis privalomas',
                'desc.required' => 'Aprašymo laukelis privalomas',
                'price' => 'Kainos laukelis privalomas',
                'image' => 'Nuotraukos įkėlimas privalomas',
                'duration' => 'Kelionės trukmės laukelis privalomas',
            ]
        );

        Hotel::create($incomingFields);

        return redirect()->back()->with('success', 'Sėkmingai pridėjote viešbutį!');
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
