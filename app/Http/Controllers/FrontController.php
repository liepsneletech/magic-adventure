<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Hotel;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Services\CartService;
use Illuminate\Support\Facades\Auth;

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

    public function offers(Request $request, CartService $cart)
    {
        if (!$request->s) {
            if ($request->country_id && $request->country_id != 'Pasirinkite šalį') {
                $offers = Offer::where('country_id', $request->country_id)->get();
            } else {
                $offers = Offer::where('country_id', '>', '0')->get();
            }

            $offers = match ($request->sort ?? '') {
                'asc_price' => $offers->sortBy('price'),
                'desc_price' => $offers->sortBy('price', 'desc'),
                default => $offers,
            };
        } else {
            $offers = Offer::search(Hotel::where('title', 'LIKE', '%' . $request->s . '%')?->first()?->id ?? 0)->get();
        }

        foreach ($offers as $offer) {
            if (!is_string($offer) && $offer !== null) {
                $start = Carbon::parse($offer->travel_start);
                $end = Carbon::parse($offer->travel_end);
                $duration = $start->diffInDays($end) + 1;
                $offer->duration = $duration;
            }
        }

        $sortSelect = Offer::SORT;
        $sortShow = isset(Offer::SORT[$request->sort]) ? $request->sort : '';

        $countries = Country::all()->sortBy('country_name');

        $countryShow = $request->country_id ? $request->country_id : '';

        $searchTerm = $request->s;

        return view('pages.front.offers', compact('offers', 'sortSelect', 'sortShow', 'countries', 'countryShow', 'searchTerm'));
    }

    public function search($searchTerm)
    {
        $offers = Offer::search($searchTerm)->get();
        return $offers;
    }

    public function showCatOffers(Request $request, Country $country)
    {
        $offers = Offer::where('country_id', $country->id)->get();
        $countries = Country::all();
        $countryShow = $request->country_id ? $request->country_id : '';
        $sortSelect = Offer::SORT;
        $sortShow = isset(Offer::SORT[$request->sort]) ? $request->sort : '';

        foreach ($offers as $offer) {
            $start = Carbon::parse($offer->travel_start);
            $end = Carbon::parse($offer->travel_end);

            $duration = $start->diffInDays($end) + 1;
            $offer->duration = $duration;
        }
        $offer->duration = $duration;

        return view('pages.front.offers', compact('offers', 'countries', 'countryShow', 'sortSelect', 'sortShow', 'duration'));
    }

    public function addToCart(Request $request, CartService $cart)
    {
        $id = (int) $request->product;
        $count = (int) $request->count;
        $cart->add($id, $count);
        return redirect()->back();
    }

    public function cart(CartService $cart)
    {
        return view('front.cart', [
            'cartList' => $cart->list
        ]);
    }

    public function updateCart(Request $request, CartService $cart)
    {
        if ($request->delete) {
            $cart->delete($request->delete);
        } else {
            $updatedCart = array_combine($request->ids ?? [], $request->count ?? []);
            $cart->update($updatedCart);
        }
        return redirect()->back();
    }

    public function makeOrder(CartService $cart)
    {
        $order = new Order;

        $order->user_id = Auth::user()->id;

        $order->order_json = json_encode($cart->order());

        $order->save();

        $cart->empty();

        return redirect()->route('start');
    }
}