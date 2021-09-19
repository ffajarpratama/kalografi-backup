@extends('pages.admin.layouts.master')
@section('content')
    <div class="container-fluid py-3">

        <div class="row text-center">
            <p class="text-bold text-secondary fs-1">
                Track Your Post-Production Progress
            </p>
        </div>

        <div class="row text-center mb-3">
            <p class="text-secondary">
                Now you can track the progress of your documentation results by only writing your order ID!
            </p>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-5">
                <form action="{{ route('admin.search-result') }}" method="GET">
                    <input type="text" name="order_id" class="form-control form-control-sm text-center" autocomplete="off">
                    <button class="btn btn-kalografi semi-bold mt-3" type="submit" style="width: 100%;">
                        Check Now!
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
