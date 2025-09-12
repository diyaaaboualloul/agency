<div class="container">
  <nav class="navbar site-navbar">
    <!-- Brand Logo-->
    <div class="brand-logo">
      <a href="{{ route('home') }}">
        <img src="{{ asset('assets/images/logo/logo-white.svg') }}" alt="Logo" class="light-version-logo">
      </a>
    </div>
    <ul class="site-menu-main">
      <li><a href="{{ route('home') }}" class="nav-link-item">Home</a></li>
      <li><a href="{{ route('about') }}" class="nav-link-item">About Us</a></li>
      <li><a href="{{ route('services') }}" class="nav-link-item">Services</a></li>
      <li><a href="{{ route('portfolio') }}" class="nav-link-item">Portfolio</a></li>
      <li><a href="{{ route('blogs') }}" class="nav-link-item">Blogs</a></li>
      <li><a href="{{ route('contact') }}" class="nav-link-item">Contact</a></li>

      @guest
        <li><a href="{{ route('login') }}" class="nav-link-item">Login</a></li>
        <li><a href="{{ route('register') }}" class="nav-link-item">Register</a></li>
      @else
        <li>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="nav-link-item btn btn-link">Logout</button>
          </form>
        </li>
      @endguest
    </ul>
  </nav>
</div>
