<ul class="navbar-nav">

  <li class="nav-item">
    <a class="nav-link {{ request()->is('admin/kehadiran') ? 'active' : '' }}" href="/admin/kehadiran">
      <div
        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
        <i class="ni ni-chart-pie-35 text-dark text-sm opacity-10"></i>
      </div>
      <span class="nav-link-text ms-1">Kehadiran Peserta</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link {{ request()->is('admin/peserta') ? 'active' : '' }}" href="/admin/peserta">
      <div
        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
        <i class="ni ni-badge text-dark text-sm opacity-10"></i>
      </div>
      <span class="nav-link-text ms-1">Peserta Magang</span>
    </a>
  </li>
  <!-- <li class="nav-item">
          <a class="nav-link " href="../pages/profile.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li> -->
</ul>