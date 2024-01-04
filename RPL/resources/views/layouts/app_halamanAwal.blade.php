<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Penilaian Organisasi Mahasiswa</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assetsHalamanAwal/img/basic.png') }}" rel="icon">
  <link href="{{ asset('assetsHalamanAwal/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assetsHalamanAwal/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assetsHalamanAwal/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assetsHalamanAwal/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assetsHalamanAwal/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assetsHalamanAwal/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assetsHalamanAwal/vendor/aos/aos.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assetsHalamanAwal/css/main.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Logis
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/logis-bootstrap-logistics-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{ asset('assetsHalamanAwal/img/AstraTech.png') }}" alt="" style="width: 250px;  object-fit: cover;">
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
         
          
          <ul>
            <li><a class="get-a-quote" href="{{ route('logins.index') }}">Masuk</a></li>
            <li><a class="get-a-quote" href="{{ route('auth.register') }}">Registrasi</a></li>
        </ul>
<style>
    .get-a-quote {
        background-color: white !important;
        color: #4154f1 !important;
        font-weight: bold !important;
    }
</style>


        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  @yield('contents')

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assetsHalamanAwal/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assetsHalamanAwal/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assetsHalamanAwal/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assetsHalamanAwal/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assetsHalamanAwal/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assetsHalamanAwal/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assetsHalamanAwal/js/main.js') }}"></script>

</body>

</html>