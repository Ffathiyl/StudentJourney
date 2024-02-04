@extends('layouts.app')

@section('title','Tambah Mahasiswa')

@section('contents')

<!-- Main -->
<main id="main" class="main">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Form Tambah Mahasiswa</h5>
            @if ($errors->any())
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
            @endif

            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
            <div class="alert alert-success">{{ session('error') }}</div>
            @endif

            <!-- Vertical Form -->
            <form class="row g-3" action="{{ route('rfids.update', $rfids->RFID) }}" method="post">
                @method('PUT')
                @csrf

                <div class="col-12">
                    <label for="Mahasiswa" class="form-label">Mahasiswa <span style="color: red;">*</span></label>
                    <select name="mahasiswa_id" class="form-control" id="mahasiswa_id">
                        <option value="">-- Mahasiswa --</option>
                        @foreach ($mahasiswas as $mahasiswaID => $nama)
                        <option value="{{ $mahasiswaID }}" @selected(old('mahasiswa_id')==$mahasiswaID || $rfids->
                            mahasiswa_id == $mahasiswaID)>
                            {{ $nama }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12">
                    <label for="Password" class="form-label">PIN <span style="color: red;">*</span></label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="PIN" name="PIN"
                            value="{{ old('PIN', $rfids->PIN) }}">
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="col-12">
                    <label for="RFID" class="form-label">RFID <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="RFID" name="RFID"
                        value="{{ old('RFID', $rfids->RFID) }}" readonly>
                </div>

                <div class="col-12">
                    <input type="hidden" class="form-control" id="Status" value="1" name="Status">
                </div>
                
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
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