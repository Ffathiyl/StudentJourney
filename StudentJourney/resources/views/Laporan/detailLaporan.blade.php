@extends('layouts.appsek')

@section('title','Menu mahasiswa')

@section('contents')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Detail Jam Plus vs Jam Minus</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Dashboard.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Detail Laporan</li>
            </ol>

          
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body" id="cardBody"><br>

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
                                    <th class="align-left">No</th>
                                    <th class="align-left">NIM</th>
                                    <th class="align-left">Nama</th>
                                    <th class="align-left">Jenis Kelamin</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1;
                                @endphp
                                @if ($mahasiswas)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $mahasiswas->NIM }}</td>
                                    <td>{{ $mahasiswas->Nama }}</td>
                                    @if($mahasiswas->Jenis_Kelamin == 1)
                                    <td>Laki - Laki</td>
                                    @else
                                    <td>Perempuan</td>
                                    @endif
                                </tr>
                                @else
                                <tr>
                                    <td colspan="4">Data Mahasiswa Tidak Ditemukan</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body" id="cardBody"><br>

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

                                @forelse($detail as $details)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $details['Tanggal'] }}</td>
                                    <td>{{ $details['Deskripsi'] }}</td>
                                    <td>{{ $details['Jam_Plus'] }}</td>
                                    <td>{{ $details['Jam_Minus'] }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td>
                                        Tidak ada data ditemukan!
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @endforelse
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td style="text-align: right;"><b>Sub Total</b></td>
                                    <td style="text-align: left;"> &nbsp{{ $plus }}</td>
                                    <td style="text-align: left;">{{ $minus }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td style="text-align: right;"><b>Total</b></td>
                                    <td style="text-align: left;">{{ $plus - $minus }}</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>
@endsection