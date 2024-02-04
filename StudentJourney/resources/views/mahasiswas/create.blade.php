@extends('layouts.app')

@section('title','Tambah Mahasiswa')

@section('contents')
<title>{{ $title ?? 'Tambah Mahasiswa' }}</title>
<!-- Main -->
<main id="main" class="main">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Form Tambah Mahasiswa</h5>
     

      @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      @if (session('error'))
      <div class="alert alert-success">{{ session('error') }}</div>
      @endif

      <!-- Vertical Form -->
      <form class="row g-3" action="{{ route('mahasiswas.store') }}" method="post">
        @csrf

        <div class="col-12">
          <label for="NIM" class="form-label">NIM <span style="color: red;">*
          @error('NIM') {{ $message }} @enderror</span></label>
          <input type="text" class="form-control" id="NIM" name="NIM" value="{{ Session::get('NIM') }}" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
        </div><br>

        <div class="col-12">
          <label for="Nama" class="form-label">Nama <span style="color: red;">*
          @error('Nama') {{ $message }} @enderror</span></label>
          <input type="text" class="form-control" id="Nama" name="Nama" value="{{ Session::get('Nama') }}" 
          oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '');">
        </div><br>

        <div class="col-12">
          <label for="Kelamin" class="form-label">Jenis Kelamin <span style="color: red;">*
          @error('Jenis_Kelamin') {{ $message }} @enderror</span></label><br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Jenis_Kelamin" id="laki" value="Laki - Laki"
              @if(Session::get('Jenis_Kelamin')=='Laki - Laki' ) checked @endif>
            <label class="form-check-label" for="laki">Laki-laki</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Jenis_Kelamin" id="perempuan" value="Perempuan"
              @if(Session::get('Jenis_Kelamin')=='Perempuan' ) checked @endif>
            <label class="form-check-label" for="perempuan">Perempuan</label>
          </div>
        </div>

          <div class="col-12"><br>
            <label for="PIN" class="form-label">PIN <span style="color: red;">*
            @error('PIN') {{ $message }} @enderror</span></label>
            <div class="input-group">
              <input type="Password" class="form-control" id="PIN" name="PIN"  value="{{ Session::get('PIN') }}"  maxlength="6" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
              <button class="btn btn-outline-secondary" type="button" id="togglePIN">
                <i class="bi bi-eye"></i>
              </button>
            </div>
          </div><br>

          <div class="col-12">
            <label for="RFID" class="form-label">RFID <span style="color: red;">*
            @error('RFID') {{ $message }} @enderror</span></label>
            <input type="text" class="form-control" id="RFID" name="RFID"  value="{{ Session::get('RFID') }}">
          </div><br>

          <div class="col-12">
            <input type="hidden" class="form-control" id="Jam_Plus" value="0" name="Jam_Plus">
          </div>

          <div class="col-12">
            <input type="hidden" class="form-control" id="Jam_Minus" value="0" name="Jam_Minus">
          </div>

          <div class="col-12">
            <input type="hidden" class="form-control" id="Soft_Skill" value="0" name="Soft_Skill">
          </div>

          <div class="col-12">
            <input type="hidden" class="form-control" id="Status" value="1" name="Status">
          </div><br>
          <div class="text-center">
          <a href="{{ route('mahasiswas.index') }}" class="btn btn-secondary ms-2">Kembali</a>
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