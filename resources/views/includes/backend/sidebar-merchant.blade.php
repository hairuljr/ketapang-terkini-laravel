    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-warehouse"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Informasi Ketapang</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{ (request()->segment(2) == '') ? 'active' : ''}}">
        <a class="nav-link" href="{{ url('/merchant') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item {{ (request()->segment(2) == 'fashion') ? 'active' : ''}}">
        <a class="nav-link" href="{{ url('/merchant/fashion') }}">
          <i class="fas fa-fw fa-tshirt"></i>
          <span>Info Fashion</span></a>
      </li>
      <li class="nav-item {{ (request()->segment(2) == 'kuliner') ? 'active' : ''}}">
        <a class="nav-link" href="{{ url('/merchant/kuliner') }}">
          <i class="fas fa-fw fa-utensils"></i>
          <span>Info Kuliner</span></a>
      </li>
      <li class="nav-item {{ (request()->segment(2) == 'wisata') ? 'active' : ''}}">
        <a class="nav-link" href="{{ url('/merchant/wisata') }}">
          <i class="fas fa-fw fa-route"></i>
          <span>Info Wisata</span></a>
      </li>
      <li class="nav-item {{ (request()->segment(2) == 'jasa') ? 'active' : ''}}">
        <a class="nav-link" href="{{ url('/merchant/jasa') }}">
          <i class="fas fa-fw fa-briefcase"></i>
          <span>Info Jasa</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->