<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;

class CardController extends Controller
{
    public function index($category)
    {
        $cards = Card::where('category', $category)->get();
        return view($category, compact('cards'));
    }

    public function showAllCards()
    {
        $cards = Card::all();
        return view('dashboard', compact('cards'));
    }
}

