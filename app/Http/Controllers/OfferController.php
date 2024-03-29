<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Offer;
use App\Models\Country;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index(Request $request)
    {
        $offers = Offer::all();

        foreach ($offers as $offer) {
            $start = Carbon::parse($offer->travel_start);
            $end = Carbon::parse($offer->travel_end);

            $duration = $start->diffInDays($end) + 1;
            $offer->duration = $duration;
        }

        return view('pages.back.offers.offers', compact('offers'));
    }

    public function create(Offer $offer, Request $request)
    {
        $countries = Country::all();
        $hotels = Hotel::all();

        return view('pages.back.offers.create-offer', compact('countries', 'hotels', 'offer'));
    }

    public function store(Request $request)
    {
        $incomingFields = $request->validate(
            [
                'title' => ['required'],
                'travel_start' => ['required'],
                'travel_end' => ['required'],
                'price' => ['required'],
                'hotel_id' => ['required'],
                'country_id' => ['required'],
            ],
            [
                'title.required' => 'Pasiūlymo pavadinimo laukelis privalomas',
                'travel_start.required' => 'Kelionės pradžios laukelis privalomas',
                'travel_end.required' => 'Kelionės pabaigos laukelis privalomas',
                'price.required' => 'Kainos laukelis privalomas',
                'hotel_id.required' => 'Privaloma pasirinkti viešbutį',
                'country_id.required' => 'Privaloma pasirinkti šalį',
            ]
        );

        Offer::create($incomingFields);

        return redirect()->back()->with('success', 'Sėkmingai pridėjote pasiūlymą!');
    }

    public function edit(Offer $offer)
    {
        $countries = Country::all();
        $hotels = Hotel::all();
        return view('pages.back.offers.edit-offer', compact('hotels', 'countries', 'offer'));
    }

    public function update(Request $request, Offer $offer)
    {
        $incomingFields = $request->validate(
            [
                'title' => ['required'],
                'travel_start' => ['required'],
                'travel_end' => ['required'],
                'price' => ['required'],
                'hotel_id' => ['required'],
                'country_id' => ['required'],
            ],
            [
                'title.required' => 'Pasiūlymo pavadinimo laukelis privalomas',
                'travel_start.required' => 'Kelionės pradžios laukelis privalomas',
                'travel_end.required' => 'Kelionės pabaigos laukelis privalomas',
                'price.required' => 'Kainos laukelis privalomas',
                'hotel.required' => 'Privaloma pasirinkti viešbutį',
                'country.required' => 'Privaloma pasirinkti šalį',
            ]
        );

        $offer->update($incomingFields);

        return redirect()->back()->with('success', 'Sėkmingai atnaujinote pasiūlymą!');
    }

    public function delete(Offer $offer)
    {
        $offer->delete();
        return redirect()->back()->with('success', 'Sėkmingai ištrynėte pasiūlymą');
    }

    public function showCountryHotels(Country $country)
    {
        $hotels = Hotel::where('country_id', $country->id)->get();
        $countries = Country::all();

        return response()->json([$hotels, $countries]);
    }
}
