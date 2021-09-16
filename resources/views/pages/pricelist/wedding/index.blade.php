@extends('layouts.guest.master')
@section('content')
    <div class="container-fluid py-5" style="background-color: #FAFBFA">
        <div class="container">
            <div class="row text-center mb-5">
                <h3 class="semi-bold fs-1 mb-0" style="color: #8F9C69; letter-spacing: -1px;">
                    Wedding Documentation Package
                </h3>
            </div>

            <div class="row row-cols-1 row-cols-md-3">
                @foreach ($package as $package)
                    @if ($package->kategori == 'Wedding Package')
                        <form action="/pricelist/post" method="post">
                            {{ csrf_field() }}
                            <div class="col">
                                <div class="card border-0 shadow-sm" style="border-radius: 20px;">
                                    <img src="{{ asset('storage/assets/product/' . $package->galeris->image_one) }}"
                                        class="card-img-top" alt="..." style="border-radius: 15px; ">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="card-title text-center my-2">
                                                <input type="hidden" name="paket_id" value="{{ $package->id }}">
                                                <h4 class="semi-bold text-secondary" style="letter-spacing: -0.5px">
                                                    {{ $package->namapaket }} <br>
                                                    {{ $package->kategori }}
                                                </h4>
                                            </div>
                                        </div>

                                        <div class="row text-center">
                                            <p class="small">{{ $package->day }}</p>
                                        </div>

                                        <div class="row text-center mb-3">
                                            <h5 class="text-bold text-kalografi">IDR {{ number_format($package->price) }}
                                            </h5>
                                        </div>

                                        <div class="row text-center mb-4">
                                            <small class="mb-2">{{ $package->workhours }} Work Hours</small>
                                            <small class="mb-2">{{ $package->photographers }} Photographer +
                                                {{ $package->videographers }}
                                                Videographer</small>
                                            <small class="mb-2">Flashdisk Include All Files</small>
                                            <small>{{ $package->edited }} Edited Photos</small>
                                        </div>

                                        <div class="row justify-content-center mb-3">
                                            <div class="col-md-6 text-kalografi text-center ">
                                                <button type="submit" class="btn btn-kalografi btn-sm text-bold"
                                                    style="width: 100%; height:150%">
                                                    Book Now
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif
                @endforeach
            </div>

            @include('pages.partials.custom')

        </div>
    </div>
@include(' layouts.partials.footer') @endsection
