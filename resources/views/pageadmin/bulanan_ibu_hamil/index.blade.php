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
       
            <div class="col-xl-12 mx-auto">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleFullScreenModal">Tambah Data</button>

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
                                            <label for="jumlah_ibu_hamil" class="col-sm-3 col-form-label">Jumlah Ibu Hamil</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="jumlah_ibu_hamil" name="jumlah_ibu_hamil">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="jumlah_ibu_nifas" class="col-sm-3 col-form-label">Jumlah Ibu Nifas</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="jumlah_ibu_nifas" name="jumlah_ibu_nifas">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="jumlah_ibu_menyusui" class="col-sm-3 col-form-label">Jumlah Ibu Menyusui</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="jumlah_ibu_menyusui" name="jumlah_ibu_menyusui">
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
                                            <label for="jumlah_ibu_hamil_ikut_kelas" class="col-sm-3 col-form-label">Jumlah Ibu Hamil Ikut Kelas Ibu Hamil</label>
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
                </div>
            </div>
        </div>
        <div class="card">
            
            <div class="card-body">
                <a href="{{ route('export.bulanan.ibu.hamil') }}" class="btn btn-success mb-5"><i class='bx bxs-file-import'></i> Export to Excel</a>
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pelaksanaan</th>
                                <th>Jumlah Ibu Hamil</th>
                                <th>Jumlah Ibu Nifas</th>
                                <th>Jumlah Ibu Menyusui</th>
                                <th>Jumlah Ibu Hamil BB Garis Merah</th>
                                <th>Jumlah Ibu Hamil LILA</th>
                                <th>Jumlah Ibu Hamil Risiko TBC</th>
                                <th>Jumlah Ibu Hamil Mendapat TTD</th>
                                <th>Jumlah Ibu Hamil Mendapat Makanan Tambahan KEK</th>
                                <th>Jumlah Ibu Hamil Ikut Kelas Ibu Hamil</th>
                                <th>Jumlah Ibu Hamil Dirujuk ke Puskesmas</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bulananIbuHamil as $index => $ibuHamil)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $ibuHamil->tanggal_pelaksanaan }}</td>
                                <td>{{ $ibuHamil->jumlah_ibu_hamil }}</td>
                                <td>{{ $ibuHamil->jumlah_ibu_nifas }}</td>
                                <td>{{ $ibuHamil->jumlah_ibu_menyusui }}</td>
                                <td>{{ $ibuHamil->jumlah_ibu_hamil_bb_garis_merah }}</td>
                                <td>{{ $ibuHamil->jumlah_ibu_hamil_lila }}</td>
                                <td>{{ $ibuHamil->jumlah_ibu_hamil_risiko_tbc }}</td>
                                <td>{{ $ibuHamil->jumlah_ibu_hamil_mendapat_ttd }}</td>
                                <td>{{ $ibuHamil->jumlah_ibu_hamil_makanan_tambahan_kek }}</td>
                                <td>{{ $ibuHamil->jumlah_ibu_hamil_ikut_kelas }}</td>
                                <td>{{ $ibuHamil->jumlah_ibu_hamil_dirujuk_ke_puskesmas }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $ibuHamil->id }}">Edit</button>
                                </td>
                            </tr>
        
                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal{{ $ibuHamil->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Data Ibu Hamil - {{ $ibuHamil->tanggal_pelaksanaan }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="card border-top border-0 border-4 border-info">
                                            <div class="card-body">
                                                <div class="border p-4 rounded">
                                                    <div class="card-title d-flex align-items-center">
                                                        <div><i class="bx bxs-data me-1 font-22 text-info"></i></div>
                                                        <h5 class="mb-0 text-info">Proses Tiap Bulan Ibu Hamil</h5>
                                                    </div>
                                                    <hr/>
                                        
                                                    <form action="{{ route('bulananibuhamil.update', $ibuHamil->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                        
                                                        <div class="row mb-3">
                                                            <label for="tanggal_pelaksanaan_{{ $ibuHamil->id }}" class="col-sm-3 col-form-label">Tanggal Pelaksanaan</label>
                                                            <div class="col-sm-9">
                                                                <input type="date" class="form-control" id="tanggal_pelaksanaan_{{ $ibuHamil->id }}" name="tanggal_pelaksanaan" value="{{ $ibuHamil->tanggal_pelaksanaan }}">
                                                            </div>
                                                        </div>
                                        
                                                        <div class="row mb-3">
                                                            <label for="jumlah_ibu_hamil_{{ $ibuHamil->id }}" class="col-sm-3 col-form-label">Jumlah Ibu Hamil</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" id="jumlah_ibu_hamil_{{ $ibuHamil->id }}" name="jumlah_ibu_hamil" value="{{ $ibuHamil->jumlah_ibu_hamil }}">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="jumlah_ibu_nifas_{{ $ibuHamil->id }}" class="col-sm-3 col-form-label">Jumlah Ibu Nifas</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" id="jumlah_ibu_nifas_{{ $ibuHamil->id }}" name="jumlah_ibu_nifas" value="{{ $ibuHamil->jumlah_ibu_nifas }}">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="jumlah_ibu_menyusui_{{ $ibuHamil->id }}" class="col-sm-3 col-form-label">Jumlah Ibu Menyusui</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" id="jumlah_ibu_menyusui_{{ $ibuHamil->id }}" name="jumlah_ibu_menyusui" value="{{ $ibuHamil->jumlah_ibu_menyusui }}">
                                                            </div>
                                                        </div>
                                        
                                                        <div class="row mb-3">
                                                            <label for="jumlah_ibu_hamil_bb_garis_merah_{{ $ibuHamil->id }}" class="col-sm-3 col-form-label">Jumlah Ibu Hamil BB Garis Merah</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" id="jumlah_ibu_hamil_bb_garis_merah_{{ $ibuHamil->id }}" name="jumlah_ibu_hamil_bb_garis_merah" value="{{ $ibuHamil->jumlah_ibu_hamil_bb_garis_merah }}">
                                                            </div>
                                                        </div>
                                        
                                                        <div class="row mb-3">
                                                            <label for="jumlah_ibu_hamil_lila_{{ $ibuHamil->id }}" class="col-sm-3 col-form-label">Jumlah Ibu Hamil LILA</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" id="jumlah_ibu_hamil_lila_{{ $ibuHamil->id }}" name="jumlah_ibu_hamil_lila" value="{{ $ibuHamil->jumlah_ibu_hamil_lila }}">
                                                            </div>
                                                        </div>
                                        
                                                        <div class="row mb-3">
                                                            <label for="jumlah_ibu_hamil_risiko_tbc_{{ $ibuHamil->id }}" class="col-sm-3 col-form-label">Jumlah Ibu Hamil Risiko TBC</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" id="jumlah_ibu_hamil_risiko_tbc_{{ $ibuHamil->id }}" name="jumlah_ibu_hamil_risiko_tbc" value="{{ $ibuHamil->jumlah_ibu_hamil_risiko_tbc }}">
                                                            </div>
                                                        </div>
                                        
                                                        <div class="row mb-3">
                                                            <label for="jumlah_ibu_hamil_mendapat_ttd_{{ $ibuHamil->id }}" class="col-sm-3 col-form-label">Jumlah Ibu Hamil Mendapat TTD</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" id="jumlah_ibu_hamil_mendapat_ttd_{{ $ibuHamil->id }}" name="jumlah_ibu_hamil_mendapat_ttd" value="{{ $ibuHamil->jumlah_ibu_hamil_mendapat_ttd }}">
                                                            </div>
                                                        </div>
                                        
                                                        <div class="row mb-3">
                                                            <label for="jumlah_ibu_hamil_makanan_tambahan_kek_{{ $ibuHamil->id }}" class="col-sm-3 col-form-label">Jumlah Ibu Hamil Mendapat Makanan Tambahan KEK</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" id="jumlah_ibu_hamil_makanan_tambahan_kek_{{ $ibuHamil->id }}" name="jumlah_ibu_hamil_makanan_tambahan_kek" value="{{ $ibuHamil->jumlah_ibu_hamil_makanan_tambahan_kek }}">
                                                            </div>
                                                        </div>
                                        
                                                        <div class="row mb-3">
                                                            <label for="jumlah_ibu_hamil_ikut_kelas_{{ $ibuHamil->id }}" class="col-sm-3 col-form-label">Jumlah Ibu Hamil Ikut Kelas Ibu Hamil</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" id="jumlah_ibu_hamil_ikut_kelas_{{ $ibuHamil->id }}" name="jumlah_ibu_hamil_ikut_kelas" value="{{ $ibuHamil->jumlah_ibu_hamil_ikut_kelas }}">
                                                            </div>
                                                        </div>
                                        
                                                        <div class="row mb-3">
                                                            <label for="jumlah_ibu_hamil_dirujuk_ke_puskesmas_{{ $ibuHamil->id }}" class="col-sm-3 col-form-label">Jumlah Ibu Hamil Dirujuk ke Puskesmas</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" id="jumlah_ibu_hamil_dirujuk_ke_puskesmas_{{ $ibuHamil->id }}" name="jumlah_ibu_hamil_dirujuk_ke_puskesmas" value="{{ $ibuHamil->jumlah_ibu_hamil_dirujuk_ke_puskesmas }}">
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
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

<script>

    var ctx = document.getElementById('ibuHamilChart').getContext('2d');
    var ibuHamilChart = new Chart(ctx, {
        type: 'bar',
        data: {
    labels: @json($months),
    datasets: [
        {
            label: 'Jumlah Ibu Hamil',
            data: @json($hamilData),
            backgroundColor: '#36A2EB',
            borderColor: '#36A2EB',
            borderWidth: 1
        },
        {
            label: 'Jumlah Ibu Nifas',
            data: @json($nifasData),
            backgroundColor: '#36A2EB',
            borderColor: '#36A2EB',
            borderWidth: 1
        },
        {
            label: 'Jumlah Ibu Menyusui',
            data: @json($menyusuiData),
            backgroundColor: '#36A2EB',
            borderColor: '#36A2EB',
            borderWidth: 1
        },
        {
            label: 'Jumlah Ibu Hamil BB Garis Merah',
            data: @json($bbGarisMerahData),
            backgroundColor: '#FF6384',
            borderColor: '#FF6384',
            borderWidth: 1
        },
        {
            label: 'Jumlah Ibu Hamil LILA',
            data: @json($lilaData),
            backgroundColor: '#4BC0C0',
            borderColor: '#4BC0C0',
            borderWidth: 1
        },
        {
            label: 'Jumlah Ibu Hamil Risiko TBC',
            data: @json($risikoTbcData),
            backgroundColor: '#FFCE56',
            borderColor: '#FFCE56',
            borderWidth: 1
        },
        {
            label: 'Jumlah Ibu Hamil Mendapat TTD',
            data: @json($mendapatTtdData),
            backgroundColor: '#9966FF',
            borderColor: '#9966FF',
            borderWidth: 1
        },
        {
            label: 'Jumlah Ibu Hamil Makanan Tambahan KEK',
            data: @json($makananTambahanKekData),
            backgroundColor: '#FF9F40',
            borderColor: '#FF9F40',
            borderWidth: 1
        },
        {
            label: 'Jumlah Ibu Hamil Ikut Kelas',
            data: @json($ikutKelasData),
            backgroundColor: '#36A2EB',
            borderColor: '#36A2EB',
            borderWidth: 1
        },
        {
            label: 'Jumlah Ibu Hamil Dirujuk ke Puskesmas',
            data: @json($dirujukKePuskesmasData),
            backgroundColor: '#FFCE56',
            borderColor: '#FFCE56',
            borderWidth: 1
        }
    ]
}
,
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
