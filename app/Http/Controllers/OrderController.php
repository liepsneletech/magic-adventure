<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;

        $orders = Order::all()
            ->map(function ($order) {
                $order->order_json = json_decode($order->order_json);

                return $order;
            });

        return view('pages.back.orders.orders', compact('orders'));
    }

    public function update(Order $order)
    {
        $order->status = 1;
        $order->save();

        return redirect()->back();
    }

    public function delete(Order $order)
    {
        if ($order->status == 0) {
            return redirect()->back()->with('not', 'You can not delete unfinished orders');
        }
        $order->delete();
        return redirect()->back();
    }
}
