<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Paket;
use App\Models\photobook;
use App\Models\printedphoto;
use App\Models\status;
use Illuminate\Support\Facades\Redirect;

class admincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('pages.admin.index');
    }

    public function post(Request $request)
    {
        $booking = Booking::query()->findOrFail($request->order_id);
        $status = status::query()->where('booking_id', $booking->id)->first();
        $package = Paket::all();
        return view('pages.admin.adminsearch', compact('booking', 'status', 'package'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $idbooking = $request->bookingid;
        $status = status::query()->where('booking_id', $idbooking)->first();
        $status->current_status = $request->status_value;
        $status->save();
        return Redirect::back()->with('message', 'Operation Successful !');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
