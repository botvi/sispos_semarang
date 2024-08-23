@extends('template-admin.layout')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Profil Saya</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profil Saya</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="container">
            <div class="main-body">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="{{ asset('admin/assets/images/avatars/avatar-2.png') }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                    <div class="mt-3">
                                        <h4>{{ $user->nama }}</h4>
                                        <p class="text-secondary mb-1">{{ $user->username }}</p>
                                        <p class="text-muted font-size-sm">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('profile.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    
                                    <!-- Nama Lengkap -->
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Nama Lengkap</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="nama" class="form-control" value="{{ old('nama', $user->nama) }}" required>
                                        </div>
                                    </div>

                                    <!-- Username -->
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Username</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}" required>
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                                        </div>
                                    </div>

                                    <!-- Password Saat Ini -->
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Password Saat Ini</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="password" name="current_password" class="form-control">
                                            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah password.</small>
                                        </div>
                                    </div>
                                    
                                    <!-- Password Baru -->
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Password Baru</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="password" name="password" class="form-control">
                                            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah password.</small>
                                        </div>
                                    </div>

                                    <!-- Konfirmasi Password -->
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Konfirmasi Password</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="password" name="password_confirmation" class="form-control">
                                        </div>
                                    </div>

                                    <!-- Alamat Lengkap -->
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Alamat Lengkap</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="alamat_lengkap" class="form-control" value="{{ old('alamat_lengkap', $regPosyandu->alamat_lengkap) }}" required>
                                        </div>
                                    </div>

                                    <!-- RW -->
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">RW</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="rw" class="form-control" value="{{ old('rw', $regPosyandu->rw) }}" required>
                                        </div>
                                    </div>

                                    <!-- RT -->
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">RT</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="rt" class="form-control" value="{{ old('rt', $regPosyandu->rt) }}" required>
                                        </div>
                                    </div>

                                    <!-- Puskesmas -->
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Puskesmas</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <select name="puskesmas_id" class="form-control" required>
                                                @foreach($puskesmasList as $puskesmas)
                                                    <option value="{{ $puskesmas->id }}" {{ old('puskesmas_id', $regPosyandu->puskesmas_id) == $puskesmas->id ? 'selected' : '' }}>
                                                        {{ $puskesmas->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Kecamatan -->
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Kecamatan</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <select name="kecamatan_id" class="form-control" required>
                                                @foreach($kecamatans as $kecamatan)
                                                    <option value="{{ $kecamatan->kecamatan_id }}" {{ old('kecamatan_id', $regPosyandu->kecamatan_id) == $kecamatan->kecamatan_id ? 'selected' : '' }}>
                                                        {{ $kecamatan->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Kelurahan -->
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Kelurahan</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <select name="kelurahan_id" class="form-control" required>
                                                @foreach($kelurahans as $kelurahan)
                                                    <option value="{{ $kelurahan->kelurahan_id }}" {{ old('kelurahan_id', $regPosyandu->kelurahan_id) == $kelurahan->kelurahan_id ? 'selected' : '' }}>
                                                        {{ $kelurahan->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <button type="submit" class="btn btn-primary px-4">Simpan Perubahan</button>
                                        </div>
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
