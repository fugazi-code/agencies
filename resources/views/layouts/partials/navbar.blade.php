
<nav class="navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="bg-white text-center navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="{{ route('dashboard') }}">
            <img src="{{ \Illuminate\Support\Facades\Storage::url(auth()->user()->agency()->pluck('logo_path')[0]) }}"
            style="max-width: 30%;">
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{ route('dashboard') }}">
            <img src="{{ \Illuminate\Support\Facades\Storage::url(auth()->user()->agency()->pluck('logo_path')[0]) }}">
        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler d-none d-lg-block navbar-dark align-self-center mr-3"
                type="button" data-toggle="minimize">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav ml-lg-auto d-flex align-items-center flex-row">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fas fa-circle p-0 mt-1" style="color: #22ff1a;"></span> {{ auth()->user()->email }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="left: 5% !important; position: absolute !important;">
                    <form action="{{ route('logout') }}" method="POST" class="dropdown-item">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link text-dark p-0">
                            Logout
                        </button>
                    </form>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-dark navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
