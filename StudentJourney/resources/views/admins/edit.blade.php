@extends('layouts.app')

@section('title','Edit Admin')

@section('contents')
<title>{{ $title ?? 'Edit Admin' }}</title>
<!-- Main -->
<main id="main" class="main">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Form Edit Admin</h5>


            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
            <div class="alert alert-success">{{ session('error') }}</div>
            @endif

            <!-- Vertical Form -->
            <form class="row g-3" action="{{ route('admins.update', $admin->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="col-12" hidden>
                    <label for="ID" class="form-label">ID</label>
                    <input type="text" class="form-control" id="id" name="id" value="{{ old('id', $admin->id) }}"
                        readonly>
                </div>

                <div class="col-12">
                    <label for="Nama" class="form-label">Nama</label><span style="color: red;">*
                        @error('Nama') {{ $message }} @enderror</span>
                    <input type="text" class="form-control" id="Nama" name="Nama" pattern="[A-Za-z ]+"
                        title="Hanya huruf diizinkan" oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '');"
                        value="{{ old('Nama', $admin->Nama) }}">
                </div>

                <div class="col-12">
                    <label for="Nohp" class="form-label">No Handphone</label><span style="color: red;">*
                        @error('Nohp') {{ $message }} @enderror</span>
                    <input type="text" class="form-control" id="Nohp" name="Nohp"
                        value="{{ old('Nohp', $admin->Nohp) }}" maxlength="13"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                </div>

                <div class="col-12">
                    <label for="Kelamin" class="form-label">Jenis Kelamin</label><span style="color: red;">*<br>
                        @error('Kelamin') {{ $message }} @enderror</span>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Kelamin" id="laki" value="Laki - Laki" {{
                            old('Kelamin', $admin->Kelamin) === 'Laki - Laki' ? 'checked' : '' }}>
                        <label class="form-check-label" for="laki">Laki - Laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Kelamin" id="perempuan" value="Perempuan" {{
                            old('Kelamin', $admin->Kelamin) === 'Perempuan' ? 'checked' : '' }}>
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                </div>

                <div class="col-12">
                    <label for="Username" class="form-label">Username</label><span style="color: red;">*
                        @error('Username') {{ $message }} @enderror</span>
                    <input type="text" class="form-control" id="Username" name="Username"
                        value="{{ old('Username', $admin->Username) }}">
                </div>

                <div class="col-12">
                    <label for="Password" class="form-label">Password</label>
                    <span style="color: red;">*
                        @error('Password') {{ $message }} @enderror</span>
                    <div class="input-group">
                        <input type="password" class="form-control" id="Password" name="Password"
                            value="{{ old('Password', $admin->Password) }}">
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="col-12">
                    <label for="Role" class="form-label">Role <span style="color: red;">*</span></label>
                    <select class="form-select" id="Role" name="Role">
                        <option value="Admin" {{ $admin->Role == 'Admin' ? 'selected' : '' }}>Admin</option>
                        <option value="Sekretaris Prodi" {{ $admin->Role == 'Sekretaris Prodi' ? 'selected' : ''
                            }}>Sekretaris Prodi</option>
                    </select>
                </div>

                <div class="col-12">
                    <input type="hidden" class="form-control" id="Status" value="1" name="Status">
                </div>
                <div class="text-center">
                    <a href="{{ route('admins.index') }}" class="btn btn-secondary ms-2">Kembali</a>
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