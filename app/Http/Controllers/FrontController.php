<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Offer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontController extends Controller
{

    public function index()
    {
        if (auth()->check()) {
            if (auth()->user()->role == User::ROLES['admin']) {
                return redirect()->route('admin-orders-index');
            }
            if (auth()->user()->role == User::ROLES['customer']) {
                return redirect()->route('home');
            }
        }

        return view('pages.front.home');
    }

    public function home()
    {
        return view('pages.front.home');
    }

    public function offers(Request $request)
    {
        $offers = Offer::all();

        foreach ($offers as $offer) {
            $start = Carbon::parse($offer->travel_start);
            $end = Carbon::parse($offer->travel_end);

            $duration = $start->diffInDays($end) + 1;
            $offer->duration = $duration;
        }

        $offers = match ($request->sort ?? '') {
            'asc_price' => $offers->orderBy('price'),
            'dsc_price' => $offers->orderBy('price', 'desc'),
            default => $offers->orderBy('price')
        };

        $sortSelect = Offer::SORT;
        $sortShow = isset(Offer::SORT[$request->sort]) ? $request->sort : '';

        $offers = $offers->get();

        return view('pages.front.offers', compact('offers', 'sortSelect', 'sortShow'));
    }
}
