{{-- Sidebar Menu Items --}}

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
  <div class="collapse" id="sitePages" data-bs-parent="#sidebar">
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
  <div class="collapse" id="contentMenu" data-bs-parent="#sidebar">
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
  <div class="collapse" id="adminTools" data-bs-parent="#sidebar">
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
