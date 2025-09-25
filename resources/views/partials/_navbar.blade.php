<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-sm d-block d-lg-none">
  <div class="container-fluid">

    {{-- Brand --}}
    <a class="navbar-brand fw-bold text-primary" href="{{ route('dashboard') }}">
      A to Z Admin
    </a>

    {{-- Mobile Toggler --}}
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
      aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    {{-- Navbar Content --}}
    <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
      <ul class="navbar-nav align-items-center">

        {{-- View Website --}}
        <li class="nav-item me-2">
          <a class="btn btn-outline-info px-3 py-1" target="_blank" href="{{ route('home') }}">
            👀 View Website
          </a>
        </li>

        {{-- Profile Dropdown --}}
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            <img class="rounded-circle" src="{{ asset('admin/assets/images/faces/face8.jpg') }}" 
                 alt="Profile image" width="36" height="36">
          </a>
          <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
            <li class="text-center p-3 border-bottom">
              <img class="rounded-circle mb-2" src="{{ asset('admin/assets/images/faces/face8.jpg') }}" 
                   alt="Profile image" width="60" height="60">
              <p class="mb-0 fw-semibold">{{ Auth::user()->name }}</p>
              <small class="text-muted">{{ Auth::user()->email }}</small>
            </li>

            <li><hr class="dropdown-divider"></li>

            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item text-danger fw-semibold">
                  🚪 Logout
                </button>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
