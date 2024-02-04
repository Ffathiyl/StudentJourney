@extends('layouts.app')

@section('title','Menu rfid')

@section('contents')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>RFID</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Dashboard.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">RFID</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('rfids.create') }}" class="btn btn-primary">Tambah</a>
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
                                    <th scope="col">RFID</th>
                                    <th scope="col">Mahasiswa</th>
                                    <th scope="">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                $i=1;
                                @endphp

                                @forelse($rfids as $rfid)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $rfid->RFID }}</td>
                                    <td>{{ $rfid->mahasiswa->Nama }}</td>
                                    <td>
                                        <a href="{{ route('rfids.edit', ['rfid' => $rfid->RFID]) }}"
                                            class="btn btn-warning "><i class="ri-edit-box-line"></i></a>
                                        <a class="btn btm-sm btn-danger delete-btn" data-id="{{ $rfid->RFID }}"><i
                                                class="bi bi-trash"></i></a>
                                        <form id="delete-row-{{ $rfid->RFID }}"
                                            action="{{ route('rfids.destroy', ['rfid' => $rfid->RFID]) }}"
                                            method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td>
                                        No Record Found!
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
                const rfidId = this.getAttribute('data-id');

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
                        const form = document.getElementById(`delete-row-${rfidId}`);
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