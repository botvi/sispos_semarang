@extends('template-admin.layout')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!-- Breadcrumb -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Akun Saya</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Akun Saya</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Breadcrumb -->

        <div class="container">
            <div class="main-body">
                <div class="row justify-content-center">
                    <!-- User Information Card -->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="https://static.desty.app/desty-page/4844c9e106904b978b9a86eaad09070e.png?x-oss-process=image/resize,w_800/format,webp" alt="Admin" class="p-1 bg-white" width="210">
                                    <div class="mt-3">
                                        <h4>{{ old('nama', $user->nama) }}</h4>
                                        <p class="text-muted font-size-sm">@ {{ old('username', $user->username) }}</p>
                                        <p class="text-muted font-size-sm">{{ old('email', $user->email) }}</p>
                                    </div>
                                </div>
                                <hr class="my-4" />
                                <!-- Displaying Additional Information -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $masterDinkes->alamat) }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="telepon">Telepon</label>
                                        <input type="text" name="telepon" class="form-control" value="{{ old('telepon', $masterDinkes->telepon) }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="penanggung_jawab">Penanggung Jawab</label>
                                        <input type="text" name="penanggung_jawab" class="form-control" value="{{ old('penanggung_jawab', $masterDinkes->penanggung_jawab) }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="telepon_penanggung_jawab">Telepon Penanggung Jawab</label>
                                        <input type="text" name="telepon_penanggung_jawab" class="form-control" value="{{ old('telepon_penanggung_jawab', $masterDinkes->telepon_penanggung_jawab) }}" disabled>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Edit Profile Card -->
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('akun-dinas-kesehatan.update') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" class="form-control" value="{{ old('nama', $user->nama) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="current_password">Password Lama</label>
                                        <input type="password" name="current_password" class="form-control">
                                    </div>
                                    <div class="alert border-0 border-start border-5 mt-2 border-info alert-dismissible fade show py-2">
                                        <div class="d-flex align-items-center">
                                            <div class="font-35 text-info"><i class='bx bx-info-square'></i></div>
                                            <div class="ms-3">
                                                <h6 class="mb-0 text-info">Info</h6>
                                                <div>Isi jika ingin mengubah password saja!</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password Baru</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Konfirmasi Password Baru</label>
                                        <input type="password" name="password_confirmation" class="form-control">
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $masterDinkes->alamat) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="telepon">Telepon</label>
                                        <input type="text" name="telepon" class="form-control" value="{{ old('telepon', $masterDinkes->telepon) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="penanggung_jawab">Penanggung Jawab</label>
                                        <input type="text" name="penanggung_jawab" class="form-control" value="{{ old('penanggung_jawab', $masterDinkes->penanggung_jawab) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="telepon_penanggung_jawab">Telepon Penanggung Jawab</label>
                                        <input type="text" name="telepon_penanggung_jawab" class="form-control" value="{{ old('telepon_penanggung_jawab', $masterDinkes->telepon_penanggung_jawab) }}" required>
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
