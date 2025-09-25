{{-- Mobile / Tablet Navbar --}}
<nav class="navbar navbar-dark bg-dark fixed-top shadow-sm d-block d-lg-none">
  <div class="container-fluid">

    {{-- Brand --}}
    <a class="navbar-brand fw-bold text-primary" href="{{ route('dashboard') }}">
      A to Z Admin
    </a>

    {{-- Sidebar Toggler --}}
 <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar"
  aria-controls="mobileSidebar" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>


  </div>
</nav>
