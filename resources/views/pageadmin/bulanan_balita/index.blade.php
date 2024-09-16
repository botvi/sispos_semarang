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
            <div class="col-xl-12 mx-auto">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleFullScreenModal">Tambah Data</button>
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
                                    <li><span style="color: rgb(235, 54, 54);">Jumlah Sasaran Balita (S)</span></li>
                                    <li><span style="color: rgba(255, 206, 86, 1);">Jumlah Balita KMS/Buku KIA (K)</span></li>
                                    <li><span style="color: rgb(69, 213, 90);">Jumlah Balita Datang (D)</span></li>
                                    <li><span style="color: rgb(25, 221, 255);">Jumlah Balita Naik Timbangan (N)</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form method="GET" action="{{ route('bulanan_balita.index') }}">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="month">Pilih Bulan</label>
                        <select name="month" id="month" class="form-control">
                            @foreach ($months as $index => $month)
                                <option value="{{ $index + 1 }}" {{ ($index + 1) == $selectedMonth ? 'selected' : '' }}>
                                    {{ $month }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="year">Pilih Tahun</label>
                        <select name="year" id="year" class="form-control">
                            @for ($i = now()->year; $i >= 2020; $i--)
                                <option value="{{ $i }}" {{ $i == $selectedYear ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>&nbsp;</label>
                        <button type="submit" class="btn btn-primary w-100">Filter</button>
                    </div>
                    <div class="col-md-3">
                        <label>&nbsp;</label>
                        <!-- Reset filter button -->
                        <a href="{{ route('bulanan_balita.index') }}" class="btn btn-secondary w-100">Reset Filter</a>
                    </div>
                </div>
            </form>
            
            
            {{-- Tambah tampilan persentase D/S X 100
            Tambah tampilan persentase N/D X 100 --}}
            <div class="col-xl-12 mx-auto align-items-center">
                <div class="row row-cols-1 row-cols-md-3 row-cols-xl-5">
                    <div class="col">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="widgets-icons rounded-circle mx-auto bg-light-primary text-primary mb-3 p-5"><span>D/S</span>
                                    </div>
                                    <h4 class="my-1">{{ number_format($persentaseDatang, 2) }}%</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="widgets-icons rounded-circle mx-auto bg-light-danger text-danger mb-3 p-5"><span>N/D</span>
                                    </div>
                                    <h4 class="my-1">{{ number_format($persentaseNaikTimbangan, 2) }}%</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Tambah tampilan persentase D/S X 100
            Tambah tampilan persentase N/S X 100 --}}
        <!--end row-->
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
                </div>
            </div>
        </div>
       <!-- Table Display -->
       <div class="card">
           
           <div class="card-body">
            <a href="{{ route('balita.export') }}" class="btn btn-success mb-5"><i class='bx bxs-file-import'></i> Export to Excel</a>
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pelaksanaan</th>
                            <th>Jumlah Sasaran Balita (S)</th>
                            <th>Jumlah Balita KMS (K)</th>
                            <th>Jumlah Balita Datang (D)</th>
                            <th>Jumlah Balita Naik Timbangan (N)</th>
                            <th>Jumlah Balita Turun Timbangan</th>
                            <th>Jumlah Balita BGM</th>
                            <th>Jumlah Balita Sakit</th>
                            <th>Jumlah Balita Vitamin FEB</th>
                            <th>Jumlah Balita Vitamin AUG</th>
                            <th>Jumlah Balita Dirujuk</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bulananBalitas as $index => $balita)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $balita->tanggal_pelaksanaan }}</td>
                            <td>{{ $balita->jumlah_sasaran_balita }}</td>
                            <td>{{ $balita->jumlah_balita_kms }}</td>
                            <td>{{ $balita->jumlah_balita_datang }}</td>
                            <td>{{ $balita->jumlah_balita_naik_timbangan }}</td>
                            <td>{{ $balita->jumlah_balita_turun_timbangan }}</td>
                            <td>{{ $balita->jumlah_balita_bgm }}</td>
                            <td>{{ $balita->jumlah_balita_sakit }}</td>
                            <td>{{ $balita->jumlah_balita_vitamin_feb }}</td>
                            <td>{{ $balita->jumlah_balita_vitamin_aug }}</td>
                            <td>{{ $balita->jumlah_balita_dirujuk }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $balita->id }}">Edit</button>
                            </td>
                        </tr>
    
                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal{{ $balita->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-fullscreen">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Data Balita - {{ $balita->tanggal_pelaksanaan }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('bulananbalita.update', $balita->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="card border-top border-0 border-4 border-info">
                                                <div class="card-body">
                                                    <div class="border p-4 rounded">
                                                        <div class="card-title d-flex align-items-center">
                                                            <div><i class="bx bxs-data me-1 font-22 text-info"></i></div>
                                                            <h5 class="mb-0 text-info">Proses Tiap Bulan Balita</h5>
                                                        </div>
                                                        <hr/>
                                                        
                                                        <div class="row mb-3">
                                                            <label for="tanggal_pelaksanaan{{ $balita->id }}" class="col-sm-3 col-form-label">Tanggal Pelaksanaan</label>
                                                            <div class="col-sm-9">
                                                                <input type="date" class="form-control" id="tanggal_pelaksanaan{{ $balita->id }}" name="tanggal_pelaksanaan" value="{{ $balita->tanggal_pelaksanaan }}">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row mb-3">
                                                            <label for="jumlah_sasaran_balita{{ $balita->id }}" class="col-sm-3 col-form-label">Jumlah Sasaran Balita (S)</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" id="jumlah_sasaran_balita{{ $balita->id }}" name="jumlah_sasaran_balita" value="{{ $balita->jumlah_sasaran_balita }}">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row mb-3">
                                                            <label for="jumlah_balita_kms{{ $balita->id }}" class="col-sm-3 col-form-label">Jumlah Balita Mempunyai KMS/Buku KIA (K)</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" id="jumlah_balita_kms{{ $balita->id }}" name="jumlah_balita_kms" value="{{ $balita->jumlah_balita_kms }}">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row mb-3">
                                                            <label for="jumlah_balita_datang{{ $balita->id }}" class="col-sm-3 col-form-label">Jumlah Balita Datang (D)</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" id="jumlah_balita_datang{{ $balita->id }}" name="jumlah_balita_datang" value="{{ $balita->jumlah_balita_datang }}">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row mb-3">
                                                            <label for="jumlah_balita_naik_timbangan{{ $balita->id }}" class="col-sm-3 col-form-label">Jumlah Balita Naik Timbangan (N)</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" id="jumlah_balita_naik_timbangan{{ $balita->id }}" name="jumlah_balita_naik_timbangan" value="{{ $balita->jumlah_balita_naik_timbangan }}">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row mb-3">
                                                            <label for="jumlah_balita_turun_timbangan{{ $balita->id }}" class="col-sm-3 col-form-label">Jumlah Balita Turun Timbangan</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" id="jumlah_balita_turun_timbangan{{ $balita->id }}" name="jumlah_balita_turun_timbangan" value="{{ $balita->jumlah_balita_turun_timbangan }}">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row mb-3">
                                                            <label for="jumlah_balita_bgm{{ $balita->id }}" class="col-sm-3 col-form-label">Jumlah Balita Dibawah Garis Merah (BGM)</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" id="jumlah_balita_bgm{{ $balita->id }}" name="jumlah_balita_bgm" value="{{ $balita->jumlah_balita_bgm }}">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row mb-3">
                                                            <label for="jumlah_balita_sakit{{ $balita->id }}" class="col-sm-3 col-form-label">Jumlah Balita Sakit</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" id="jumlah_balita_sakit{{ $balita->id }}" name="jumlah_balita_sakit" value="{{ $balita->jumlah_balita_sakit }}">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row mb-3">
                                                            <label for="jumlah_balita_vitamin_feb{{ $balita->id }}" class="col-sm-3 col-form-label">Jumlah Balita Mendapat Vitamin A (Februari)</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" id="jumlah_balita_vitamin_feb{{ $balita->id }}" name="jumlah_balita_vitamin_feb" value="{{ $balita->jumlah_balita_vitamin_feb }}">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row mb-3">
                                                            <label for="jumlah_balita_vitamin_aug{{ $balita->id }}" class="col-sm-3 col-form-label">Jumlah Balita Mendapat Vitamin A (Agustus)</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" id="jumlah_balita_vitamin_aug{{ $balita->id }}" name="jumlah_balita_vitamin_aug" value="{{ $balita->jumlah_balita_vitamin_aug }}">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row mb-3">
                                                            <label for="jumlah_balita_dirujuk{{ $balita->id }}" class="col-sm-3 col-form-label">Jumlah Balita Dirujuk</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" id="jumlah_balita_dirujuk{{ $balita->id }}" name="jumlah_balita_dirujuk" value="{{ $balita->jumlah_balita_dirujuk }}">
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
                          backgroundColor: '#EF5A6F',
                          borderColor: '#EF5A6F',
                          borderWidth: 1
                      },
                      {
                          label: 'Jumlah Balita KMS/Buku KIA (K)',
                          data: @json($kmsData),
                          backgroundColor: '#FABC3F',
                          borderColor: '#FABC3F',
                          borderWidth: 1
                      },
                      {
                          label: 'Jumlah Balita Datang (D)',
                          data: @json($datangData),
                          backgroundColor: '#387F39',
                          borderColor: '#387F39',
                          borderWidth: 1
                      },
                      {
                          label: 'Jumlah Balita Naik Timbangan (N)',
                          data: @json($naikTimbanganData),
                          backgroundColor: '#3FA2F6',
                          borderColor: '#3FA2F6',
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