<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    public function indexCountry(Country $country)
    {
        $countries = Country::all();
        return view('pages.back.countries', compact('countries'));
    }

    public function createCountry()
    {
        return view('pages.back.create-country');
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

    public function editCountry(Country $country)
    {
        return view('pages.back.edit-country', compact('country'));
    }

    public function updateCountry(Request $request, Country $country)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'country_name' => ['required'],
                'season_start' => ['required'],
                'season_end' => ['required']
            ]
        );

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $country->country_name = $request->country_name;
        $country->season_start = $request->season_start;
        $country->season_end = $request->season_end;

        $country->save();

        return redirect()->back()->with('success', 'Sėkmingai atnaujinote šalį');
    }

    public function deleteCountry(Country $country)
    {
        $country->delete();
        return redirect()->back()->with('success', 'Sėkmingai ištrynėte šalį');
    }
}
