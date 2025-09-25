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
<!-- Bootstrap 5.3 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('admin/assets/css/shared/style.css') }}">
  <!-- Layout styles -->
  <link rel="stylesheet" href="{{ asset('admin/assets/css/demo_1/style.css') }}">
  <!-- End Layout styles -->

  <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}" />
  @stack('styles')

  <style>
    /* Background Image */
    body {
      background: url('{{ asset("admin/assets/images/dashboard-bg.jpeg") }}') no-repeat center center fixed;
      background-size: cover;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .page-body-wrapper{
    padding-top: 20px !important;
}
    /* Semi-transparent overlay for readability */
    .content-wrapper {
      background: rgba(255, 255, 255, 0.85);
      border-radius: 12px;
      padding: 20px;
      margin: 20px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }

    /* Branding block */
    .company-brand {
      background: linear-gradient(135deg, #0d6efd, #6610f2);
      border-bottom: 2px solid rgba(255,255,255,0.2);
      animation: fadeInDown 0.8s ease;
    }

    .company-brand .menu-icon {
      font-size: 32px;
      color: #fff;
      animation: spinIcon 4s linear infinite;
    }

    .company-brand .brand-name {
      color: #fff;
      font-weight: 700;
      margin: 0;
      font-size: 20px;
      letter-spacing: 1px;
      animation: glowText 2s ease-in-out infinite alternate;
    }

    .company-brand .brand-sub {
      color: rgba(255,255,255,0.7);
      font-size: 13px;
    }
/* Reset table text colors inside overlays */
.table-overlay table {
    color: #212529 !important; /* Bootstrap default dark text */
}

.table-overlay th {
    color: #000 !important; /* Strong headers */
    font-weight: 600;
    background: rgba(255, 255, 255, 0.85); /* light header background */
}

.table-overlay td {
    color: #212529 !important;
    background: rgba(255, 255, 255, 0.9); /* light cell background */
}

/* Buttons inside tables */
.table-overlay .btn {
    color: #fff !important;
    font-weight: 500;
}

    /* Text glow animation */
    @keyframes glowText {
      from { text-shadow: 0 0 5px rgba(255,255,255,0.4); }
      to   { text-shadow: 0 0 15px rgba(255,255,255,0.9); }
    }

    /* Icon slow rotation */
    @keyframes spinIcon {
      from { transform: rotate(0deg); }
      to   { transform: rotate(360deg); }
    }

    /* Branding block entrance */
    @keyframes fadeInDown {
      from { opacity: 0; transform: translateY(-20px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    /* Special Links (View Website, Profile, Logout) */
    .special-link {
      background: rgba(13, 110, 253, 0.08);
      border-radius: 6px;
      margin: 5px 10px;
      padding: 8px 12px;
      transition: all 0.3s ease;
    }
    .special-link:hover {
      background: #0d6efd;
      color: #fff !important;
      transform: translateX(4px);
    }
    .special-link i {
      color: #0d6efd;
      transition: color 0.3s ease;
    }
    .special-link:hover i {
      color: #fff;
    }
    .glass-bg {
  background: rgba(255, 255, 255, 0.3); /* white with 70% opacity */
  backdrop-filter: blur(6px);           /* adds a glass blur effect */
  -webkit-backdrop-filter: blur(6px);   /* Safari support */
  border-radius: 8px;
  padding: 20px;
}
  </style>
</head>
<body>
  <div class="container-scroller">


 @include('partials._navbar')
    <div class="container-fluid page-body-wrapper">
      
      {{-- Sidebar --}}
      @include('partials._sidebar')

      {{-- Main content --}}
      <div class="main-panel">
<div class="content-wrapper glass-bg">
            @yield('content')
        </div>

        {{-- Footer --}}
      </div>
    </div>
  </div>

  <!-- plugins:js -->
   <!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script src="{{ asset('admin/assets/vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('admin/assets/vendors/js/vendor.bundle.addons.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

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
<script>
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('img').forEach(function(img) {
        if (!img.hasAttribute('alt') || img.getAttribute('alt').trim() === "") {
            let src = img.getAttribute('src');
            if (src) {
                // استخرج اسم الملف بدون الامتداد
                let fileName = src.split('/').pop().split('.')[0];
                img.setAttribute('alt', fileName.replace(/[-_]/g, ' '));
            } else {
                img.setAttribute('alt', 'Image');
            }
        }
    });
    console.log("✅ Missing alt attributes filled automatically");
});
</script>

</script>

</body>
</html>
