<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('pages.back.orders.orders');
    }

    public function create()
    {
        return 'create';
    }

    public function store()
    {
        return 'store';
    }

    public function edit()
    {
        return 'edit';
    }

    public function update()
    {
        return 'update';
    }

    public function delete()
    {
        return 'delete';
    }
}
