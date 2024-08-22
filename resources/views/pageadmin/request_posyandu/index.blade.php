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
                        <li class="breadcrumb-item active" aria-current="page">Request Posyandu</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--breadcrumb-->
        <h6 class="mb-0 text-uppercase">Request Posyandu</h6>
        <hr/>

        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills nav-pills-primary mb-3" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="pill" href="#pending" role="tab" aria-selected="true">
                            <div class="d-flex align-items-center">
                                {{-- <div class="tab-icon"><i class='bx bx-home font-18 me-1'></i></div> --}}
                                <div class="tab-title">PENDING</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="pill" href="#diterima" role="tab" aria-selected="false">
                            <div class="d-flex align-items-center">
                                {{-- <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i></div> --}}
                                <div class="tab-title">DITERIMA</div>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="danger-pills-tabContent">
                    <!-- Pending Tab -->
                    <div class="tab-pane fade show active" id="pending" role="tabpanel">
                        <div class="table-responsive">
                            <table id="example1" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Posyandu</th>
                                        <th>RT</th>
                                        <th>RW</th>
                                        <th>Puskesmas</th>
                                        <th>Kecamatan</th>
                                        <th>Kelurahan</th>
                                        <th>Alamat Lengkap</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pendingPosyandu as $posyandu)
                                        <tr>
                                            <td>{{ $posyandu->nama }}</td>
                                            <td>{{ $posyandu->rt }}</td>
                                            <td>{{ $posyandu->rw }}</td>
                                            <td>{{ $posyandu->puskesmas->nama }}</td>
                                            <td>{{ $posyandu->kecamatan->name ?? 'N/A' }}</td>
                                            <td>{{ $posyandu->kelurahan->name ?? 'N/A' }}</td>
                                            <td>{{ $posyandu->alamat_lengkap }}</td>
                                            <td><span class="badge bg-danger">Pending</span></td>
                                            <td>
                                                <a href="{{ route('request-posyandu.edit', $posyandu->id) }}" class="btn btn-warning btn-sm">Edit Status</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Diterima Tab -->
                    <div class="tab-pane fade" id="diterima" role="tabpanel">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Posyandu</th>
                                        <th>RT</th>
                                        <th>RW</th>
                                        <th>Puskesmas</th>
                                        <th>Kecamatan</th>
                                        <th>Kelurahan</th>
                                        <th>Alamat Lengkap</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($diterimaPosyandu as $posyandu)
                                        <tr>
                                            <td>{{ $posyandu->nama }}</td>
                                            <td>{{ $posyandu->rt }}</td>
                                            <td>{{ $posyandu->rw }}</td>
                                            <td>{{ $posyandu->puskesmas->nama }}</td>
                                            <td>{{ $posyandu->kecamatan->name ?? 'N/A' }}</td>
                                            <td>{{ $posyandu->kelurahan->name ?? 'N/A' }}</td>
                                            <td>{{ $posyandu->alamat_lengkap }}</td>
                                            <td><span class="badge bg-success">Diterima</span></td>
                                            <td>
                                                <a href="{{ route('request-posyandu.edit', $posyandu->id) }}" class="btn btn-warning btn-sm">Edit Status</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
