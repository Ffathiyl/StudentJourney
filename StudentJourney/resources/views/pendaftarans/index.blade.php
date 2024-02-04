@extends('layouts.app')

@section('title','Menu pendaftaran')

@section('contents')
<title>{{ $title ?? 'Pendaftaran' }}</title>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Pendaftaran</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Dashboard.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Pendaftaran</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Permintaan pendaftaran
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
                                    <th scope="col">Nama</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Catatan</th>
                                    <th scope="col">Jam Plus & Minus</th>
                                    <th scope="col">Status</th>
                                    <th scope="">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1;
                                @endphp

                                @forelse($pendaftarans as $pendaftaran)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $pendaftaran->mahasiswa->Nama }}</td>
                                    <td>{{ $pendaftaran->kegiatan->Deskripsi }}</td>
                                    <td>{{ $pendaftaran->Catatan }}</td>
                                    <td>{{ $pendaftaran->mahasiswa->Jam_Plus - $pendaftaran->mahasiswa->Jam_Minus }}</td>
                                    <td>{{ $pendaftaran->status }}</td>
                                    <td>
                                    @if($pendaftaran->status == 'Menunggu Persetujuan PIC')
                                        <a class="btn btm-sm btn-primary delete-btn" data-id="{{ $pendaftaran->id }}"><i
                                                class="bi bi-check-lg"></i></a>
                                        <form id="delete-row-{{ $pendaftaran->id }}"
                                            action="{{ route('pendaftarans.app', ['id' => $pendaftaran->id]) }}" method="POST">
                                            <input type="hidden" name="_method" value="POST">
                                            @csrf
                                        </form>
                                        @endif
                                    </td>
                                    
                                </tr>
                                @empty
                                <tr>
                                    <td>
                                       Tidak Ada Pendaftaran
                                    </td>
                                    <td>
                                    <td>
                                    <td>
                                    <td>
                                    <td>
                                    <td>
                                    </td>
                                    </td>
                                    </td>
                                    </td>
                                    </td>
                                    </td>
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
                const pendaftaranId = this.getAttribute('data-id');

                Swal.fire({
                    title: 'Yakin Menerima Pengajuan?',
                    text: 'Konfirmasi',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#43434',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const form = document.getElementById(`delete-row-${pendaftaranId}`);
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