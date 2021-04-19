<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Import CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link href="{{ asset('highdmin/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    @yield('css')

    <title>@yield('title') | Pemilu Raya STMIK Sumedang</title>
</head>

<body>
    @yield('content')

    <!-- Optional JavaScript -->
    <!-- jQuery first and Bootstrap JS -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('highdmin/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    @include('sweetalert::alert')
    @yield('js')
</body>

</html>
