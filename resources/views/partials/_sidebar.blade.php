<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">

    {{-- Company Branding --}}
    <li class="nav-item text-center py-4 border-bottom company-brand">
      <i class="typcn typcn-aperture menu-icon mb-2"></i>
      <h4 class="brand-name">A to Z</h4>
      <small class="brand-sub">Admin Panel</small>
    </li>

    {{-- Main Menu --}}

    {{-- Dashboard --}}
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="menu-icon typcn typcn-document-text"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    {{-- Home --}}
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#homeMenu" aria-expanded="false" aria-controls="homeMenu">
        <i class="menu-icon typcn typcn-home"></i>
        <span class="menu-title">Home</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="homeMenu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">👁 View Home</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.home.index') }}">✏️ Edit Home</a></li>
        </ul>
      </div>
    </li>

    {{-- About --}}
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#aboutMenu" aria-expanded="false" aria-controls="aboutMenu">
        <i class="menu-icon typcn typcn-info-large"></i>
        <span class="menu-title">About</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="aboutMenu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">👁 View About</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.about.index') }}">✏️ Edit About</a></li>
        </ul>
      </div>
    </li>

    {{-- Contact Info --}}
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#contactMenu" aria-expanded="false" aria-controls="contactMenu">
        <i class="menu-icon typcn typcn-phone-outline"></i>
        <span class="menu-title">Contact Info</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="contactMenu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.contact-info.edit') }}">👁 View Contact Info</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.contact-info.edit') }}">✏️ Edit Contact Info</a></li>
        </ul>
      </div>
    </li>

    {{-- Services --}}
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#servicesMenu" aria-expanded="false" aria-controls="servicesMenu">
        <i class="menu-icon typcn typcn-briefcase"></i>
        <span class="menu-title">Services</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="servicesMenu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.services.index') }}">👁 View Services</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.services.create') }}">✏️ Add Services</a></li>
        </ul>
      </div>
    </li>

    {{-- Portfolio --}}
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#portfolioMenu" aria-expanded="false" aria-controls="portfolioMenu">
        <i class="menu-icon typcn typcn-folder"></i>
        <span class="menu-title">Portfolio</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="portfolioMenu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.projects.index') }}">👁 View Portfolio</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.projects.create') }}">✏️ Add Portfolio</a></li>
        </ul>
      </div>
    </li>

    {{-- Teams --}}
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#teamsMenu" aria-expanded="false" aria-controls="teamsMenu">
        <i class="menu-icon typcn typcn-group"></i>
        <span class="menu-title">Teams</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="teamsMenu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.teams.index') }}">👁 View Teams</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.teams.create') }}">✏️ Add Teams</a></li>
        </ul>
      </div>
    </li>

    {{-- Blogs --}}
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#blogsMenu" aria-expanded="false" aria-controls="blogsMenu">
        <i class="menu-icon typcn typcn-news"></i>
        <span class="menu-title">Blogs</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="blogsMenu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.blogs.index') }}">👁 View Blogs</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.blogs.create') }}">✏️ Add Blogs</a></li>
        </ul>
      </div>
    </li>

    {{-- User Menu --}}

    {{-- View Website --}}
    <li class="nav-item">
      <a class="nav-link special-link" target="_blank" href="{{ route('home') }}">
        <i class="menu-icon typcn typcn-world"></i>
        <span class="menu-title">👀 View Website</span>
      </a>
    </li>

    {{-- Profile --}}
    <li class="nav-item">
      <a class="nav-link special-link" href="#">
        <i class="menu-icon typcn typcn-user"></i>
        <span class="menu-title">🙍 My Profile</span>
      </a>
    </li>

    {{-- Logout --}}
    <li class="nav-item">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="nav-link special-link text-danger w-100 text-left">
          <i class="menu-icon typcn typcn-power"></i>
          <span class="menu-title">🚪 Logout</span>
        </button>
      </form>
    </li>
  </ul>
</nav>

{{-- Sidebar Styles --}}

