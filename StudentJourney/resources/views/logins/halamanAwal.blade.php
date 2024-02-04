<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

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
     .navbar {
         background-color: rgba(0, 0, 0, 0.7);
     }

     .icon-box {
         display: flex;
         align-items: center;
     }

     .icon-box-img {
         margin-right: 25px; 
     }

     .icon-heading {
         font-weight: bold;
         margin-bottom: 5px;
     }

     .enlarged-image {
         width: 83%; 
         height: auto; 
         max-width: 500px; 
     }

     .custom-carousel-controls {
         display: flex;
         justify-content: space-between;
         align-items: center;
         margin-top: 10px; /* Adjust margin as needed */
     }

     .custom-carousel-prev,
     .custom-carousel-next {
         flex: 0 0 88%; /* Adjust the width as needed */
     }

     .reviews-section .scrollable-section {
         overflow-x: auto;
         white-space: nowrap;
     }

     .custom-block {
         min-width: 300px; /* Set a minimum width for each block */
         margin-right: 15px; /* Adjust margin between blocks as needed */
         display: inline-block;
         vertical-align: top;
     }

 </style>
</head>

<body>

    <main>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand">
                    <i class="navbar-brand-icon bi-book me-2"><img src="" alt=""></i>
                    <span>Monitoring</span>
                </a>


                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-auto me-lg-4">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_1">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_2">Visi Misi</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_3">Tentang Kami</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_4">Fasilitas</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_5">Kontak</a>
                        </li>
                    </ul>
                    <div class="d-none d-lg-block ms-auto me-3" style="display: flex; align-items: center;">
                        <a href="{{ route('logins.logins') }}"
                            class="btn custom-btn custom-border-btn btn-naira btn-inverted me-3">
                            <i class="btn-icon bi-arrow-right"></i>
                            <span>Login Mahasiswa</span>
                        </a>

                        <a href="{{ route('logins.index') }}"
                            class="btn custom-btn custom-border-btn btn-naira btn-inverted">
                            <i class="btn-icon bi-arrow-right"></i>
                            <span>Login Admin</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>


        <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12 mb-5 pb-5 pb-lg-0 mb-lg-0">


                        <h1 class="text-white mb-4">Teknologi Rekayasa Logistik</h1>


                        <a href="#section_3" class="btn custom-btn smoothscroll me-3">Tentang TRL</a>

                    </div>

                    <div class="hero-image-wrap col-lg-5 col-12 mt-3 mt-lg-0">
                        <img src="{{ asset('asssets/images/Teknik Rekayasa Logistik.png') }}" class="hero-image img-fluid"
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
                            "Membekali lulusan yang terampil dalam bidang pemanfaatan<br /> teknologi informasi dan
                            otomasi,serta rekayasa penerapan supply <br />chain management pada pengelolaan logistik
                            manufaktur."
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="py-lg-5"></section>


        <section class="book-section section-padding" id="section_2">
            <div class="container">
                <div class="row">


                    <div class="col-12 text-center">
                        <div class="book-section-info">
                            <h6>Visi & Misi</h6>
                            <p>Visi & Misi <a rel="nofollow"
                                    href="https://www.polytechnic.astra.ac.id/teknologi-rekayasa-logistik/"
                                    target="_blank">TRL</a> Dalam rangka menghadapi perkembangan teknologi yang sangat
                                pesat, Program Studi Teknologi Rekayasa Logistik Politeknik Astra memiliki visi, misi
                                dan tujuan pendidikan.</p>

                            <p>agar dapat berkompetisi dalam tantangan serapan lulusan dan kepuasan pengguna lulusan
                                di-era industri 4.0, serta agar relevan dengan Statuta Institusi dan Rencana Strategis
                                Politeknik Astra.</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="book-section-info">
                            <h6>Visi</h6>
                            <p>Menjadi program studi D4 Teknologi Rekayasa Logistik (TRL) yang unggul di bidang Logistik
                                Manufaktur dengan penguasaan aspek kompetensi penerapan rekayasa pengelolaan logistik
                                agar lebih efektif dan efisien</p>
                            <h6>Misi</h6>
                            <p>1. Menyelenggarakan pendidikan dan pengajaran yang berkualitas dengan cara Astra Dual
                                System dan menanamkan Astra value bagi lulusan Prodi D4 Teknologi Rekayasa Logistik,
                                sehingga mampu memenuhi tuntutan dan kebutuhan industri dan masyarakat. </p>
                            <p>2. Menghasilkan lulusan yang memiliki kompetensi dan keahlian yang handal di bidang
                                teknologi rekayasa logistik, serta memiliki sikap profesional dan etika insan Astra.
                            </p>
                            <p>3. Melakukan penelitian dan pengabdian kepada masyarakat dalam pengembangan teknologi
                                rekayasa logistik, yang berkualitas dan bermanfaat bagi peningkatan kualitas industri,
                                masyarakat dan kemajuan ilmu pengetahuan sebagai wujud cita-cita luhur Astra.</p>
                            <p>4. Menjalin kerjasama dan meningkatkan hubungan baik dengan industri, lembaga pemerintah,
                                dan masyarakat, dalam rangka memajukan bidang teknologi rekayasa logistik. </p>
                            <p>5. Menyediakan sarana dan pra-sarana yang memadai dan berkualitas bagi pendidikan,
                                penelitian, dan pengabdian masyarakat terkait teknologi rekayasa logistik berstandar
                                Internasional.</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section id="section_3">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 text-center">
                        <h6>Pengenalan</h6>

                        <h2 class="mb-5">Program Studi</h2>
                    </div>

                    <div class="col-lg-4 col-12">
                        <nav id="navbar-example3" class="h-100 flex-column align-items-stretch">
                            <nav class="nav nav-pills flex-column">
                                <a class="nav-link smoothscroll" href="#item-1">introduction</a>

                                <a class="nav-link smoothscroll" href="#item-2">Soft Skill </a>

                                <a class="nav-link smoothscroll" href="#item-3">Hard Skill </a>

                                <a class="nav-link smoothscroll" href="#item-4">Profil lulusan </a>
                            </nav>
                        </nav>
                    </div>

                    <div class="col-lg-8 col-12">
                        <div data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-smooth-scroll="true"
                            class="scrollspy-example-2" tabindex="0">
                            <div class="scrollspy-example-item" id="item-1">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 style="margin-bottom: 0;">Sarjana Terapan</h5>
                                        <p>Teknologi Rekayasa Logistik.</p>

                                        <h5>Singkatan Prodi</h5>
                                        <p>TRL.</p>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <h5>SK Pendirian</h5>
                                            <p>Kepmendikbudristek No.55/D/OT/2023.</p>
                                        </div>
                                        <div>
                                            <h5>Akreditasi</h5>
                                            <p>Sedang.</p>
                                        </div>
                                    </div>
                                </div>



                            </div>


                            <div class="scrollspy-example-item" id="item-2">

                                <h5>Soft Skill</h5>
                                <p>Soft skill yang menjadi concern adalah dalam hal karakter lulusan yang memiliki:</p>
                                <div class="icon-box featured-box icon-box-left text-left">
                                    <div class="icon-box-img" style="width: 45px">
                                        <div class="icon">
                                            <div class="icon-inner">
                                                <img decoding="async" width="60" height="60"
                                                    src="{{ asset('asssets/images/Frame-626649.png') }}"
                                                    class="attachment-medium size-medium" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="icon-box-text last-reset">
                                        <strong class="icon-heading">Berintegritas</strong>
                                        <p class="icon-description">disiplin, Kejujuran/trustworthiness, komitmen</p>
                                    </div>
                                </div>
                                <div class="icon-box featured-box icon-box-left text-left">
                                    <div class="icon-box-img" style="width: 45px">
                                        <div class="icon">
                                            <div class="icon-inner">
                                                <img decoding="async" width="60" height="60"
                                                src="{{ asset('asssets/images/Frame-626649-1.png') }}"
                                                    class="attachment-medium size-medium" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="icon-box-text last-reset">
                                        <strong class="icon-heading">Handal</strong>
                                        <p class="icon-description">Proaktif, kompetitif, willingness to learn dan
                                            problem solver</p>
                                    </div>
                                </div>
                                <div class="icon-box featured-box icon-box-left text-left">
                                    <div class="icon-box-img" style="width: 45px">
                                        <div class="icon">
                                            <div class="icon-inner">
                                                <img decoding="async" width="60" height="60"
                                                src="{{ asset('asssets/images/Frame-626649-2.png') }}"
                                                    class="attachment-medium size-medium" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="icon-box-text last-reset">
                                        <strong class="icon-heading">Tangguh</strong>
                                        <p class="icon-description">Pantang menyerah, strive for excellence, selalu
                                            mencari jalan keluar dari permasalahan</p>
                                    </div>
                                </div>
                                <div class="icon-box featured-box icon-box-left text-left">
                                    <div class="icon-box-img" style="width: 45px">
                                        <div class="icon">
                                            <div class="icon-inner">
                                                <img decoding="async" width="60" height="60"
                                                src="{{ asset('asssets/images/Frame-626649-3.png') }}"
                                                    class="attachment-medium size-medium" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="icon-box-text last-reset">
                                        <strong class="icon-heading">Kolaboratif</strong>
                                        <p class="icon-description">Leadership, time management, building relation</p>
                                    </div>
                                </div>
                                <div class="icon-box featured-box icon-box-left text-left">
                                    <div class="icon-box-img" style="width: 45px">
                                        <div class="icon">
                                            <div class="icon-inner">
                                                <img decoding="async" width="60" height="60"
                                                src="{{ asset('asssets/images/Frame-626649-4.png') }}"
                                                    class="attachment-medium size-medium" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="icon-box-text last-reset">
                                        <strong class="icon-heading">Inovatif</strong>
                                        <p class="icon-description">Kreatif, rasa ingin tahu, berani mencoba hal-hal
                                            baru</p>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-6 col-12 mb-3">
                                        <img src="{{ asset('asssets/images/soft.png') }}"
                                            class="scrollspy-example-item-image img-fluid" alt="">
                                    </div>

                                    <div class="col-lg-6 col-12 mb-3">
                                        <img src="{{ asset('asssets/images/hard.png') }}"
                                            class="scrollspy-example-item-image img-fluid enlarged-image" alt="">
                                    </div>
                                </div>

                            </div>

                            <div class="scrollspy-example-item" id="item-3">
                                <h5>Hard Skill</h5>


                                <p>Berupa mata kuliah yang selalu selaras dengan kemajuan industri, dukungan tenaga
                                    pendidik yang kompeten dan memiliki pengalaman di industri terkait. Di samping itu
                                    mahasiswa diberi kesempatan untuk melakukan magang di industri selama 2 semester
                                    sebagai wujud Merdeka Belajar Kampus Merdeka (MBKM) dengan mentor-mentor yang
                                    terlatih dan berpengalaman sehingga ilmu yang diperoleh dapat diaplikasikan langsung
                                    saat magang.</p>


                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-12">
                                        <img src="{{ asset('asssets/images/Frame-626648.png') }}" class="img-fluid" alt="">
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <img src="{{ asset('asssets/images/Frame-626647.png') }}" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="scrollspy-example-item" id="item-4">
                                <h5>Profil Lulusan</h5>
                                <img src="{{ asset('asssets/images/Rectangle-20.jpg') }}"
                                    class="scrollspy-example-item-image img-fluid mb-3" alt=""><br />
                                <div id="supplyChainCarousel" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <strong class="icon-heading">Supply Chain Specialist</strong>
                                            <p>
                                                Lulusan memiliki
                                                <strong>
                                                    kemampuan teknis dan manajerial dalam mengelola pengembangan
                                                    produk; memantau inventaris; me-ngawasi transportasi dan
                                                    penyimpanan; mengawasi logistik rantai pasokan; keterampilan
                                                    analitis, komunikasi, dan organisasi yang kuat
                                                </strong>dengan memanfaatkan teknologi informasi dan otomasi dalam
                                                pengelolaan logistik manufaktur pada industri manufaktur.
                                            </p>
                                        </div>
                                        <div class="carousel-item">
                                            <strong class="icon-heading">Supply Chain Data Analyst</strong>
                                            <p>
                                                Lulusan memiliki
                                                <strong>
                                                    kemampuan dalam mengerjakan proyek mandiri; berkolaborasi dengan
                                                    tim untuk mengumpulkan dan menganalisis data; membuat presentasi
                                                    dan laporan berdasarkan rekomendasi, temuan dan menyusun kumpulan
                                                    data besar untuk menemukan informasi
                                                </strong>yang dapat digunakan untuk tim internal dan/atau klien
                                                eksternal
                                                dengan memanfaatkan teknologi informasi dalam pengelolaan logistik
                                                manufaktur pada industri manufaktur.
                                            </p>
                                        </div>
                                        <div class="carousel-item">
                                            <strong class="icon-heading">Logistic Planning Analyst</strong>
                                            <p>
                                                Lulusan memiliki
                                                <strong>
                                                    kemampuan dalam mengkoordinasikan dan mengawasi pengangkutan
                                                    barang dari barang manufaktur hingga barang eceran ke pelanggan
                                                    atau mitra bisnis; mengelola kebutuhan pelanggan; menjadwalkan dan
                                                    mengawasi manajemen rantai pasokan perusahaan atau
                                                    organisasi
                                                </strong>
                                                dengan memanfaatkan teknologi informasi dalam pengelolaan logistik
                                                manufaktur pada industri manufaktur.
                                            </p>
                                        </div>
                                        <div class="carousel-item">
                                            <strong class="icon-heading">Transportation, Warehousing and Customs
                                                Supervisor</strong>
                                            <p>
                                                Lulusan memiliki
                                                <strong>
                                                    kemampuan dalam mengawasi operasi umum gudang dan stafnya;
                                                    menangani pencatatan dan pemeliharaan inventaris; menyarankan
                                                    impor yang diterima dan barang yang diekspor; melatih pekerja baru
                                                    dan memastikan kinerja mereka memadai
                                                </strong>dengan memanfaatkan teknologi informasi dalam pengelolaan
                                                logistik
                                                manufaktur pada industri manufaktur.
                                            </p>
                                        </div>
                                        <div class="carousel-item">
                                            <strong class="icon-heading">Procurement Officer</strong>
                                            <p>
                                                Lulusan memiliki
                                                <strong>
                                                    kemampuan dalam pengendalian dan evaluasi kebijakan dalam proses
                                                    pengadaan barang atau jasa; merancang dan mengelola hubungan yang
                                                    tepat dengan pemasok barang dan jasa (<em>supplier</em>); menilai
                                                    produk, layanan dan pemasok serta menegosiasikan kontrak;
                                                    memastikan pembelian yang disetujui memiliki kualitas yang memadai
                                                    dan hemat biaya
                                                </strong>dengan memanfaatkan teknologi informasi dalam pengelolaan
                                                logistik
                                                manufaktur pada industri manufaktur.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="custom-carousel-controls">
                                        <div class="custom-carousel-prev">
                                            <button class="btn btn-primary" type="button"
                                                data-target="#supplyChainCarousel" data-slide="prev">
                                                <span class="visually-hidden">Previous</span>
                                                &lt; Previous
                                            </button>
                                        </div>
                                        <div class="custom-carousel-next">
                                            <button class="btn btn-primary" type="button"
                                                data-target="#supplyChainCarousel" data-slide="next">
                                                <span class="visually-hidden">Next</span>
                                                Next &gt;
                                            </button>
                                        </div>
                                    </div>
                                    <ol class="carousel-indicators">
                                        <li data-bs-target="#supplyChainCarousel" data-bs-slide-to="0" class="active">
                                        </li>
                                        <li data-bs-target="#supplyChainCarousel" data-bs-slide-to="1"></li>
                                        <!-- Add more indicators as needed -->
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="reviews-section section-padding" id="section_4">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 text-center mb-5">
                        <h6>Reviews</h6>
                        <h2>Fasilitas Lab</h2>
                    </div>

                    <div class="col-12 scrollable-section">
                        <div class="col-lg-4 col-12 custom-block">
                            <div class="custom-block d-flex flex-wrap">
                                <div class="custom-block-image-wrap d-flex flex-column">
                                    <img src="{{ asset('asssets/images/soft.png') }}" />
                                </div>
                                <div class="custom-block-info">
                                    <p class="mb-0">Lab Supply Chain Management &<br /> Logistic 4.0.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-12 custom-block my-5 my-lg-0">
                            <div class="custom-block d-flex flex-wrap">
                                <div class="custom-block-image-wrap d-flex flex-column">
                                    <img src="{{ asset('asssets/images/hard.png') }}" />
                                    <div class="text-center mt-3">
                                    </div>
                                </div>
                                <div class="custom-block-info">
                                    <p class="mb-0">Lab Warehouse Management</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-12 custom-block">
                            <div class="custom-block d-flex flex-wrap">
                                <div class="custom-block-image-wrap d-flex flex-column">
                                    <img src="{{ asset('asssets/images/trl.jpg') }}" />
                                    <div class="text-center mt-3">
                                    </div>
                                </div>
                                <div class="custom-block-info">
                                    <p class="mb-0">Lab Transportation & Distribution.<br /> Logistics.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-12 custom-block my-5 my-lg-0">
                            <div class="custom-block d-flex flex-wrap">
                                <div class="custom-block-image-wrap d-flex flex-column">
                                    <img src="{{ asset('asssets/images/astra.jpg') }}" />
                                    <div class="text-center mt-3">
                                    </div>
                                </div>
                                <div class="custom-block-info">
                                    <p class="mb-0">Lab Industrial System & Simulation.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="contact-section section-padding" id="section_5">
    <div class="container">
        <div class="row">

            <div class="col-lg-5 col-12 mx-auto">
                <form class="custom-form ebook-download-form bg-white shadow" action="#" method="post" role="form">
                    <div class="text-center mb-4">
                        <h2 class="h4 mb-1">Alamat</h2>
                    </div>
                    <p class="mb-2" style="color: black; font-size: 14px;">
                        KAMPUS CIKARANG Jl. Gaharu Blok F3 Delta Silicon II Cibatu, Cikarang Selatan Kabupaten Bekasi Jawa Barat 17530
                    </p>
                </form>
            </div>

            <div class="col-lg-6 col-12">
                <h2 class="h4 mb-3">Kontak</h2>

                <p class="mb-2" style="font-size: 14px;">
                    <i class="bi-phone me-2"></i>
                    +62 21 5022 7222
                </p>
                <p class="mb-2" style="font-size: 14px;">
                    <i class="bi-phone me-2"></i>
                    +62 21 6519 555
                </p>
                <p class="mb-2" style="font-size: 14px;">
                    <i class="bi-whatsapp me-2"></i>
                    +62 878 7177 6177
                </p>
                <p class="mb-2" style="font-size: 14px;">
                    <i class="bi-envelope me-2"></i>
                    sekretariat@polytechnic.astra.ac.id
                </p>

                <h6 class="h6 mt-4 mb-2">Social Media</h6>

                <ul class="social-icon mb-3">
                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-instagram"></a>
                    </li>

                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-twitter"></a>
                    </li>
                    
                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-facebook"></a>
                    </li>

                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-whatsapp"></a>
                    </li>
                </ul>

                <p class="small-text text-muted">Copyright © 2024 Student Journey</p>
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

</body>

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

</html>