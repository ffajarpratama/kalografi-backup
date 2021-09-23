<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\status;

class trackingcontroller extends Controller
{

    public function index()
    {
        return view('pages.track.search');
    }

    public function post(Request $request)
    {
        $booking = Booking::query()->findOrFail($request->order_id);
        $status = status::query()->where('booking_id', $booking->id)->first();
        return view('pages.track.trackbook', compact('booking', 'status'));
    }
}
