@extends('layouts.guest.master')
@section('content')
    <div class="container-fluid py-5" style="background-color: #FAFBFA">
        <div class="container">
            <div class="row-mb-4 text-center mt-3">
                <div class="col">
                    <h3 class="semi-bold mb-0" style="color: #8F9C69; letter-spacing: -1px; font-size:48px">
                        Customize your own package
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid pb-5" style="background-color: #FAFBFA">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10">
                    <div class="card shadow-sm border-0 pe-3 py-2" style="border-radius: 10px">
                        <div class="card-body">
                            <form action="/postcustom" method="post" id="total_form">
                                @csrf
                                <div class="row form-group">
                                    <div class="col-md-5" style="margin: 35px">
                                        <div class="row">
                                            <div class="col">
                                                <label class="mb-1 text-secondary ">Book Date</label>
                                                <input type="date" class="form-control text-secondary " name="bookdate"
                                                    id="date_pick" style="height: 70%" required>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col">
                                                <label class="mb-1 text-secondary ">Photographer</label>
                                                <select class="form-control text-secondary small" name="photographer"
                                                    id="photographer-price" style="height: 70%">
                                                    <option value="1" data-bs-harga-photo="500000">1 Photographer</option>
                                                    <option value="2" data-bs-harga-photo="1000000">2 Photographer</option>
                                                    <option value="3" data-bs-harga-photo="1500000">3 Photographer</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col">
                                                <label class="mb-1 text-secondary ">Videographer</label>
                                                <select class="form-control text-secondary small" name="videographer"
                                                    id="printed_photo" style="height: 70%">
                                                    <option value="1" data-bs-harga-video="1500000">1 Videographer</option>
                                                    <option value="2 " data-bs-harga-video="2200000">2 Videographer</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col">
                                                <label class="mb-1 text-secondary ">Work Hours</label>
                                                <select class="form-control text-secondary small" name="workhours"
                                                    id="workhours" style="height: 70%">
                                                    <option value="6" data-bs-workhoursprice="0">6 Hours</option>
                                                    <option value="8" data-bs-workhoursprice="500000">8 Hours</option>
                                                    <option value="12" data-bs-workhoursprice="1000000">12 Hours</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-5" style="margin: 40px">
                                        <div class="row">
                                            <div class="col">
                                                <label class="mb-1 text-secondary ">Printed Photo</label>
                                                <select class="form-control text-secondary small" name="printedphoto"
                                                    id="printed_photo" style="height: 70%">
                                                    @foreach ($printedphoto as $printedphoto)
                                                        <option value="{{ $printedphoto->id }}"
                                                            data-bs-harga-pp="{{ $printedphoto->price }}">
                                                            {{ $printedphoto->printedphoto }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <label for="print_quantity" class="mb-1 text-secondary small"
                                                    name>Qty</label>
                                                <input type="text" class="form-control" name="ppqty" id="print_quantity"
                                                    value="" required style="height: 70%">
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col">
                                                <label class="mb-1 text-secondary ">Photobook</label>
                                                <select class="form-control text-secondary small" name="photobook"
                                                    id="photobook-select" style="height: 70%">
                                                    @foreach ($photobook as $photobook)
                                                        <option value="{{ $photobook->id }}"
                                                            data-bs-harga-pb="{{ $photobook->price }}">
                                                            {{ $photobook->photobook }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <label for="photobook_qty" class="mb-1 text-secondary small"
                                                    name>Qty</label>
                                                <input type="text" class="form-control" name="pbqty"
                                                    id="photobook_quantity" value="" required style="height: 70%">
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col">
                                                <p class="mb-1 text-secondary"> Additional Service</p>
                                            </div>
                                        </div>

                                        <div class="row mt-4 text-secondary">
                                            <div class="col md-6">
                                                <label class="container-checkbox">Drone Footage
                                                    <input type="checkbox" name="drone" value="Yes">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="container-checkbox">1 Minute Cinematic
                                                    <input type="checkbox" name="1_minute_cinematic_video" value="Yes">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="container-checkbox">3 Minutes Full Cinematic
                                                    <input type="checkbox" name="3_minute_cinematic_video" value="Yes">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <div class="col md-6">
                                                <label class="container-checkbox">Flashdisk
                                                    <input type="checkbox" name="flashdisk" value="Yes">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="container-checkbox">Live Streaming
                                                    <input type="checkbox" name="live_streaming" value="Yes">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="container-checkbox">Full Documentation Video
                                                    <input type="checkbox" name="full_documentation_video" value="Yes">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row text-center mb-4">
                                        <div class="col">
                                            <button type="button" class="btn btn-kalografi btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#total_modal"
                                                style="width: 40%; height:120%; border-radius:10px" onclick="calculate()">
                                                Calculate Now
                                            </button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="total_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered text-center">
            <div class="modal-content p-4" style="border-radius: 15px">
                <div class="modal-body">
                    <div class="row justify-content-center mb-4 ">
                        <div class="col-md-4">
                            <img src="{{ asset('placeholders/checked 1.png') }}" alt="checked">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <p class="text-secondary text-bold fs-4">
                            Your Bill is :
                        </p> <br>
                        <p class="text-secondary text-bold fs-4" id="total_price_modal">

                        </p>
                        <input type="hidden" id="idpaket" name="paket_id" value="0">
                        <input type="hidden" id="grand_total" name="totalprice" value="0">
                    </div>
                    <div class="row text-center ">
                        <div class="col">
                            <button type="submit" href="{{ route('landing') }}" class="btn btn-kalografi btn-sm"
                                style="width: 60%; height:120%; border-radius:10px">
                                Back to Home
                            </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var total_price;
        var totalPriceInRupiah;

        function numberToRupiah(number) {
            const format = number.toString().split('').reverse().join('');
            const convert = format.match(/\d{1,3}/g);
            const rupiah = convert.join(',').split('').reverse().join('')
            return rupiah;
        };

        function calculate() {
            PhotographerselectedId = document.forms['total_form'].elements['photographer'].options[document.forms[
                'total_form'].elements['photographer'].selectedIndex].getAttribute('data-bs-harga-photo');

            VideographerselectedId = document.forms['total_form'].elements['videographer'].options[document.forms[
                'total_form'].elements['videographer'].selectedIndex].getAttribute('data-bs-harga-video');

            printedphotoselectedId = document.forms['total_form'].elements['printedphoto'].options[document.forms[
                'total_form'].elements['printedphoto'].selectedIndex].getAttribute('data-bs-harga-pp');

            ppqtyselectedId = document.getElementById("print_quantity").value;

            photobookselectedId = document.forms['total_form'].elements['photobook'].options[document.forms[
                'total_form'].elements['photobook'].selectedIndex].getAttribute('data-bs-harga-pb');

            pbqtyselectedId = document.getElementById("photobook_quantity").value;


            total_price = parseInt(PhotographerselectedId) + parseInt(VideographerselectedId) + parseInt(
                    printedphotoselectedId) *
                ppqtyselectedId +
                parseInt(photobookselectedId) * pbqtyselectedId;

            totalPriceInRupiah = numberToRupiah(total_price);


            document.getElementById('total_price_modal').innerHTML = "Rp. " + totalPriceInRupiah;
            document.getElementById('grand_total').value = total_price;


            console.log(total_price);

        };
    </script>

@include(' layouts.partials.footer') @endsection
