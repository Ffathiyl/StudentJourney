@extends('layouts.app')

@section('title','Tambah Kegiatan')

@section('contents')
<title>{{ $title ?? 'Edit Kegiatan' }}</title>
<!-- Main -->
<main id="main" class="main">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Form Ubah Kegiatan</h5>
            <!-- @if ($errors->any())
            <div class="alert alert-danger">
                <div class="alert-title">
                    <h4>Whoops!</h4>
                </div>
                There are some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif -->

            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
            <div class="alert alert-success">{{ session('error') }}</div>
            @endif

            <!-- Vertical Form -->
            <form class="row g-3" action="{{ route('kegiatans.update', $kegiatans->id) }}" method="post">
                @method('PUT')
                @csrf

                <div class="col-12">
                    <label for="Deskripsi" class="form-label">Deskripsi <span style="color: red;">* 
                    @error('Deskripsi') {{ $message }} @enderror</span></label>
                    <input type="text" class="form-control" id="Deskripsi" name="Deskripsi"
                        value="{{ old('Deskripsi', $kegiatans->Deskripsi) }}">
                </div>

                <div class="col-12">
                    <label for="Kapasitas" class="form-label">Kapasitas <span style="color: red;">* 
                    @error('Kapasitas') {{ $message }} @enderror</span></label>
                    <input type="text" class="form-control" id="Kapasitas" name="Kapasitas"
                        value="{{ old('id', $kegiatans->Kapasitas) }}" maxlength="3" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                </div>

                <div class="col-12">
                    <label for="Tanggal_Mulai" class="form-label">Tanggal dan Waktu Mulai <span
                            style="color: red;">* 
                            @error('Tanggal_Mulai') {{ $message }} @enderror</span></label>
                    <input type="datetime-local" class="form-control" id="Tanggal_Mulai" name="Tanggal_Mulai"
                        value="{{ old('Tanggal_Mulai', date('Y-m-d\TH:i', strtotime($kegiatans->Tanggal_Mulai))) }}">
                </div>

                <div class="col-12">
                    <label for="Tanggal_Selesai" class="form-label">Tanggal dan Waktu Selesai <span
                            style="color: red;">* 
                            @error('Tanggal_Selesai') {{ $message }} @enderror</span></label>
                    <input type="datetime-local" class="form-control" id="Tanggal_Selesai" name="Tanggal_Selesai"
                        value="{{ old('Tanggal_Selesai', date('Y-m-d\TH:i', strtotime($kegiatans->Tanggal_Selesai))) }}">
                </div>

                <div class="col-12">
                    <label for="Status" class="form-label">Status</label>
                    <select class="form-control" id="Status" name="Status">
                        <option value="Belum Dikerjakan" {{ old('Status', $kegiatans->Status) == 'Belum Dikerjakan' ? 'selected' : '' }}>Belum
                            Dikerjakan</option>
                        <option value="Sedang Dikerjakan" {{ old('Status', $kegiatans->Status) == 'Sedang Dikerjakan' ? 'selected' : '' }}>Sedang
                            Dikerjakan</option>
                        <option value="Sudah Dikerjakan" {{ old('Status', $kegiatans->Status) == 'Sudah Dikerjakan' ? 'selected' : '' }}>Sudah
                            Dikerjakan</option>
                    </select>
                </div>

                <div class="text-center">
                <a href="{{ route('kegiatans.index') }}" class="btn btn-secondary ms-2">Kembali</a>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form><!-- Vertical Form -->
        </div>
</main>
<!-- End - Main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<script>
    // Lihat password
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordField = document.getElementById('Password');
        const fieldType = passwordField.getAttribute('type');

        if (fieldType === 'password') {
            passwordField.setAttribute('type', 'text');
        } else {
            passwordField.setAttribute('type', 'password');
        }
    });
</script>

@endsection