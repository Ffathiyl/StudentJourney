<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Masukkan Pin</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link href="{{ asset('asssets/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('asssets/css/bootstrap-icons.css') }}" rel="stylesheet">

    <link href="{{ asset('asssets/css/templatemo-ebook-landing.css') }}" rel="stylesheet">
    <!--

TemplateMo 588 ebook landing

https://templatemo.com/tm-588-ebook-landing

-->

    <style>
        #virtual-keyboard {
            display: grid;
            grid-template-columns: repeat(3, 75px);
            gap: 5px;
        }

        #virtual-keyboard button {
            width: 100%;
            padding: 15px;
            font-size: 14px;
            margin: 5px 2px;
        }
    </style>

</head>

<body>

    <main>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <i class="navbar-brand-icon bi-book me-2"><img src="" alt=""></i>
                    <span>AstraTech</span>
                </a>

                <div class="d-lg-none ms-auto me-3">
                    <a href="{{ route('logins.logins') }}"
                        class="btn custom-btn custom-border-btn btn-naira btn-inverted">
                        <i class="btn-icon bi-arrow-left"></i>
                        <span>Kembali</span><!-- duplicated another one below for mobile -->
                    </a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="d-none d-lg-block" style="margin-left:1000px">
                        <a href="{{ route('logins.logins') }}"
                            class="btn custom-btn custom-border-btn btn-naira btn-inverted">
                            <i class="btn-icon bi-arrow-left"></i>
                            <span>Kembali</span><!-- duplicated above one for mobile -->
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
            <div class="container">
                <div class="row">

                    <div class=" col-lg-5 col-12 mb-5 pb-5 pb-lg-0 mb-lg-0">
                        <img src="{{ asset('asssets/images/Teknik Rekayasa Logistik.png') }}" class="hero-image img-fluid"
                            alt="education online books">
                    </div>

                    <div class="col-lg-6 col-12 mt-3 mt-lg-0" style="margin-top: ;">

                        <h1 class="text-white mb-4">Selamat Datang</h1>

                        <form class="me-3" action="{{ route('logins.PINS', ['nim' => $mahasiswa->NIM]) }}" method="POST"
                            onsubmit="return validateForm()">
                            @csrf
                            <div class="col-12">
                                <input type="text" class="form-control" id="nim" name="nim"
                                    value="{{ $mahasiswa->NIM }}" hidden>
                            </div>
                            <div class="col-5">
                                <h6>{{ $mahasiswa->Nama }}</h6><br>
                                <!-- <label for="PIN">{{ $mahasiswa->Nama }}</label> -->
                                @error('PIN')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="text" class="form-control" id="PIN" name="PIN" maxlength="6" readonly
                                    placeholder="Masukkan PIN Anda">
                            </div><br>
                            <div class="col-12">
                                <div id="virtual-keyboard">
                                    <!-- Tombol virtual keyboard -->
                                    <button onclick="appendToPIN(1)">1</button>
                                    <button onclick="appendToPIN(2)">2</button>
                                    <button onclick="appendToPIN(3)">3</button>
                                    <button onclick="appendToPIN(4)">4</button>
                                    <button onclick="appendToPIN(5)">5</button>
                                    <button onclick="appendToPIN(6)">6</button>
                                    <button onclick="appendToPIN(7)">7</button>
                                    <button onclick="appendToPIN(8)">8</button>
                                    <button onclick="appendToPIN(9)">9</button>
                                    <button onclick="appendToPIN(0)">0</button>
                                    <button onclick="backspacePIN()"><-</button>
                                            <!-- ... tambahkan tombol lainnya sesuai kebutuhan -->
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <br>
                                <!-- <button type="submit" class="btn btn-primary">Masuk</button> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>


        <section class="featured-section">
            <div class="container">
                <div class="row">
                    <br><br>
                </div>
            </div>
        </section>
    </main>

    <!-- JAVASCRIPT FILES -->
    <script src="{{ asset('asssets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('asssets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asssets/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('asssets/js/click-scroll.js') }}"></script>
    <script src="{{ asset('asssets/js/custom.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        window.onload = function () {
            // Ganti 'RFID' dengan ID dari elemen input yang ingin menjadi fokus
            document.getElementById('RFID').focus();
        }
    </script>

    @if (Session::has('error'))
    <script>
        console.log('Error');
        Swal.fire({
            title: 'Pesan',
            text: '{{ Session::get('error') }}',
            icon: 'error', // Tambah koma di sini
        }).then(() => {
            document.getElementById('RFID').focus(); // ID input RFID di sini
        });
    </script>
    @endif

    @if (Session::has('successLogout'))
    <script>
        sole.log('success');
        Swal.fire({
            title: 'Pesan',
            text: '{{ Session::get('successLogout') }}',
            icon: 'success'
        });
    </script>
    @endif

    <script>
        function validateForm() {
            // Perform validation if needed
            // If validation fails, return false to prevent form submission
            // If validation passes, return true to allow form submission
            var pinInput = document.getElementById('PIN');
            if(pinInput.value.length < 6){
                return false;
            } else {
                return true;
            }
            
        }

        function appendToPIN(number) {
            var pinInput = document.getElementById('PIN');
            if (pinInput.value.length < 6) {
                pinInput.value += number;
            }
        }

        // Fungsi untuk menghapus karakter terakhir pada input PIN
        function backspacePIN() {
            var pinInput = document.getElementById('PIN');
            pinInput.value = pinInput.value.slice(0, -1);
        }
    </script>

</body>

</html>