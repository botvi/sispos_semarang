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
                        <li class="breadcrumb-item active" aria-current="page">Proses Tiap Bulan Anak dan Remaja</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--breadcrumb-->

        <div class="row">
            <div class="col-xl-12">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleFullScreenModal">Tambah Data</button>

                <hr/>

                <div class="card border-top border-0 border-4 border-info">
                    <div class="card-body">
                        <div class="card-title">
                            <h5 class="mb-0 text-info">Grafik Data Bulanan</h5>
                        </div>
                        <hr/>
                        <div id="chart-container">
                            <canvas id="myChart"></canvas>
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
                                <div class="border p-4 rounded">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="bx bxs-data me-1 font-22 text-info"></i></div>
                                        <h5 class="mb-0 text-info">Proses Tiap Bulan Anak dan Remaja</h5>
                                    </div>
                                    <hr/>
                                    <form action="{{ route('bulanan_anak_dan_remaja.store') }}" method="POST">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="tanggal_pelaksanaan" class="col-sm-3 col-form-label">Tanggal Pelaksanaan</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" id="tanggal_pelaksanaan" name="tanggal_pelaksanaan">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="kunjungan_anak_remaja" class="col-sm-3 col-form-label">Kunjungan Anak & Remaja</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="kunjungan_anak_remaja" name="kunjungan_anak_remaja">
                                            </div>
                                        </div>
                                        <!-- Add additional fields here -->
                                        <div class="row mb-3">
                                            <label for="imt_kurus" class="col-sm-3 col-form-label">Index Massa Tubuh Kurus</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="imt_kurus" name="imt_kurus">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="imt_gemuk" class="col-sm-3 col-form-label">Index Massa Tubuh Gemuk</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="imt_gemuk" name="imt_gemuk">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="imt_obesitas" class="col-sm-3 col-form-label">Index Massa Tubuh Obesitas</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="imt_obesitas" name="imt_obesitas">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="imt_normal" class="col-sm-3 col-form-label">Index Massa Tubuh Normal</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="imt_normal" name="imt_normal">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="td_rendah" class="col-sm-3 col-form-label">Tekanan Darah Rendah</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="td_rendah" name="td_rendah">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="td_tinggi" class="col-sm-3 col-form-label">Tekanan Darah Tinggi</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="td_tinggi" name="td_tinggi">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="td_normal" class="col-sm-3 col-form-label">Tekanan Darah Normal</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="td_normal" name="td_normal">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="gula_darah_rendah" class="col-sm-3 col-form-label">Gula Darah Rendah</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="gula_darah_rendah" name="gula_darah_rendah">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="gula_darah_tinggi" class="col-sm-3 col-form-label">Gula Darah Tinggi</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="gula_darah_tinggi" name="gula_darah_tinggi">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="remaja_putri_anemia" class="col-sm-3 col-form-label">Remaja Putri Anemia</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="remaja_putri_anemia" name="remaja_putri_anemia">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="tidak_anemia" class="col-sm-3 col-form-label">Tidak Anemia</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="tidak_anemia" name="tidak_anemia">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="risiko_tbc" class="col-sm-3 col-form-label">Risiko TBC</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="risiko_tbc" name="risiko_tbc">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="masalah_kesehatan" class="col-sm-3 col-form-label">Masalah Kesehatan</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="masalah_kesehatan" name="masalah_kesehatan">
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
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pelaksanaan</th>
                                <th>Kunjungan Anak Remaja</th>
                                <th>IMT Kurus</th>
                                <th>IMT Gemuk</th>
                                <th>IMT Obesitas</th>
                                <th>IMT Normal</th>
                                <th>TD Rendah</th>
                                <th>TD Tinggi</th>
                                <th>TD Normal</th>
                                <th>Gula Darah Rendah</th>
                                <th>Gula Darah Tinggi</th>
                                <th>Remaja Putri Anemia</th>
                                <th>Tidak Anemia</th>
                                <th>Risiko TBC</th>
                                <th>Masalah Kesehatan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bulananAnakDanRemajas as $index => $anakDanRemaja)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $anakDanRemaja->tanggal_pelaksanaan }}</td>
                                <td>{{ $anakDanRemaja->kunjungan_anak_remaja }}</td>
                                <td>{{ $anakDanRemaja->imt_kurus }}</td>
                                <td>{{ $anakDanRemaja->imt_gemuk }}</td>
                                <td>{{ $anakDanRemaja->imt_obesitas }}</td>
                                <td>{{ $anakDanRemaja->imt_normal }}</td>
                                <td>{{ $anakDanRemaja->td_rendah }}</td>
                                <td>{{ $anakDanRemaja->td_tinggi }}</td>
                                <td>{{ $anakDanRemaja->td_normal }}</td>
                                <td>{{ $anakDanRemaja->gula_darah_rendah }}</td>
                                <td>{{ $anakDanRemaja->gula_darah_tinggi }}</td>
                                <td>{{ $anakDanRemaja->remaja_putri_anemia }}</td>
                                <td>{{ $anakDanRemaja->tidak_anemia }}</td>
                                <td>{{ $anakDanRemaja->risiko_tbc }}</td>
                                <td>{{ $anakDanRemaja->masalah_kesehatan }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $anakDanRemaja->id }}">Edit</button>
                                </td>
                            </tr>
        
                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal{{ $anakDanRemaja->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Data Anak dan Remaja - {{ $anakDanRemaja->tanggal_pelaksanaan }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('bulanananakdanremaja.update', $anakDanRemaja->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="card border-top border-0 border-4 border-info">
                                                    <div class="card-body">
                                                        <div class="border p-4 rounded">
                                                            <div class="card-title d-flex align-items-center">
                                                                <div><i class="bx bxs-data me-1 font-22 text-info"></i></div>
                                                                <h5 class="mb-0 text-info">Proses Tiap Bulan Anak dan Remaja</h5>
                                                            </div>
                                                            <hr/>
                                                            
                                                            <!-- Tanggal Pelaksanaan -->
                                                            <div class="row mb-3">
                                                                <label for="tanggal_pelaksanaan{{ $anakDanRemaja->id }}" class="col-sm-3 col-form-label">Tanggal Pelaksanaan</label>
                                                                <div class="col-sm-9">
                                                                    <input type="date" class="form-control" id="tanggal_pelaksanaan{{ $anakDanRemaja->id }}" name="tanggal_pelaksanaan" value="{{ $anakDanRemaja->tanggal_pelaksanaan }}">
                                                                </div>
                                                            </div>
                                        
                                                            <!-- Kunjungan Anak Remaja -->
                                                            <div class="row mb-3">
                                                                <label for="kunjungan_anak_remaja{{ $anakDanRemaja->id }}" class="col-sm-3 col-form-label">Kunjungan Anak Remaja</label>
                                                                <div class="col-sm-9">
                                                                    <input type="number" class="form-control" id="kunjungan_anak_remaja{{ $anakDanRemaja->id }}" name="kunjungan_anak_remaja" value="{{ $anakDanRemaja->kunjungan_anak_remaja }}">
                                                                </div>
                                                            </div>
                                        
                                                            <!-- IMT Kurus -->
                                                            <div class="row mb-3">
                                                                <label for="imt_kurus{{ $anakDanRemaja->id }}" class="col-sm-3 col-form-label">IMT Kurus</label>
                                                                <div class="col-sm-9">
                                                                    <input type="number" class="form-control" id="imt_kurus{{ $anakDanRemaja->id }}" name="imt_kurus" value="{{ $anakDanRemaja->imt_kurus }}">
                                                                </div>
                                                            </div>
                                        
                                                            <!-- IMT Gemuk -->
                                                            <div class="row mb-3">
                                                                <label for="imt_gemuk{{ $anakDanRemaja->id }}" class="col-sm-3 col-form-label">IMT Gemuk</label>
                                                                <div class="col-sm-9">
                                                                    <input type="number" class="form-control" id="imt_gemuk{{ $anakDanRemaja->id }}" name="imt_gemuk" value="{{ $anakDanRemaja->imt_gemuk }}">
                                                                </div>
                                                            </div>
                                        
                                                            <!-- IMT Obesitas -->
                                                            <div class="row mb-3">
                                                                <label for="imt_obesitas{{ $anakDanRemaja->id }}" class="col-sm-3 col-form-label">IMT Obesitas</label>
                                                                <div class="col-sm-9">
                                                                    <input type="number" class="form-control" id="imt_obesitas{{ $anakDanRemaja->id }}" name="imt_obesitas" value="{{ $anakDanRemaja->imt_obesitas }}">
                                                                </div>
                                                            </div>
                                        
                                                            <!-- IMT Normal -->
                                                            <div class="row mb-3">
                                                                <label for="imt_normal{{ $anakDanRemaja->id }}" class="col-sm-3 col-form-label">IMT Normal</label>
                                                                <div class="col-sm-9">
                                                                    <input type="number" class="form-control" id="imt_normal{{ $anakDanRemaja->id }}" name="imt_normal" value="{{ $anakDanRemaja->imt_normal }}">
                                                                </div>
                                                            </div>
                                        
                                                            <!-- TD Rendah -->
                                                            <div class="row mb-3">
                                                                <label for="td_rendah{{ $anakDanRemaja->id }}" class="col-sm-3 col-form-label">TD Rendah</label>
                                                                <div class="col-sm-9">
                                                                    <input type="number" class="form-control" id="td_rendah{{ $anakDanRemaja->id }}" name="td_rendah" value="{{ $anakDanRemaja->td_rendah }}">
                                                                </div>
                                                            </div>
                                        
                                                            <!-- TD Tinggi -->
                                                            <div class="row mb-3">
                                                                <label for="td_tinggi{{ $anakDanRemaja->id }}" class="col-sm-3 col-form-label">TD Tinggi</label>
                                                                <div class="col-sm-9">
                                                                    <input type="number" class="form-control" id="td_tinggi{{ $anakDanRemaja->id }}" name="td_tinggi" value="{{ $anakDanRemaja->td_tinggi }}">
                                                                </div>
                                                            </div>
                                        
                                                            <!-- TD Normal -->
                                                            <div class="row mb-3">
                                                                <label for="td_normal{{ $anakDanRemaja->id }}" class="col-sm-3 col-form-label">TD Normal</label>
                                                                <div class="col-sm-9">
                                                                    <input type="number" class="form-control" id="td_normal{{ $anakDanRemaja->id }}" name="td_normal" value="{{ $anakDanRemaja->td_normal }}">
                                                                </div>
                                                            </div>
                                        
                                                            <!-- Gula Darah Rendah -->
                                                            <div class="row mb-3">
                                                                <label for="gula_darah_rendah{{ $anakDanRemaja->id }}" class="col-sm-3 col-form-label">Gula Darah Rendah</label>
                                                                <div class="col-sm-9">
                                                                    <input type="number" class="form-control" id="gula_darah_rendah{{ $anakDanRemaja->id }}" name="gula_darah_rendah" value="{{ $anakDanRemaja->gula_darah_rendah }}">
                                                                </div>
                                                            </div>
                                        
                                                            <!-- Gula Darah Tinggi -->
                                                            <div class="row mb-3">
                                                                <label for="gula_darah_tinggi{{ $anakDanRemaja->id }}" class="col-sm-3 col-form-label">Gula Darah Tinggi</label>
                                                                <div class="col-sm-9">
                                                                    <input type="number" class="form-control" id="gula_darah_tinggi{{ $anakDanRemaja->id }}" name="gula_darah_tinggi" value="{{ $anakDanRemaja->gula_darah_tinggi }}">
                                                                </div>
                                                            </div>
                                        
                                                            <!-- Remaja Putri Anemia -->
                                                            <div class="row mb-3">
                                                                <label for="remaja_putri_anemia{{ $anakDanRemaja->id }}" class="col-sm-3 col-form-label">Remaja Putri Anemia</label>
                                                                <div class="col-sm-9">
                                                                    <input type="number" class="form-control" id="remaja_putri_anemia{{ $anakDanRemaja->id }}" name="remaja_putri_anemia" value="{{ $anakDanRemaja->remaja_putri_anemia }}">
                                                                </div>
                                                            </div>
                                        
                                                            <!-- Tidak Anemia -->
                                                            <div class="row mb-3">
                                                                <label for="tidak_anemia{{ $anakDanRemaja->id }}" class="col-sm-3 col-form-label">Tidak Anemia</label>
                                                                <div class="col-sm-9">
                                                                    <input type="number" class="form-control" id="tidak_anemia{{ $anakDanRemaja->id }}" name="tidak_anemia" value="{{ $anakDanRemaja->tidak_anemia }}">
                                                                </div>
                                                            </div>
                                        
                                                            <!-- Risiko TBC -->
                                                            <div class="row mb-3">
                                                                <label for="risiko_tbc{{ $anakDanRemaja->id }}" class="col-sm-3 col-form-label">Risiko TBC</label>
                                                                <div class="col-sm-9">
                                                                    <input type="number" class="form-control" id="risiko_tbc{{ $anakDanRemaja->id }}" name="risiko_tbc" value="{{ $anakDanRemaja->risiko_tbc }}">
                                                                </div>
                                                            </div>
                                        
                                                            <!-- Masalah Kesehatan -->
                                                            <div class="row mb-3">
                                                                <label for="masalah_kesehatan{{ $anakDanRemaja->id }}" class="col-sm-3 col-form-label">Masalah Kesehatan</label>
                                                                <div class="col-sm-9">
                                                                    <textarea class="form-control" id="masalah_kesehatan{{ $anakDanRemaja->id }}" name="masalah_kesehatan">{{ $anakDanRemaja->masalah_kesehatan }}</textarea>
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
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($months),
            datasets: [
                {
                    label: 'Kunjungan Anak & Remaja',
                    data: @json($kunjunganAnakRemajaData),
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 1
                },
                {
                    label: 'IMT Kurus',
                    data: @json($imtKurusData),
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderWidth: 1
                },
                {
                    label: 'IMT Gemuk',
                    data: @json($imtGemukData),
                    borderColor: 'rgba(255, 159, 64, 1)',
                    backgroundColor: 'rgba(255, 159, 64, 0.2)',
                    borderWidth: 1
                },
                {
                    label: 'IMT Obesitas',
                    data: @json($imtObesitasData),
                    borderColor: 'rgba(255, 205, 86, 1)',
                    backgroundColor: 'rgba(255, 205, 86, 0.2)',
                    borderWidth: 1
                },
                {
                    label: 'IMT Normal',
                    data: @json($imtNormalData),
                    borderColor: 'rgba(255, 205, 86, 1)',
                    backgroundColor: 'rgba(255, 205, 86, 0.2)',
                    borderWidth: 1
                },
                {
                    label: 'TD Rendah',
                    data: @json($tdRendahData),
                    borderColor: 'rgba(153, 102, 255, 1)',
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderWidth: 1
                },
                {
                    label: 'TD Tinggi',
                    data: @json($tdTinggiData),
                    borderColor: 'rgba(255, 159, 64, 1)',
                    backgroundColor: 'rgba(255, 159, 64, 0.2)',
                    borderWidth: 1
                },
                {
                    label: 'TD Normal',
                    data: @json($tdNormalData),
                    borderColor: 'rgba(255, 159, 64, 1)',
                    backgroundColor: 'rgba(255, 159, 64, 0.2)',
                    borderWidth: 1
                },
                {
                    label: 'Gula Darah Rendah',
                    data: @json($gulaDarahRendahData),
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderWidth: 1
                },
                {
                    label: 'Gula Darah Tinggi',
                    data: @json($gulaDarahTinggiData),
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderWidth: 1
                },
                {
                    label: 'Remaja Putri Anemia',
                    data: @json($remajaPutriAnemiaData),
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 1
                },
                {
                    label: 'Tidak Anemia',
                    data: @json($tidakAnemiaData),
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 1
                },
                {
                    label: 'Risiko TBC',
                    data: @json($risikoTbcData),
                    borderColor: 'rgba(153, 102, 255, 1)',
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderWidth: 1
                },
                {
                    label: 'Masalah Kesehatan',
                    data: @json($masalahKesehatanData),
                    borderColor: 'rgba(255, 159, 64, 1)',
                    backgroundColor: 'rgba(255, 159, 64, 0.2)',
                    borderWidth: 1
                }
            ]
        },
        options: {
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
