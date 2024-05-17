<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function redirects()
    {
        $user = Auth::user();

        if ($user->usertype == 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('dashboard');
        }
    }
}
