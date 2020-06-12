<style>
  .buttonku {
  font-size: 11px;
  padding-top: 1.5rem;
  padding-bottom: 1.5rem;
  padding-left: 20px;
  padding-right: 20px;
  font-weight: 400;
  color: #000000;
  text-transform: uppercase;
  letter-spacing: 2px;
  opacity: 1 !important;
}
</style>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">Informasi Ketapang</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        
        <li class="nav-item {{ (request()->segment(1) == '') ? 'active' : '' }}">
          <a href="{{ url('/') }}" class="nav-link mt-3 mb-3 my-2 py-2">Home</a>
        </li>
        <li class="nav-item {{ (request()->segment(1) == 'info') ? 'active' : '' }}">
          <a href="{{ url('/info') }}" class="nav-link mt-3 mb-3 my-2 py-2">Info</a>
        </li>
        <li class="nav-item {{ (request()->segment(1) == 'event-loker') ? 'active' : '' }}">
          <a href="{{ url('/event-loker') }}" class="nav-link mt-3 mb-3 my-2 py-2">Event & Loker</a>
        </li>
        <li class="nav-item {{ (request()->segment(1) == 'berita') ? 'active' : '' }}">
          <a href="{{ url('/berita') }}" class="nav-link mt-3 mb-3 my-2 py-2">Berita</a>
        </li>
        <li class="nav-item">
          @guest
          <form>
            @csrf
            <button class="buttonku btn btn-outline-success mt-3 mb-3 my-2 py-2" type="button" onclick="event.preventDefault(); location.href='{{url('login')}}';">Login</button>
          </form>
          @endguest

          @auth
          @if (Auth::user()->roles === "MERCHANT")
            <li class="nav-item">
              <a href="{{ url('merchant') }}" class="nav-link mt-3 mb-3 my-2 py-2">Dashboard</a>
            </li>
          @endif
          <form method="POST" action="{{ url('logout') }}">
            @csrf
            <button class="buttonku btn btn-outline-success mt-3 mb-3 my-2 py-2" type="submit">Logout</button>
          </form>
          @endauth
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- END nav -->