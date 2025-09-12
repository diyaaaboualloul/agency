<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Aximo || Responsive HTML 5 Template')</title>

  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
  <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@400;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">

  <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/custom-font.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/icomoon.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
</head>

<body class="light">

  <!-- 🔹 Navbar -->
  <header class="site-header aximo-header-section aximo-header1 dark-bg" id="sticky-menu">
      @include('partials.navbar')
  </header>

  <!-- 🔹 Page Content -->
  <main>
      @yield('content')
  </main>

  <!-- 🔹 Footer -->
  @include('partials.footer')

  <!-- JS -->
  <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/aos.js') }}"></script>
  <script src="{{ asset('assets/js/menu/menu.js') }}"></script>
  <script src="{{ asset('assets/js/gsap.min.js') }}"></script>
  <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/countdown.js') }}"></script>
  <script src="{{ asset('assets/js/wow.min.js') }}"></script>
  <script src="{{ asset('assets/js/SplitText.min.js') }}"></script>
  <script src="{{ asset('assets/js/ScrollTrigger.min.js') }}"></script>
  <script src="{{ asset('assets/js/ScrollSmoother.min.js') }}"></script>
  <script src="{{ asset('assets/js/skill-bar.js') }}"></script>
  <script src="{{ asset('assets/js/infinite-slider.js') }}"></script>
  <script src="{{ asset('assets/js/image-resizing.js') }}"></script>
  <script src="{{ asset('assets/js/faq.js') }}"></script>
  <script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>
