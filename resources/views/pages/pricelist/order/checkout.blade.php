@extends('layouts.guest.master')
@section('content')
    <div class="container-fluid py-5" style="background-color: #FAFBFA">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-5">
                    <div class="row mb-3">
                        <h3 class="fs-1 fw-bold text-secondary">Payment Details</h3>
                    </div>

                    <div class="row">
                        <p class="text-secondary">
                            We receive payments from bank transfer :
                        </p>
                    </div>

                    <div class="row mb-4">
                        <div class="col pe-0">
                            <img src="{{ asset('placeholders/ico_mastercard@2x 1.png') }}" alt="mastercard-icon">
                        </div>
                        <div class="col px-0">
                            <img src="{{ asset('placeholders/ico_visa@2x 1.png') }}" alt="mastercard-icon">
                        </div>
                        <div class="col px-0">
                            <img src="{{ asset('placeholders/ico_bca@2x 1.png') }}" alt="mastercard-icon">
                        </div>
                        <div class="col px-0">
                            <img src="{{ asset('placeholders/ico_mandiri@2x 1.png') }}" alt="mastercard-icon">
                        </div>
                        <div class="col px-0">
                            <img src="{{ asset('placeholders/ico_permata@2x 1.png') }}" alt="mastercard-icon">
                        </div>
                        <div class="col px-0">
                            <img src="{{ asset('placeholders/ico_bri@2x 1.png') }}" alt="mastercard-icon">
                        </div>
                        <div class="col ps-0">
                            <img src="{{ asset('placeholders/ico_bni@2x 1.png') }}" alt="mastercard-icon">
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <form action="/pricelist/wedding/mahawira/checkout" method="post" id="form_discount">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <div class="form-group row mb-3">
                                <label for="bank" class="mb-1 text-secondary small">Photobook</label>
                                <div class="col">
                                    <select class="form-control text-secondary small" name="bank" id="bank">
                                        <option value="Wedding Photobook 20 cm x 30 cm">Bank Mandiri - 098 198 2829 11 a.n
                                            Adhin
                                            Alifarchan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="redeem_code" class="mb-1 text-secondary small">Redeem Code</label>
                                <div class="col-md-8">
                                    <select class="form-control text-secondary small" name="discount" id="redeem_code"
                                        onchange="getSelectValue();">
                                        <option value="100" selected disabled> --Choose One-- </option>
                                        @foreach ($discount as $potongan)

                                            <option value="{{ $potongan->id }}"
                                                data-bs-jumlah="{{ $potongan->jumlah }}">
                                                {{ strtoupper($potongan->nama) }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <button onclick="totalharga()" class="btn btn-kalografi semi-bold" style="width: 100%"
                                        type="button">Get
                                        Discount</button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <p class="text-secondary">
                                Note : <br>
                                After confirmation of payment we will send the invoice to
                                your phone number and email.
                            </p>
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
                                <p class="semi-bold text-secondary fs-5">Order ID : 0109009</p>
                            </div>


                            <hr style="border-top: 2px dashed black; background-color: #FFFFFF;">

                            <div class="row mt-2">
                                <p class="semi-bold text-secondary fs-5">Customer Details</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="text-secondary">Name</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="text-secondary">{{ $booking->fullname }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="text-secondary">Email</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="text-secondary">{{ $booking->email }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="text-secondary">Phone Number</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="text-secondary">{{ $booking->phonenumber }}</p>
                                    </div>
                                </div>
                            </div>

                            <hr style="border-top: 2px dashed black; background-color: #FFFFFF;">

                            <div class="row mt-2 text-center mb-4 justify-content-center">
                                <p class="semi-bold text-secondary fs-5">Order Details</p>
                                <div class="col-md-3">
                                    <button class="btn btn-sm semi-bold fs-7 btn-outline-kalografi" style="width: 100%">
                                        {{ $booking->venue }}
                                    </button>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-sm semi-bold fs-7 btn-outline-kalografi" style="width: 100%">
                                        {{ $booking->tone }}
                                    </button>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-sm semi-bold fs-7 btn-outline-kalografi" style="width: 100%">
                                        {{ $booking->weddingstyle }}
                                    </button>
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-between align-items-center" style="font-size: 14px">
                                <div class="col-md-2">
                                    <input type="text" class="form-control form-control-sm text-center" name="package_qty"
                                        id="package_qty" value="1" aria-label="package_qty" style="width: 40px;">
                                </div>
                                <div class="col-md-6 px-0">
                                    <p class="text-secondary mb-0">
                                        {{ $package->namapaket }}
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p class="semi-bold text-secondary mb-0 text-end">
                                        Rp. {{ number_format($package->price) }} </p>
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-between align-items-center" style="font-size: 14px">
                                <div class="col-md-2">
                                    <input type="text" class="form-control form-control-sm text-center"
                                        name="print_quantity" id="print_quantity" value="{{ $booking->ppqty }}"
                                        aria-label="print_quantity" style="width: 40px;">
                                </div>
                                <div class="col-md-6 px-0">
                                    <p class="text-secondary mb-0">
                                        {{ $pp->printedphoto }}
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p class="semi-bold text-secondary mb-0 text-end">
                                        Rp. {{ number_format($pp->price) }}
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-4 justify-content-between align-items-center" style="font-size: 14px">
                                <div class="col-md-2">
                                    <input type="text" class="form-control form-control-sm text-center"
                                        name="photobook_quantity" id="photobook_quantity" value="{{ $booking->pbqty }}"
                                        aria-label="photobook_quantity" style="width: 40px;">
                                </div>
                                <div class="col-md-6 px-0">
                                    <p class="text-secondary mb-0">
                                        {{ $pb->photobook }}
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p class="semi-bold text-secondary mb-0 text-end">
                                        Rp. {{ number_format($pb->price) }}
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
                                        <p id="total" class="semi-bold fs-5 text-secondary mb-0 text-end">
                                            Rp. {{ number_format($booking->totalprice) }}
                                        </p>
                                        <input type="hidden" id="grand_total" name="totalprice"
                                            value="{{ $booking->totalprice }}">
                                        <input type="hidden" id="id_diskon" name="discount_id" value="">

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-lg btn-kalografi" style="display: block">
                                        <i class="fas fa-lock me-2"></i>
                                        Checkout
                                    </button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const total = {{ $booking->totalprice }};
        var selectedId;
        var selectedValue;
        var discountprice;
        var totalprice;
        var totalPriceInRupiah;

        function numberToRupiah(number) {
            const format = number.toString().split('').reverse().join('');
            const convert = format.match(/\d{1,3}/g);
            const rupiah = convert.join(',').split('').reverse().join('')
            return rupiah;
        }


        function getSelectValue() {
            selectedValue = document.forms['form_discount'].elements['discount'].options[document.forms[
                'form_discount'].elements['discount'].selectedIndex].getAttribute('data-bs-jumlah');
            discountprice = total * selectedValue / 100;
            totalprice = total - discountprice;
            totalPriceInRupiah = numberToRupiah(totalprice);
        }
        getSelectValue();


        var discountprice = total * selectedValue / 100;
        var totalprice = total - discountprice;



        function totalharga() {
            selectedId = document.forms['form_discount'].elements['discount'].options[document.forms[
                'form_discount'].elements['discount'].selectedIndex].value;
            document.getElementById("id_diskon").value = selectedId;
            document.getElementById("total").innerHTML = "Rp. " + totalPriceInRupiah;
            document.getElementById("grand_total").value = totalprice;

            console.log(selectedId);
        };
    </script>


    @include('layouts.partials.footer')
@endsection
