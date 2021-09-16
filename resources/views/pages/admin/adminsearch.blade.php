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
                                <div class="progress-bar" id="progress_bar" role="progressbar" aria-valuenow="73"
                                    aria-valuemin="0" aria-valuemax="100" style=" width: 75% ; background-color: #8F9C69">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <p id="percentage" class="progress-label" style=" float: rigt; margin-left: 1em;">
                                75%
                            </p>
                        </div>
                    </div>

                    <div row class="mb-4">
                        <div class="col">
                            Current progress: -
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">

                            <ul class="StepProgress">
                                <li id="coloumn_status_1" class="StepProgress-item">
                                    <strong>All photos
                                        uploaded
                                    </strong>
                                    <label>{{ $status->updated_at }}</label>
                                </li>
                                <li id="coloumn_status_2" class=" StepProgress-item "><strong>Wedding photobook delivered
                                    </strong>

                                </li>
                                <li id="coloumn_status_3" class=" StepProgress-item "><strong>Video uploaded</strong>

                                <li id="coloumn_status_4" class=" StepProgress-item"><strong>Printing 16R photos</strong>
                                </li>

                            </ul>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <form action="/request/status" method="POST">
                                @csrf
                                <input type="hidden" class="form-control form-control-sm text-center" name="bookingid"
                                    value="{{ $booking->id }}">
                                <input type="hidden" name="status_value" value="{{ $status->current_status }} + 1">
                                <select class="form-control text-secondary small" name="status_value" id="">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <button type="submit" class="btn btn-kalografi semi-bold">gas</button>
                            </form>
                        </div>
                    </div>

                </div>

                @include('pages.partials.receipt')
            </div>
        </div>
    </div>
    <script>
        var status = {{ $status->current_status }};

        function ubah() {
            if (status == 1) {
                document.getElementById("coloumn_status_1").classList.toggle('');
            } else if (status == 2) {
                document.getElementById("coloumn_status_1").classList.toggle('is-done');
                document.getElementById("coloumn_status_2").classList.toggle('');
            } else if (status == 3) {
                document.getElementById("coloumn_status_1").classList.toggle('is-done');
                document.getElementById("coloumn_status_2").classList.toggle('is-done');
                document.getElementById("coloumn_status_3").classList.toggle('');
            } else if (status == 4) {
                document.getElementById("coloumn_status_1").classList.toggle('is-done');
                document.getElementById("coloumn_status_2").classList.toggle('is-done');
                document.getElementById("coloumn_status_3").classList.toggle('is-done');
                document.getElementById("coloumn_status_4").classList.toggle('');
            } else if (status == 5) {
                document.getElementById("coloumn_status_1").classList.toggle('is-done');
                document.getElementById("coloumn_status_2").classList.toggle('is-done');
                document.getElementById("coloumn_status_3").classList.toggle('is-done');
                document.getElementById("coloumn_status_4").classList.toggle('is-done');
            }
        }

        function progress() {
            if (status == 1) {
                document.getElementById("progress_bar").style.width = "0%";
            } else if (status == 2) {
                document.getElementById("progress_bar").style.width = "25%";
            } else if (status == 3) {
                document.getElementById("progress_bar").style.width = "50%";
            } else if (status == 4) {
                document.getElementById("progress_bar").style.width = "75%";
            } else if (status == 5) {
                document.getElementById("progress_bar").style.width = "100%";
            }
        }

        function progresspercentage() {
            if (status == 1) {
                document.getElementById("percentage").innerHTML = "0%";
            } else if (status == 2) {
                document.getElementById("percentage").innerHTML = "25%";
            } else if (status == 3) {
                document.getElementById("percentage").innerHTML = "50%";
            } else if (status == 4) {
                document.getElementById("percentage").innerHTML = "75%";
            } else if (status == 5) {
                document.getElementById("percentage").innerHTML = "100%";
            }
        }

        progresspercentage();
        progress();
        ubah();
    </script>

    @include('layouts.partials.footer')
@endsection
