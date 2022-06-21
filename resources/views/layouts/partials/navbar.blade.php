
<nav class="navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="bg-white text-center navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="{{ route('dashboard') }}">
            <img src="{{ storage_path(auth()->user()->agency()->pluck('logo_path')[0]) }}" class="img-fluid">
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{ route('dashboard') }}">
            <img src="{{ asset('images/logo_star_mini.jpg') }}" alt="">
        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler d-none d-lg-block navbar-dark align-self-center mr-3"
                type="button" data-toggle="minimize">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav ml-lg-auto d-flex align-items-center flex-row">
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-link nav-link">
                        <i class="fas fa-unlock"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
        <button class="navbar-toggler navbar-dark navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
