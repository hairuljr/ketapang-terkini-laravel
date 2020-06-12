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
        <a class="nav-link" href="{{ url('/admin') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>DASHBOARD</span></a>
      </li>
      
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ (request()->segment(2) == 'banner') ? 'active' : ''}} {{ (request()->segment(2) == 'info-kite') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fas fa-fw fa-home"></i>
          <span>HOME</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ (request()->segment(2) == 'banner') ? 'active' : ''}}" href="{{ url('/admin/banner') }}">Banner</a>
            <a class="collapse-item {{ (request()->segment(2) == 'info-kite') ? 'active' : ''}}" href="{{ url('/admin/info-kite') }}">Info Kite</a>
          </div>
        </div>
      </li>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item
      {{ (request()->segment(2) == 'info-fashion') ? 'active' : ''}}
      {{ (request()->segment(2) == 'info-kuliner') ? 'active' : ''}}
      {{ (request()->segment(2) == 'info-wisata') ? 'active' : ''}}
      {{ (request()->segment(2) == 'info-jasa') ? 'active' : ''}}
      ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-info-circle"></i>
          <span>INFO</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ (request()->segment(2) == 'info-fashion') ? 'active' : ''}}" href="{{ url('/admin/info-fashion') }}">Info Fashion</a>
            <a class="collapse-item {{ (request()->segment(2) == 'info-kuliner') ? 'active' : ''}}" href="{{ url('/admin/info-kuliner') }}">Info Kuliner</a>
            <a class="collapse-item {{ (request()->segment(2) == 'info-wisata') ? 'active' : ''}}" href="{{ url('/admin/info-wisata') }}">Info Wisata</a>
            <a class="collapse-item {{ (request()->segment(2) == 'info-jasa') ? 'active' : ''}}" href="{{ url('/admin/info-jasa') }}">Info Jasa</a>
          </div>
        </div>
      </li>

      <li class="nav-item {{ (request()->segment(2) == 'event-loker') ? 'active' : ''}}">
        <a class="nav-link" href="{{ url('/admin/event-loker') }}">
          <i class="fas fa-fw fa-calendar-alt"></i>
          <span>EVENT & LOKER</span></a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item 
      {{ (request()->segment(2) == 'tagar-berita') ? 'active' : ''}}
      {{ (request()->segment(2) == 'kategori-berita') ? 'active' : ''}}
      {{ (request()->segment(2) == 'kelola-berita') ? 'active' : ''}}
      ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          <i class="fas fa-fw fa-newspaper"></i>
          <span>BERITA</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ (request()->segment(2) == 'tagar-berita') ? 'active' : ''}}" href="{{ url('/admin/tagar-berita') }}">Kelola Tagar</a>
            <a class="collapse-item {{ (request()->segment(2) == 'kategori-berita') ? 'active' : ''}}" href="{{ url('/admin/kategori-berita') }}">Kelola Kategori</a>
            <a class="collapse-item {{ (request()->segment(2) == 'kelola-berita') ? 'active' : ''}}" href="{{ url('/admin/kelola-berita') }}">Kelola Berita</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->