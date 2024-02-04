@extends('layouts.app')

@section('title','Dashboard Mahasiswa')

@section('contents');

<main id="main" class="main">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Form Tambah Kegiatan</h5>
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
      <form class="row g-3" action="{{ route('pengajuans.penga', ['id' => $pendaftarans->id]) }}" method="post">
        @csrf

        <div class="col-md-6">
          <b><label for="inputName5" class="form-label" style="font-size: 16px">NIM</label></b><br>
          <label for="" class="form-label" style="font-size: 16px">{{ $pendaftarans->mahasiswa->NIM }}</label></b>
          <!-- <input type="text" class="form-control" id="inputName5"> -->
        </div>
        <div class="col-md-6">
          <b><label for="inputName5" class="form-label" style="font-size: 16px">Nama</label></b><br>
          <label for="" class="form-label" style="font-size: 16px">{{ $pendaftarans->mahasiswa->Nama }}</label></b>
          <!-- <input type="email" class="form-control" id="inputEmail5"> -->
        </div>
        <div class="col-md-6">
          <b><label for="inputName5" class="form-label" style="font-size: 16px">Total Jam</label></b><br>
          <label for="" class="form-label" style="font-size: 16px">{{ $pendaftarans->mahasiswa->Jam_Plus -
            $pendaftarans->mahasiswa->Jam_Minus }}</label></b>
          <!-- <input type="password" class="form-control" id="inputPassword5"> -->
        </div>

        <div class="col-md-6">
          <b><label for="inputName5" class="form-label" style="font-size: 16px">Deskripsi</label></b><br>
          <label for="" class="form-label" style="font-size: 16px">{{ $pendaftarans->kegiatan->Deskripsi}}</label></b>
          <!-- <input type="password" class="form-control" id="inputPassword5"> -->
        </div> 

        <div class="col-1">
          <label for="Jam_Plus" class="form-label">Jam Plus <span style="color: red;">*</span></label>
          <input type="text" class="form-control" id="Jam_Plus" name="Jam_Plus" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
        </div>

        <div class="col-12">
          <input type="hidden" class="form-control" id="Status" value="Diterima" name="Status">
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- Vertical Form -->
    </div>
</main>

<!-- ======= Footer ======= -->
<div class="mt-5" style="background-color: white; width: 100%; position: fixed; left: 0; bottom: 0;">
  <div class="container-fluid">
    <footer class="d-flex flex-wrap pt-3 pb-3 border-top">
      Copyright &copy; @php echo date('Y') @endphp - StudentJourney
    </footer>
  </div>
</div>

@endsection