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
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional: Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
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
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

  
</head>

<body class="light">

  <!-- 🔹 Navbar -->
<header class="site-header aximo-header-section aximo-header1" id="sticky-menu">
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
<!-- Scroll to Top Arrow -->
<a href="#" id="scrollTopBtn">
    <i class="bi bi-arrow-up"></i>
</a>

<style>
  #scrollTopBtn {
    position: fixed;
    bottom: 20px;
    left: 20px;
    font-size: 28px;
    color: white;
    background: rgba(0, 0, 0, 0.6);
    padding: 10px;
    border-radius: 25%;
    display: none;
    z-index: 9999;
    text-align: center;
    transition: color 0.3s ease;
  }

  #scrollTopBtn:hover {
    color: #0d6efd; /* Bootstrap blue */
  }
</style>

<script>
  const scrollTopBtn = document.getElementById("scrollTopBtn");

  // Show/hide on scroll
  window.addEventListener("scroll", () => {
    if (window.scrollY > 200) {
      scrollTopBtn.style.display = "flex";
    } else {
      scrollTopBtn.style.display = "none";
    }
  });

  // Smooth scroll to top
  scrollTopBtn.addEventListener("click", (e) => {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: "smooth" });
  });
</script>
<script>
  const menuToggle = document.getElementById("menuToggle");
  const navbarMenu = document.getElementById("navbarMenu");

  // Toggle on hamburger click
  menuToggle.addEventListener("click", () => {
    navbarMenu.classList.toggle("show-menu");
  });

  // Auto close when clicking a link (on mobile)
  document.querySelectorAll("#navbarMenu a").forEach(link => {
    link.addEventListener("click", () => {
      if (window.innerWidth < 992) {
        navbarMenu.classList.remove("show-menu");
      }
    });
  });
</script>




</body>
</html>
