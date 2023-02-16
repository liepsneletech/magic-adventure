<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at')
            ->get()
            ->map(function ($order) {
                $order->offers = json_decode($order->order_json);
                return $order;
            });
        return view('pages.back.orders.orders', ['orders' => $orders]);
    }

    public function update(Request $request, Order $order)
    {
        $order->status = 1;
        $order->save();

        return redirect()->back();
    }

    public function destroy(Order $order)
    {
        if ($order->status == 0) {
            return redirect()->back()->with('not', 'You can not delete unfinished orders');
        }
        $order->delete();
        return redirect()->back();
    }
}
