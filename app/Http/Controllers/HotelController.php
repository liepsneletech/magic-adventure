<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;

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
                'country_id' => ['required'],
                'title' => ['required'],
                'desc' => ['required'],
                'price' => ['required'],
                'image' => ['required'],
            ],
            [
                'country_id.required' => 'Šalies laukelis privalomas',
                'title.required' => 'Viešbučio pavadinimo laukelis privalomas',
                'desc.required' => 'Aprašymo laukelis privalomas',
                'price' => 'Kainos laukelis privalomas',
                'image' => 'Nuotraukos įkėlimas privalomas',
            ]
        );

        $hotel = new Hotel;

        if ($request->file('image')) {
            $image = $request->file('image');

            $ext = $image->getClientOriginalExtension();
            $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name . '-' . rand(100000, 999999) . '.' . $ext;

            if ($hotel->image) {
                $hotel->deleteimage();
            }
            $image->move(public_path() . '/uploads/hotels', $file);
            $hotel->image = '/uploads/hotels/' . $file;
        }

        $hotel = Hotel::create($incomingFields);

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
