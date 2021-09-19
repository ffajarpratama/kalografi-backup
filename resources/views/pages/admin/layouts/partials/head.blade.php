<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

{{--CUSTOM FONTS FOR THIS TEMPLATE--}}
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/911ba89c0b.js" crossorigin="anonymous"></script>

{{--CUSTOM STYLES FOR THIS TEMPLATE--}}
<link rel="stylesheet" href="{{ asset('sb-admin-2/css/sb-admin-2.min.css') }}">

<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    .btn-kalografi {
        color: #FFFFFF;
        background-color: #8F9C69;
        opacity: 100%;
    }

    .btn-kalografi:hover {
        color: #FFFFFF;
        background-color: #8F9C69;
        opacity: 80%;
    }

    .btn-outline-kalografi {
        color: #8F9C69;
        border-color: #8F9C69;
    }

    .btn-outline-kalografi:hover {
        color: #FFFFFF;
        background-color: #8F9C69;
    }

    .text-kalografi {
        color: #8F9C69;
    }

    .text-bold {
        font-weight: 700;
    }

    .semi-bold {
        font-weight: 600;
    }
</style>
