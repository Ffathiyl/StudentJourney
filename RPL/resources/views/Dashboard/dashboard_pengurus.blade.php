@extends('layouts.apps')

@section('title', 'Dashboard Pengurus','Detail Laporan Mahasiswa')

@section('contents')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                @php
                    $nimPengguna = Auth::guard('pengurus')->user()->Nim;
                @endphp

                <li class="breadcrumb-item"><a href="{{ route('Dashboard.dashboard_pengurus', ['Nim' => $nimPengguna]) }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body" id="cardBody" >   

                        @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        @if($penguruses->count() > 0)
                          @php
                              $Nim = $penguruses[0]->pengurus_id;
                          @endphp

                        @php
                            $no = 1; 
                            $aspekNames = ['Integritas', 'Handal', 'Tangguh', 'Kolaborasi', 'Inovasi'];
                        @endphp

                        <h5 class="card-title"  style= "margin-top: 20px;">
                          RIWAYAT PENILAIAN 
                        </h5>
                        <table class="table table-striped" style="border-collapse: collapse; width: 100%; border: 1px solid #ddd;">
                            <thead>
                                <tr>
                                    <th rowspan="2" scope="col" style="border: 1px solid #ddd; padding: 8px; text-align: center; background-color: #f2f2f2; width: 50px;">No.</th>
                                    <th rowspan="2" scope="col" style="border: 1px solid #ddd; padding: 8px; text-align: center; background-color: #f2f2f2; width: 150px;">Aspek</th>

                                    <th scope="col" colspan="2" style="border: 1px solid #ddd; padding: 8px; text-align: center; background-color: #f2f2f2; width: 100px;">Sangat Rendah</th>
                                    <th scope="col" colspan="2" style="border: 1px solid #ddd; padding: 8px; text-align: center; background-color: #f2f2f2; width: 100px;">Rendah</th>
                                    <th scope="col" colspan="2" style="border: 1px solid #ddd; padding: 8px; text-align: center; background-color: #f2f2f2; width: 100px;">Sedang</th>
                                    <th scope="col" colspan="2" style="border: 1px solid #ddd; padding: 8px; text-align: center; background-color: #f2f2f2; width: 100px;">Tinggi</th>
                                    <th scope="col" colspan="2" style="border: 1px solid #ddd; padding: 8px; text-align: center; background-color: #f2f2f2; width: 100px;">Sangat Tinggi</th>
                                </tr>
                                @for ($i = 1; $i <= 10; $i++)
                                    <th id="col{{ $i }}" style="border: 1px solid #ddd; padding: 8px; text-align: center; width: 70px;">{{ $i }}</th>
                                @endfor
                            </thead>

                            <tbody>
                                @foreach($aspekNames as $aspek)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $aspek }}</td>

                                        @php
                                            $nilai = $rataRata[strtolower($aspek)];
                                            $colspan = ($aspek === 'Integritas' || $aspek === 'Handal' || $aspek === 'Tangguh' || $aspek === 'Kolaborasi' || $aspek === 'Inovasi') ? 10 : 2;
                                            $percentage = ($nilai / 10) * 100;
                                            
                                            // Menambahkan penanganan khusus untuk nilai 10 agar persentase menjadi 100%
                                            if ($nilai == 10) {
                                                $percentage = 100;
                                            }

                                            $colIndex = ceil($percentage / 10); // Menggunakan ceil agar pembulatan ke atas
                                        @endphp

                                        @if($colspan === 10)
                                            <td colspan="{{ $colspan }}" style="background: linear-gradient(to right, lightgreen {{ $percentage }}%, white 0%); width: {{ ($percentage == 100) ? '100%' : '0%' }};">{{ number_format($nilai, 1) }}</td>
                                        @else
                                            @for ($i = 1; $i <= 10; $i++)
                                                <td style="width: {{ ($i == $colIndex) ? $percentage . '%' : '0%' }};"></td>
                                            @endfor
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        @else
                        <p>Record not found!</p>
                        @endif

                        <h5 class="card-title" style="margin-top: 20px;">
                          EVALUASI DAN APRESIASI
                        </h5>
                        <table class="table table-striped" style="border-collapse: collapse; width: 100%; border: 1px solid #ddd;">
                            <thead>
                              <th scope="col" colspan="2" style="border: 1px solid #ddd; padding: 8px; text-align: center; background-color: #f2f2f2; width: 100px;">Apresiasi</th>
                              <th scope="col" colspan="2" style="border: 1px solid #ddd; padding: 8px; text-align: center; background-color: #f2f2f2; width: 100px;">Evaluasi</th>
                            </thead>

                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        {{ $eval['apresiasi'] }}
                                    </td>
                                    <td colspan="2">
                                        {{ $eval['evaluasi'] }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </section>

    </main><!-- End #main -->
@endsection
