<div class="container">
  <nav class="navbar site-navbar d-flex align-items-center justify-content-between" id="mainNavbar">
    <!-- Brand Logo -->
    <div class="brand-logo">
      <a href="{{ route('home') }}">
        <img src="{{ asset('assets/images/logo/logo-white.svg') }}" alt="Logo" class="light-version-logo" id="navbarLogo">
      </a>
    </div>

    <!-- Hamburger Menu (mobile) -->
    <button class="navbar-toggler d-lg-none border-0 bg-transparent" type="button" id="menuToggle">
      <span class="toggler-icon"></span>
      <span class="toggler-icon"></span>
      <span class="toggler-icon"></span>
    </button>

    @php
      $is = fn ($pattern) => request()->routeIs($pattern) ? 'active' : '';
    @endphp

    <!-- Menu -->
    <ul class="site-menu-main d-flex align-items-center mb-0" id="navbarMenu">
      <li class="{{ $is('home') }}">
        <a href="{{ route('home') }}" class="nav-link-item">Home</a>
      </li>
      <li class="{{ $is('about') }}">
        <a href="{{ route('about') }}" class="nav-link-item">About Us</a>
      </li>
      <li class="{{ $is('services*') }}">
        <a href="{{ route('services') }}" class="nav-link-item">Services</a>
      </li>
      <li class="{{ $is('portfolio*') }}">
        <a href="{{ route('portfolio') }}" class="nav-link-item">Portfolio</a>
      </li>
      <li class="{{ $is('blogs*') }}">
        <a href="{{ route('blogs.index') }}" class="nav-link-item">Blogs</a>
      </li>
      <li class="{{ $is('contact') }}">
        <a href="{{ route('contact') }}" class="nav-link-item">Contact</a>
      </li>

      @guest
        <li><a href="{{ route('login') }}" class="nav-link-item btn-login">Login</a></li>
        <li><a href="{{ route('register') }}" class="nav-link-item btn-register">Register</a></li>
      @else
        <li>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="nav-link-item btn btn-link btn-logout">Logout</button>
          </form>
        </li>
      @endguest
    </ul>
  </nav>
</div>
