{{-- Sidebar Menu Items --}}

{{-- Dashboard --}}
<li class="nav-item">
  <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" 
     href="{{ route('dashboard') }}">
    <i class="menu-icon typcn typcn-document-text"></i>
    <span class="menu-title">Dashboard</span>
  </a>
</li>

{{-- Site Pages --}}
<li class="nav-item">
  <a class="nav-link {{ request()->routeIs('home') || request()->routeIs('about') || request()->routeIs('admin.home.*') || request()->routeIs('admin.about.*') || request()->routeIs('admin.contact-info.*') ? 'active' : '' }}" 
     data-bs-toggle="collapse" href="#sitePages" 
     aria-expanded="{{ request()->routeIs('home') || request()->routeIs('about') || request()->routeIs('admin.home.*') || request()->routeIs('admin.about.*') || request()->routeIs('admin.contact-info.*') ? 'true' : 'false' }}" 
     aria-controls="sitePages">
    <i class="menu-icon typcn typcn-home"></i>
    <span class="menu-title">Site Pages</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse {{ request()->routeIs('home') || request()->routeIs('about') || request()->routeIs('admin.home.*') || request()->routeIs('admin.about.*') || request()->routeIs('admin.contact-info.*') ? 'show' : '' }}" 
       id="sitePages" data-bs-parent="#sidebar">
    <ul class="nav flex-column sub-menu">
      <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">👁 View Home</a></li>
      <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.home.*') ? 'active' : '' }}" href="{{ route('admin.home.index') }}">✏️ Edit Home</a></li>
      <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">👁 View About</a></li>
      <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.about.*') ? 'active' : '' }}" href="{{ route('admin.about.index') }}">✏️ Edit About</a></li>
      <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.contact-info.*') ? 'active' : '' }}" href="{{ route('admin.contact-info.edit') }}">📞 Contact Info</a></li>
    </ul>
  </div>
</li>

{{-- Content --}}
<li class="nav-item">
  <a class="nav-link {{ request()->routeIs('admin.services.*') || request()->routeIs('admin.projects.*') || request()->routeIs('admin.teams.*') || request()->routeIs('admin.blogs.*') ? 'active' : '' }}" 
     data-bs-toggle="collapse" href="#contentMenu" 
     aria-expanded="{{ request()->routeIs('admin.services.*') || request()->routeIs('admin.projects.*') || request()->routeIs('admin.teams.*') || request()->routeIs('admin.blogs.*') ? 'true' : 'false' }}" 
     aria-controls="contentMenu">
    <i class="menu-icon typcn typcn-briefcase"></i>
    <span class="menu-title">Content</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse {{ request()->routeIs('admin.services.*') || request()->routeIs('admin.projects.*') || request()->routeIs('admin.teams.*') || request()->routeIs('admin.blogs.*') ? 'show' : '' }}" 
       id="contentMenu" data-bs-parent="#sidebar">
    <ul class="nav flex-column sub-menu">
      <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}" href="{{ route('admin.services.index') }}">💼 Services</a></li>
      <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}" href="{{ route('admin.projects.index') }}">📂 Portfolio</a></li>
      <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.teams.*') ? 'active' : '' }}" href="{{ route('admin.teams.index') }}">👥 Teams</a></li>
      <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}" href="{{ route('admin.blogs.index') }}">📰 Blogs</a></li>
    </ul>
  </div>
</li>

{{-- Admin Tools --}}
<li class="nav-item">
  <a class="nav-link {{ request()->routeIs('admin.users.*') || request()->routeIs('admin.roles.*') ? 'active' : '' }}" 
     data-bs-toggle="collapse" href="#adminTools" 
     aria-expanded="{{ request()->routeIs('admin.users.*') || request()->routeIs('admin.roles.*') ? 'true' : 'false' }}" 
     aria-controls="adminTools">
    <i class="menu-icon typcn typcn-key-outline"></i>
    <span class="menu-title">Admin Tools</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse {{ request()->routeIs('admin.users.*') || request()->routeIs('admin.roles.*') ? 'show' : '' }}" 
       id="adminTools" data-bs-parent="#sidebar">
    <ul class="nav flex-column sub-menu">
      <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">🔑 Assign Roles</a></li>
      <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}" href="{{ route('admin.roles.index') }}">⚙️ Manage Roles</a></li>
    </ul>
  </div>
</li>
<li class="nav-item">
  <a class="nav-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}" href="{{ route('admin.messages.index') }}">
    <i class="menu-icon typcn typcn-mail"></i>
    <span class="menu-title">📩 Contact Messages</span>
  </a>
</li>

{{-- User Links --}}
<li class="nav-item mt-3">
  <a class="nav-link special-link {{ request()->routeIs('home') ? 'active' : '' }}" target="_blank" href="{{ route('home') }}">
    <i class="menu-icon typcn typcn-world"></i>
    <span class="menu-title">👀 View Website</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link special-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}" href="{{ route('profile.edit') }}">
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

{{-- Custom CSS --}}
<style>
  .sidebar .nav-link.active {
    background: grey!important;
    color: #fff !important;
    font-weight: bold;
    border-radius: 6px;
  }
  .sidebar .nav-link.active i {
    color: #fff !important;
  }
</style>
