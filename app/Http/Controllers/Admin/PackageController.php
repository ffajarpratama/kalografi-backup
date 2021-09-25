<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\additionals;
use App\Models\custom;
use App\Models\galeri;
use App\Models\Paket;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Paket::query()->orderBy('created_at', 'DESC')->get();
        return view('pages.admin.packages.index', compact('packages'));
    }

    public function create()
    {
        $additionals = additionals::query()->pluck('name', 'id');
        return view('pages.admin.packages.create', compact('additionals'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'namapaket' => 'required',
            'kategori' => 'required',
            'workhours' => 'required|numeric',
            'day' => 'required',
            'photographers' => 'required',
            'videographers' => 'required',
            'flashdisk' => 'required',
            'edited' => 'required',
            'price' => 'required|numeric',
        ]);

        $additionalServices = json_encode($request->input('additionals'));

        $name_one = $request->file('image_one')->getClientOriginalName();
        $name_two = $request->file('image_two')->getClientOriginalName();
        $name_three = $request->file('image_three')->getClientOriginalName();

        $request->file('image_one')->storeAs('public/assets/product', $name_one);
        $request->file('image_two')->storeAs('public/assets/product', $name_two);
        $request->file('image_three')->storeAs('public/assets/product', $name_three);

        $galeri = galeri::query()->create([
          'image_one' => $name_one,
          'image_two' => $name_two,
          'image_three' => $name_three,
        ]);

        $paket = new Paket();
        $paket->additionals = $additionalServices;
        $paket->fill($validateData);
        $paket->idgaleri = $galeri->id;
        $paket->save();

        return redirect()->back()->with('message', 'Package Created!');
    }

    public function edit(Paket $paket)
    {
        $additionalServices = additionals::query()
            ->whereIn('id', json_decode($paket->additionals))
            ->pluck('id');
        $additionals = additionals::all();
        return view('pages.admin.packages.edit', compact('paket', 'additionalServices', 'additionals'));
    }

    public function update(Request $request, Paket $paket)
    {
        return redirect()->back()->with('message', 'Package Updated!');
    }

    public function destroy(Paket $paket)
    {
        dd($paket);
        return redirect()->back()->with('danger', 'Package Deleted!');
    }
}
