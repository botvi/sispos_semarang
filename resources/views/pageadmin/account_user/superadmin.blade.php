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
                                    <img src="data:image/png;base64,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" alt="Admin" class="rounded-circle p-1 bg-white" width="210">
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
                            </div>
                        </div>
                    </div>
                    
                    <!-- Edit Profile Card -->
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('akun-superadmin.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')
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
                                            <div class="font-35 text-info"><i class="bx bxs-bell"></i></div>
                                            <div class="ms-3">
                                                <div class="text-muted">Kosongkan jika tidak ingin mengubah password.</div>
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
                                    
                                    <div class="mt-3 text-center">
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
