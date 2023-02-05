<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function showCountries()
    {
        $countries = Country::all();
        return view('pages.back.countries', compact('countries'));
    }

    public function addCountry()
    {
        return view('pages.back.add-country');
    }

    public function storeCountry(Request $request)
    {
        $incomingFields = $request->validate(
            [
                'country_name' => ['required'],
                'season_start' => ['required'],
                'season_end' => ['required']
            ],
            [
                'country_name.required' => 'Šalies pavadinimo laukelis privalomas',
                'season_start.required' => 'Sezono pradžios laukelis privalomas',
                'season_end.required' => 'Sezono pabaigos laukelis privalomas',
            ]
        );

        Country::create($incomingFields);

        return redirect()->back()->with('success', 'Sėkmingai pridėjote šalį!');
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
