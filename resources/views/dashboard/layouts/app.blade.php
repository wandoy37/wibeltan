<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>WIBELTAN - @yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{ asset('kaiadmin_lite') }}/assets/img/kaiadmin/favicon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('kaiadmin_lite') }}/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                "families": ["Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ['{{ asset('kaiadmin_lite') }}/assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('kaiadmin_lite') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('kaiadmin_lite') }}/assets/css/plugins.min.css">
    <link rel="stylesheet" href="{{ asset('kaiadmin_lite') }}/assets/css/kaiadmin.min.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('kaiadmin_lite') }}/assets/css/demo.css">
</head>

<body>
    <div class="wrapper">
        @include('dashboard.layouts.sidebar')

        <div class="main-panel">
            @include('dashboard.layouts.navbar')

            <div class="container">
                @yield('content')
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="copyright ms-auto">
                        {{ date('Y') }}, made with <i class="far fa-copyright"></i> by <a
                            href="http://www.bppsdmsempaja.kaltimprov.go.id.com">UPTD BPPSDMP Provinsi Kalimantan
                            Timur</a>
                    </div>
                </div>
            </footer>
        </div>

    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('kaiadmin_lite') }}/assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('kaiadmin_lite') }}/assets/js/core/popper.min.js"></script>
    <script src="{{ asset('kaiadmin_lite') }}/assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('kaiadmin_lite') }}/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Datatables -->
    <script src="{{ asset('kaiadmin_lite') }}/assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('kaiadmin_lite') }}/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('kaiadmin_lite') }}/assets/js/kaiadmin.min.js"></script>
    @stack('scripts')
</body>

</html>
