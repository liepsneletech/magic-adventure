<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Offer;
use App\Models\Country;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index(Offer $offer)
    {
        $offers = Offer::all();

        // $offerStartDate = $offer->travel_start;
        // $offerEndDate = $offer->travel_end;

        // $duration = $offerStartDate->diffInDays($offerEndDate, false);

        return view('pages.back.offers.offers', compact('offers'));
    }

    public function create(Offer $offer)
    {
        $countries = Country::all();
        $hotels = Hotel::all();
        return view('pages.back.offers.create-offer', compact('countries', 'hotels'));
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

    public function showCountryHotels()
    {
        return view('components.coutry-hotels-select');
    }
}
