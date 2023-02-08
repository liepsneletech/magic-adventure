<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    public function index(Country $country)
    {
        $countries = Country::all();
        return view('pages.back.countries.countries', compact('countries', 'country'));
    }

    public function create()
    {
        return view('pages.back.countries.create-country');
    }

    public function store(Request $request)
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

    public function edit(Country $country)
    {
        return view('pages.back.countries.edit-country', compact('country'));
    }

    public function update(Request $request, Country $country)
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

    public function delete(Country $country)
    {
        $country->delete();
        return redirect()->back()->with('success', 'Sėkmingai ištrynėte šalį');
    }
}
