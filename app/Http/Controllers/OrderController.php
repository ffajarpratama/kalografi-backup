<?php

namespace App\Http\Controllers;

use App\Models\additionals;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Paket;
use App\Models\galeri;
use App\Models\discount;
use App\Models\printedphoto;
use App\Models\photobook;
use App\Models\status;
use App\Models\custom;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Empty_;

class OrderController extends Controller
{


    public function order(Request $request)
    {
        if (session()->has('booking')) {
            $booking = $request->session()->get('booking');
            $package = Paket::query()->where('id', $booking->paket_id)->first();
            $pp = printedphoto::query()->where('id', $booking->printedphoto)->first();
            $pb = photobook::query()->where('id', $booking->photobook)->first();
        } else {
            return redirect('/');
        }
        return view('pages.pricelist.order.create', compact('booking', 'package', 'pp', 'pb'));
    }

    public function checkout(Request $request)
    {

        if (session()->has('booking')) {
            $discount = discount::all();
            $booking = $request->session()->get('booking');
            $package = Paket::query()->where('id', $booking->paket_id)->first();
            $pp = printedphoto::query()->where('id', $booking->printedphoto)->first();
            $pb = photobook::query()->where('id', $booking->photobook)->first();
            return view('pages.pricelist.order.checkout', compact('booking', 'package', 'discount', 'pp', 'pb'));
        } else {
            return redirect('/');
        }
    }

    public function payment()
    {
        return view('pages.pricelist.order.payment');
    }

    public function postCreateStep1(Request $request)
    {
        $validatedData = $request->validate([
            'paket_id' => 'required',
            'bookdate' => 'required',
            'printedphoto' => 'required',
            'ppqty' => 'required',
            'photobook' => 'required',
            'pbqty' => 'required',
        ]);
        $packageprice = Paket::query()->where('id', $request->paket_id)->value('price');
        $printedphotoprice  = printedphoto::query()->where('id', $request->printedphoto)->value('price') * $request->ppqty;
        $photobookprice  = photobook::query()->where('id', $request->photobook)->value('price') * $request->pbqty;
        $totalprice = $packageprice + $printedphotoprice + $photobookprice;



        if (empty($request->session()->get('booking'))) {
            $booking = new Booking();
            $booking->fill([
                'paket_id' => $validatedData['paket_id'],
                'bookdate' => $validatedData['bookdate'],
                'printedphoto' => $validatedData['printedphoto'],
                'ppqty' => $validatedData['ppqty'],
                'photobook' => $validatedData['photobook'],
                'pbqty' => $validatedData['pbqty'],
                'totalprice' => $totalprice
            ]);
            $request->session()->put('booking', $booking);
        } else {
            $booking = $request->session()->get('booking');
            $booking->fill([
                'paket_id' => $validatedData['paket_id'],
                'bookdate' => $validatedData['bookdate'],
                'printedphoto' => $validatedData['printedphoto'],
                'ppqty' => $validatedData['ppqty'],
                'photobook' => $validatedData['photobook'],
                'pbqty' => $validatedData['pbqty'],
                'totalprice' => $totalprice
            ]);
            $request->session()->put('booking', $booking);
        }
        return redirect('/pricelist/order/details');
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
            'address' => 'required',
            'discount_id' => 'nullable',
            'payment_termination' => 'nullable',
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
        return redirect('/pricelist/order/checkout');
    }
    public function store(Request $request)
    {
        $booking = $request->session()->get('booking');
        $custom = $request->session()->get('custom');
        $booking->payment_termination = $request->payment_termination;
        $booking->totalprice = $request->totalprice;
        $booking->discount_id = $request->discount_id;


        if ($booking->paket_id == 0) {
            $custom->save();
            $booking->paket_id = null;
            $booking->custom_id = $custom->id;
        }

        $booking->save();
        session()->flush();

        Status::create([
            'booking_id' => $booking->id
        ]);
        return redirect('payment-confirmation');
    }

    public function postpaket()
    {
        $data = Booking::all();
        return view('pages.post', compact('data'));
    }

    public function custom(Request $request)
    {
        $product = $request->session()->get('booking');
        $printedphoto = printedphoto::all();
        $photobook = photobook::all();
        $additionals = additionals::all();
        return view('pages.custom.customisation', compact('printedphoto', 'photobook', 'product', 'additionals'));
    }


    public function postcustom(Request $request)
    {
        $additionals = $request->input('additionals');
        $additionalsjson = json_encode($additionals);
        $additionalPrice = 0;


        foreach ($additionals as $additional) {
            $additionalData = additionals::query()->where('id', $additional)->value('price');
            $additionalPrice += $additionalData;
        }

        $validatedDataCustom = $request->validate([
            'photographer' => 'required',
            'videographer' => 'required',
            'workhours' => 'required',
            'drone' => 'nullable',
            'one_minute_cinematic_video' => 'nullable',
            'three_minute_cinematic_video' => 'nullable',
            'flashdisk' => 'nullable',
            'live_streaming' => 'nullable',
            'full_documentation_video' => 'nullable',

        ]);

        if (empty($request->session()->get('custom'))) {
            $custom = new custom();
            $custom->additionals = $additionalsjson;
            $custom->fill($validatedDataCustom);
            $request->session()->put('custom', $custom);
        } else {
            $custom = $request->session()->get('custom');
            $custom->additionals = $additionalsjson;
            $custom->fill($validatedDataCustom);
            $request->session()->put('custom', $custom);
        };


        $validatedData = $request->validate([
            'paket_id' => 'required',
            'bookdate' => 'required',
            'printedphoto' => 'required',
            'ppqty' => 'required',
            'photobook' => 'required',
            'pbqty' => 'required',

        ]);
        $totalprice = $request->input('totalprice');

        if (empty($request->session()->get('booking'))) {
            $booking = new Booking();
            $booking->fill($validatedData);
            $booking->totalprice = $totalprice;
            $request->session()->put('booking', $booking);
        } else {
            $booking = $request->session()->get('booking');
            $booking->fill($validatedData);
            $booking->totalprice = $totalprice;
            $request->session()->put('booking', $booking);
        };



        return redirect('pricelist/wedding/order/details');
    }
}
