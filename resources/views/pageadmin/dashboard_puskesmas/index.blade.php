@extends('template-admin.layout')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row">
                <!-- First Column -->
                <div class="col-xl-12">
                    <div class="alert alert-info border-0 bg-info alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-dark"><i class='bx bx-info-square'></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0 text-dark">GRAFIK DATA</h6>
                                <div class="text-dark">Ini Merupakan Akumulasi Seluruh Data Posyandu Di Lingkup Puskesmas Anda</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- First Column -->
                <div class="col-xl-6">
                    <hr/>
                    <div class="card border-top border-0 border-4 border-info">
                        <div class="card-body">
                            <div class="card-title">
                                <h5 class="mb-0 text-info">Grafik Data Bulanan Anak dan Remaja</h5>
                            </div>
                            <hr/>
                            <div id="chart-container">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Second Column -->
                <div class="col-xl-6">
                    <hr/>
                    <div class="card border-top border-0 border-4 border-info">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="card-title d-flex align-items-center">
                                    <div><i class="bx bxs-bar-chart-alt-2 me-1 font-22 text-info"></i></div>
                                    <h5 class="mb-0 text-info">Chart SKDN Balita Per Bulan</h5>
                                </div>
                                <hr/>
                                <canvas id="skdnChart"></canvas>
                               
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Third Column -->
                <div class="col-xl-6">
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
            
                <!-- Fourth Column -->
                <div class="col-xl-6">
                    <hr/>
                    <div class="card border-top border-0 border-4 border-info">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="card-title d-flex align-items-center">
                                    <div><i class="bx bxs-data me-1 font-22 text-info"></i></div>
                                    <h5 class="mb-0 text-info">Grafik Proses Tiap Bulan Ibu Hamil</h5>
                                </div>
                                <hr/>
                                <div class="chart-container">
                                    <canvas id="ibuHamilChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection

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
<script>
    var ctx = document.getElementById('skdnChart').getContext('2d');
    var skdnChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($months),
            datasets: [
                {
                    label: 'Jumlah Sasaran Balita (S)',
                    data: @json($sasaranData),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Jumlah Balita KMS/Buku KIA (K)',
                    data: @json($kmsData),
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Jumlah Balita Datang (D)',
                    data: @json($datangData),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Jumlah Balita Naik Timbangan (N)',
                    data: @json($naikTimbanganData),
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
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
<script>
    console.log(@json($nifasMenyusuiData));
console.log(@json($bbGarisMerahData));

    var ctx = document.getElementById('ibuHamilChart').getContext('2d');
    var ibuHamilChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($months),
            datasets: [
                {
                    label: 'Jumlah Ibu Hamil Nifas/Menyusui',
                    data: @json($nifasMenyusuiData),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Jumlah Ibu Hamil BB Garis Merah',
                    data: @json($bbGarisMerahData),
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Jumlah Ibu Hamil LILA',
                    data: @json($lilaData),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Jumlah Ibu Hamil Risiko TBC',
                    data: @json($risikoTbcIbuHamilData),
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Jumlah Ibu Hamil Mendapat TTD',
                    data: @json($mendapatTtdData),
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Jumlah Ibu Hamil Makanan Tambahan KEK',
                    data: @json($makananTambahanKekData),
                    backgroundColor: 'rgba(255, 159, 64, 0.2)',
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Jumlah Ibu Hamil Ikut Kelas',
                    data: @json($ikutKelasData),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Jumlah Ibu Hamil Dirujuk ke Puskesmas',
                    data: @json($dirujukKePuskesmasData),
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection