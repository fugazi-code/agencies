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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>
    <link id="pagestyle" rel="stylesheet"
          href="{{ asset('theme/soft-ui/assets/css/soft-ui-dashboard.min.css?v=1.0.6') }}">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    @livewireStyles
    <style>
        .btn.dropdown-toggle.d-block.w-100 {
            margin: 0 !important;
        }
        #perPage {
            padding-right: 2rem!important;
        }
        #filter-active {
            padding-right: 2rem!important;
        }
    </style>
</head>

<body class="g-sidenav-show bg-gray-100">
<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl mt-3 mb-5 fixed-start ms-3 bg-white"
    id="sidenav-main">

    <hr class="horizontal dark mt-0">

    @include('layouts.partials.agency-sidebar')
</aside>

<main class="main-content position-relative bg-gray-100 d-flex align-items-start flex-column"
      style="min-height: 100vh;">
    <div class="w-100  mb-auto">
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
            </div>
        </div>
    </div>

    <!-- partial:../../partials/_footer.html -->
    <footer class="footer mt-auto w-100">
        <div class="row justify-content-center">
                    <span class="col-auto">
                        <a href="#">Yaramay</a> &copy; {{ now()->year }}
                    </span>
        </div>
    </footer>
</main>
<!-- partial -->
@livewireScripts
<!--   Core JS Files   -->
<script src="{{ asset('vendor/gridjs/dist/gridjs.umd.js') }}"></script>
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
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@stack('scripts')
</body>

</html>
