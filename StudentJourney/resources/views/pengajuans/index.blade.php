@extends('layouts.app')

@section('title','Menu pengajuan')

@section('contents')
<title>{{ $title ?? 'Pengajuan' }}</title>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Pengajuan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Dashboard.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Pengajuan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Permintaan Pengajuan
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
                                    <th scope="col">Deskripsi Kegiatan</th>
                                    <th scope="col">Total Jam</th>
                                    <th scope="col">Terima</th>
                                    <th scope="col">Tolak</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1;
                                @endphp

                                @forelse($pengajuans as $pengajuan)
                                <tr data-pengajuan-id="{{ $pengajuan->id }}">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $pengajuan->mahasiswa->NIM }}</td>
                                    <td>{{ $pengajuan->mahasiswa->Nama }}</td>
                                    <td>{{ $pengajuan->kegiatan->Deskripsi }}</td>
                                    <td>{{ $pengajuan->mahasiswa->Jam_Plus - $pengajuan->mahasiswa->Jam_Minus }}</td>
                                    <td>
                                        @if($pengajuan->status != 'Pengajuan Diterima')
                                        <a href="{{ route('pengajuans.edit', ['id' => $pengajuan->id]) }}"
                                            class="btn btn-primary "><i class="ri-edit-box-line"></i>
                                        </a>
                                        @endif
                                    </td>
                                    <td>
                                        @if($pengajuan->status != 'Pengajuan Diterima')
                                        <!-- <a class="btn btm-sm btn-danger delete-btn" data-id="{{ $pengajuan->id }}"><i
                                                class="bi bi-trash"></i></a> -->
                                        <form id="delete-row-{{ $pengajuan->id }}"
                                            action="{{ route('pengajuans.tolak', ['id' => $pengajuan->id]) }}"
                                            method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            @csrf
                                        </form>
                                        <a href="#" class="btn btn-danger edit"><i class="ri-edit-box-line"></i></a>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td>
                                        Tidak Ada Pengajuan
                                    </td>
                                    <td>
                                    <td>
                                    <td>
                                    <td>
                                    <td></td>
                                    </td>
                                    </td>
                                    </td>
                                    </td>
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
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Penolakan Pengajuan</h5>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="post" action="{{ route('pengajuans.tolak') }}">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="pend">Pend:</label><br>
                            <input type="text" class="form-control" id="pend" name="pend" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nim">NIM:</label><br>
                            <input type="text" class="form-control" id="nim" name="nim" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama" readonly>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Kegiatan:</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" readonly>
                        </div>
                        <div class="form-group">
                            <label for="totalJam">Total Jam:</label>
                            <input type="text" class="form-control" id="totalJam" name="totalJam" readonly>
                        </div>
                        <div class="form-group">
                            <label for="Deskripsi_Penolakan">Deskripsi Penolakan:</label>
                            <textarea class="form-control" id="Deskripsi_Penolakan"
                                name="Deskripsi_Penolakan"></textarea>
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
</main><!-- End #main -->



<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Use jQuery to handle modal display and data population
    $(document).ready(function () {
        var table = $('#myTablee').DataTable();

        // Triggered when the modal is about to be shown
        table.on('click', '.edit', function () {

            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent');
            }

            var ssssRow = $('#myTablee tbody tr.ssss');
            var pengajuanId = ssssRow.data('pengajuan-id');
            console.log(pengajuanId);

            var data = table.row($tr).data();
            console.log(data);

            $('#nim').val(data[1]); // Assuming NIM is in the second column
            $('#nama').val(data[2]); // Assuming Nama is in the third column
            $('#deskripsi').val(data[3]); // Assuming Deskripsi is in the fourth column
            $('#totalJam').val(data[4]); // Assuming Total Jam is in the fifth column 
            $('#pend').val(pengajuanId);

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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteLinks = document.querySelectorAll('a.delete-btn');

        deleteLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const mahasiswaId = this.getAttribute('data-id');

                Swal.fire({
                    title: 'Menerima Pengajuan?',
                    text: 'Menerima Pengajuan Jam PLus Mahasiswa!',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#43434',
                    cancelButtonColor: '#d33',
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


<script>
    $(document).ready(function () {
        $('#myTablee').DataTable();
    });
</script>

<!-- ... (bagian lain dari kode HTML Anda) ... -->
@endsection