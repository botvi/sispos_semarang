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
            <div class="col-xl-6 mx-auto">
                <hr/>
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
                                    <label for="imt_kurus" class="col-sm-3 col-form-label">IMT Kurus</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="imt_kurus" name="imt_kurus">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="imt_gemuk" class="col-sm-3 col-form-label">IMT Gemuk</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="imt_gemuk" name="imt_gemuk">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="imt_obesitas" class="col-sm-3 col-form-label">IMT Obesitas</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="imt_obesitas" name="imt_obesitas">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="td_rendah" class="col-sm-3 col-form-label">TD Rendah</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="td_rendah" name="td_rendah">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="td_tinggi" class="col-sm-3 col-form-label">TD Tinggi</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="td_tinggi" name="td_tinggi">
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

            <div class="col-xl-6">
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
