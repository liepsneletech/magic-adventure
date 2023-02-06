<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Country;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Validator;

class HotelController extends Controller
{

    public function showHotels()
    {
        $hotels = Hotel::all();
        return view('pages.back.hotels', compact('hotels'));
    }

    public function createHotel()
    {
        $countries = Country::all();
        return view('pages.back.create-hotel', compact('countries'));
    }

    public function storeHotel(Request $request)
    {
        $hotel = new Hotel;

        $validator = Validator::make(
            $request->all(),
            [
                'country_id' => ['required'],
                'title' => ['required'],
                'desc' => ['required'],
                'price' => ['required']
            ]
        );

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        if ($request->file('image')) {
            $image = $request->file('image');

            $ext = $image->getClientOriginalExtension();
            $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name . '-' . rand(100000, 999999) . '.' . $ext;

            if ($hotel->image) {
                $hotel->deleteimage();
            }

            $manager = new ImageManager(['driver' => 'GD']);
            $image = $manager->make($image);
            $image->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->crop(500, 300);
            $image->save(public_path() . '/uploads/hotels/' . $file);
            $hotel->image = '/uploads/hotels/' . $file;
        }

        $hotel->country_id = $request->country_id;
        $hotel->title = $request->title;
        $hotel->desc = $request->desc;
        $hotel->price = $request->price;

        $hotel->save();

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
