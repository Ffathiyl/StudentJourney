@extends('layouts.apps')

@section('title','Dashboard Mahasiswa')

@section('contents');
<title>{{ $title ?? 'Dashboard' }}</title>
<main id="mainn" class="mainn">

    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a class="logo d-flex align-items-center">
                <img src="{{ asset('assets/img/AstraTech.png') }}" alt="">
                <!-- <span class="d-none d-lg-block">AstraTech</span> -->
            </a>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">
                    @if(session()->has('logged_mhs'))
                    @php
                    $logged_in = session('logged_mhs');
                    @endphp
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Hai, <b>{{ $logged_in->Nama }}</b>
                    </a>

                    <!-- Dropdown menu -->
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('logins.logouts') }}">
                            Logout
                        </a>

                        <!-- Hidden logout form -->

                    </div>
                    @endif
                </li>
                <li class="nav-item dropdown pe-3">
                    <a href="{{ route('pengajuans.indexs') }}" class="btn btn-primary">Pengajuan <i
                            class="ri-edit-box-line"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </header><!-- End Header -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-8">
                        <div class="card info-card sales-card">

                            <div class="filter">
                                <a class="icon" href="#"></a>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Jam Plus</h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-node-plus-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $mahasiswas->Jam_Plus }}</h6>
                                        <!-- <span class="text-success small pt-1 fw-bold">{{ $mahasiswas->Jam_Plus }}</span> -->
                                        <!-- <span class="text-muted small pt-2 ps-1">increase</span> -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-8">
                        <div class="card info-card sales-card">

                            <div class="filter">
                                <a class="icon" href="#"></a>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Jam Minus</h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-node-minus-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $mahasiswas->Jam_Minus }}</h6>
                                        <!-- <span class="text-success small pt-1 fw-bold">{{ $mahasiswas->Jam_Minus}}</span>  -->
                                        <!-- <span class="text-muted small pt-2 ps-1">increase</span> -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-8">
                        <div class="card info-card sales-card">

                            <div class="filter">
                                <a class="icon" href="#"></a>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Soft Skill</h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-gear-wide-connected"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $mahasiswas->Soft_Skill }}</h6>
                                        <!-- <span class="text-success small pt-1 fw-bold">{{ $mahasiswas->Soft_Skill}}</span>  -->
                                        <!-- <span class="text-muted small pt-2 ps-1">increase</span> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->

                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-3 offset-1">

            </div><!-- End Right side columns -->
            <div class="card">
                <div class="card-body"><br>
                    <!-- <h5 class="card-title">
                            <a href="{{ route('mahasiswas.create') }}" class="btn btn-primary">Tambah</a>
                        </h5> -->

                    <!-- Table with stripped rows -->
                    <table class="table table-striped" id="myTablee">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Total Jam</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                            $i=1;
                            @endphp

                            @if($mahasiswas != null)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $mahasiswas->NIM }}</td>
                                <td>{{ $mahasiswas->Nama }}</td>
                                <td>
                                    @if ($mahasiswas->Jenis_Kelamin == 1)
                                    Laki - Laki
                                    @else
                                    Perempuan
                                    @endif
                                </td>
                                <td>{{ $mahasiswas->Jam_Plus - $mahasiswas->Jam_Minus }}</td>
                                <td>
                                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        <i class="ri-information-line"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="8">
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">

                                            <div id="collapseOne" class="accordion-collapse collapse"
                                                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <section class="section">
                                                        <div class="row">
                                                            <div class="col-lg-12">


                                                                <div class="kop-surat">
                                                                    <h5>
                                                                        Detail
                                                                    </h5>
                                                                    <!-- <div class="garis-bawah"></div> -->
                                                                </div>
                                                                <hr>

                                                                <table class="table table-striped" id="myTablee">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>Tanggal</th>
                                                                            <th>Deskripsi</th>
                                                                            <th>Jam Plus</th>
                                                                            <th>Jam Minus</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        @php
                                                                        $i=1;
                                                                        @endphp

                                                                        @forelse($hasilGabungan as $details)
                                                                        <tr>
                                                                            <td>{{ $i++ }}</td>
                                                                            <td>{{ $details['Tanggal'] }}</td>
                                                                            <td>{{ $details['Deskripsi'] }}</td>
                                                                            <td>{{ $details['Jam_Plus'] !== null ?
                                                                                $details['Jam_Plus'] : '-' }}</td>
                                                                            <td>{{ $details['Jam_Minus'] !== null ?
                                                                                $details['Jam_Minus'] : '-' }}</td>
                                                                        </tr>
                                                                        @empty
                                                                        <tr>
                                                                            <td>
                                                                                Tidak ada data ditemukan!
                                                                            </td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                        </tr>
                                                                        @endforelse
                                                                        <tr>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td style="text-align: right;">
                                                                                <b>Sub
                                                                                    Total :</b>
                                                                            </td>
                                                                            <td style="text-align: left;">
                                                                                &nbsp{{
                                                                                $totalPlus }}</td>
                                                                            <td style="text-align: left;">{{
                                                                                $totalMinus
                                                                                }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td style="text-align: right;">
                                                                                <b>Total :</b>
                                                                            </td>
                                                                            <td style="text-align: left;">&nbsp{{
                                                                                $totalPlus
                                                                                - $totalMinus }}</td>
                                                                            <td></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                    Tidak ada data ditemukan!
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection