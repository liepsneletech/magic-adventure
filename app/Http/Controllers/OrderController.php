<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showOrders()
    {
        return view('pages.back.orders');
    }

    public function updateOrder()
    {
        return redirect()->back();
    }
}
