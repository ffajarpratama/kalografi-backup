@extends('layouts.guest.master')
@section('content')
    <div class="container-fluid py-5" style="background-color: #FAFBFA">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <img src="{{ asset('placeholders/Group 106.png') }}" alt="peeps" class="d-flex mx-auto">
                </div>
            </div>

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
                                <p class="text-secondary semi-bold mb-1">Transfer to :</p>
                            </div>
                            <div class="row">
                                <p class="text-secondary semi-bold mb-1">
                                    Bank Mandiri -  098 198 2829 11 a.n Adhin Alifarchan
                                </p>
                            </div>
                            <div class="row">
                                <p class="text-kalografi text-bold fs-2">IDR 9,800,000</p>
                            </div>
                            <div class="row">
                                <div class="col">
                                    {{--Button trigger modal--}}
                                    <button class="btn btn-kalografi semi-bold" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width: 100%">
                                        Confirm Payment
                                    </button>

                                    {{--Modal--}}
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content p-4" style="border-radius: 15px">
                                                <div class="modal-body">
                                                    <div class="row justify-content-center mb-4">
                                                        <div class="col-md-4">
                                                            <img src="{{ asset('placeholders/checked 1.png') }}" alt="checked">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <p class="text-secondary text-bold fs-4">
                                                            Payment Confirmed!
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <a href="{{ route('landing') }}" class="btn btn-kalografi" style="display: block">
                                                                Back to Home
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--End Modal--}}

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
