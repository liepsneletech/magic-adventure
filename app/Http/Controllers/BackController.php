<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackController extends Controller
{
    public function orders()
    {
        return view('pages.back.orders');
    }
}
