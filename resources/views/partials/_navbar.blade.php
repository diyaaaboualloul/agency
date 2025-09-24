<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <!-- Brand -->
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo" href="{{ route('dashboard') }}">
      <img src="{{ asset('admin/assets/images/logo.svg') }}" alt="logo" />
    </a>
    <a class="navbar-brand brand-logo-mini" href="{{ route('dashboard') }}">
      <img src="{{ asset('admin/assets/images/logo-mini.svg') }}" alt="logo" />
    </a>
  </div>

  <!-- Navbar Menu -->
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <ul class="navbar-nav ml-auto d-flex align-items-center">

      {{-- Show Website --}}
      <li class="nav-item">
        <a class="nav-link btn btn-outline-info px-3 py-1 mr-2" target="_blank" href="{{ route('home') }}">
          👀 View Website
        </a>
      </li>

      {{-- Profile --}}
      <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
          <img class="img-xs rounded-circle" src="{{ asset('admin/assets/images/faces/face8.jpg') }}" alt="Profile image">
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
          <div class="dropdown-header text-center">
            <img class="img-md rounded-circle mb-2" src="{{ asset('admin/assets/images/faces/face8.jpg') }}" alt="Profile image">
            <p class="mb-1 font-weight-semibold">{{ Auth::user()->name }}</p>
            <p class="font-weight-light text-muted mb-0">{{ Auth::user()->email }}</p>
          </div>
          
          <div class="dropdown-divider"></div>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="dropdown-item text-danger">
              🚪 Logout
            </button>
          </form>
        </div>
      </li>
    </ul>

    <!-- Mobile Toggler -->
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>
