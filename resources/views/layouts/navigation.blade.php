<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
  <div class="container-fluid">
    <!-- Logo -->
    <a class="navbar-brand" href="{{ route('dashboard') }}">
      <x-application-logo class="d-inline-block align-text-top" />
    </a>

    <!-- Hamburger (toggler button) -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" 
      aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="navbarContent">
      <!-- Left side links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="nav-link">
            {{ __('Dashboard') }}
          </x-nav-link>
        </li>
      </ul>

      <!-- Right side (user dropdown) -->
      <ul class="navbar-nav ms-auto">
        <!-- User Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <li>
              <x-dropdown-link :href="route('profile.edit')" class="dropdown-item">
                {{ __('Profile') }}
              </x-dropdown-link>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link :href="route('logout')" class="dropdown-item"
                  onclick="event.preventDefault(); this.closest('form').submit();">
                  {{ __('Log Out') }}
                </x-dropdown-link>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>