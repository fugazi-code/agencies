<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="#"/>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('theme/soft-ui/assets/css/nucleo-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/soft-ui/assets/css/nucleo-svg.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link id="pagestyle" rel="stylesheet" href="{{ asset('theme/soft-ui/assets/css/soft-ui-dashboard.min.css?v=1.0.6') }}">

    @livewireStyles
    <x-throwexceptions::styles/>
</head>

<body class="g-sidenav-show bg-gray-100">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-white"
           id="sidenav-main">

        <hr class="horizontal dark mt-0">

        @include('layouts.partials.agency-sidebar')
    </aside>

    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <!-- partial:../../partials/_navbar.html -->
        @include('layouts.partials.navbar')
        <!-- End Navbar -->

        <div class="container-fluid">
            <div class="row row-offcanvas row-offcanvas-right">
                <!-- partial -->


                <div class="content-wrapper">
                    {{ $slot }}
                </div>

                <!-- partial:../../partials/_footer.html -->
                <footer class="footer">
                    <div class="container-fluid clearfix">
                        <span class="float-right">
                            <a href="#">Yaramay</a> &copy; {{ now()->year }}
                        </span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
        </div>
    </div>

    @livewireScripts
    <!--   Core JS Files   -->
    <script src="{{ asset('theme/soft-ui/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('theme/soft-ui/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme/soft-ui/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('theme/soft-ui/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('theme/soft-ui/assets/js/soft-ui-dashboard.min.js') }}"></script>
    <x-throwexceptions::scripts/>
    @stack('scripts')
</body>

</html>
