@extends('layouts.apps')

@section('title','Menu pengajuan')

@section('contents')
<title>{{ $title ?? 'Pendaftaran' }}</title>
<main id="mainn" class="mainn">

    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a class="logo d-flex align-items-center">
                <img src="{{ asset('assets/img/AstraTech.png') }}" alt="">
                <!-- <span class="d-none d-lg-block">AstraTech</span> -->
            </a>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">
                    @if(session()->has('logged_mhs'))
                    @php
                    $logged_in = session('logged_mhs');
                    @endphp
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Hai, <b>{{ $logged_in->Nama }}</b>
                    </a>

                    <!-- Dropdown menu -->
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('logins.logouts') }}">
                            Logout
                        </a>

                        <!-- Hidden logout form -->

                    </div>
                    @endif
                </li>
                <li class="nav-item pe-3">
                    <a href="{{ route('Dashboard.dashboardtrl') }}" class="btn btn-primary"><i
                            class="ri-arrow-go-back-line"></i></a>
                </li>
            </ul>
        </nav>
    </header><!-- End Header -->

   

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Pendaftaran Kegiatan
                            <a href="{{ route('pendaftaran.create') }}"
                                class="btn btn-primary bi-plus float-end">Tambah</a>
                        </h5><br>
                        @if (session('successPend'))
                        <div class="alert alert-success">{{ session('successPend') }}</div>
                        @endif

                        @if (session('errorPend'))
                        <div class="alert alert-danger">{{ session('errorPend') }}</div>
                        @endif

                        <!-- Table with stripped rows -->
                        <table class="table table-striped" id="myTablee">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Nama Mahasiswa</th>
                                    <th scope="col">Nama Kegiatan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1;
                                @endphp

                                @forelse($pendaftarans as $pendaftaran)
                                <tr data-pengajuan-id="{{ $pendaftaran->id }}"
                                    data-pengajuan-peno="{{ $pendaftaran->Deskripsi_Penolakan }}">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $pendaftaran->mahasiswa->NIM }}</td>
                                    <td>{{ $pendaftaran->mahasiswa->Nama }}</td>
                                    <td>{{ $pendaftaran->kegiatan->Deskripsi }}</td>
                                    <td>{{ $pendaftaran->status }}</td>
                                    <td>
                                        @if($pendaftaran->status !== 'Pengajuan Diterima' && $pendaftaran->status !==
                                        'Menunggu Proses Pengajuan')
                                        @if($pendaftaran->status !== 'Menunggu Persetujuan PIC' && $pendaftaran->status
                                        !== 'Ditolak')
                                        <a class="btn btm-sm btn-primary acc-btn" data-id="{{ $pendaftaran->id }}">
                                            <i class="bi bi-check-circle"></i>
                                        </a>
                                        @endif

                                        @if($pendaftaran->status !== 'Ditolak')
                                        <a href="#" class="btn btn-danger delete-btn" data-id="{{ $pendaftaran->id }}">
                                            <i class="ri-delete-bin-6-line"></i>
                                        </a>
                                        @endif

                                        @if($pendaftaran->status === 'Ditolak')
                                        <!-- Tombol Untuk Modal -->
                                        <a href="#" class="btn btn-success edit"><i class="ri-edit-box-line"></i></a>
                                        @endif

                                        <form id="delete-row-{{ $pendaftaran->id }}"
                                            action="{{ route('pendaftarans.destroy', ['id' => $pendaftaran->id]) }}"
                                            method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            @csrf
                                        </form>
                                        <form id="acc-row-{{ $pendaftaran->id }}"
                                            action="{{ route('pengajuans.aju', ['id' => $pendaftaran->id]) }}"
                                            method="POST">
                                            <input type="hidden" name="_method" value="POST">
                                            @csrf
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td>
                                        Belum Mendaftar Apapun.
                                    </td>
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

        <!-- MODAL -->

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Pengajuan Kembali</h5>
                    </div>
                    <div class="modal-body">
                        <form id="editForm" method="post">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <input type="text" class="form-control" id="pend" name="pend" readonly hidden>
                            </div>
                            <div class="form-group">
                                <label for="nim">NIM:</label><br>
                                <input type="text" class="form-control" id="nim" name="nim" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama:</label><br>
                                <input type="text" class="form-control" id="nama" name="nama" readonly>
                            </div>
                            <div class="form-group">
                                <label for="kegiatan">Nama Kegiatan:</label>
                                <input type="text" class="form-control" id="kegiatan" name="kegiatan" readonly>
                            </div>
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <input type="text" class="form-control" id="status" name="status" readonly>
                            </div>
                            <div class="form-group">
                                <label for="penolakan">Alasan Penolakan:</label>
                                <textarea class="form-control" id="penolakan" name="penolakan" readonly></textarea>
                            </div>
                            <div class="modal-footer">
                                <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Riwayat Pengajuan
                        </h5>
                        @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <!-- Table with stripped rows -->
                        <table class="table table-striped" id="">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Jam Plus</th>
                                    <th scope="col">Status</th>
                                    <!-- <th scope="">Aksi</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1;
                                @endphp

                                @forelse($pengajuans as $pengajuan)
                                <tr>
                                    <td style="{{ $pengajuan->Status === 'Diterima' ? 'background-color: #d4edda;' : 'red' }}">{{ $i++ }}</td>
                                    <td style="{{ $pengajuan->Status === 'Diterima' ? 'background-color: #d4edda;' : '' }}">{{ $pengajuan->pendaftaranKegiatan->mahasiswa->Nama }}</td>
                                    <td style="{{ $pengajuan->Status === 'Diterima' ? 'background-color: #d4edda;' : '' }}">{{ $pengajuan->pendaftaranKegiatan->kegiatan->Deskripsi }}</td>
                                    <td style="text-align: right; {{ $pengajuan->Status === 'Diterima' ? 'background-color: #d4edda;' : '' }}">{{ $pengajuan->Jam_Plus }}</td>
                                    <td style="{{ $pengajuan->Status === 'Diterima' ? 'background-color: #d4edda;' : '' }}">{{ $pengajuan->Status }}</td>
                                    <!-- <td>
                                        <a href="#" class="btn btn-info rounded-circle edit-btn"
                                            data-id="{{ $pengajuan->id }}">
                                            <i class="ri-add-circle-fill"></i>
                                        </a>
                                    </td> -->
                                </tr>
                                @empty
                                <tr>
                                    <td>
                                        Data tidak ditemukan!
                                    </td>
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
                const pendaftaranId = this.getAttribute('data-id');

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
                        const form = document.getElementById(`delete-row-${pendaftaranId}`);
                        form.submit();
                    }
                });
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteLinks = document.querySelectorAll('a.acc-btn');

        deleteLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const pendaftaranId = this.getAttribute('data-id');

                Swal.fire({
                    title: 'Yakin Melakukan Pengajuan?',
                    text: '',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#43434',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const form = document.getElementById(`acc-row-${pendaftaranId}`);
                        form.submit();
                    }
                });
            });
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    // Use jQuery to handle modal display and data population
    $(document).ready(function () {
        var table = $('#myTablee').DataTable();
        table.destroy();

        // Triggered when the modal is about to be shown
        table.on('click', '.edit', function () {

            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent');
            }

            var ssssRow = $('#myTablee tbody tr.ssss');
            var pengajuanId = ssssRow.data('pengajuan-id');
            var penolakan = ssssRow.data('pengajuan-peno');
            console.log(pengajuanId);

            var data = table.row($tr).data();
            console.log(data);

            $('#nim').val(data[1]); // Assuming NIM is in the second column
            $('#nama').val(data[2]); // Assuming Nama is in the third column
            $('#kegiatan').val(data[3]); // Assuming Deskripsi is in the fourth column
            $('#status').val(data[4]); // Assuming Total Jam is in the fifth column 
            $('#pend').val(pengajuanId);
            $('#penolakan').val(penolakan);

            // Ubah action formulir sesuai dengan rute dan parameter yang diperlukan
            var form = $('#editForm');
            form.attr('action', '/pengajuans/aju/' + pengajuanId);

            $('#exampleModalCenter').modal('show');

            $('#exampleModalCenter .btn-secondary, #exampleModalCenter a[data-dismiss="modal"]').on('click', function () {
                $('#exampleModalCenter').modal('hide');
            });
        });
    });

    $('#myTablee tbody tr').on('click', function () {
        // Remove the 'ssss' class from all rows
        $('#myTablee tbody tr').removeClass('ssss');

        // Add the 'ssss' class to the clicked row
        $(this).addClass('ssss');
    });
</script>

<!-- ... (bagian lain dari kode HTML Anda) ... -->
@endsection