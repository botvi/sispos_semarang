@extends('template-admin.layout')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
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
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row justify-content-center">
                    <!-- User Information Card -->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="https://www.linggapura.desa.id/wp-content/uploads/2024/04/Posyandu.png" alt="Admin" class="rounded-circle p-1 bg-white" width="310">
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
                                        <label for="rw">RW</label>
                                        <input type="text" name="rw" class="form-control" value="{{ old('rw', $regPosyandu->rw) }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="rt">RT</label>
                                        <input type="text" name="rt" class="form-control" value="{{ old('rt', $regPosyandu->rt) }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="puskesmas_id">Puskesmas</label>
                                        <input type="text" name="puskesmas_id" class="form-control" value="{{ old('puskesmas_id', $regPosyandu->puskesmas->nama) }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="kecamatan_id">Kecamatan</label>
                                        <input type="text" name="kecamatan_id" class="form-control" value="{{ old('kecamatan_id', $kecamatan->name) }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="kelurahan_id">Kelurahan</label>
                                        <input type="text" name="kelurahan_id" class="form-control" value="{{ old('kelurahan_id', $kelurahan->name) }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat_lengkap">Alamat Lengkap</label>
                                        <textarea name="alamat_lengkap" class="form-control" rows="3" disabled>{{ old('alamat_lengkap', $regPosyandu->alamat_lengkap) }}</textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Edit Profile Card -->
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('akun-posyandu.update') }}" method="POST">
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
                                            <div class="font-35 text-info"><i class='bx bx-info-square'></i>
                                            </div>
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
