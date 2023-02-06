<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProducts()
    {
        return view('pages.back.products');
    }
}
