@extends('layouts.appsek')

@section('title','Dashboard Sekretaris Prodi')

@section('contents');
<title>{{ $title ?? 'Dashboard' }}</title>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('Dashboard.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
    <div class="container-fluid">
                <div class="row">
                <div class="col-lg-3 col-sm-6">
          <div class="card">
            <div class="stat-widget-two card-body">
              <div class="stat-content">
                <div class="stat-text">Total Mahasiswa</div>
                <div class="stat-digit"><i class="fa fa-usd"></i>{{ $totalMahasiswa }}</div>
              </div>
              <div class="progress">
                <div class="progress-bar progress-bar-s w-85" role="progressbar" aria-valuenow="{{ $totalMahasiswa }}" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="card">
            <div class="stat-widget-two card-body">
              <div class="stat-content">
                <div class="stat-text">Total Kegiatan Belum Dikerjakan</div>
                <div class="stat-digit"><i class="fa fa-usd"></i>{{ $totalbelomKegiatan }}</div>
              </div>
              <div class="progress">
                <div class="progress-bar progress-bar-primary w-75" role="progressbar" aria-valuenow="{{ $totalbelomKegiatan }}" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="card">
            <div class="stat-widget-two card-body">
              <div class="stat-content">
                <div class="stat-text">Total Kegiatan Sedang Dikerjakan</div>
                <div class="stat-digit"><i class="fa fa-usd"></i>{{ $totalsedangKegiatan }}</div>
              </div>
              <div class="progress">
                <div class="progress-bar progress-bar-warning w-50" role="progressbar" aria-valuenow="{{ $totalsedangKegiatan }}" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="card">
            <div class="stat-widget-two card-body">
              <div class="stat-content">
                <div class="stat-text">Total Kegiatan Sudah Dikerjakan</div>
                <div class="stat-digit"><i class="fa fa-usd"></i>{{ $totalsudahKegiatan }}</div>
              </div>
              <div class="progress">
                <div class="progress-bar progress-bar-danger w-65" role="progressbar" aria-valuenow="{{ $totalsudahKegiatan }}" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
                    <!-- /# column -->
                    <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Top 5 Jam Plus</h5>

              <!-- Bar Chart -->
              <div id="barChart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  // Assuming $jamPlusData contains the top 5 records
                  let jamPlusData = {!! json_encode($jamPlusData) !!};

                  let chartData = {
                    series: [{
                      data: jamPlusData.map(item => item.Selisih)
                    }],
                    chart: {
                      type: 'bar',
                      height: 150
                    },
                    plotOptions: {
                      bar: {
                        borderRadius: 4,
                        horizontal: true,
                      }
                    },
                    dataLabels: {
                      enabled: false
                    },
                    xaxis: {
                      categories: jamPlusData.map(item => item.Nama),
                    }
                  };

                  new ApexCharts(document.querySelector("#barChart"), chartData).render();
                });
              </script>
              <!-- End Bar Chart -->

            </div>
          </div>
        </div>

                    
    </div>
  </section>

</main><!-- End #main -->

@endsection