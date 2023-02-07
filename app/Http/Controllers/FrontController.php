<?php

namespace App\Http\Controllers;

use App\Models\User;
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
}