<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">

    {{-- Company Branding --}}
    <li class="nav-item text-center py-4 border-bottom company-brand">
      <i class="typcn typcn-aperture menu-icon mb-2"></i>
      <h4 class="brand-name">A to Z</h4>
      <small class="brand-sub">Admin Panel</small>
    </li>

    {{-- Dashboard --}}
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="menu-icon typcn typcn-document-text"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    {{-- Site Pages --}}
<li class="nav-item">
  <a class="nav-link" data-bs-toggle="collapse" href="#sitePages" aria-expanded="false" aria-controls="sitePages">
    <i class="menu-icon typcn typcn-home"></i>
    <span class="menu-title">Site Pages</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse" id="sitePages" data-bs-parent="#sidebar"> {{-- 👈 added data-bs-parent --}}
    <ul class="nav flex-column sub-menu">
      <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">👁 View Home</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('admin.home.index') }}">✏️ Edit Home</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">👁 View About</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('admin.about.index') }}">✏️ Edit About</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('admin.contact-info.edit') }}">📞 Contact Info</a></li>
    </ul>
  </div>
</li>

{{-- Content --}}
<li class="nav-item">
  <a class="nav-link" data-bs-toggle="collapse" href="#contentMenu" aria-expanded="false" aria-controls="contentMenu">
    <i class="menu-icon typcn typcn-briefcase"></i>
    <span class="menu-title">Content</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse" id="contentMenu" data-bs-parent="#sidebar"> {{-- 👈 added data-bs-parent --}}
    <ul class="nav flex-column sub-menu">
      <li class="nav-item"><a class="nav-link" href="{{ route('admin.services.index') }}">💼 Services</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('admin.projects.index') }}">📂 Portfolio</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('admin.teams.index') }}">👥 Teams</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('admin.blogs.index') }}">📰 Blogs</a></li>
    </ul>
  </div>
</li>

{{-- Admin Tools --}}
@if(Auth::user()->hasRole('admin'))
<li class="nav-item">
  <a class="nav-link" data-bs-toggle="collapse" href="#adminTools" aria-expanded="false" aria-controls="adminTools">
    <i class="menu-icon typcn typcn-key-outline"></i>
    <span class="menu-title">Admin Tools</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse" id="adminTools" data-bs-parent="#sidebar"> {{-- 👈 added data-bs-parent --}}
    <ul class="nav flex-column sub-menu">
      <li class="nav-item"><a class="nav-link" href="{{ route('admin.users.index') }}">🔑 Assign Roles</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('admin.roles.index') }}">⚙️ Manage Roles</a></li>
    </ul>
  </div>
</li>
@endif

    {{-- User Links --}}
    <li class="nav-item mt-3">
      <a class="nav-link special-link" target="_blank" href="{{ route('home') }}">
        <i class="menu-icon typcn typcn-world"></i>
        <span class="menu-title">👀 View Website</span>
      </a>
    </li>

   <li class="nav-item">
  <a class="nav-link special-link" href="{{ route('profile.edit') }}">
    <i class="menu-icon typcn typcn-user"></i>
    <span class="menu-title">🙍 My Profile</span>
  </a>
</li>


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
<style>
  /* Sidebar transparency */
  .sidebar {
    background: rgba(0, 0, 0, 0.4) !important;
    backdrop-filter: blur(6px);
  }

  /* Links */
  .nav .nav-link {
    color: #fff;
    transition: all 0.3s ease;
  }
  .nav .nav-link:hover {
    background: rgba(255, 255, 255, 0.15);
    color: #0d6efd;
    transform: translateX(4px);
  }

  /* Special links */
  
  .special-link {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 6px;
    margin: 6px 12px;
    transition: all 0.3s ease;
  }
  .special-link:hover {
    background: #0d6efd;
    color: #fff !important;
  }
  .special-link i {
    color: #0d6efd;
  }
  .special-link:hover i {
    color: #fff;
  }

  /* Branding block */
  .company-brand {
    background: transparent;
  }
  .company-brand .menu-icon {
    font-size: 32px;
    color: #0d6efd;
    animation: spinIcon 6s linear infinite;
  }
  .company-brand .brand-name {
    color: #fff;
    font-weight: bold;
  }
  .company-brand .brand-sub {
    font-size: 13px;
    color: #ddd;
  }

  @keyframes spinIcon {
    from { transform: rotate(0deg); }
    to   { transform: rotate(360deg); }
  }
</style>
