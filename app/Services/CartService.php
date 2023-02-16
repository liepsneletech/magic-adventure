<?php

namespace App\Services;

use App\Models\Offer;
use Illuminate\Support\Facades\Auth;

class CartService
{

  private $cart, $cartList, $total = 0, $count = 0;

  public function __construct()
  {
    $this->cart = session()->get('cart', []);

    $ids = array_keys($this->cart);

    $this->cartList = Offer::whereIn('id', $ids)
      ->get()
      ->map(function ($offer) {
        $offer->count = $this->cart[$offer->id];
        $offer->sum = $offer->count * $offer->price;
        $this->total += $offer->sum;
        return $offer;
      });

    $this->count = $this->cartList->count();
  }

  public function __get($props)
  {
    return match ($props) {
      'total' => $this->total,
      'count' => $this->count,
      'list' => $this->cartList,
      default => null
    };
  }

  public function add(int $id, int $count)
  {
    if (isset($this->cart[$id])) {
      $this->cart[$id] += $count;
    } else {
      $this->cart[$id] = $count;
    }
    session()->put('cart', $this->cart);
  }

  public function update(array $cart)
  {
    session()->put('cart', $cart);
  }


  public function delete(int $id)
  {
    unset($this->cart[$id]);
    session()->put('cart', $this->cart);
  }

  public function order()
  {
    $order = (object)[];
    $order->total = $this->total;
    $order->offers = [];

    $name = Auth::user()->name;
    $surname = Auth::user()->surname;
    $order->name = $name;
    $order->surname = $surname;

    foreach ($this->cartList as $offer) {
      $order->offers[] = (object)[
        'id' => $offer->id,
        'title' => $offer->title,
        'count' => $offer->count,
        'price' => $offer->price,
        'travel_start' => $offer->travel_start,
        'travel_end' => $offer->travel_end,
        'country_name' => $offer->country->country_name,
        'hotel_title' => $offer->hotel->title
      ];
    }

    return $order;
  }

  public function empty()
  {
    session()->put('cart', []);
    $this->total = 0;
    $this->count = 0;
    $this->cartList = collect();
    $this->cart = [];
  }
}
