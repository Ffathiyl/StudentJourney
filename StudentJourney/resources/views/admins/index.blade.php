@extends('layouts.app')

@section('title','Menu Admin')

@section('contents')
<title>{{ $title ?? 'Admin' }}</title>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Admin</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Dashboard.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Admin</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('admins.create') }}" class="btn btn-primary">Tambah</a>
                        </h5>
                        @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <!-- Table with stripped rows -->
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">No Hp</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Status</th>
                                    <th scope="">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                $i=1;
                                @endphp

                                @forelse($admins as $admin)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $admin->Nama }}</td>
                                    <td>{{ $admin->Nohp }}</td>
                                    <td>{{ $admin->Kelamin }}</td>
                                    <td>{{ $admin->Role }}</td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="switch-{{ $admin->id }}"
                                                {{ $admin->Status ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('admins.edit', ['id' => $admin->id]) }}"
                                            class="btn btn-warning "><i class="ri-edit-box-line"></i></a>
                                        <form id="delete-row-{{ $admin->id }}"
                                            action="{{ route('admins.destroy', ['id' => $admin->id]) }}" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            @csrf
                                        </form>
                                        <form id="recovery-row-{{ $admin->id }}"
                                            action="{{ route('admins.recovery', ['id' => $admin->id]) }}" method="POST">
                                            <input type="hidden" name="_method" value="POST">
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
                    title: 'Yakin Hapus Data?',
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const switches = document.querySelectorAll('.form-check-input');

        switches.forEach(switchElement => {
            switchElement.addEventListener('change', function () {
                const adminId = this.id.split('-')[1];
                const status = this.checked;

                // Lakukan sesuatu dengan adminId dan status (misalnya, kirim permintaan AJAX ke server)
                console.log(`Admin ID: ${adminId}, Status: ${status}`);

                if(status){
                    const form = document.getElementById(`recovery-row-${adminId}`);
                        form.submit();
                }else{
                    const form = document.getElementById(`delete-row-${adminId}`);
                        form.submit();
                }
            });
        });
    });
</script>

<!-- ... (bagian lain dari kode HTML Anda) ... -->
@endsection