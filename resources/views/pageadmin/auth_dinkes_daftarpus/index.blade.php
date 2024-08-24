@extends('template-admin.layout')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!-- Breadcrumb -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Daftar Puskesmas</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:;">
                                <i class="bx bx-home-alt"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Daftar Puskesmas</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Breadcrumb -->

        <!-- Section: puskes list -->
        <h6 class="mb-0 text-uppercase">List Puskesmas Terdaftar</h6>
        <hr/>
        <div class="row row-cols-1 row-cols-lg-3">
            @foreach($puskesmas as $puskes)
                <div class="col">
                    <div class="card bg-primary">
                        <div class="card-body">
                            <h6 class="card-price text-white text-center">{{ $puskes->nama }}</h6>
                            <hr class="my-4">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-transparent text-white">
                                    <i class='bx bxs-map me-2 font-18'></i>{{ $puskes->alamat }}
                                </li>
                                <li class="list-group-item bg-transparent text-white">
                                    <i class='bx bxs-phone me-2 font-18'></i>{{ $puskes->telepon }}
                                </li>
                                <li class="list-group-item bg-transparent text-white">
                                    <i class='bx bxs-user me-2 font-18'></i>{{ $puskes->penanggung_jawab }}
                                </li>
                                <li class="list-group-item bg-transparent text-white">
                                    <i class='bx bxs-phone me-2 font-18'></i>{{ $puskes->telepon_penanggung_jawab }}
                                </li>
                            </ul>
                            <div class="d-grid">
                                <a href="{{ route('daftarposyandubypuskes.index', $puskes->id) }}" class="btn btn-white my-2 radius-30">Lihat Posyandu Terdaftar</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!--end row-->
    </div>
</div>
@endsection
