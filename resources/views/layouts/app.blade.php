<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="#"/>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('theme/css/style.css') }}"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.6.7/js/min/perfect-scrollbar.jquery.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        div span {
            padding: 3px 10px;
            white-space: nowrap;
        }

        tr td {
            padding: 3px 10px;
            white-space: nowrap;
        }

        .navbar.fixed-top + .container-fluid {
            padding-top: 1.5rem;
        }

        .nav-link {
            font-weight: 900;
        }

        [x-cloak] {
            display: none !important;
        }

        .table td {
            padding: 5px !important;
        }

        .navbar .navbar-brand-wrapper .navbar-brand img {
            width: 41% !important;
        }

        .sidebar .nav .nav-item a.nav-link {
            padding: 3px !important;
        }

        @media (min-width: 992px) {
            .sidebar-icon-only .sidebar .nav .nav-item .nav-link i {
                font-size: 17px;
                margin: auto;
                padding-top: 13px;
            }
            .sidebar-icon-only .sidebar .nav {
                padding: 29px 0px 10px 0px;
            }
        }

        .content-wrapper {
            min-height: 91vh !important;
        }

        .sidebar {
            min-height: auto;
        }

        select.form-control:not([size]):not([multiple]) {
            height: calc(2.25rem + 9px) !important;
        }
    </style>
    @livewireStyles
    <x-throwexceptions::styles/>
</head>

<body>

<div class="container-scroller">
@if(request()->routeIs('login'))
    {{ $slot }}
@else
    <!-- partial:../../partials/_navbar.html -->
        @include('layouts.partials.navbar')

        <div class="container-fluid">
            <div class="row row-offcanvas row-offcanvas-right">
                <!-- partial -->
                @include('layouts.partials.agency-sidebar')

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
    @endif
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.5/perfect-scrollbar.min.js"
        integrity="sha512-X41/A5OSxoi5uqtS6Krhqz8QyyD8E/ZbN7B4IaBSgqPLRbWVuXJXr9UwOujstj71SoVxh5vxgy7kmtd17xrJRw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('theme/js/off-canvas.js') }}"></script>
<script src="{{ asset('theme/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('theme/js/misc.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
@livewireScripts
<x-throwexceptions::scripts/>
@stack('scripts')
</body>

</html>
