<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title','Admin Dashboard')</title>

  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('admin/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/vendors/iconfonts/ionicons/dist/css/ionicons.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/vendors/css/vendor.bundle.addons.css') }}">

  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('admin/assets/css/shared/style.css') }}">
  <!-- Layout styles -->
  <link rel="stylesheet" href="{{ asset('admin/assets/css/demo_1/style.css') }}">
  <!-- End Layout styles -->

  <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}" />
  @stack('styles')
</head>
<body>
  <div class="container-scroller">
    
    {{-- Navbar --}}
    @include('partials._navbar')

    <div class="container-fluid page-body-wrapper">
      
      {{-- Sidebar --}}
      @include('partials._sidebar')

      {{-- Main content --}}
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>

        {{-- Footer --}}
        @include('partials._footer')
      </div>
    </div>
  </div>

  <!-- plugins:js -->
  <script src="{{ asset('admin/assets/vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('admin/assets/vendors/js/vendor.bundle.addons.js') }}"></script>

  <!-- inject:js -->
  <script src="{{ asset('admin/assets/js/shared/off-canvas.js') }}"></script>
  <script src="{{ asset('admin/assets/js/shared/misc.js') }}"></script>
  <!-- endinject -->

  <!-- Custom js for this page-->
  <script src="{{ asset('admin/assets/js/demo_1/dashboard.js') }}"></script>
  <!-- End custom js for this page-->

  <script src="{{ asset('admin/assets/js/shared/jquery.cookie.js') }}" type="text/javascript"></script>

  @stack('scripts')
  <script>
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('img').forEach(function(img) {
        // إذا ما فيها خاصية loading
        if (!img.hasAttribute('loading')) {
            img.setAttribute('loading', 'lazy');
        }
    });
});
</script>

</body>
</html>
