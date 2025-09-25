{{-- Sidebar for Desktop (always visible) --}}
<nav class="sidebar d-none d-lg-block" id="sidebar">
  <ul class="nav">
    @include('partials.sidebar-items')
  </ul>
</nav>


{{-- Offcanvas Sidebar for Tablet/Mobile --}}
<div class="offcanvas offcanvas-start bg-dark text-white d-lg-none" tabindex="-1" id="mobileSidebar"
     aria-labelledby="mobileSidebarLabel">
  <div class="offcanvas-header border-bottom">
    <h5 class="offcanvas-title fw-bold text-primary">A to Z Admin</h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body p-0">
    <ul class="nav flex-column">
      @include('partials.sidebar-items')
    </ul>
  </div>
</div>

{{-- Sidebar Styles --}}
<style>
  /* Sidebar transparency */
  .sidebar, .offcanvas {
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
