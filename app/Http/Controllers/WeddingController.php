<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\galeri;
use App\Models\photobook;
use App\Models\printedphoto;
use App\Models\Paket;
use Illuminate\Support\Facades\DB;

class WeddingController extends Controller
{
    public function index(Request $request)
    {
        $request->session()->forget('booking');
        $products = Booking::all();
        return view('pages.pricelist.wedding.index');
    }

    public function show(Request $request)
    {
        $product = $request->session()->get('booking');
        $printedphoto = printedphoto::all();
        $photobook = photobook::all();



        return view('pages.pricelist.wedding.show', compact('product', 'printedphoto', 'photobook'));
    }

    public function createStep1(Request $request)
    {
        $product = $request->session()->get('booking');
        return view('pages.pricelist.wedding.show', compact('product', $product));
    }

    public function postCreateStep1(Request $request)
    {



        $validatedData = $request->validate([
            'paket_id' => 'required',
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
                'printedphoto' => $validatedData['printedphoto'],
                'ppqty' => $validatedData['ppqty'],
                'photobook' => $validatedData['photobook'],
                'pbqty' => $validatedData['pbqty'],
                'totalprice' => $totalprice
            ]);
            $request->session()->put('booking', $booking);
        }
        return redirect('/pricelist/wedding/mahawira/order');
    }
}
