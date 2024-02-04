Edit Mahasiswa
@extends('layouts.app')

@section('title','Tambah Mahasiswa')

@section('contents')
<title>{{ $title ?? 'Edit Mahasiswa' }}</title>
<!-- Main -->
<main id="main" class="main">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Form Ubah Mahasiswa</h5>
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
            <form class="row g-3" action="{{ route('mahasiswas.update', $mahasiswa->id) }}" method="post">
                @method('PUT')
                @csrf

                <div class="col-12">
                    <label for="NIM" class="form-label">NIM <span style="color: red;">*
                            @error('NIM') {{ $message }} @enderror</span></label>
                    <input type="text" class="form-control" id="NIM" name="NIM"
                        value="{{ old('NIM', $mahasiswa->NIM) }}" readonly>
                </div>

                <div class="col-12">
                    <label for="Nama" class="form-label">Nama <span style="color: red;">*
                            @error('Nama') {{ $message }} @enderror</span></label>
                    <input type="text" class="form-control" id="Nama" name="Nama"
                        value="{{ old('Nama', $mahasiswa->Nama) }}" oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '');">
                </div>

                <div class="col-12">
                    <label for="Jenis_Kelamin" class="form-label">Jenis Kelamin <span style="color: red;">*
                            @error('Jenis_Kelamin') {{ $message }} @enderror</span></label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Jenis_Kelamin" id="laki" value="Laki - Laki"
                            {{ old('Jenis_Kelamin', $mahasiswa->Jenis_Kelamin) === 'Laki - Laki' ? 'checked' : '' }}>
                        <label class="form-check-label" for="laki">Laki - Laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Jenis_Kelamin" id="perempuan"
                            value="Perempuan" {{ old('Jenis_Kelamin', $mahasiswa->Jenis_Kelamin) === 'Perempuan' ?
                        'checked' : '' }}>
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                </div>

                <div class="col-12"><br>
                    <label for="PIN" class="form-label">PIN <span style="color: red;">*
                            @error('PIN') {{ $message }} @enderror</span></label>
                    <div class="input-group">
                        <input type="Password" class="form-control" id="PIN" name="PIN"
                            value="{{ old('PIN', $mahasiswa->PIN) }}">
                        <button class="btn btn-outline-secondary" type="button" id="togglePIN">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div><br>

                <div class="col-12">
                    <label for="RFID" class="form-label">RFID <span style="color: red;">*
                            @error('RFID') {{ $message }} @enderror</span></label>
                    <input type="text" class="form-control" id="RFID" name="RFID"
                        value="{{ old('RFID', $mahasiswa->RFID) }}">
                </div>

                <div class="col-12">
                    <input type="hidden" class="form-control" id="Status" value="1" name="Status">
                </div>
                <div class="text-center">
                    <a href="{{ route('mahasiswas.index') }}" class="btn btn-secondary ms-2">Kembali</a>
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
    document.getElementById('togglePIN').addEventListener('click', function () {
        const passwordField = document.getElementById('PIN');
        const fieldType = passwordField.getAttribute('type');

        if (fieldType === 'password') {
            passwordField.setAttribute('type', 'text');
        } else {
            passwordField.setAttribute('type', 'password');
        }
    });
</script>

@endsection