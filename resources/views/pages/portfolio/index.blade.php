@extends('layouts.guest.master')
@section('content')
    {{-- PRODUCTS SECTION --}}
    @include('pages.portfolio.prewedding')
    @include('pages.portfolio.wedding')
    @include('pages.portfolio.engagement')
    @include('pages.portfolio.consultation')
    {{-- END PRODUCTS SECTION --}}

    {{-- FOOTER --}}
    @include('layouts.partials.footer')
    {{-- END FOOTER --}}
@endsection
