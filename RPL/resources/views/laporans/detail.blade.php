@extends('layouts.app')

@section('title','Detail Laporan Mahasiswa', 'Laporan Pengurus')

@section('contents')

<main id="main" class="main">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

    <div class="pagetitle">
        <h1>Kuesioner</h1>
        <nav class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Dashboard.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Kuesioner</li>
            </ol>
          
            <!-- Add this link to include html2pdf library -->
            <script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

            <button type="button" class="btn btn-primary" id="btnCetakLaporan" onclick="generatePDF()">
                <i class="bi bi-printer-fill"></i> Cetak Laporan
            </button>
        </nav>

    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body" id="cardBody" >   

                        <div class="kop-surat">
                            <img src="{{ asset('assets/img/AstraTech.png') }}" alt="Logo Perusahaan" style="width: 250px;  object-fit: cover;">
                            <div>
                                <h1>LAPORAN HASIL PERSONAL PERFORMANCE ASSESSMENT</h1>
                                <p>ORGANISASI KEMAHASISWAAN {{ date('Y') }}/{{ date('Y') + 1 }}</p>
                                <p>POLITEKNIK ASTRA</p>
                            </div>
                            <div class="garis-bawah"></div>
                        </div>

                        @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        @if($penguruses->count() > 0)
                        @php
                        foreach($penguruses as $pengurus)
                        $Nim = $pengurus->pengurus_id;
                        @endphp

                        <form class="row g-3">
                            @csrf <!-- CSRF token untuk keamanan Laravel -->

                            <div class="col-md-6">
                                @if($datapenguruses)
                                    <div class="col-12 mb-2">
                                        <div class="d-flex">
                                            <label for="Nim" class="form-label"><b>Nim</b></label>
                                            <label style="margin-left: 85px;">:</label>
                                            <span style="margin-left: 10px;">{{ $datapenguruses['Nim'] }}</span>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-2">
                                        <div class="d-flex">
                                            <label for="Nama" class="form-label"><b>Nama</b></label>
                                            <label style="margin-left: 70px;">:</label>
                                            <span style="margin-left: 10px;">{{ $datapenguruses['Nama'] }}</span>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-2">
                                        <div class="d-flex">
                                            <label for="Organisasi" class="form-label"><b>Organisasi</b></label>
                                            <label style="margin-left: 35px;">:</label>
                                            <span style="margin-left: 10px;">{{ $datapenguruses['Organisasi'] }}</span>
                                        </div>
                                    </div>
                                @else
                                    <p>No Record Found!</p>
                                @endif
                            </div>

                            <div class="col-md-6">
                                @if($datapenguruses)
                                    <div class="col-12 mb-2">
                                        <div class="d-flex">
                                            <label for="Divisi" class="form-label"><b>Divisi</b></label>
                                            <label style="margin-left: 75px;">:</label>
                                            <span style="margin-left: 10px;">{{ $datapenguruses['Divisi'] }}</span>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-2">
                                        <div class="d-flex">
                                            <label for="Jabatan" class="form-label"><b>Jabatan</b></label>
                                            <label style="margin-left: 60px;">:</label>
                                            <span style="margin-left: 10px;">{{ $datapenguruses['Jabatan'] }}</span>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-2">
                                        <div class="d-flex">
                                            <label for="Prodi" class="form-label"><b>Program Studi</b></label>
                                            <label style="margin-left: 10px;">:</label>
                                            <span style="margin-left: 10px;">{{ $datapenguruses['Prodi'] }}</span>
                                        </div>
                                    </div>
                                @else
                                    <p>No Record Found!</p>
                                @endif
                            </div>
                        </form>


                        @php
                            $no = 1; 
                            $aspekNames = ['Integritas', 'Handal', 'Tangguh', 'Kolaborasi', 'Inovasi'];
                        @endphp

                        <h5 class="card-title"  style= "margin-top: 20px;">
                           DETAIL PERFORMA
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

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
<!-- Ganti versi jsPDF sesuai kebutuhan -->


<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- ... (bagian lain dari kode HTML Anda) ... -->
@endsection

            <script>
                function generatePDF() {
                    // Get the element you want to convert to PDF
                    const element = document.getElementById('cardBody'); // Replace 'yourContentId' with the actual ID of your content

                    const options = {
                        filename: 'laporan_penilaian.pdf', // Set the filename
                        margin: 10, // Set the margin (optional)
                        image: { type: 'jpeg', quality: 5.0 },
                    };
                    // Generate PDF from the element
                    html2pdf(element, options);
                }
            </script>