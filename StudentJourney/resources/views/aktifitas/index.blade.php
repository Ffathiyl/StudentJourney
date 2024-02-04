@extends('layouts.app')

@section('title','Menu Aktifitas')

@section('contents')
<title>{{ $title ?? 'Aktifitas' }}</title>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Aktifitas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Dashboard.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Aktifitas</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="#" class="btn btn-primary" data-toggle="modal"
                                data-target=".bd-example-modal-lg">Tambah</a>
                        </h5>
                        @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        @error('Mahasiswa_Id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        @error('Deskripsi')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <!-- Table with stripped rows -->
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Nama Mahasiswa</th>
                                    <th scope="col">Jam Plus</th>
                                    <th scope="col">Jam Minus</th>
                                    <th scope="">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                $i=1;
                                @endphp

                                @forelse($aktifitass as $admin)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $admin->Deskripsi }}</td>
                                    <td>{{ $admin->mahasiswa->NIM }}</td>
                                    <td>{{ $admin->mahasiswa->Nama }}</td>
                                    <td>{{ $admin->Jam_Plus }}</td>
                                    <td>{{ $admin->Jam_Minus }}</td>
                                    <td>
                                        <a class="btn btm-sm btn-danger delete-btn" data-id="{{ $admin->id }}"><i
                                                class="bi bi-trash"></i></a>
                                        <form id="delete-row-{{ $admin->id }}"
                                            action="{{ route('aktifitas.destroy', ['id' => $admin->id]) }}"
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

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content p-3">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Aktifitas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="ri-close-fill"></i>
                        </button>
                    </div><br>
                    <form id="editForm" method="post" action="{{ route('aktifitas.store') }}">
                        @csrf
                        @method('POST')

                        <div class="col-12"><br>
                            <label for="organisasi" class="form-label">Mahasiswa <span
                                    style="color: red;">*</span></label>
                            <select name="Mahasiswa_Id" class="form-control" id="Mahasiswa_Id">
                                <option value="">-- Mahasiswa --</option>
                                @foreach ($mahasiswas as $mahasiswaID => $nama)
                                <option value="{{ $mahasiswaID }}" @selected(old('Mahasiswa_Id')==$mahasiswaID)>
                                    {{ $nama }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group"><br>
                            <label for="Deskripsi">Deskripsi</label><br>
                            <textarea class="form-control" id="Deskripsi" name="Deskripsi"></textarea>
                        </div>

                        <br>
                        <label class="form-check-label" for="option2">Jenis Jam</label>
                        <div class="form-group"><br>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="plus" name="Jam" value="Plus">
                                <label class="form-check-label" for="option2">Jam Plus</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="minus" name="Jam" value="Minus">
                                <label class="form-check-label" for="option2">Jam Minus</label>
                            </div>
                        </div>
                        <div class="col-md-2"><br>
                            <label for="Total">Jumlah Jam</label>
                            <input type="number" class="form-control" id="Total" name="Total" pattern="[0-9]+" max="999" title="Hanya angka diizinkan" oninput="this.value = this.value.replace(/[^0-9]/g, ''); if(this.value.length > 3) this.value = this.value.slice(0,3);">
                        </div><br>  

                        <!-- <div class="col-md-2"><br>
                            <label for="Jam_Plus">Jam Plus</label>
                            <input type="text" class="form-control" id="Jam_Plus" name="Jam_Plus">
                        </div>
                        <div class="col-md-2"><br>
                            <label for="Jam_Minus">Jam Minus</label>
                            <input type="text" class="form-control" id="Jam_Minus" name="Jam_Minus">
                        </div><br> -->
                        <div class="modal-footer"><br>
                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
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
                const adminId = this.getAttribute('data-id');

                Swal.fire({
                    title: 'Yakin Menghapus Aktifitas?',
                    text: 'Data tidak akan bisa dikembalikan!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const form = document.getElementById(`delete-row-${adminId}`);
                        form.submit();
                    }
                });
            });
        });
    });
</script>

@if (Session::has('error'))
<script>
    console.log('Error');
    Swal.fire({
        title: 'Pesan',
        text: '{{ Session::get('error') }}',
        icon: 'error'
    });
</script>
@endif

<!-- ... (bagian lain dari kode HTML Anda) ... -->
@endsection