@extends('template-admin.layout')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Forms</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Master Puskesmas</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--breadcrumb-->

        <div class="row">
            <div class="col-xl-7 mx-auto">
                <hr/>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-user me-1 font-22 text-primary"></i></div>
                            <h5 class="mb-0 text-primary">Edit Master Puskesmas</h5>
                        </div>
                        <hr>
                        <form action="{{ route('puskesmas.update', $puskesmas->id) }}" method="POST" class="row g-3">
                            @csrf
                            @method('PUT')
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Nama Puskesmas</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $puskesmas->nama) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="telepon" class="form-label">Telepon Puskesmas</label>
                                <input type="text" class="form-control" id="telepon" name="telepon" value="{{ old('telepon', $puskesmas->telepon) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="penanggung_jawab" class="form-label">Penanggung Jawab</label>
                                <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab" value="{{ old('penanggung_jawab', $puskesmas->penanggung_jawab) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="telepon_penanggung_jawab" class="form-label">Telepon Penanggung Jawab</label>
                                <input type="text" class="form-control" id="telepon_penanggung_jawab" name="telepon_penanggung_jawab" value="{{ old('telepon_penanggung_jawab', $puskesmas->telepon_penanggung_jawab) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            </div>
                            <div class="col-12">
                                <label for="alamat" class="form-label">Alamat Puskesmas</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $puskesmas->alamat) }}</textarea>
                            </div>

                            <!-- User Account Fields -->
                            <div class="col-12">
                                <hr>
                                <h6 class="text-primary">Informasi Akun Pengguna</h6>
                            </div>
                            <div class="col-md-6">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $user->username ?? '') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Kosongkan jika tidak diubah">
                            </div>
                            <div class="col-md-6">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Kosongkan jika tidak diubah">
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary px-5">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
