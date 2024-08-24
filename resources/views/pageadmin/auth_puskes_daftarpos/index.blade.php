@extends('template-admin.layout')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!-- Breadcrumb -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Daftar Posyandu</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:;">
                                <i class="bx bx-home-alt"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Daftar Posyandu</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Breadcrumb -->

        <!-- Section: Posyandu list -->
        <div class="pricing-table">
            <h6 class="mb-0 text-uppercase">List Posyandu Terdaftar</h6>
            <hr />
            <div class="row row-cols-1 row-cols-lg-3">
                @forelse($posyandus as $posyandu)
                    <div class="col mb-4">
                        <div class="card d-flex flex-column h-100">
                            <div class="card-header bg-warning py-3">
                                <h6 class="card-price text-center">{{ $posyandu->nama }}</h6>
                            </div>
                            <div class="card-body flex-grow-1 d-flex flex-column">
                                <ul class="list-group list-group-flush mb-auto">
                                    <li class="list-group-item"><i class='bx bxs-right-arrow me-2 font-18'></i>RT: {{ $posyandu->rt }}</li>
                                    <li class="list-group-item"><i class='bx bxs-right-arrow me-2 font-18'></i>RW: {{ $posyandu->rw }}</li>
                                    <li class="list-group-item"><i class='bx bxs-right-arrow me-2 font-18'></i>Puskesmas: {{ $posyandu->puskesmas->nama }}</li>
                                    <li class="list-group-item"><i class='bx bxs-right-arrow me-2 font-18'></i>Kecamatan: {{ $posyandu->kecamatan->name }}</li>
                                    <li class="list-group-item"><i class='bx bxs-right-arrow me-2 font-18'></i>Kelurahan: {{ $posyandu->kelurahan->name }}</li>
                                    <li class="list-group-item"><i class='bx bxs-right-arrow me-2 font-18'></i>Alamat Lengkap: {{ $posyandu->alamat_lengkap }}</li>
                                </ul>
                                <div class="d-grid">
                                    <a href="{{ route('daftarposyandu.detail', $posyandu->user_id) }}" class="btn btn-warning my-2 radius-30">Detail Posyandu</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Tidak ada Posyandu yang diterima untuk Puskesmas Anda.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
