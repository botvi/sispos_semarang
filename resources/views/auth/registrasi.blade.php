<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('admin/assets/images/favicon-32x32.png') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('admin/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet">
    <title>Pendaftaran Posyandu - SIPOS</title>
</head>

<body class="bg-login">
    <!--wrapper-->
    <div class="wrapper">
        <div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                    <div class="col mx-auto">
                        <div class="my-4 text-center">
                            <img src="{{ asset('admin/assets/images/logo-img.png') }}" width="180" alt="" />
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center">
                                        <h3 class="">Pendaftaran</h3>
                                        <p>Sudah Memiliki Akun? <a href="">Masuk Disini</a></p>
                                    </div>
                                    <div class="form-body">
                                        <form method="POST" action="{{ route('register.store') }}" class="row g-3">
                                            @csrf
                                            <div class="col-sm-6">
                                                <label for="nama" class="form-label">Nama Posyandu</label>
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Posyandu" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" class="form-control" id="username" name="username" placeholder="Username Posyandu" required>
                                            </div>
                                            <div class="col-12">
                                                <label for="email" class="form-label">Alamat Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="example@user.com" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                            </div>
                                          
                                            <div class="col-12">
                                                <label for="kecamatan_id" class="form-label">Kecamatan</label>
                                                <select class="form-select" id="kecamatan_id" name="kecamatan_id" required>
                                                    <option selected disabled>Pilih Kecamatan</option>
                                                    @foreach ($kecamatans as $kecamatan)
                                                        <option value="{{ $kecamatan->kecamatan_id }}">{{ $kecamatan->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label for="kelurahan_id" class="form-label">Kelurahan</label>
                                                <select class="form-select" id="kelurahan_id" name="kelurahan_id" required>
                                                    <option selected disabled>Pilih Kelurahan</option>
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label for="rw" class="form-label">RW</label>
                                                <input type="text" class="form-control" id="rw" name="rw" required>
                                            </div>
                                            <div class="col-12">
                                                <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                                                <textarea class="form-control" id="alamat_lengkap" name="alamat_lengkap" rows="3" required></textarea>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" required>
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">Saya membaca dan menyetujui Syarat & Ketentuan</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class='bx bx-user'></i> Daftar
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    @include('sweetalert::alert')
    <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <!--app JS-->
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#kecamatan_id').change(function() {
                var kecamatanId = $(this).val();
                if (kecamatanId) {
                    $.ajax({
                        url: '{{ url('/kelurahan') }}/' + kecamatanId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#kelurahan_id').empty();
                            $('#kelurahan_id').append('<option selected disabled>Pilih Kelurahan</option>');
                            $.each(data, function(key, value) {
                                $('#kelurahan_id').append('<option value="' + value.kelurahan_id + '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#kelurahan_id').empty();
                    $('#kelurahan_id').append('<option selected disabled>Pilih Kelurahan</option>');
                }
            });
        });
    </script>
</body>

</html>
