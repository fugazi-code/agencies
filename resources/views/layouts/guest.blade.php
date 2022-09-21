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
                        <a href="#">Star Admin</a> &copy; {{ now()->year }}
                    </span>
            </div>
        </footer>
        <!-- partial -->
    </div>
</div>

<footer class="footer pt-3  ">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                    © <script>
                        document.write(new Date().getFullYear())
                    </script>,
                    made with <i class="fa fa-heart"></i> by
                    <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                    for a better web.
                </div>
            </div>
            <div class="col-lg-6">
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

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
