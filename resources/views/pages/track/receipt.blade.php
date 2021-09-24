<div class="col-md-5">
    <div class="card px-5 py-3" style="border-radius: 20px;">
        <div class="card-body">
            <div class="row text-center">
                <h3 class="fs-2 fw-bold text-kalografi mb-3">
                    @if ($booking->paket_id == 0)
                        Custom Package
                    @else
                        {{ $booking->pakets->namapaket }}
                        <br>
                        {{ $booking->pakets->kategori }}
                    @endif
                </h3>
            </div>

            @if($booking->id !== null)
                <div class="row text-center">
                    <p class="semi-bold text-secondary fs-5">Order ID : <strong>{{ $booking->id }}</strong></p>
                </div>
            @endif

            <div class="row text-center">
                <p class="text-secondary">
                    Booking Date <strong>{{ date_format(date_create($booking->bookdate), 'd F Y') }}</strong>
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
                        <p class="text-secondary" id="previewnama">{{ $booking->fullname }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p class="text-secondary">Email</p>
                    </div>
                    <div class="col-md-6">
                        <p class="text-secondary" id="previewemail">{{ $booking->email }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p class="text-secondary">Phone Number</p>
                    </div>
                    <div class="col-md-6">
                        <p class="text-secondary" id="previewnomor">{{ $booking->phonenumber }}</p>
                    </div>
                </div>
            </div>

            <hr style="border-top: 2px dashed black; background-color: #FFFFFF;">

            <div class="row mt-2 text-center mb-4 justify-content-center">
                <p class="semi-bold text-secondary fs-5">Order Details</p>
                <div class="col-md-4">
                    <button id="previewvenue" class="btn btn-sm semi-bold fs-7 btn-outline-kalografi" disabled
                            style="width: 100%">
                        {{ $booking->venue }}
                    </button>
                </div>

                <div class="col-md-4">
                    <button id="previewtone" class="btn btn-sm semi-bold fs-7 btn-outline-kalografi" disabled
                            style="width: 100%">
                        {{ $booking->tone }}
                    </button>
                </div>
                <div class="col-md-4">
                    <button id="previewweddingstyle" disabled class="btn btn-sm semi-bold fs-7 btn-outline-kalografi"
                            style="width: 100%">
                        {{ $booking->weddingstyle }}
                    </button>
                </div>
            </div>

            <div class="row mb-3 justify-content-between align-items-center" style="font-size: 14px">
                <div class="col-md-2">
                    <input type="text" class="form-control form-control-sm text-center" name="package_qty"
                           id="package_qty" value="1" aria-label="package_qty" style="width: 40px;" disabled>
                </div>

                <div class="col-md-6 px-0">
                    <p class="text-secondary mb-0">
                        @if ($booking->paket_id == 0)
                            Custom Package
                        @else
                            {{ $booking->pakets->namapaket }}

                            {{ $booking->pakets->kategori }}
                        @endif
                    </p>
                </div>
                <div class="col-md-4">
                    <p id="pricepackage" class="semi-bold text-secondary mb-0 text-end">
                        @if ($booking->paket_id == 0)
                            Rp.
                            {{ number_format($booking->totalprice - ($booking->printedphotos->price * $booking->ppqty + $booking->photobooks->price * $booking->pbqty)) }}
                        @else
                            Rp. {{ number_format($booking->pakets->price) }}
                        @endif
                    </p>
                </div>
            </div>

            <div class="row mb-3 justify-content-between align-items-center" style="font-size: 14px">
                <div class="col-md-2">
                    <input type="text" class="form-control form-control-sm text-center" name="print_quantity"
                           id="print_quantity" value="{{ $booking->ppqty }}" aria-label="print_quantity"
                           style="width: 40px;" disabled>
                </div>

                <div class="col-md-6 px-0">
                    <p class="text-secondary mb-0">
                        {{ $booking->printedphotos->printedphoto }}
                    </p>
                </div>

                <div class="col-md-4">
                    <p id="priceprintedphoto" class="semi-bold text-secondary mb-0 text-end">
                        Rp. {{ number_format($booking->printedphotos->price * $booking->ppqty) }}
                    </p>
                </div>
            </div>

            <div class="row mb-4 justify-content-between align-items-center" style="font-size: 14px">
                <div class="col-md-2">
                    <input type="text" class="form-control form-control-sm text-center" name="photobook_quantity"
                           id="photobook_quantity" value="{{ $booking->pbqty }}" aria-label="photobook_quantity"
                           style="width: 40px;" disabled>
                </div>

                <div class="col-md-6 px-0">
                    <p class="text-secondary mb-0">
                        {{ $booking->photobooks->photobook }}
                    </p>
                </div>

                <div class="col-md-4">
                    <p id="pricephotobook" class="semi-bold text-secondary mb-0 text-end">
                        Rp. {{ number_format($booking->photobooks->price * $booking->pbqty) }}
                    </p>
                </div>
            </div>

            @if($booking->payment_termination == 2)
                @if($booking->paymentStatus === 'CREATED' || $booking->paymentStatus === 'DOWN_PAYMENT_PENDING' || $booking->paymentStatus === 'DOWN_PAYMENT_PAID' || $booking->paymentStatus === 'INSTALLMENT_PENDING')
                    <hr style="border-top: 2px dashed black; background-color: #FFFFFF;">

                    <div class="row mt-4">
                        <div class="col-md-6"></div>

                        <div class="col-md-6">
                            <div class="row">
                                <p class="semi-bold text-secondary text-end mb-0">Total</p>
                            </div>

                            <div class="row">
                                <p id="total" class="semi-bold fs-5 text-secondary mb-0 text-end">
                                    Rp. {{ number_format($booking->totalprice) }}
                                </p>
                            </div>

                            <div class="row" style="font-size: 14px;">
                                <p class="small text-secondary mb-0 text-end">
                                    @if($booking->paymentStatus === 'CREATED' || $booking->paymentStatus === 'DOWN_PAYMENT_PENDING')
                                        2x Payment Left
                                    @elseif($booking->paymentStatus === 'DOWN_PAYMENT_PAID' || $booking->paymentStatus === 'INSTALLMENT_PENDING')
                                        1x Payment Left
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            @endif

            <hr style="border-top: 2px dashed black; background-color: #FFFFFF;">

            <div class="row mb-4 mt-4">
                <div class="col-md-6">
                    <img src="{{ asset('placeholders/visa.png') }}" alt="visa">
                </div>

                <div class="col-md-6">
                    @if($booking->payment_termination == 2)
                        @if($booking->paymentStatus === 'CREATED' || $booking->paymentStatus === 'DOWN_PAYMENT_PENDING')
                            <div class="row">
                                <p class="semi-bold text-secondary text-end mb-0">Down Payment</p>
                            </div>

                            <div class="row">
                                <p id="total" class="semi-bold fs-5 text-secondary mb-0 text-end">
                                    Rp. {{ number_format($booking->downPayment) }}
                                </p>
                            </div>
                        @elseif($booking->paymentStatus === 'DOWN_PAYMENT_PAID'|| $booking->paymentStatus === 'INSTALLMENT_PENDING')
                            <div class="row">
                                <p class="semi-bold text-secondary text-end mb-0">Installment</p>
                            </div>

                            <div class="row">
                                <p id="total" class="semi-bold fs-5 text-secondary mb-0 text-end">
                                    Rp. {{ number_format($booking->installment) }}
                                </p>
                            </div>
                        @else
                            <div class="row">
                                <p class="semi-bold text-secondary text-end mb-0">Total</p>
                            </div>

                            <div class="row">
                                <p id="total" class="semi-bold fs-5 text-secondary mb-0 text-end">
                                    Rp. {{ number_format($booking->totalprice) }}
                                </p>
                            </div>
                        @endif
                    @else
                        <div class="row">
                            <p class="semi-bold text-secondary text-end mb-0">Total</p>
                        </div>

                        <div class="row">
                            <p id="total" class="semi-bold fs-5 text-secondary mb-0 text-end">
                                Rp. {{ number_format($booking->totalprice) }}
                            </p>
                        </div>
                    @endif

                    <input type="hidden" id="grand_total" name="totalprice" value="{{ $booking->totalprice }}">
                    <input type="hidden" id="id_diskon" name="discount_id" value="">
                    <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                </div>
            </div>

            @if($booking->paymentStatus === 'CREATED')
                <div class="row">
                    <button type="submit" class="btn btn-lg btn-kalografi semi-bold btn-block" id="pay-button">
                        @if($booking->payment_termination === 1)
                            Pay Now
                        @elseif($booking->payment_termination === 2)
                            Pay Down Payment
                        @endif
                    </button>
                </div>
            @elseif($booking->paymentStatus === 'FULL_PAYMENT_PENDING')
                <div class="row">
                    <button type="submit" class="btn btn-lg btn-kalografi semi-bold btn-block" id="pay-button">
                        Pay Now
                    </button>
                </div>
            @elseif($booking->paymentStatus === 'DOWN_PAYMENT_PENDING')
                <div class="row">
                    <button type="submit" class="btn btn-lg btn-kalografi semi-bold btn-block" id="pay-button">
                        Pay Down Payment
                    </button>
                </div>
            @elseif($booking->paymentStatus === 'DOWN_PAYMENT_PAID' || $booking->paymentStatus === 'INSTALLMENT_PENDING')
                <div class="row">
                    <button type="submit" class="btn btn-lg btn-kalografi semi-bold btn-block" id="pay-button">
                        Pay Installment
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>

{{--Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key"--}}
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('MIDTRANS_CLIENT_KEY') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function () {
        // SnapToken acquired from previous step
        snap.pay('{{ $booking->paymentToken }}');
    }
</script>
