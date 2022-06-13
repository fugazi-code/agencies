
<!-- partial:../../partials/_sidebar.html -->
<nav class="bg-white sidebar sidebar-offcanvas mt-5" id="sidebar">
    <div class="user-info mb-0">
        <p class="name">{{ auth()->user()->email }}</p>
        <span class="online mt-2"></span>
    </div>
    <ul class="nav">
        <li class="nav-item @if(request()->routeIs('dashboard')) active @endif">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-dashboard my-auto mr-3"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @can('agency')
            <li class="nav-item @if(request()->routeIs('finance.vouchers')) active @endif">
                <a class="nav-link p-0" href="{{ route('finance.vouchers') }}">
                    <i class="fas fa-ticket my-auto mr-3"></i>
                    <span class="menu-title">Vouchers</span>
                </a>
            </li>
        @endcan
    </ul>
</nav>
