<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Paket;
use App\Models\galeri;
use App\Models\discount;
use App\Models\printedphoto;
use App\Models\photobook;
use Illuminate\Contracts\Session\Session;
use PhpParser\Node\Expr\Empty_;

class OrderController extends Controller
{
    public function order(Request $request)
    {
        $booking = $request->session()->get('booking');
        $package = Paket::query()->where('id', $booking->paket_id)->first();
        $pp = printedphoto::query()->where('id', $booking->printedphoto)->first();
        $pb = photobook::query()->where('id', $booking->photobook)->first();
        return view('pages.pricelist.order.create', compact('booking', 'package', 'pp', 'pb'));
    }

    public function checkout(Request $request)
    {
        $discount = discount::all();
        $booking = $request->session()->get('booking');


        if (session()->has('booking')) {
            $package = Paket::query()->where('id', $booking->paket_id)->first();
            $pp = printedphoto::query()->where('id', $booking->printedphoto)->first();
            $pb = photobook::query()->where('id', $booking->photobook)->first();
            return view('pages.pricelist.order.checkout', compact('booking', 'package', 'discount', 'pp', 'pb'));
        } else {
            return redirect('pricelist/wedding');
        }
    }

    public function payment()
    {
        return view('pages.pricelist.order.payment');
    }

    public function kirim(Request $request)
    {

        $validatedData = $request->validate([
            'venue' => 'required',
            'tone' => 'required',
            'weddingstyle' => 'required',
            'fullname' => 'required',
            'email' => 'required',
            'phonenumber' => 'required',
            'discount_id' => 'nullable',
        ]);

        if (empty($request->session()->get('booking'))) {
            $booking = new Booking();
            $booking->fill($validatedData);
            $request->session()->put('booking', $booking);
        } else {
            $booking = $request->session()->get('booking');
            $booking->fill($validatedData);
            $request->session()->put('booking', $booking);
        }
        return redirect('/pricelist/wedding/mahawira/checkout');
    }
    public function store(Request $request)
    {
        $booking = $request->session()->get('booking');
        $booking->totalprice = $request->totalprice;
        $booking->discount_id = $request->discount_id;
        $booking->save();
        session()->flush();
        return redirect('payment-confirmation');
    }

    public function postpaket()
    {

        $data = Booking::all();
        return view('pages.post', compact('data'));
    }
    public function storeimage(Request $request)

    {


        $data = $request->all();
        $data['image'] = $request->file('image')->store('assets', 'public');
        galeri::create($data);

        return back();
    }
}
