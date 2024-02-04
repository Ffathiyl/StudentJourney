<!doctype html>
<html lang="en" style="overflow: hidden;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Selamat Datang</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link href="{{ asset('asssets/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('asssets/css/bootstrap-icons.css') }}" rel="stylesheet">

    <link href="{{ asset('asssets/css/templatemo-ebook-landing.css') }}" rel="stylesheet">
    <!--

TemplateMo 588 ebook landing

https://templatemo.com/tm-588-ebook-landing

-->
<style>
#hidden-container {
      position: absolute;
      width: 0;
      height: 0;
      overflow: hidden;
      opacity: 0;
  } 
  </style>
</head>

<body>

    <main>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <i class="navbar-brand-icon bi-book me-2"><img src="" alt=""></i>
                    <span>Monitoring</span>
                </a>

                <div class="d-lg-none ms-auto me-3">
                    <a href="{{ url('/') }}" class="btn custom-btn custom-border-btn btn-naira btn-inverted">
                        <i class="btn-icon bi-arrow-left"></i>
                        <span>Kembali</span><!-- duplicated another one below for mobile -->
                    </a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="d-none d-lg-block" style="margin-left:1000px">
                        <a href="{{ url('/') }}" class="btn custom-btn custom-border-btn btn-naira btn-inverted">
                            <i class="btn-icon bi-arrow-left"></i>
                            <span>Kembali</span><!-- duplicated above one for mobile -->
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
     <div class="container">
         <div class="row">

             <div class="col-lg-6 col-12 mb-5 pb-5 pb-lg-0 mb-lg-0">

                 <h6>Selamat Datang Di</h6>

                 <h1 class="text-white mb-4">Sistem Informasi Student Journey</h1>


                 <div class="btn custom-btn custom-border-btn btn-naira btn-inverted">
                     <i class="btn-icon bi bi-door-open"></i>
                     <span>Scan ID Card anda!</span>
                 </div>

             </div>
                    <div class="hero-image-wrap col-lg-5 col-12 mt-3 mt-lg-0">
                        <img src="{{ asset('asssets/images/Teknik Rekayasa Logistik (2).png') }}" class="hero-image img-fluid"
                            alt="education online books">
                    </div>
                </div>
            </div>
        </section>


        <section class="featured-section">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-12">
                        <div class="avatar-group d-flex flex-wrap align-items-center">
                            <form class="row g-3" action="{{ route('logins.auth') }}" method="GET"
                                style="opacity: 0.2; margin-top: -47px;">
                                @csrf
                                <div id="hidden-container">
                                    <!-- <label for="RFID" class="form-label">RFID <span style="color:red">* -->
                                            @error('RFID') {{ $message }} @enderror</span></label>
                                    <input type="text" class="form-control" id="RFID" name="RFID" autocomplete="off">
                                </div>
                               
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- JAVASCRIPT FILES -->
    <script src="{{ asset('asssets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('asssets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asssets/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('asssets/js/click-scroll.js') }}"></script>
    <script src="{{ asset('asssets/js/custom.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        window.onload = function () {
            // Ganti 'RFID' dengan ID dari elemen input yang ingin menjadi fokus
            document.getElementById('RFID').focus();
        }
    </script>

    @if (Session::has('error'))
    <script>
        console.log('Error');
        Swal.fire({
            title: 'Pesan',
            text: '{{ Session::get('error') }}',
            icon: 'error', // Tambah koma di sini
        }).then(() => {
            document.getElementById('RFID').focus(); // ID input RFID di sini
        });
    </script>
    @endif

    @if (Session::has('successLogout'))
    <script>
        sole.log('success');
        Swal.fire({
            title: 'Pesan',
            text: '{{ Session::get('successLogout') }}',
            icon: 'success'
        });
    </script>
    @endif

    @if (Session::has('error3x'))
    <script>
        console.log('Error');
        Swal.fire({
            title: 'Pesan',
            text: '{!! Session::get('error3x') !!}',
            icon: 'warning'
        });
    </script>
    @endif

</body>

</html>