<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/logo_kaltim.png') }}">

    <title>WIBELTAN - @yield('title')</title>
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('fontawesome/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/brands.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/solid.css') }}" rel="stylesheet">

    {{-- custom style --}}
    <link href="{{ asset('bootstrap/css/style.css') }}" rel="stylesheet">
    <style>
        :root {
            --breadcrumb-background: url('{{ asset('img/landscape-green-color.png') }}');
        }
    </style>
    @stack('style')

</head>

<body>

    @yield('content')

    <footer class="container pt-4 my-md-5 pt-md-5">
        <div class="border-bottom">
            <div class="mx-auto">
                <div class="row">
                    <div class="col">
                        <h5>Alamat</h5>
                        <ul class="list-unstyled text-small">
                            <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Balai
                                    Penyuluhan dan Pengembangan Sumber Daya Manusia Pertanian</a>
                            </li>
                            <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Jl. Thoyib
                                    Hadiwijaya No.36, Sempaja Selatan, Samarinda - Kalimantan Timur</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col">
                        <h5>Kontak Kami</h5>
                        <ul class="list-unstyled text-small">
                            <li class="mb-1"><a class="link-secondary text-decoration-none"
                                    href="#">bppsdmpsempaja@gmail.com</a>
                            </li>
                            <li class="mb-1"><a class="link-secondary text-decoration-none"
                                    href="#">@uptd_bppsdmpsempaja</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col">
                        <h5>Mitra Kami</h5>
                        <ul class="list-unstyled text-small">
                            <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">KTNA</a>
                            </li>
                            <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">
                                    PETANI ANDALAN / MILENIAL </a>
                            </li>
                            <li class="mb-1"><a class="link-secondary text-decoration-none"
                                    href="#">PERHIPTANI</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="text-center py-4">
            <img class="d-block mx-auto mb-2" src="http://www.simpeltan.test/img/logo_kaltim.png" alt=""
                width="72">
            <b class="display-6 fw-bold">UPTD BPPSDMP</b>
            <br>
            <small class="mb-1 text-muted">&copy; 2023-2024 UPTD BPPSDMP PROVINSI KALIMANTAN
                TIMUR</small>
            <div class="py-2">
                <a href="http://" class="text-decoration-none text-muted h4">
                    <i class="fa-brands fa-facebook"></i>
                </a>
                <a href="http://" class="text-decoration-none text-muted h4">
                    <i class="fa-brands fa-instagram"></i>
                </a>
            </div>
        </div>
    </footer>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @stack('scripts')
</body>

</html>
