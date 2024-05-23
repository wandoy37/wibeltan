<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="32x32" href="https://bppsdmsempaja.kaltimprov.go.id/img/logo_kaltim.png">
    <title>WIBELTAN @yield('title')</title>
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        body {
            padding-bottom: 10rem;
        }
    </style>

    @stack('style')

</head>

<body>

    @yield('content')

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    @stack('scripts')
</body>

</html>
