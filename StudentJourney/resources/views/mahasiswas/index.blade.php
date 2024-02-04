@extends('layouts.app')

@section('title','Menu mahasiswa')

@section('contents')
<title>{{ $title ?? 'Mahasiswa' }}</title>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>mahasiswa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Dashboard.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">mahasiswa</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('mahasiswas.create') }}" class="btn btn-primary">Tambah</a>
                        </h5>
                        @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <!-- Table with stripped rows -->
                        <table class="table table-striped" id="myTablee">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Jam Plus</th>
                                    <th scope="col">Jam Minus</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                $i=1;
                                @endphp

                                @forelse($mahasiswas as $mahasiswa)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $mahasiswa->NIM }}</td>
                                    <td>{{ $mahasiswa->Nama }}</td>
                                    <td>
                                    @if ($mahasiswa->Jenis_Kelamin == 'Laki - Laki')
                                        Laki - Laki
                                        @else
                                        Perempuan
                                        @endif
                                    </td>
                                    <td>{{ $mahasiswa->Jam_Plus }}</td>
                                    <td>{{ $mahasiswa->Jam_Minus }}</td>
                                    <td>
                                        <a href="{{ route('mahasiswas.edit', ['id' => $mahasiswa->id]) }}"
                                            class="btn btn-warning "><i class="ri-edit-box-line"></i></a>
                                        <a class="btn btm-sm btn-danger delete-btn" data-id="{{ $mahasiswa->id }}"><i
                                                class="bi bi-trash"></i></a>
                                        <form id="delete-row-{{ $mahasiswa->id }}"
                                            action="{{ route('mahasiswas.destroy', ['id' => $mahasiswa->id]) }}" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td>
                                        Tidak ada data ditemukan!
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->



<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteLinks = document.querySelectorAll('a.delete-btn');

        deleteLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const mahasiswaId = this.getAttribute('data-id');

                Swal.fire({
                    title: 'Yakin Hapus Data?',
                    text: 'Data tidak akan bisa dikembalikan!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const form = document.getElementById(`delete-row-${mahasiswaId}`);
                        form.submit();
                    }
                });
            });
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
      $('#myTablee').DataTable();
    });
  </script>

<!-- ... (bagian lain dari kode HTML Anda) ... -->
@endsection