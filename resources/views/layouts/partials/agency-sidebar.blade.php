
<!-- partial:../../partials/_sidebar.html -->
<nav class="bg-white sidebar sidebar-offcanvas" id="sidebar">
    <div class="user-info mt-5 mb-3">
        <p class="name font-weight-bold text-muted">{{ auth()->user()->email }}</p>
        <span class="online mt-2"></span>
    </div>
    <ul class="nav">
        <li class="nav-item @if(request()->routeIs('dashboard')) active @endif">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-dashboard my-auto"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <hr>
        @can('agency')
            <li class="nav-item @if(request()->routeIs('applicants')) active @endif">
                <a class="nav-link p-0" href="{{ route('applicants') }}">
                    <i class="fas fa-folder my-auto"></i>
                    <span class="menu-title">Applicants</span>
                </a>
            </li>
            <hr>
            <li class="nav-item @if(request()->routeIs('finance.vouchers')) active @endif">
                <a class="nav-link p-0" href="{{ route('finance.vouchers') }}">
                    <i class="fas fa-ticket my-auto"></i>
                    <span class="menu-title">Vouchers</span>
                </a>
            </li>
            <hr>
        @endcan
        @can('admin')
            <li class="nav-item @if(request()->routeIs('agencies')) active @endif">
                <a class="nav-link p-0" href="{{ route('agencies') }}">
                    <i class="fas fa-building my-auto"></i>
                    <span class="menu-title">Agency</span>
                </a>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link p-0" href="#">
                    <i class="fas fa-ban my-auto"></i>
                    <span class="menu-title">Blacklists</span>
                </a>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link p-0" href="#">
                    <i class="fas fa-certificate my-auto"></i>
                    <span class="menu-title">Complaints</span>
                </a>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link p-0" href="#">
                    <i class="fas fa-file-contract my-auto"></i>
                    <span class="menu-title">Cases</span>
                </a>
            </li>
            <hr>
            <li class="nav-item @if(request()->routeIs('users')) active @endif">
                <a class="nav-link p-0" href="{{ route('users') }}">
                    <i class="fas fa-users my-auto"></i>
                    <span class="menu-title">Users</span>
                </a>
            </li>
            <hr>
        @endcan
    </ul>
</nav>
