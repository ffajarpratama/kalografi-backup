@extends('layouts.guest.master')
@section('content')
    <div class="container-fluid py-5" style="background-color: #FAFBFA">

        <div class="container">
            <div class="row justify-content-evenly">
                <div class="col-md-6">
                    <div id="manendraCarousel" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#manendraCarousel" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#manendraCarousel" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#manendraCarousel" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner" style="border-radius: 20px">
                            <div class="carousel-item active">
                                <img src="{{ asset('placeholders/manendracarousel.png') }}" class="d-block w-100"
                                    alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('placeholders/manendracarousel.png') }}" class="d-block w-100"
                                    alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('placeholders/manendracarousel.png') }}" class="d-block w-100"
                                    alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#manendraCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#manendraCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card border-0 shadow-sm p-4" style="border-radius: 10px">
                        <div class="card-body">
                            <div class="row mb-3">
                                <h3 class="fw-bold fs-2 text-secondary">
                                    Manendra <br>
                                    Wedding Package
                                </h3>
                            </div>

                            <div class="row mb-3">
                                <h3 class="fw-bold fs-3 text-kalografi">
                                    IDR 5,500,000
                                </h3>
                            </div>
                            <form action="/pricelist/wedding/mahawira" method="post">
                                {{ csrf_field() }}
                                <input type="text" name="paket_id" value="3" hidden>
                                <div class="form-group row mb-3">
                                    <div class="col-md-12">
                                        <label for="printed_photo" class="mb-1 text-secondary small">Book Date</label>
                                        <input type="date" class="form-control text-secondary small" name="bookdate"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-md-10">
                                        <label for="printed_photo" class="mb-1 text-secondary small">Printed
                                            Photo</label>
                                        <select class="form-control text-secondary small" name="printedphoto"
                                            id="printed_photo">

                                            @foreach ($printedphoto as $printedphoto)
                                                <option value="{{ $printedphoto->id }}">
                                                    {{ $printedphoto->printedphoto }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-2 text-center">
                                        <label for="print_quantity" class="mb-1 text-secondary small" name>Qty</label>
                                        <input type="text" class="form-control" name="ppqty" id="print_quantity" value=""
                                            required>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <div class="col-md-10">
                                        <label for="photobook" class="mb-1 text-secondary small">Photobook</label>
                                        <select class="form-control text-secondary small" name="photobook" id="photobook">
                                            @foreach ($photobook as $photobook)
                                                <option value="{{ $photobook->id }}">{{ $photobook->photobook }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="col-md-2 text-center">
                                        <label for="photobook_quantity" class="mb-1 text-secondary small">Qty</label>
                                        <input type="text" class="form-control" name="pbqty" id="photobook_quantity"
                                            value="" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col">
                                        <button type="submit" class="btn text-white"
                                            style="display: block; width: 100%; background-color: #8F9C69">Book Now
                                        </button>

                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

    <div class="container-fluid py-5">
        <div class="container px-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-3">
                        <h3 class="fw-bold fs-2 text-secondary">Terms and Conditions</h3>
                    </div>
                    <div class="row px-5 mb-3">
                        <strong class="text-secondary fs-5">Reschedule Policy</strong>
                        <p class="text-secondary pe-3">
                            Free Reschedule is applicable if you submit the reschedule request
                            by at maximum 96 hours (4 days) before your initial photoshoot date.
                        </p>
                    </div>
                    <div class="row px-5 mb-3">
                        <strong class="text-secondary fs-5">Cancellation Policy</strong>
                        <p class="text-secondary pe-3">
                            Free Cancellation is applicable if you submit the cancellation request
                            by at maximum 96 hours (4 days) before your initial photoshoot date.
                        </p>
                    </div>
                    <div class="row px-5 mb-3">
                        <strong class="text-secondary fs-5">48 Hours Photo Delivery</strong>
                        <p class="text-secondary pe-3">
                            You can get all photo files via Google Drive in 48 Hours, then choose
                            the photo you want to get edited.
                        </p>
                    </div>
                </div>

                <div class="col-md-5 offset-md-1">
                    <div class="row mb-3">
                        <h3 class="fw-bold fs-2 text-secondary">What's Included</h3>
                    </div>
                    <div class="row px-5 mb-3">
                        <ul class="text-secondary">
                            <li>15 Work Hours</li>
                            <li>2 Photographers + 1 Videographers</li>
                            <li>Flashdisk Include All Files</li>
                            <li>500 Edited Photos</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.partials.footer')
@endsection
