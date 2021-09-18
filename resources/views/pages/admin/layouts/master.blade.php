<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name') }}</title>
    @include('pages.admin.layouts.partials.head')
</head>

<body id="page-top">
<div id="wrapper">
    @include('pages.admin.layouts.partials.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('pages.admin.layouts.partials.header')
            @yield('content')
        </div>
        @include('pages.admin.layouts.partials.footer')
    </div>
</div>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
@include('pages.admin.layouts.partials.script')
</body>

</html>
