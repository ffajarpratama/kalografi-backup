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
                                <div class="progress-bar " role="progressbar" aria-valuenow="73" aria-valuemin="0"
                                    aria-valuemax="100" style=" width: 75% ; background-color: #8F9C69"> </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <p class="progress-label" style="  float: rigt; margin-left: 1em;">
                                75%
                            </p>
                        </div>
                    </div>

                    <div row class="mb-4">
                        <div class="col">
                            Current progress: Printing 16R photos
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">

                            <ul class="StepProgress">
                                <li class="StepProgress-item is-done"><strong>All photos uploaded</strong>
                                    <label>Uploaded on: 20 August 2021</label>
                                </li>
                                <li class="StepProgress-item is-done"><strong>Wedding photobook delivered </strong>
                                    <label>Delivered on: 22 August 2021</label>
                                </li>
                                <li class="StepProgress-item is-done"><strong>Video uploaded</strong> <label>Uploaded on: 25
                                        August 2021</label> </li>
                                <li class="StepProgress-item"><strong>Printing 16R photos</strong><label>On progress</label>
                                </li>

                            </ul>

                        </div>
                    </div>



                </div>

                <div class="col-md-6">
                    <div class="card px-5 py-3" style="border-radius: 20px;">
                        <div class="card-body">
                            <div class="row text-center">
                                <h3 class="fs-2 fw-bold text-kalografi mb-3">
                                    MAHAWIRA WEDDING PACKAGE
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
                                    <input type="text" class="form-control form-control-sm text-center" name="package_qty"
                                        id="package_qty" value="-" aria-label="package_qty" style="width: 40px;" disabled>
                                </div>
                                <div class="col-md-6 px-0">
                                    <p class="text-secondary mb-0">
                                        MAHAWIRA WEDDING PACKAGE
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p id="pricepackage" class="semi-bold text-secondary mb-0 text-end">
                                        Rp. 7.500.000,-
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-between align-items-center" style="font-size: 14px">
                                <div class="col-md-2">
                                    <input type="text" class="form-control form-control-sm text-center"
                                        name="print_quantity" id="print_quantity" value="-" aria-label="print_quantity"
                                        style="width: 40px;" disabled>
                                </div>
                                <div class="col-md-6 px-0">
                                    <p class="text-secondary mb-0">
                                        PRINTED PHOTO
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p id="priceprintedphoto" class="semi-bold text-secondary mb-0 text-end">
                                        Rp. 400.000,-
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-4 justify-content-between align-items-center" style="font-size: 14px">
                                <div class="col-md-2">
                                    <input type="text" class="form-control form-control-sm text-center"
                                        name="photobook_quantity" id="photobook_quantity" value="-"
                                        aria-label="photobook_quantity" style="width: 40px;" disabled>
                                </div>
                                <div class="col-md-6 px-0">
                                    <p class="text-secondary mb-0">
                                        PHOTOBOOK
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p id="pricephotobook" class="semi-bold text-secondary mb-0 text-end">
                                        Rp. 300.000,-
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
                                            Rp. 9.000.000,-
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

    @include('layouts.partials.footer')
@endsection
