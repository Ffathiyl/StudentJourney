<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ $title ?? 'Sekretaris Prodi' }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assetss/img/favicon.png') }}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assetss/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assetss/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assetss/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assetss/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assetss/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assetss/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assetss/vendor/simple-datatables/style.css') }}" rel="stylesheet">
  <!-- Add Bootstrap CSS -->
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

<!-- Add jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Add Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>

<!-- Add Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  <!-- Template Main CSS File -->
  <link href="{{ asset('assetss/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>

<body>
  @include('template_sekprod')

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ route('Dashboard.dashboard') }}" class="logo d-flex align-items-center">
        <img src="{{ asset('assetss/img/AstraTech.png') }}" alt="">
        <!-- <span class="d-none d-lg-block">AstraTech</span> -->
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        @if(session()->has('logged_in'))
        @php
        $logged_in = session('logged_in');
        @endphp
        <li class="nav-item dropdown pe-3">
          <span>Hai, <b>{{ $logged_in->Nama }}</b></span>
        </li>
        @endif
      </ul>
    </nav>
  </header><!-- End Header -->

  @yield('contents')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>


  <!-- Vendor JS Files -->
  <script src="{{ asset('assetss/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assetss/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assetss/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('assetss/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assetss/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('assetss/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assetss/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assetss/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assetss/js/main.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  @if (Session::has('error'))
  <script>
    console.log('Error');
    Swal.fire({
      title: 'Pesan',
      text: '{{ Session::get('error') }}',
      icon: 'error'
    });
  </script>
  @endif

  @if (Session::has('success'))
  <script>
    console.log('success');
    Swal.fire({
      title: 'Pesan',
      text: '{{ Session::get('success') }}',
      icon: 'success'
    });
  </script>
  @endif

  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();
    });
  </script>

</body>

</html>