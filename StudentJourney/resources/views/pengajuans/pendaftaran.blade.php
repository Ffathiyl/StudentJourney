@extends('layouts.apps')

@section('title','Dashboard Mahasiswa')

@section('contents');

<title>{{ $title ?? 'Pendaftaran' }}</title>
<main id="mainn" class="mainn ms-3 pe-3">

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
                    </div>
                    @endif
                </li>
                <li class="nav-item pe-3">
                    <a href="{{ route('pengajuans.indexs') }}" class="btn btn-primary"><i
                            class="ri-arrow-go-back-line"></i></a>
                </li>
            </ul>
        </nav>
    </header><!-- End Header -->

    <section class="section dashboard">
        <div class="row">

            <!-- Multi Columns Form -->
            <form class="row g-3" action="{{ route('pendaftarans.store') }}" method="post">
                @csrf
                <input type="text" class="form-control" id="inputName5" name="Mahasiswa_Id"
                    value="{{ session('logged_mhs')->id }}" readonly hidden>
                <div class="col-md-11">
                    <label for="inputName5" class="form-label">NIM</label>
                    <input style="background-color: #eaf2f8;" type="text" class="form-control" id="inputName5" name="NIM"
                        value="{{ session('logged_mhs')->NIM }}" readonly>
                </div>
                <div class="col-md-10">
                    <label for="inputName5" class="form-label">Nama</label>
                    <input style="background-color: #eaf2f8;" type="text" class="form-control" id="inputName5" name="Nama"
                        value="{{ session('logged_mhs')->Nama }}" readonly>
                </div>
                <div class="col-md-1">
                    <label for="inputEmail5" class="form-label">Jam Minus</label>
                    <input style="background-color: #eaf2f8;" type="email" class="form-control" id="inputEmail5" name="Jam Minus"
                        value="{{ session('logged_mhs')->Jam_Plus - session('logged_mhs')->Jam_Minus }}" readonly>
                </div>
                <div class="col-10">
                    <label for="kegiatan" class="form-label">Kegiatan <span style="color: red;">* 
                    @error('Kegiatan_Id') {{ $message }} @enderror</span></label>
                    <select name="Kegiatan_Id" class="form-control" id="kegiatan_id">
                        <option value="">-- Kegiatan --</option>
                        @foreach ($kegiatans as $kegiatanID => $Deskripsi)
                        <option value="{{ $kegiatanID }}" @selected(old('kegiatan_id')==$kegiatanID)>
                            {{ $Deskripsi }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-1">
                    <label for="inputEmail5" class="form-label">Kapasitas</label>
                    <input style="background-color: #eaf2f8;" type="email" class="form-control" name="Jam Minus" id="Kapasitas" readonly>
                </div>
                <div class="col-md-10">
                    <label for="Catatan" class="form-label">Catatan <span style="color: red;">* 
                    @error('Kegiatan_Id') {{ $message }} @enderror</span></label>
                    <input type="text" class="form-control" id="inputName5" name="Catatan">
                </div>
                <div class="col-6">
                    <label for="Tanggal_Mulai" class="form-label">Tanggal dan Waktu Mulai <span
                            style="color: red;">*</span></label>
                    <input style="background-color: #eaf2f8;" type="datetime-local" class="form-control" id="Tanggal_Mulai" name="Tanggal_Mulai"
                        id="Tanggal_Mulai" readonly>
                </div>
                <div class="col-6">
                    <label for="Tanggal_Mulai" class="form-label">Tanggal dan Waktu Selesai <span
                            style="color: red;">*</span></label>
                    <input style="background-color: #eaf2f8;" type="datetime-local" class="form-control" id="Tanggal_Selesai" name="Tanggal_Selesai"
                        id="Tanggal_Selesai" readonly>
                </div>
                <input type="text" class="form-control" id="inputName5" name="Status" value="Menunggu Persetujuan PIC"
                    readonly hidden> <br><br><br>
                <div class="text-center">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form><!-- End Multi Columns Form -->

        </div>
    </section>
</main><!-- End #main -->

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        console.log('Script loaded');
        // Ketika nilai dropdown Organisasi berubah
        $('#kegiatan_id').on('change', function () {
            console.log('Dropdown changed');
            var kegiatanId = $(this).val();
            var url = "{{ route('getTanggal') }}?kegiatan_id=" + kegiatanId;
            url = url.replace(':kegiatanId', kegiatanId);
            $.ajax({
                type: 'GET',
                url: url,
                success: function (data) {
                    // Ambil elemen pertama dari array kegiatan
                    var kegiatan = data[0];
                    // Gunakan Tanggal_Mulai untuk mengisi elemen dengan ID Tanggal_Mulai
                    $('#Tanggal_Mulai').val(kegiatan.Tanggal_Mulai);
                    $('#Tanggal_Selesai').val(kegiatan.Tanggal_Selesai);
                    $('#Kapasitas').val(kegiatan.Kapasitas);
                },
                error: function (xhr, status, error) {
                    console.error(error); // Log any errors to the console
                }
            });
        });
    });
</script>



@endsection