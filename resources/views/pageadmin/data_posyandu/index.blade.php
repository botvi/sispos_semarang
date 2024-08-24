@extends('template-admin.layout')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Data Posyandu</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Posyandu</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <ul class="nav nav-pills nav-pills-primary mb-3" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" data-bs-toggle="pill" href="#dataPosyandu" role="tab" aria-selected="true">
                    <div class="d-flex align-items-center">
                        <div class="tab-title">DATA POSYANDU</div>
                    </div>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="pill" href="#dataKader" role="tab" aria-selected="false">
                    <div class="d-flex align-items-center">
                        <div class="tab-title">DATA KADER</div>
                    </div>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="pill" href="#dataSasaran" role="tab" aria-selected="false">
                    <div class="d-flex align-items-center">
                        <div class="tab-title">DATA SASARAN</div>
                    </div>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="pill" href="#peralatanKes" role="tab" aria-selected="false">
                    <div class="d-flex align-items-center">
                        <div class="tab-title">PERALATAN KESEHATAN</div>
                    </div>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="pill" href="#perbekalanKes" role="tab" aria-selected="false">
                    <div class="d-flex align-items-center">
                        <div class="tab-title">PERBEKALAN KESEHATAN</div>
                    </div>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="pill" href="#instrumenKes" role="tab" aria-selected="false">
                    <div class="d-flex align-items-center">
                        <div class="tab-title">INSTRUMEN KESEHATAN</div>
                    </div>
                </a>
            </li>
        </ul>
        @if (session('success'))
            <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
                <div class="d-flex align-items-center">
                    <div class="font-35 text-white">
                        <i class='bx bxs-check-circle'></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-white">Success</h6>
                        <div class="text-white">{{ session('success') }}</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="tab-content">
            <div class="tab-pane fade show active" id="dataPosyandu" role="tabpanel">
                <div class="container">
                    <div class="main-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            <img src="https://www.linggapura.desa.id/wp-content/uploads/2024/04/Posyandu.png" alt="Admin" class="rounded-circle p-1 bg-white" width="310">
                                            <div class="mt-3">
                                                <h4>{{ $regPosyandu->nama }}</h4>
                                                <p class="text-secondary mb-1">{{ $regPosyandu->puskesmas->nama }}</p>
                                                <p class="text-muted font-size-sm">RT/RW {{ $regPosyandu->rt }}/{{ $regPosyandu->rw }}, {{ $kecamatan }}, {{ $kelurahan }}</p>
                                                <p class="text-muted font-size-sm">{{ $regPosyandu->alamat_lengkap }}</p>
                                            </div>
                                        </div>
                                        <hr class="my-4" />
                                        @if(isset($dataPosyandu) && $dataPosyandu->foto_lokasi)
                                        <ul class="list-group list-group-flush">
                                            <h4>Lokasi</h4>
                                            <img src="{{ asset($dataPosyandu->foto_lokasi) }}" width="auto" height="400" alt="Foto Lokasi Posyandu">
                                        </ul>
                                    @else
                                    <ul class="list-group list-group-flush">
                                        <img src="https://www.shutterstock.com/image-vector/default-image-icon-vector-missing-600nw-2086941550.jpg" width="auto" height="400" alt="Foto Lokasi Posyandu">
                                    </ul>
                                    @endif
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <form>
                                            <!-- Nama Posyandu -->
                                            <div class="row mb-3">
                                                <label for="nama" class="col-sm-3 col-form-label">Nama Posyandu</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nama" class="form-control" value="{{ $regPosyandu->nama }}" disabled>
                                                </div>
                                            </div>
                                        
                                            <!-- RT -->
                                            <div class="row mb-3">
                                                <label for="rt" class="col-sm-3 col-form-label">RT</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="rt" class="form-control" value="{{ $regPosyandu->rt }}" disabled>
                                                </div>
                                            </div>
                                        
                                            <!-- RW -->
                                            <div class="row mb-3">
                                                <label for="rw" class="col-sm-3 col-form-label">RW</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="rw" class="form-control" value="{{ $regPosyandu->rw }}" disabled>
                                                </div>
                                            </div>
                                        
                                            <!-- Kecamatan -->
                                            <div class="row mb-3">
                                                <label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="kecamatan" class="form-control" value="{{ $kecamatan }}" disabled>
                                                </div>
                                            </div>
                                        
                                            <!-- Kelurahan -->
                                            <div class="row mb-3">
                                                <label for="kelurahan" class="col-sm-3 col-form-label">Kelurahan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="kelurahan" class="form-control" value="{{ $kelurahan }}" disabled>
                                                </div>
                                            </div>
                                        
                                            <!-- Alamat Lengkap -->
                                            <div class="row mb-3">
                                                <label for="alamat_lengkap" class="col-sm-3 col-form-label">Alamat Lengkap</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="alamat_lengkap" class="form-control" value="{{ $regPosyandu->alamat_lengkap }}" disabled>
                                                </div>
                                            </div>
                                        
                                            <!-- Puskesmas -->
                                            <div class="row mb-3">
                                                <label for="puskesmas_id" class="col-sm-3 col-form-label">Puskesmas</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" value="{{ $regPosyandu->puskesmas->nama }}" disabled>
                                                </div>
                                            </div>
                                        </form>
                                        
                                        
                                    </div>
                                </div>

                               

                                <form action="{{ isset($dataPosyandu) ? route('dataposyandu.update', $dataPosyandu->id) : route('dataposyandu.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if(isset($dataPosyandu))
                                        @method('PUT')
                                    @endif

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">STRATA POSYANDU</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <select name="strata_posyandu" class="form-select mb-3" required>
                                                        <option value="" selected disabled>Pilih Strata</option>
                                                        @foreach($strataPosyandu as $strata)
                                                            <option value="{{ $strata->nama }}" {{ isset($dataPosyandu) && $dataPosyandu->strata_posyandu == $strata->nama ? 'selected' : '' }}>
                                                                {{ $strata->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">TEMPAT KEGIATAN POSYANDU</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" name="tempat_kegiatan" class="form-control" value="{{ old('tempat_kegiatan', $dataPosyandu->tempat_kegiatan ?? '') }}" required />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">KETERANGAN</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <select name="keterangan" class="form-select mb-3">
                                                        <option value="" selected disabled>Pilih Keterangan</option>
                                                        <option value="Permanen" {{ isset($dataPosyandu) && $dataPosyandu->keterangan == 'Permanen' ? 'selected' : '' }}>Permanen</option>
                                                        <option value="Tidak Permanen" {{ isset($dataPosyandu) && $dataPosyandu->keterangan == 'Tidak Permanen' ? 'selected' : '' }}>Tidak Permanen</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Lampirkan SK dari Kelurahan*</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="file" name="sk_kelurahan" class="form-control" />
                                                    @if(isset($dataPosyandu) && $dataPosyandu->sk_kelurahan)
                                                        <a href="{{ asset($dataPosyandu->sk_kelurahan) }}" target="_blank" class="btn btn-link mt-2">Lihat SK dari Kelurahan</a>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Lampirkan foto lokasi*</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="file" name="foto_lokasi" class="form-control" />
                                                    @if(isset($dataPosyandu) && $dataPosyandu->foto_lokasi)
                                                        <a href="{{ asset($dataPosyandu->foto_lokasi) }}" target="_blank" class="btn btn-link mt-2">Lihat Foto Lokasi</a>
                                                    @endif
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-9 text-secondary">
                                                    <button type="submit" class="btn btn-primary px-4">{{ isset($dataPosyandu) ? 'Update' : 'Save' }} Changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="dataKader" role="tabpanel">
                <div class="container">
                    <div class="main-body">
                        <div class="row">
                           
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="{{ route('data-kader.create') }}" class="btn btn-success mb-3">TAMBAH DATA KADER</a>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>No HP</th>
                                                        <th>Jabatan</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($kaders as $kader)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $kader->nama }}</td>
                                                            <td>{{ $kader->no_hp }}</td>
                                                            <td>{{ $kader->jabatan }}</td>
                                                            <td>{{ $kader->jenis_kelamin }}</td>
                                                            <td>
                                                                <a href="{{ route('data-kader.edit', $kader->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                                <form action="{{ route('data-kader.destroy', $kader->id) }}" method="POST" style="display:inline-block;" class="delete-form">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>No HP</th>
                                                        <th>Jabatan</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="dataSasaran" role="tabpanel">
                <div class="container">
                    <div class="main-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ isset($dataSasaran) ? route('dataSasaran.update') : route('dataSasaran.store') }}" method="POST">
                                            @csrf
                                            @if(isset($dataSasaran))
                                                @method('PUT')
                                            @endif
            
            
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">JUMLAH BAYI (0 -1 TAHUN)</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="number" class="form-control" name="jumlah_bayi" value="{{ old('jumlah_bayi', $dataSasaran->jumlah_bayi ?? '') }}" required />
                                                </div>
                                            </div>
            
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">JUMLAH BALITA (1 - 6 TAHUN)</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="number" class="form-control" name="jumlah_balita" value="{{ old('jumlah_balita', $dataSasaran->jumlah_balita ?? '') }}" required />
                                                </div>
                                            </div>
            
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">JUMLAH IBU HAMIL</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="number" class="form-control" name="jumlah_ibu_hamil" value="{{ old('jumlah_ibu_hamil', $dataSasaran->jumlah_ibu_hamil ?? '') }}" required />
                                                </div>
                                            </div>
            
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">JUMLAH IBU NIFAS DAN MENYUSUI</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="number" class="form-control" name="jumlah_ibu_nifas_menyusui" value="{{ old('jumlah_ibu_nifas_menyusui', $dataSasaran->jumlah_ibu_nifas_menyusui ?? '') }}" required />
                                                </div>
                                            </div>
            
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">JUMLAH ANAK USIA SEKOLAH (6 - 18 TAHUN)</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="number" class="form-control" name="jumlah_anak_usia_sekolah" value="{{ old('jumlah_anak_usia_sekolah', $dataSasaran->jumlah_anak_usia_sekolah ?? '') }}" required />
                                                </div>
                                            </div>
            
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">JUMLAH USIA DEWASA (>18-59 TAHUN)</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="number" class="form-control" name="jumlah_usia_dewasa" value="{{ old('jumlah_usia_dewasa', $dataSasaran->jumlah_usia_dewasa ?? '') }}" required />
                                                </div>
                                            </div>
            
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">JUMLAH LANSIA (≥60 TAHUN)</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="number" class="form-control" name="jumlah_lansia" value="{{ old('jumlah_lansia', $dataSasaran->jumlah_lansia ?? '') }}" required />
                                                </div>
                                            </div>
            
                                            <div class="row">
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="submit" class="btn btn-primary px-4" value="{{ isset($dataSasaran) ? 'Update Data' : 'Save Data' }}" />
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

            <div class="tab-pane fade" id="peralatanKes" role="tabpanel">
                <div class="container">
                    <div class="main-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('data-peralatan-kes.storeOrUpdate') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                            @foreach($peralatan as $item)
                                                <div class="row mb-3">
                                                 
                                                    <div class="col-sm-6">
                                                        <img src="{{ asset('uploads/gambar_peralatankes/' . $item->gambar) }}" width="70" alt="{{ $item->nama }}">
                                                        <h6 class="mb-0">{{ $item->nama }}</h6>
                                                        <input type="number" class="form-control" name="peralatan[{{ $item->id }}]"
                                                            value="{{ $peralatanData[$item->id]['jumlah'] ?? 0 }}" 
                                                            required />
                                                    </div>
                                                   
                                                </div>
                                            @endforeach
                                            <div class="row">
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="submit" class="btn btn-primary px-4" value="Simpan" />
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

            <div class="tab-pane fade" id="perbekalanKes" role="tabpanel">
                <div class="container">
                    <div class="main-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('data-perbekalan-kes.storeOrUpdate') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                            @foreach($perbekalan as $item)
                                                <div class="row mb-3">
                                                 
                                                    <div class="col-sm-6">
                                                        <img src="{{ asset('uploads/gambar_perbekalankes/' . $item->gambar) }}" width="70" alt="{{ $item->nama }}">
                                                        <h6 class="mb-0">{{ $item->nama }}</h6>
                                                        <input type="number" class="form-control" name="perbekalan[{{ $item->id }}]"
                                                            value="{{ $perbekalanData[$item->id]['jumlah'] ?? 0 }}" 
                                                            required />
                                                    </div>
                                                   
                                                </div>
                                            @endforeach
                                            <div class="row">
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="submit" class="btn btn-primary px-4" value="Simpan" />
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

            <div class="tab-pane fade" id="instrumenKes" role="tabpanel">
                <div class="container">
                    <div class="main-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('data-instrumen-kes.storeOrUpdate') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                            @foreach($instrumen as $item)
                                                <div class="row mb-3">
                                                 
                                                    <div class="col-sm-6">
                                                        <img src="{{ asset('uploads/gambar_instrumen/' . $item->gambar) }}" width="70" alt="{{ $item->nama }}">
                                                        <h6 class="mb-0">{{ $item->nama }}</h6>
                                                        <input type="number" class="form-control" name="instrumen[{{ $item->id }}]"
                                                            value="{{ $instrumenData[$item->id]['jumlah'] ?? 0 }}" 
                                                            required />
                                                    </div>
                                                   
                                                </div>
                                            @endforeach
                                            <div class="row">
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="submit" class="btn btn-primary px-4" value="Simpan" />
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
</div>
@endsection
@section('script')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data ini akan dihapus secara permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endsection