@extends('layouts.guest.master')
@section('content')
    <div class="container-fluid py-5" style="background-color: #FAFBFA">
        <div class="container">


            <div class="row text-center mb-3">
                <div class="col">
                    <p class="text-bold text-secondary fs-1">
                        Track Your Post-Production Progress
                    </p>
                </div>
                <div class="row text-center mb-3">
                    <div class="col">
                        <p class=" text-secondary">
                            Now you can track the progress of your documentation results
                            by only write your order ID!
                        </p>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-5">

                        <div class="row">
                            <form action="{{ route('requestorder') }}" method="GET">
                                <input type="number" name="order_id" class="form-control form-control-sm text-center">
                        </div>
                        <div class="row">
                            <div class="col">
                                {{-- Button trigger modal --}}
                                <br>
                                <button class="btn btn-kalografi semi-bold" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" style="width: 100%">
                                    Check Now!
                                </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    @include('layouts.partials.footer')
@endsection
