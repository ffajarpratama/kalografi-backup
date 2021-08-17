@extends('layouts.guest.master')
@section('content')
    <div class="container-fluid py-5" style="background-color: #FAFBFA">
        <div class="container">
            <div class="row text-center mb-5">
                <h3 class="semi-bold fs-1 mb-0" style="color: #8F9C69; letter-spacing: -1px;">
                    Pre-Wedding Documentation Package
                </h3>
            </div>

            <div class="row row-cols-1 row-cols-md-3">
                <div class="col">
                    <div class="card border-0 shadow-sm" style="border-radius: 20px;">
                        <img src="{{ asset('placeholders/mahesa.png') }}"
                             class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="row">
                                <div class="card-title text-center my-2">
                                    <h4 class="semi-bold text-secondary" style="letter-spacing: -0.5px">
                                        Mahesa<br>
                                        Wedding Package
                                    </h4>
                                </div>
                            </div>

                            <div class="row text-center">
                                <p class="small">Half Day / Full Day</p>
                            </div>

                            <div class="row text-center mb-3">
                                <h5 class="text-bold text-kalografi">IDR 3,500,000</h5>
                            </div>

                            <div class="row text-center mb-4">
                                <small class="mb-2">8/15 Work Hours</small>
                                <small class="mb-2">1 Photographer + 1 Videographer</small>
                                <small class="mb-2">Flashdisk Include All Files</small>
                                <small>300/500 Edited Photos</small>
                            </div>

                            <div class="row justify-content-center mb-3">
                                <div class="col-md-6 text-kalografi">
                                    <a href="#" class="btn btn-kalografi btn-sm" style="display: block;">
                                        Book Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-0 shadow-sm" style="border-radius: 20px;">
                        <img src="{{ asset('placeholders/manendra.png') }}"
                             class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="row">
                                <div class="card-title text-center my-2">
                                    <h4 class="semi-bold text-secondary" style="letter-spacing: -0.5px">
                                        Manendra<br>
                                        Wedding Package
                                    </h4>
                                </div>
                            </div>

                            <div class="row text-center">
                                <p class="small">Full Day</p>
                            </div>

                            <div class="row text-center mb-3">
                                <h5 class="text-bold text-kalografi">IDR 5,500,000</h5>
                            </div>

                            <div class="row text-center mb-4">
                                <small class="mb-2">15 Work Hours</small>
                                <small class="mb-2">2 Photographer + 1 Videographer</small>
                                <small class="mb-2">Flashdisk Include All Files</small>
                                <small>500 Edited Photos</small>
                            </div>

                            <div class="row justify-content-center mb-3">
                                <div class="col-md-6 text-kalografi">
                                    <a href="#" class="btn btn-kalografi btn-sm" style="display: block;">
                                        Book Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-0 shadow-sm" style="border-radius: 20px;">
                        <img src="{{ asset('placeholders/mahawira.png') }}"
                             class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="row">
                                <div class="card-title text-center my-2">
                                    <h4 class="semi-bold text-secondary" style="letter-spacing: -0.5px">
                                        Mahawira<br>
                                        Wedding Package
                                    </h4>
                                </div>
                            </div>

                            <div class="row text-center">
                                <p class="small">Full Day</p>
                            </div>

                            <div class="row text-center mb-3">
                                <h5 class="text-bold text-kalografi">IDR 7,500,000</h5>
                            </div>

                            <div class="row text-center mb-4">
                                <small class="mb-2">15 Work Hours</small>
                                <small class="mb-2">2 Photographer + 2 Videographer</small>
                                <small class="mb-2">Flashdisk Include All Files</small>
                                <small>All Edited Photos</small>
                            </div>

                            <div class="row justify-content-center mb-3">
                                <div class="col-md-6 text-kalografi">
                                    <a href="{{ route('pricelist.wedding.show') }}" class="btn btn-kalografi btn-sm" style="display: block;">
                                        Book Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.partials.footer')
@endsection
