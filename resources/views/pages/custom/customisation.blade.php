@extends('layouts.guest.master')
@section('content')
    <div class="container-fluid py-5" style="background-color: #FAFBFA">
        <div class="row mb-4 text-center mt-3" data-aos="fade-down" data-aos-delay="100" data-aos-duration="500">
            <div class="col">
                <h3 class="semi-bold mb-0" style="color: #8F9C69; letter-spacing: -1px; font-size:48px">
                    Customize your own package
                </h3>
            </div>
        </div>

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500">
            <div class="col-sm-8">
                <div class="card shadow-sm border-0 pe-3 py-2" style="border-radius: 10px">
                    <div class="card-body">
                        <form action="{{ route('post-custom') }}" method="post" id="total_form">
                            @csrf
                            <div class="row form-group">
                                <div class="col-md-5" style="margin: 35px">

                                    <input type="hidden" id="idpaket" name="paket_id" value="0">
                                    <input type="hidden" id="grand_total" name="totalprice" value="0">

                                    <div class="row mb-4">
                                        <div class="col">
                                            <label class="mb-1 text-secondary ">Book Date</label>
                                            <input type="date" class="form-control text-secondary " name="bookdate"
                                                id="date_pick" style="height: 70%" required>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col">
                                            <label class="mb-1 text-secondary ">Photographer</label>
                                            <select class="form-control text-secondary small" name="photographers"
                                                id="photographer-price" style="height: 70%">
                                                <option value="1" data-bs-harga-photo="500000">
                                                    1 Photographer
                                                </option>
                                                <option value="2" data-bs-harga-photo="1000000">
                                                    2 Photographer
                                                </option>
                                                <option value="3" data-bs-harga-photo="1500000">
                                                    3 Photographer
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col">
                                            <label class="mb-1 text-secondary ">Videographer</label>
                                            <select class="form-control text-secondary small" name="videographers"
                                                id="printed_photo" style="height: 70%">
                                                <option value="1" data-bs-harga-video="1500000">
                                                    1 Videographer
                                                </option>
                                                <option value="2 " data-bs-harga-video="2200000">
                                                    2 Videographer
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col">
                                            <label class="mb-1 text-secondary ">Work Hours</label>
                                            <select class="form-control text-secondary small" name="workhours"
                                                id="workhours" style="height: 70%">
                                                <option value="1" data-bs-workhoursprice="0">6 Hours</option>
                                                <option value="2" data-bs-workhoursprice="500000">8 Hours</option>
                                                <option value="3" data-bs-workhoursprice="1000000">12 Hours
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5" style="margin: 40px">
                                    <div class="row mb-4">
                                        <div class="col">
                                            <label class="mb-1 text-secondary" for="printed_photo">Printed Photo</label>
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
                                            <label for="print_quantity" class="mb-1 text-secondary small">Qty</label>
                                            <input type="text" class="form-control" name="ppqty" id="print_quantity"
                                                value="" required style="height: 70%">
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col">
                                            <label class="mb-1 text-secondary" for="photobook-select">Photobook</label>
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
                                            <label for="photobook_qty" class="mb-1 text-secondary small">Qty</label>
                                            <input type="text" class="form-control" name="pbqty" id="photobook_quantity"
                                                value="" required style="height: 70%">
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col">
                                            <p class="mb-1 text-secondary">Additional Service</p>
                                        </div>
                                    </div>

                                    <div class="row text-secondary">
                                        @foreach ($additionals as $additionals)
                                            <div class="col-md-6">
                                                <label class="container-checkbox">{{ $additionals->name }}
                                                    <input type="checkbox" id="additionals" name="additionals[]"
                                                        value="{{ $additionals->id }}"
                                                        data-price="{{ $additionals->price }}">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="row justify-content-center mb-4">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <button type="button" class="btn btn-kalografi btn-block" data-bs-toggle="modal"
                                                data-bs-target="#total_modal" data-bs-url="{{ route('post-custom') }}"
                                                onclick="calculate()">
                                                Calculate Now
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid pb-5" style="background-color: #FAFBFA">
        <div class="container">

        </div>
    </div>

    {{-- START CALCULATE MODAL --}}
    <div class="modal fade" id="total_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered text-center">
            <div class="modal-content p-4" style="border-radius: 15px">
                <div class="modal-body">
                    <div class="row justify-content-center mb-4">
                        <div class="col-md-4">
                            <img src="{{ asset('placeholders/checked 1.png') }}" alt="checked">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <p class="text-secondary text-bold fs-4">
                            Your Bill is :
                        </p> <br>
                        <p class="text-secondary text-bold fs-4" id="total_price_modal"></p>

                    </div>
                    <div class="row text-center ">
                        <div class="col">
                            <button type="button" class="btn btn-kalografi btn-sm"
                                onclick="event.preventDefault(); document.getElementById('total_form').submit();"
                                style="width: 60%; height:120%; border-radius:10px">
                                Proceed
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- END CALCULATE MODAL --}}

    <script>
        let total_price;
        let totalPriceInRupiah;
        let additionalPrice = 0;
        const cbs = document.querySelectorAll('input[type=checkbox]');

        function numberToRupiah(number) {
            const format = number.toString().split('').reverse().join('');
            const convert = format.match(/\d{1,3}/g);
            return convert.join(',').split('').reverse().join('');
        }

        for (let i = 0; i < cbs.length; i++) {
            cbs[i].addEventListener('change', function() {
                if (this.checked) {
                    additionalPrice += parseInt(this.getAttribute('data-price'))
                } else {
                    additionalPrice -= parseInt(this.getAttribute('data-price'))
                }
            });
        }

        function calculate() {
            const photographerSelectedId = document.forms['total_form'].elements['photographers'].options[document.forms[
                'total_form'].elements['photographers'].selectedIndex].getAttribute('data-bs-harga-photo');
            const videographerSelectedId = document.forms['total_form'].elements['videographers'].options[document.forms[
                'total_form'].elements['videographers'].selectedIndex].getAttribute('data-bs-harga-video');
            const printedPhotoSelectedId = document.forms['total_form'].elements['printedphoto'].options[document.forms[
                'total_form'].elements['printedphoto'].selectedIndex].getAttribute('data-bs-harga-pp');
            const printedPhotoQty = document.getElementById("print_quantity").value;
            const photoBookSelectedId = document.forms['total_form'].elements['photobook'].options[document.forms[
                'total_form'].elements['photobook'].selectedIndex].getAttribute('data-bs-harga-pb');
            const photoBookQty = document.getElementById("photobook_quantity").value;

            const photographerPrice = parseInt(photographerSelectedId);
            const videographerPrice = parseInt(videographerSelectedId);
            const printedPhotoPrice = parseInt(printedPhotoSelectedId);
            const photoBookPrice = parseInt(photoBookSelectedId);

            total_price = photographerPrice + videographerPrice + printedPhotoPrice * printedPhotoQty + photoBookPrice *
                photoBookQty + additionalPrice;
            totalPriceInRupiah = numberToRupiah(total_price);

            document.getElementById('total_price_modal').innerHTML = "Rp. " + totalPriceInRupiah;
            document.getElementById('grand_total').value = total_price;
            console.log(total_price)
        }
    </script>

    @include(' layouts.partials.footer')
@endsection
