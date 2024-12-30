<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link {{ request()->is('presensi') ? 'active' : '' }}" href="/presensi">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-active-40 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Presensi</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('kehadiran') ? 'active' : '' }}" href="/kehadiran">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-chart-pie-35 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Kehadiranku</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('profile') ? 'active' : '' }}" href="/profile">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
        </a>
    </li>
</ul>
