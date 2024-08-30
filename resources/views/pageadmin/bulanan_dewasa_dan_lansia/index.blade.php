@extends('template-admin.layout')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Data</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Proses Tiap Bulan Dewasa dan Lansia</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--breadcrumb-->

        <div class="row">
            <div class="col-xl-12 mx-auto">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleFullScreenModal">Tambah Data</button>

                <hr/>

                <div class="card border-top border-0 border-4 border-info">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-data me-1 font-22 text-info"></i></div>
                                <h5 class="mb-0 text-info">Grafik Proses Tiap Bulan Dewasa dan Lansia</h5>
                            </div>
                            <hr/>
                            <div class="chart-container">
                                <canvas id="dewasaDanLansiaChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleFullScreenModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card border-top border-0 border-4 border-info">
                            <div class="card-body">
                                <div class="card border-top border-0 border-4 border-info">
                                    <div class="card-body">
                                        <div class="border p-4 rounded">
                                            <div class="card-title d-flex align-items-center">
                                                <div><i class="bx bxs-data me-1 font-22 text-info"></i></div>
                                                <h5 class="mb-0 text-info">Proses Tiap Bulan Dewasa dan Lansia</h5>
                                            </div>
                                            <hr/>
                                            <form action="{{ route('bulanan_dewasa_dan_lansia.store') }}" method="POST">
                                                @csrf
                                                <div class="row mb-3">
                                                    <label for="tanggal_pelaksanaan" class="col-sm-3 col-form-label">Tanggal Pelaksanaan</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control" id="tanggal_pelaksanaan" name="tanggal_pelaksanaan">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="jumlah_usia_dewasa_risiko_ppok" class="col-sm-3 col-form-label">Jumlah Dewasa Risiko PPOK</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" id="jumlah_usia_dewasa_risiko_ppok" name="jumlah_usia_dewasa_risiko_ppok">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="jumlah_usia_dewasa_gangguan_jiwa" class="col-sm-3 col-form-label">Jumlah Dewasa Gangguan Jiwa</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" id="jumlah_usia_dewasa_gangguan_jiwa" name="jumlah_usia_dewasa_gangguan_jiwa">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="jumlah_lansia_skrining_skl" class="col-sm-3 col-form-label">Jumlah Lansia Skrining SKL</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" id="jumlah_lansia_skrining_skl" name="jumlah_lansia_skrining_skl">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="jumlah_lansia_dirujuk_puskesmas" class="col-sm-3 col-form-label">Jumlah Lansia Dirujuk ke Puskesmas</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" id="jumlah_lansia_dirujuk_puskesmas" name="jumlah_lansia_dirujuk_puskesmas">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label"></label>
                                                    <div class="col-sm-9">
                                                        <button type="submit" class="btn btn-info px-5">Save Changes</button>
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
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pelaksanaan</th>
                                <th>Jumlah Usia Dewasa Risiko PPOK</th>
                                <th>Jumlah Usia Dewasa Gangguan Jiwa</th>
                                <th>Jumlah Lansia Skrining SKL</th>
                                <th>Jumlah Lansia Dirujuk Puskesmas</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bulananDewasaDanLansias as $index => $dewasaDanLansia)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $dewasaDanLansia->tanggal_pelaksanaan }}</td>
                                <td>{{ $dewasaDanLansia->jumlah_usia_dewasa_risiko_ppok }}</td>
                                <td>{{ $dewasaDanLansia->jumlah_usia_dewasa_gangguan_jiwa }}</td>
                                <td>{{ $dewasaDanLansia->jumlah_lansia_skrining_skl }}</td>
                                <td>{{ $dewasaDanLansia->jumlah_lansia_dirujuk_puskesmas }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $dewasaDanLansia->id }}">Edit</button>
                                </td>
                            </tr>
        
                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal{{ $dewasaDanLansia->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Data Dewasa dan Lansia - {{ $dewasaDanLansia->tanggal_pelaksanaan }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('bulanandewasadanlansia.update', $dewasaDanLansia->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="card border-top border-0 border-4 border-info">
                                                    <div class="card-body">
                                                        <div class="border p-4 rounded">
                                                            <div class="card-title d-flex align-items-center">
                                                                <div><i class="bx bxs-data me-1 font-22 text-info"></i></div>
                                                                <h5 class="mb-0 text-info">Proses Tiap Bulan Dewasa dan Lansia</h5>
                                                            </div>
                                                            <hr/>
                                                            
                                                            <!-- Fields for updating -->
                                                            <div class="row mb-3">
                                                                <label for="tanggal_pelaksanaan{{ $dewasaDanLansia->id }}" class="col-sm-3 col-form-label">Tanggal Pelaksanaan</label>
                                                                <div class="col-sm-9">
                                                                    <input type="date" class="form-control" id="tanggal_pelaksanaan{{ $dewasaDanLansia->id }}" name="tanggal_pelaksanaan" value="{{ $dewasaDanLansia->tanggal_pelaksanaan }}">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="row mb-3">
                                                                <label for="jumlah_usia_dewasa_risiko_ppok{{ $dewasaDanLansia->id }}" class="col-sm-3 col-form-label">Jumlah Usia Dewasa Risiko PPOK</label>
                                                                <div class="col-sm-9">
                                                                    <input type="number" class="form-control" id="jumlah_usia_dewasa_risiko_ppok{{ $dewasaDanLansia->id }}" name="jumlah_usia_dewasa_risiko_ppok" value="{{ $dewasaDanLansia->jumlah_usia_dewasa_risiko_ppok }}">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="row mb-3">
                                                                <label for="jumlah_usia_dewasa_gangguan_jiwa{{ $dewasaDanLansia->id }}" class="col-sm-3 col-form-label">Jumlah Usia Dewasa Gangguan Jiwa</label>
                                                                <div class="col-sm-9">
                                                                    <input type="number" class="form-control" id="jumlah_usia_dewasa_gangguan_jiwa{{ $dewasaDanLansia->id }}" name="jumlah_usia_dewasa_gangguan_jiwa" value="{{ $dewasaDanLansia->jumlah_usia_dewasa_gangguan_jiwa }}">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="row mb-3">
                                                                <label for="jumlah_lansia_skrining_skl{{ $dewasaDanLansia->id }}" class="col-sm-3 col-form-label">Jumlah Lansia Skrining SKL</label>
                                                                <div class="col-sm-9">
                                                                    <input type="number" class="form-control" id="jumlah_lansia_skrining_skl{{ $dewasaDanLansia->id }}" name="jumlah_lansia_skrining_skl" value="{{ $dewasaDanLansia->jumlah_lansia_skrining_skl }}">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="row mb-3">
                                                                <label for="jumlah_lansia_dirujuk_puskesmas{{ $dewasaDanLansia->id }}" class="col-sm-3 col-form-label">Jumlah Lansia Dirujuk Puskesmas</label>
                                                                <div class="col-sm-9">
                                                                    <input type="number" class="form-control" id="jumlah_lansia_dirujuk_puskesmas{{ $dewasaDanLansia->id }}" name="jumlah_lansia_dirujuk_puskesmas" value="{{ $dewasaDanLansia->jumlah_lansia_dirujuk_puskesmas }}">
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End Edit Modal -->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</div>

@section('script')
    
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('dewasaDanLansiaChart').getContext('2d');
    var dewasaDanLansiaChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($months),
            datasets: [{
                label: 'Risiko PPOK',
                data: @json($risikoPpokData),
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderWidth: 1
            },
            {
                label: 'Gangguan Jiwa',
                data: @json($gangguanJiwaData),
                borderColor: 'rgba(54, 162, 235, 1)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderWidth: 1
            },
            {
                label: 'Skrining SKL',
                data: @json($skriningSklData),
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 1
            },
            {
                label: 'Dirujuk ke Puskesmas',
                data: @json($dirujukPuskesmasData),
                borderColor: 'rgba(153, 102, 255, 1)',
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
@endsection
