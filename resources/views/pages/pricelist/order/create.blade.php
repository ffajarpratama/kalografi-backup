@extends('layouts.guest.master')
@section('content')
    <div class="container-fluid py-5" style="background-color: #FAFBFA">
        <div class="container">
            <form action="/pricelist/wedding/mahawira/order" method="post">
                {{ csrf_field() }}
                <div class="row justify-content-between">
                    <div class="col-md-5">
                        <form action="/pricelist/wedding/mahawira/order" method="post">
                            {{ csrf_field() }}
                            <div class="row mb-3">
                                <h3 class="fs-1 fw-bold text-secondary">Order Details</h3>
                            </div>

                            <div class="row mb-3">
                                <p class="text-secondary">
                                    Help us to know what kind of service that you want!
                                </p>
                            </div>

                            <div class="mb-5">
                                <div class="row ps-4 mb-3">
                                    <p class="text-secondary px-0 mb-2 semi-bold">Venue</p>
                                    <div class="form-check form-check-inline mb-3 px-0">

                                        <input type="radio" class="btn-check" name="venue" id="outdoor" autocomplete="off"
                                            onchange="changevenuevalue()" checked value="Outdoor">
                                        <label class="btn btn-check-kalografi mb-1" for="outdoor"
                                            style="width: 8rem;">Outdoor</label>

                                        <input type="radio" class="btn-check" name="venue" id="indoor" autocomplete="off"
                                            onchange="changevenuevalue() " value="Indoor">
                                        <label class="btn btn-check-kalografi mb-1" for="indoor"
                                            style="width: 8rem;">Indoor</label>

                                    </div>
                                </div>

                                <div class="row ps-4 mb-3">
                                    <p class="text-secondary px-0 mb-2 semi-bold">Tone</p>
                                    <div class="form-check form-check-inline px-0">
                                        <input type="radio" class="btn-check" name="tone" id="warm"
                                            onchange="changetonevalue()" checked value="Warm">
                                        <label class="btn btn-check-kalografi mb-1" for="warm"
                                            style="width: 8rem;">Warm</label>

                                        <input type="radio" class="btn-check" name="tone" id="moody"
                                            onchange="changetonevalue()" value="Moody">
                                        <label class="btn btn-check-kalografi mb-1" for="moody"
                                            style="width: 8rem;">Moody</label>

                                        <input type="radio" class="btn-check" name="tone" id="light&airy"
                                            onchange="changetonevalue()" value="Light&Airy">
                                        <label class="btn btn-check-kalografi mb-1" for="light&airy"
                                            style="width: 8rem;">Light
                                            & Airy</label>
                                    </div>
                                    <div class="form-check form-check-inline mb-3 px-0">
                                        <input type="radio" class="btn-check" name="tone" id="film_look"
                                            onchange="changetonevalue()" value="Film Look">
                                        <label class="btn btn-check-kalografi mb-1" for="film_look"
                                            style="width: 8rem;">Film
                                            Look</label>

                                        <input type="radio" class="btn-check" name="tone" id="cinematic"
                                            onchange="changetonevalue()" value="Cinematic">
                                        <label class="btn btn-check-kalografi mb-1" for="cinematic"
                                            style="width: 8rem;">Cinematic</label>

                                        <input type="radio" class="btn-check" name="tone" id="monochrome"
                                            onchange="changetonevalue()" value="Monochrome">
                                        <label class="btn btn-check-kalografi mb-1" for="monochrome"
                                            style="width: 8rem;">Monochrome</label>
                                    </div>
                                </div>

                                <div class="row ps-4">
                                    <p class="text-secondary px-0 mb-2 semi-bold">Wedding Style</p>
                                    <div class="form-check form-check-inline mb-3 px-0">
                                        <input type="radio" class="btn-check" name="weddingstyle" id="international" checked
                                            onchange="changeweddingstylevalue()" value="international">
                                        <label class="btn btn-check-kalografi mb-1" for="international"
                                            style="width: 8rem;">International</label>

                                        <input type="radio" class="btn-check" name="weddingstyle" id="traditional"
                                            onchange="changeweddingstylevalue()" value="Traditional">
                                        <label class="btn btn-check-kalografi mb-1" for="traditional"
                                            style="width: 8rem;">Traditional</label>

                                        <input type="radio" class="btn-check" name="weddingstyle" id="islamic"
                                            onchange="changeweddingstylevalue()" value="Islamic">
                                        <label class="btn btn-check-kalografi mb-1" for="islamic"
                                            style="width: 8rem;">Islamic</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <h3 class="fs-1 fw-bold text-secondary mb-4">Customer Details</h3>

                                <div class="form-group mb-3">
                                    <label for="name" class="mb-1 text-secondary small">Full Name</label>
                                    <input type="text" class="form-control" name="fullname" id="fullname" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email" class="mb-1 text-secondary small">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="phone_number" class="mb-1 text-secondary small">Phone Number</label>
                                    <input type="text" class="form-control" name="phonenumber" id="phone_number" required>
                                </div>
                            </div>

                    </div>

                    <div class="col-md-6">
                        <div class="card px-5 py-3" style="border-radius: 20px;">
                            <div class="card-body">
                                <div class="row text-center">
                                    <h3 class="fs-2 fw-bold text-kalografi mb-3">
                                        {{ $package->namapaket }}
                                    </h3>
                                </div>

                                <div class="row text-center">
                                    <p class="semi-bold text-secondary fs-5">Order ID : -</p>
                                </div>

                                <hr style="border-top: 2px dashed black; background-color: #FFFFFF;">

                                <div class="row mt-2">
                                    <p class="semi-bold text-secondary fs-5">Customer Details</p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="text-secondary">Name</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="text-secondary" id="previewnama"></p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="text-secondary">Email</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="text-secondary" id="previewemail"></p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="text-secondary">Phone Number</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="text-secondary" id="previewnomor"></p>
                                        </div>
                                    </div>
                                </div>

                                <hr style="border-top: 2px dashed black; background-color: #FFFFFF;">

                                <div class="row mt-2 text-center mb-4 justify-content-center">
                                    <p class="semi-bold text-secondary fs-5">Order Details</p>
                                    <div class="col-md-3">
                                        <button id="previewvenue" class="btn btn-sm semi-bold fs-7 btn-outline-kalografi"
                                            disabled style="width: 100%">
                                            -
                                        </button>
                                    </div>
                                    <div class="col-md-3">
                                        <button id="previewtone" class="btn btn-sm semi-bold fs-7 btn-outline-kalografi"
                                            disabled style="width: 100%">
                                            -
                                        </button>
                                    </div>
                                    <div class="col-md-3">
                                        <button id="previewweddingstyle" disabled
                                            class="btn btn-sm semi-bold fs-7 btn-outline-kalografi" style="width: 100%">
                                            -
                                        </button>
                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-between align-items-center" style="font-size: 14px">
                                    <div class="col-md-2">
                                        <input type="text" class="form-control form-control-sm text-center"
                                            name="package_qty" id="package_qty" value="1" aria-label="package_qty"
                                            style="width: 40px;" disabled>
                                    </div>
                                    <div class="col-md-6 px-0">
                                        <p class="text-secondary mb-0">
                                            {{ $package->namapaket }}
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <p id="pricepackage" class="semi-bold text-secondary mb-0 text-end">
                                            Rp. {{ number_format($package->price) }}
                                        </p>
                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-between align-items-center" style="font-size: 14px">
                                    <div class="col-md-2">
                                        <input type="text" class="form-control form-control-sm text-center"
                                            name="print_quantity" id="print_quantity" value="{{ $booking->ppqty }}"
                                            aria-label="print_quantity" style="width: 40px;" disabled>
                                    </div>
                                    <div class="col-md-6 px-0">
                                        <p class="text-secondary mb-0">
                                            {{ $pp->printedphoto }}
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <p id="priceprintedphoto" class="semi-bold text-secondary mb-0 text-end">
                                            Rp. {{ number_format($pp->price * $booking->ppqty) }}
                                        </p>
                                    </div>
                                </div>

                                <div class="row mb-4 justify-content-between align-items-center" style="font-size: 14px">
                                    <div class="col-md-2">
                                        <input type="text" class="form-control form-control-sm text-center"
                                            name="photobook_quantity" id="photobook_quantity"
                                            value="{{ $booking->pbqty }}" aria-label="photobook_quantity"
                                            style="width: 40px;" disabled>
                                    </div>
                                    <div class="col-md-6 px-0">
                                        <p class="text-secondary mb-0">
                                            {{ $pb->photobook }}
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <p id="pricephotobook" class="semi-bold text-secondary mb-0 text-end">
                                            Rp. {{ number_format($pb->price * $booking->pbqty) }}
                                        </p>
                                    </div>
                                </div>

                                <hr style="border-top: 2px dashed black; background-color: #FFFFFF;">

                                <div class="row mb-4 mt-4">
                                    <div class="col-md-6">
                                        <img src="{{ asset('placeholders/visa.png') }}" alt="visa">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <p class="semi-bold text-secondary text-end mb-0">Total</p>
                                        </div>
                                        <div class="row">
                                            <p id="totalharga" class="semi-bold fs-5 text-secondary mb-0 text-end">
                                                Rp. {{ number_format($booking->totalprice) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-lg btn-kalografi semi-bold"
                                            style="display: block">Continue to payment
                                        </button>
            </form>

        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <script>
        var textinput = document.getElementById('fullname');
        textinput.onkeyup = textinput.onkeypress = function() {
            document.getElementById('previewnama').innerHTML = this.value;
        }
    </script>

    <script>
        var textinput = document.getElementById('email');
        textinput.onkeyup = textinput.onkeypress = function() {
            document.getElementById('previewemail').innerHTML = this.value;
        }
    </script>

    <script>
        var textinput = document.getElementById('phone_number');
        textinput.onkeyup = textinput.onkeypress = function() {
            document.getElementById('previewnomor').innerHTML = this.value;
        }
    </script>
    <script>
        var radiosvenue = document.getElementsByName("venue");
        var radiostone = document.getElementsByName("tone");
        var radiosweddingstyle = document.getElementsByName("weddingstyle");

        function changevenuevalue() {
            var selectedvenue = Array.from(radiosvenue).find(radio => radio.checked);
            document.getElementById('previewvenue').innerHTML = selectedvenue.value;
        }

        function changetonevalue() {
            var selectedtone = Array.from(radiostone).find(radio => radio.checked);
            document.getElementById('previewtone').innerHTML = selectedtone.value;
        }

        function changeweddingstylevalue() {
            var selectedweddingstyle = Array.from(radiosweddingstyle).find(radio => radio.checked);
            document.getElementById('previewweddingstyle').innerHTML = selectedweddingstyle.value;
        }
    </script>
    @include('layouts.partials.footer')
@endsection
