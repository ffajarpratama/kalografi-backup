@extends('layouts.guest.master')
@section('content')
    <div class="container-fluid py-5" style="background-color: #FAFBFA">
        <div class="container">

            <div class="row justify-content-between">
                <div class="col-md-5">

                    <div class="row mb-3">
                        <h3 class="fs-1 fw-bold text-secondary">Your Post-Production Progress</h3>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-10">
                            <div class="progress progress-striped active" style="height:8px; margin-top:5px ">
                                <div class="progress-bar" id="progress_bar" role="progressbar" aria-valuenow="73"
                                    aria-valuemin="0" aria-valuemax="100" style=" width: 75% ; background-color: #8F9C69">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <p id="percentage" class="progress-label" style=" float: rigt; margin-left: 1em;">
                                75%
                            </p>
                        </div>
                    </div>

                    <div row class="mb-4">
                        <div class="col">
                            Current progress: -
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">

                            <ul class="StepProgress">
                                <li id="coloumn_status_1" class="StepProgress-item">
                                    <strong>All photos
                                        uploaded
                                    </strong>
                                    <label>{{ $status->updated_at }}</label>
                                </li>
                                <li id="coloumn_status_2" class=" StepProgress-item "><strong>Wedding photobook delivered
                                    </strong>

                                </li>
                                <li id="coloumn_status_3" class=" StepProgress-item "><strong>Video uploaded</strong>

                                <li id="coloumn_status_4" class=" StepProgress-item"><strong>Printing 16R photos</strong>
                                </li>

                            </ul>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <form action="/request/status" method="POST">
                                @csrf
                                <input type="hidden" class="form-control form-control-sm text-center" name="bookingid"
                                    value="{{ $order->id }}">
                                <input type="hidden" name="status_value" value="{{ $status->current_status }} + 1">
                                <select class="form-control text-secondary small" name="status_value" id="">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <button type="submit" class="btn btn-kalografi semi-bold">gas</button>
                            </form>
                        </div>
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="card px-5 py-3" style="border-radius: 20px;">
                        <div class="card-body">
                            <div class="row text-center">
                                <h3 class="fs-2 fw-bold text-kalografi mb-3">
                                    @if (is_null($order->paket_id) )
                                        Custom Package
                                    @else
                                        {{ $order->pakets->namapaket }}
                                    @endif

                                </h3>
                            </div>

                            <div class="row text-center">
                                <p class="semi-bold text-secondary fs-5">Order ID :
                                    {{ $order->id }}
                                </p>
                            </div>

                            <hr style="border-top: 2px dashed black; background-color: #FFFFFF;">

                            <div class="row mt-2">
                                <p class="semi-bold text-secondary fs-5">Customer Details</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="text-secondary">Name</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="text-secondary" id="previewnama">{{ $order->fullname }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="text-secondary">Email</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="text-secondary" id="previewemail">{{ $order->email }} </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="text-secondary">Phone Number</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="text-secondary" id="previewnomor"> {{ $order->phonenumber }} </p>
                                    </div>
                                </div>
                            </div>

                            <hr style="border-top: 2px dashed black; background-color: #FFFFFF;">

                            <div class="row mt-2 text-center mb-4 justify-content-center">
                                <p class="semi-bold text-secondary fs-5">Order Details</p>
                                <div class="col-md-3">
                                    <button id="previewvenue" class="btn btn-sm semi-bold fs-7 btn-outline-kalografi"
                                        disabled style="width: 100%">
                                        {{ $order->venue }}
                                    </button>
                                </div>
                                <div class="col-md-3">
                                    <button id="previewtone" class="btn btn-sm semi-bold fs-7 btn-outline-kalografi"
                                        disabled style="width: 100%">
                                        {{ $order->tone }}
                                    </button>
                                </div>
                                <div class="col-md-3">
                                    <button id="previewweddingstyle" disabled
                                        class="btn btn-sm semi-bold fs-7 btn-outline-kalografi" style="width: 100%">
                                        {{ $order->weddingstyle }}
                                    </button>
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-between align-items-center" style="font-size: 14px">

                                <div class="col-md-6 px-0">
                                    <p class="text-secondary  text-bold mb-0">
                                        Booking Date
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p id="pricepackage" class="text-secondary mb-0 text-end text-bold">
                                        {{ date_format(date_create($order->bookdate), 'Y F d') }}
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-between align-items-center" style="font-size: 14px">
                                <div class="col-md-2">
                                    <input type="text" class="form-control form-control-sm text-center" name="package_qty"
                                        id="package_qty" value="{{ $order->paket_id }}" aria-label="package_qty"
                                        style="width: 40px;" disabled>
                                </div>
                                <div class="col-md-6 px-0">
                                    <p class="text-secondary mb-0">
                                        @if (is_null($package->paket_id))
                                        Custom Package
                                        @else
                                        {{ $order->pakets->namapaket }}
                                        @endif
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p id="pricepackage" class="semi-bold text-secondary mb-0 text-end">
                                        Rp.{{ number_format($order->paket->price) }}
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-between align-items-center" style="font-size: 14px">
                                <div class="col-md-2">
                                    <input type="text" class="form-control form-control-sm text-center"
                                        name="print_quantity" id="print_quantity" value="{{ $order->ppqty }}"
                                        aria-label="print_quantity" style="width: 40px;" disabled>
                                </div>
                                <div class="col-md-6 px-0">
                                    <p class="text-secondary mb-0">
                                        {{ $order->printedphotos->printedphoto }}
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p id="priceprintedphoto" class="semi-bold text-secondary mb-0 text-end">
                                        Rp.{{ number_format($order->printedphotos->price * $order->ppqty) }}
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-4 justify-content-between align-items-center" style="font-size: 14px">
                                <div class="col-md-2">
                                    <input type="text" class="form-control form-control-sm text-center"
                                        name="photobook_quantity" id="photobook_quantity" value="{{ $order->pbqty }}"
                                        aria-label="photobook_quantity" style="width: 40px;" disabled>
                                </div>
                                <div class="col-md-6 px-0">
                                    <p class="text-secondary mb-0">
                                        {{ $order->photobooks->photobook }}
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p id="pricephotobook" class="semi-bold text-secondary mb-0 text-end">
                                        Rp. {{ number_format($order->photobooks->price * $order->pbqty) }}
                                    </p>
                                </div>
                            </div>

                            <hr style="border-top: 2px dashed black; background-color: #FFFFFF;">

                            <div class="row mb-4 mt-4">
                                <div class="col-md-6">

                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <p class="semi-bold text-secondary text-end mb-0">Total</p>
                                    </div>
                                    <div class="row">
                                        <p id="totalharga" class="semi-bold fs-5 text-secondary mb-0 text-end">
                                            Rp.{{ number_format($order->totalprice) }}
                                        </p>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var status = {{ $status->current_status }};

        function ubah() {
            if (status == 1) {
                document.getElementById("coloumn_status_1").classList.toggle('');
            } else if (status == 2) {
                document.getElementById("coloumn_status_1").classList.toggle('is-done');
                document.getElementById("coloumn_status_2").classList.toggle('');
            } else if (status == 3) {
                document.getElementById("coloumn_status_1").classList.toggle('is-done');
                document.getElementById("coloumn_status_2").classList.toggle('is-done');
                document.getElementById("coloumn_status_3").classList.toggle('');
            } else if (status == 4) {
                document.getElementById("coloumn_status_1").classList.toggle('is-done');
                document.getElementById("coloumn_status_2").classList.toggle('is-done');
                document.getElementById("coloumn_status_3").classList.toggle('is-done');
                document.getElementById("coloumn_status_4").classList.toggle('');
            } else if (status == 5) {
                document.getElementById("coloumn_status_1").classList.toggle('is-done');
                document.getElementById("coloumn_status_2").classList.toggle('is-done');
                document.getElementById("coloumn_status_3").classList.toggle('is-done');
                document.getElementById("coloumn_status_4").classList.toggle('is-done');
            }
        }

        function progress() {
            if (status == 1) {
                document.getElementById("progress_bar").style.width = "0%";
            } else if (status == 2) {
                document.getElementById("progress_bar").style.width = "25%";
            } else if (status == 3) {
                document.getElementById("progress_bar").style.width = "50%";
            } else if (status == 4) {
                document.getElementById("progress_bar").style.width = "75%";
            } else if (status == 5) {
                document.getElementById("progress_bar").style.width = "100%";
            }
        }

        function progresspercentage() {
            if (status == 1) {
                document.getElementById("percentage").innerHTML = "0%";
            } else if (status == 2) {
                document.getElementById("percentage").innerHTML = "25%";
            } else if (status == 3) {
                document.getElementById("percentage").innerHTML = "50%";
            } else if (status == 4) {
                document.getElementById("percentage").innerHTML = "75%";
            } else if (status == 5) {
                document.getElementById("percentage").innerHTML = "100%";
            }
        }

        progresspercentage();
        progress();
        ubah();
    </script>

    @include('layouts.partials.footer')
@endsection
