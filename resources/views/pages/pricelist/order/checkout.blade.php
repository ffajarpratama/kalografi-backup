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
                                <label for="bank" class="mb-1 text-secondary small">Bank</label>
                                <div class="col">
                                    <select class="form-control text-secondary small" name="bank" id="bank">
                                        <option value="Wedding Photobook 20 cm x 30 cm">Bank Mandiri - 098 198 2829 11 a.n
                                            Adhin
                                            Alifarchan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="bank" class="mb-1 text-secondary small">Payment Termination</label>
                                <div class="col">
                                    <select class="form-control text-secondary small" name="payment_termination" id="bank">
                                        <option value="1">1x (Complete Payment)</option>
                                        <option value="2">2x (Down Payment & Complete Payment)</option>
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

                @include('pages.partials.receipt')

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


        };
    </script>


    @include('layouts.partials.footer')
@endsection
