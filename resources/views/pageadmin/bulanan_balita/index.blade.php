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
                        <li class="breadcrumb-item active" aria-current="page">Proses Tiap Bulan Balita</li>
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
                                <div><i class="bx bxs-data me-1 font-22 text-info"></i>
                                </div>
                                <h5 class="mb-0 text-info">Proses Tiap Bulan Balita</h5>
                            </div>
                            <hr/>
                            <form action="{{ route('bulanan_balita.store') }}" method="POST">
                                @csrf
                            
                                <div class="row mb-3">
                                    <label for="tanggal_pelaksanaan" class="col-sm-3 col-form-label">Tanggal Pelaksanaan</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="tanggal_pelaksanaan" name="tanggal_pelaksanaan">
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <label for="jumlah_sasaran_balita" class="col-sm-3 col-form-label">Jumlah Sasaran Balita (S)</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="jumlah_sasaran_balita" name="jumlah_sasaran_balita">
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <label for="jumlah_balita_kms" class="col-sm-3 col-form-label">Jumlah Balita Mempunyai KMS/Buku KIA (K)</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="jumlah_balita_kms" name="jumlah_balita_kms">
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <label for="jumlah_balita_datang" class="col-sm-3 col-form-label">Jumlah Balita Datang (D)</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="jumlah_balita_datang" name="jumlah_balita_datang">
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <label for="jumlah_balita_naik_timbangan" class="col-sm-3 col-form-label">Jumlah Balita Naik Timbangan (N)</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="jumlah_balita_naik_timbangan" name="jumlah_balita_naik_timbangan">
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <label for="jumlah_balita_turun_timbangan" class="col-sm-3 col-form-label">Jumlah Balita Turun Timbangan</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="jumlah_balita_turun_timbangan" name="jumlah_balita_turun_timbangan">
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <label for="jumlah_balita_bgm" class="col-sm-3 col-form-label">Jumlah Balita Dibawah Garis Merah (BGM)</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="jumlah_balita_bgm" name="jumlah_balita_bgm">
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <label for="jumlah_balita_sakit" class="col-sm-3 col-form-label">Jumlah Balita Sakit</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="jumlah_balita_sakit" name="jumlah_balita_sakit">
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <label for="jumlah_balita_vitamin_feb" class="col-sm-3 col-form-label">Jumlah Balita Mendapat Vitamin A (Februari)</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="jumlah_balita_vitamin_feb" name="jumlah_balita_vitamin_feb">
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <label for="jumlah_balita_vitamin_aug" class="col-sm-3 col-form-label">Jumlah Balita Mendapat Vitamin A (Agustus)</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="jumlah_balita_vitamin_aug" name="jumlah_balita_vitamin_aug">
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <label for="jumlah_balita_dirujuk" class="col-sm-3 col-form-label">Jumlah Balita Dirujuk ke Puskesmas</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="jumlah_balita_dirujuk" name="jumlah_balita_dirujuk">
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
                                <div><i class="bx bxs-bar-chart-alt-2 me-1 font-22 text-info"></i></div>
                                <h5 class="mb-0 text-info">Chart SKDN Balita Per Bulan</h5>
                            </div>
                            <hr/>

                            <canvas id="skdnChart"></canvas>

                            <div class="mt-4">
                                <h6>Keterangan:</h6>
                                <ul>
                                    <li><span style="color: rgba(54, 162, 235, 1);">Jumlah Sasaran Balita (S)</span></li>
                                    <li><span style="color: rgba(255, 206, 86, 1);">Jumlah Balita KMS/Buku KIA (K)</span></li>
                                    <li><span style="color: rgba(75, 192, 192, 1);">Jumlah Balita Datang (D)</span></li>
                                    <li><span style="color: rgba(153, 102, 255, 1);">Jumlah Balita Naik Timbangan (N)</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
</div>
@endsection
@section('script')
      <!-- Chart.js -->
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

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
@endsection