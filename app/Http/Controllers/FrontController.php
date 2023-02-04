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
                return redirect()->route('admin-home');
            }
            if (auth()->user()->role == User::ROLES['customer']) {
                return redirect()->route('customer-home');
            }
        }

        return view('pages.front.home');
    }

    public function adminHome()
    {
        return view('pages.back.home');
    }

    public function customerHome()
    {
        return view('pages.front.home');
    }
}