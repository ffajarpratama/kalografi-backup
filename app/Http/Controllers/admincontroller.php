<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Paket;
use App\Models\status;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class admincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */

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

    public function dashboard()
    {
        return view('pages.admin.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return RedirectResponse
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
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
