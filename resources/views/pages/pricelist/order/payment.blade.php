@extends('layouts.guest.master')
@section('content')
    <div class="container-fluid py-5" style="background-color: #FAFBFA">
        <div class="container">
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    <strong>{{ session('message') }}</strong>
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <img src="{{ asset('placeholders/Group 106.png') }}" alt="peeps" class="d-flex mx-auto">
                </div>
            </div>

            @if($bookingSession->isPaymentCompleted == false)
                <div class="row text-center mb-3">
                    <div class="col">
                        <p class="text-bold text-secondary fs-1">
                            Waiting for your payment confirmation
                        </p>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <div class="card shadow-sm border-0 text-center px-4 py-2" style="border-radius: 20px">
                            <div class="card-body">
                                <div class="row">
                                    <p class="text-secondary semi-bold mb-1">
                                        Transfer to : <br>
                                        Bank Mandiri -  098 198 2829 11 a.n Adhin Alifarchan
                                    </p>
                                </div>

                                <div class="row">
                                    @if($bookingSession->payment_termination == 2)
                                        @if($bookingSession->downPayment && $bookingSession->installment)
                                            <p class="text-kalografi text-bold fs-2">Rp. {{ number_format($bookingSession->downPayment) }}</p>
                                        @elseif($bookingSession->installment)
                                            <p class="text-kalografi text-bold fs-2">Rp. {{ number_format($bookingSession->installment) }}</p>
                                        @endif
                                    @else
                                        <p class="text-kalografi text-bold fs-2">Rp. {{ number_format($bookingSession->totalprice) }}</p>
                                    @endif
                                </div>

                                <div class="row">
                                    <form action="{{ route('update.price', $bookingSession->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-lg btn-kalografi semi-bold btn-block">
                                            @if($bookingSession->payment_termination == 2)
                                                @if($bookingSession->downPayment && $bookingSession->installment)
                                                    Pay Down Payment
                                                @elseif($bookingSession->installment)
                                                    Pay Installment
                                                @endif
                                            @else
                                                Pay Total Price
                                            @endif
                                        </button>
                                    </form>

                                    {{--Button trigger modal--}}
{{--                                    <button class="btn btn-kalografi semi-bold btn-block" data-bs-toggle="modal" data-bs-target="#exampleModal">--}}
{{--                                        Confirm Payment--}}
{{--                                    </button>--}}

                                    {{--Modal--}}
{{--                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                                        <div class="modal-dialog modal-dialog-centered">--}}
{{--                                            <div class="modal-content p-4" style="border-radius: 15px">--}}
{{--                                                <div class="modal-body">--}}
{{--                                                    <div class="row justify-content-center mb-4">--}}
{{--                                                        <div class="col-md-4">--}}
{{--                                                            <img src="{{ asset('placeholders/checked 1.png') }}" alt="checked">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <p class="text-secondary text-bold fs-4">--}}
{{--                                                            Payment Confirmed!--}}
{{--                                                        </p>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row">--}}
{{--                                                        <div class="col">--}}
{{--                                                            <a href="{{ route('landing') }}" class="btn btn-kalografi" style="display: block">--}}
{{--                                                                Back to Home--}}
{{--                                                            </a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    {{--End Modal--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row text-center mb-3">
                    <div class="col">
                        <p class="text-bold text-secondary fs-1">
                            Payment complete! <br>
                            Thank you for using our service!
                        </p>
                    </div>

                    <div class="row">
                        <div class="col">
                            <a class="btn btn-lg btn-kalografi semi-bold btn-block" href="{{ route('landing') }}">
                                Back to Home
                            </a>
                        </div>
                    </div>
                </div>
            @endif




        </div>
    </div>
    @include('layouts.partials.footer')
@endsection
