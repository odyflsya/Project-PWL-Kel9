<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\AddressCreateRequest;
use App\Models\Address;
use App\Models\DeliveryArea;
use App\Models\Order;
use App\Models\ProductRating;
use App\Models\Reservation;
use App\Models\Wishlist;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    function index() : View {
        $reservations = Reservation::where('user_id', auth()->user()->id)->get();
        $reviews = ProductRating::where('user_id', auth()->user()->id)->get();

        return view('frontend.dashboard.index', compact('reservations', 'reviews'));
    }


}
