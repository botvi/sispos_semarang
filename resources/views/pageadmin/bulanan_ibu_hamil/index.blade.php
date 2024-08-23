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
                        <li class="breadcrumb-item active" aria-current="page">Proses Tiap Bulan Ibu Hamil</li>
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
                                <h5 class="mb-0 text-info">Proses Tiap Bulan Ibu Hamil</h5>
                            </div>
                            <hr/>
                            <form action="{{ route('bulanan_ibu_hamil.store') }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label for="tanggal_pelaksanaan" class="col-sm-3 col-form-label">Tanggal Pelaksanaan</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="tanggal_pelaksanaan" name="tanggal_pelaksanaan">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="jumlah_ibu_hamil_nifas_menyusui" class="col-sm-3 col-form-label">Jumlah Ibu Hamil/Nifas/Menyusui</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="jumlah_ibu_hamil_nifas_menyusui" name="jumlah_ibu_hamil_nifas_menyusui">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="jumlah_ibu_hamil_bb_garis_merah" class="col-sm-3 col-form-label">Jumlah Ibu Hamil BB Garis Merah</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="jumlah_ibu_hamil_bb_garis_merah" name="jumlah_ibu_hamil_bb_garis_merah">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="jumlah_ibu_hamil_lila" class="col-sm-3 col-form-label">Jumlah Ibu Hamil LILA ≤ 23.5 cm</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="jumlah_ibu_hamil_lila" name="jumlah_ibu_hamil_lila">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="jumlah_ibu_hamil_risiko_tbc" class="col-sm-3 col-form-label">Jumlah Ibu Hamil Berisiko TBC</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="jumlah_ibu_hamil_risiko_tbc" name="jumlah_ibu_hamil_risiko_tbc">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="jumlah_ibu_hamil_mendapat_ttd" class="col-sm-3 col-form-label">Jumlah Ibu Hamil Mendapat TTD</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="jumlah_ibu_hamil_mendapat_ttd" name="jumlah_ibu_hamil_mendapat_ttd">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="jumlah_ibu_hamil_makanan_tambahan_kek" class="col-sm-3 col-form-label">Jumlah Ibu Hamil Makanan Tambahan KEK</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="jumlah_ibu_hamil_makanan_tambahan_kek" name="jumlah_ibu_hamil_makanan_tambahan_kek">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="jumlah_ibu_hamil_ikut_kelas" class="col-sm-3 col-form-label">Jumlah Ibu Hamil Ikut Kelas</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="jumlah_ibu_hamil_ikut_kelas" name="jumlah_ibu_hamil_ikut_kelas">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="jumlah_ibu_hamil_dirujuk_ke_puskesmas" class="col-sm-3 col-form-label">Jumlah Ibu Hamil Dirujuk ke Puskesmas</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="jumlah_ibu_hamil_dirujuk_ke_puskesmas" name="jumlah_ibu_hamil_dirujuk_ke_puskesmas">
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
       
            <div class="col-xl-6 mx-auto">
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

@section('script')
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

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
                    data: @json($risikoTbcData),
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
@endsection
