@extends('layouts.app')

@section('title','Tambah Admin')

@section('contents')
<title>{{ $title ?? 'Tambah Admin' }}</title>
<!-- Main -->
<main id="main" class="main">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Form Tambah Admin</h5>
      <!-- @if ($errors->any())
      <div class="alert alert-danger">
        <div class="alert-title">
          <h4>Error!</h4>
        </div>
        Ada Kesalahan Saat Input.
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
      <form class="row g-3" action="{{ route('admins.store') }}" method="post">
        @csrf

        <div class="col-12">
          <label for="Nama" class="form-label">Nama <span style="color: red;">*
              @error('Nama') {{ $message }} @enderror</span></span></label>
          <input type="text" class="form-control" id="Nama" name="Nama" value="{{ Session::get('Nama') }}"
            oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '');">
        </div>

        <div class="col-12">
          <label for="Nohp" class="form-label">Nomer Handphone <span style="color: red;">*
              @error('Nohp') {{ $message }} @enderror</span></span></label>
          <input type="text" class="form-control" id="Nohp" name="Nohp" value="{{ Session::get('Nohp') }}"
            maxlength="13" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
        </div>

        <div class="col-12">
          <label for="Kelamin" class="form-label">Jenis Kelamin <span style="color: red;">*
              @error('Kelamin') {{ $message }} @enderror</span></label><br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Kelamin" id="laki" value="Laki - Laki"
              @if(Session::get('Kelamin')=='Laki - Laki' ) checked @endif>
            <label class="form-check-label" for="laki">Laki-laki</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Kelamin" id="perempuan" value="Perempuan"
              @if(Session::get('Kelamin')=='Perempuan' ) checked @endif>
            <label class="form-check-label" for="perempuan">Perempuan</label>
          </div>
        </div>

        <div class="col-12">
          <label for="Username" class="form-label">Username <span style="color: red;">*
              @error('Username') {{ $message }} @enderror</span></label>
          <input type="text" class="form-control" id="Username" name="Username" value="{{ Session::get('Username') }}">
        </div>

        <div class="col-12">
          <label for="Password" class="form-label">Password <span style="color: red;">*
              @error('Password') {{ $message }} @enderror</span></span></label>
          <div class="input-group">
            <input type="password" class="form-control" id="Password" name="Password"
              value="{{ Session::get('Password') }}">
            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
              <i class="bi bi-eye"></i>
            </button>
          </div>
        </div>

        <div class="col-12">
          <label for="Role" class="form-label">Role <span style="color: red;">*</span></label>
          <select class="form-select" id="Role" name="Role">
            <option value="Admin" @if(Session::get('Role')=='Admin' ) selected @endif>Admin</option>
            <option value="Sekretaris Prodi" @if(Session::get('Role')=='Sekretaris Prodi' ) selected @endif>Sekretaris
              Prodi</option>
          </select>
        </div>

        <div class="col-12">
          <input type="hidden" class="form-control" id="Status" value="1" name="Status">
        </div>
        <div class="text-center">
          <a href="{{ route('admins.index') }}" class="btn btn-secondary ms-2">Kembali</a>
          <button type="submit" class="btn btn-primary">Simpan</button>
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