
@extends('layouts.app_halamanAwal')

@section('title','Halaman Awal')

@section('contents')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row gy-4 d-flex justify-content-between">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h2 data-aos="fade-up">Penilaian Organisasi Mahasiswa</h2>
          <p data-aos="fade-up" data-aos-delay="100" style="text-align: justify;">
          POMA (Penilaian Organisasi Mahasiswa) adalah sistem evaluasi yang memungkinkan mahasiswa memberikan penilaian terhadap kinerja organisasi mahasiswa di kampus. 
          Dengan POMA, mahasiswa dapat memberikan umpan balik mengenai berbagai aspek. Sistem ini bertujuan untuk meningkatkan transparansi dan akuntabilitas organisasi. 
          POMA memberikan kontribusi dalam memperkuat komunitas kampus dengan melibatkan mahasiswa secara aktif dalam proses evaluasi, sehingga organisasi mahasiswa dapat memberikan dampak positif dan memenuhi harapan anggotanya.</p>

          <div class="row gy-4" data-aos="fade-up" data-aos-delay="400">

          <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                  <span data-purecounter-start="0" data-purecounter-end="{{ $totalOrganisasi }}" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Organisasi</p>
              </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                  <span data-purecounter-start="0" data-purecounter-end="{{ $totalAnggotaBem }}" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Anggota BEM</p>
              </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                  <span data-purecounter-start="0" data-purecounter-end="{{ $totalAnggotaMpm }}" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Anggota MPM</p>
              </div>
          </div><!-- End Stats Item -->


          </div>
        </div>

        <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
          <img src="/assetsHalamanAwal/img/hero-img.svg" class="img-fluid mb-3 mb-lg-0" alt="">
        </div>

      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

  <section id="featured-services" class="featured-services">
  <div class="container">

    <div class="row gy-4">

      <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up">
        <div class="icon flex-shrink-0"><i class="fa-solid fa-lightbulb"></i></div>
        <div>
          <h4 class="title">Penilaian Organisasi Mahasiswa</h4>
          <p class="description">
            POMA (Penilaian Organisasi Mahasiswa) adalah sistem evaluasi untuk memperkuat transparansi dan akuntabilitas organisasi mahasiswa di kampus.
          </p>
        </div>
      </div>
      <!-- End Service Item -->

      <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
        <div class="icon flex-shrink-0"><i class="fa-solid fa-check"></i></div>
        <div>
          <h4 class="title">Proses Penilaian</h4>
          <p class="description">
            Mahasiswa memberikan penilaian melalui formulir online, hasilnya dihitung otomatis, mencerminkan performa Organisasi Kemahasiswaan.
          </p>
        </div>
      </div><!-- End Service Item -->

      <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
        <div class="icon flex-shrink-0"><i class="fa-solid fa-chart-bar"></i></div>
        <div>
          <h4 class="title">Manfaat Sistem POMA</h4>
          <p class="description">
            Sistem POMA memudahkan proses penilaian, dari pengisian formulir hingga pembuatan laporan, meningkatkan efisiensi dan kolaborasi.
          </p>
        </div>
      </div><!-- End Service Item -->

    </div>

  </div>
</section><!-- End Featured Services Section -->



    <!-- ======= Tentang Kami ======= -->
<section id="about" class="about pt-0">
  <div class="container" data-aos="fade-up">
    <div class="row gy-4">
    <div class="col-lg-6 position-relative align-self-start order-lg-last order-first">
  <img src="/assetsHalamanAwal/img/about.jpg" class="img-fluid" alt="Deskripsi alternatif">
  <a href="https://youtu.be/WpUyNDIXjBI?si=M5pnwe1qwMJ42ign" class="glightbox play-btn"></a>
</div>

      <div class="col-lg-6 content order-last  order-lg-first">
        <h3>Tentang Kami</h3>
        <p>
          POMA (Penilaian Organisasi Mahasiswa) memungkinkan evaluasi terhadap kinerja organisasi mahasiswa. Dengan tujuan meningkatkan transparansi dan akuntabilitas, POMA melibatkan mahasiswa secara aktif dalam proses evaluasi.
        </p>
        <ul>
          <li data-aos="fade-up" data-aos-delay="100">
            <i class="bi bi-diagram-3"></i>
            <div>
              <h5>Penilaian Kinerja</h5>
              <p>Mahasiswa memberikan penilaian terhadap kinerja organisasi melalui POMA.</p>
            </div>
          </li>
          <li data-aos="fade-up" data-aos-delay="200">
            <i class="bi bi-fullscreen-exit"></i>
            <div>
              <h5>Evaluasi Terstruktur</h5>
              <p>POMA menyediakan formulir evaluasi terstruktur untuk menilai berbagai aspek organisasi.</p>
            </div>
          </li>
          <li data-aos="fade-up" data-aos-delay="300">
            <i class="bi bi-broadcast"></i>
            <div>
              <h5>Kolaborasi Aktif</h5>
              <p>Partisipasi aktif mahasiswa dalam proses evaluasi untuk meningkatkan dampak positif organisasi.</p>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section><!-- End Tentang Kami -->


    <!-- ======= Services Section ======= -->
    <section id="service" class="services pt-0">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <span>Fitur Aplikasi</span>
          <h2>Fitur Aplikasi</h2>

        </div>

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card">
              <div class="card-img">
                <img src="/assetsHalamanAwal/img/storage-service.jpg" alt="" class="img-fluid">
              </div>
              <h3><a href="service-details.html" class="stretched-link">Manajemen Pengurus</a></h3>
              <p>Melakukan manajemen data pengurus organisasi kemahasiswaan dengan mudah dan efisien.</p>
            </div>
          </div><!-- End Card Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="card">
              <div class="card-img">
                <img src="/assetsHalamanAwal/img/logistics-service.jpg" alt="" class="img-fluid">
              </div>
              <h3><a href="service-details.html" class="stretched-link">Kuesioner Evaluasi</a></h3>
              <p>Melakukan penilaian kinerja organisasi kemahasiswaan melalui kuesioner evaluasi terstruktur.</p>
            </div>
          </div><!-- End Card Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="card">
              <div class="card-img">
                <img src="/assetsHalamanAwal/img/cargo-service.jpg" alt="" class="img-fluid">
              </div>
              <h3><a href="service-details.html" class="stretched-link">Laporan Kinerja</a></h3>
              <p>Generasi laporan kinerja organisasi untuk pemantauan dan analisis yang lebih baik.</p>
            </div>
          </div><!-- End Card Item -->

          

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Call To Action Section ======= -->
<section id="call-to-action" class="call-to-action">
  <div class="container" data-aos="zoom-out">

    <div class="row justify-content-center">
      <div class="col-lg-8 text-center">
        <h3>Penilaian Organisasi Mahasiswa</h3>
        <p>Penilaian Organisasi Mahasiswa di Politeknik Astra membantu mengukur pencapaian dan dampak positif organisasi. Kami berkomitmen untuk meningkatkan efisiensi dan transparansi dalam proses penilaian.</p>
      </div>
    </div>

  </div>
</section><!-- End Call To Action Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
<footer id="footer" class="footer">

<div class="container">
  <div class="row gy-4">
    <div class="col-lg-5 col-md-12 footer-info">
      <a href="index.html" class="logo d-flex align-items-center">
        <span>Politeknik Astra</span>
      </a>
      <p>Politeknik Astra merupakan tempat berkembangnya kreativitas dan inovasi mahasiswa. Temukan lebih lanjut tentang kami dan ikuti perkembangan kami di media sosial.</p>
      <div class="social-links d-flex mt-4">
        <a href="https://www.instagram.com/astrapolytechnic?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA==" class="instagram"><i class="bi bi-instagram" title="Astra Polytechnic"></i></a>
        <a href="https://www.instagram.com/bem.astratech?utm_source=ig_web_button_share_sheet&igsh=OGQ5ZDc2ODk2ZA==" class="instagram"><i class="bi bi-instagram" title="BEM"></i></a>
        <a href="https://www.instagram.com/mpmpoliteknikastra?utm_source=ig_web_button_share_sheet&igsh=OGQ5ZDc2ODk2ZA==" class="instagram"><i class="bi bi-instagram" title="MPM"></i></a>

      </div>

    </div>


    <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
  <h4>Alamat</h4>
  <p>
    KAMPUS CIKARANG <br>
    Jl. Gaharu Blok F3 Delta Silicon II <br>
    Cibatu, Cikarang Selatan, Kabupaten Bekasi, Jawa Barat 17530 <br><br>
    <strong>Phone:</strong> +62 1234 5678 90<br>
    <strong>Email:</strong> info@politeknikastra.ac.id<br>
  </p>
</div>

  </div>
</div>

<div class="container mt-4">
  <div class="copyright">
    &copy; Copyright <strong><span>POMA</span></strong>. All Rights Reserved
  </div>
</div>

</footer><!-- End Footer -->

  @endsection