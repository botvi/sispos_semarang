@extends('template-admin.layout')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Edit Data Kader</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-7 mx-auto">
                <hr/>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div class="me-3">
                                <i class="bx bx-user-edit fs-3"></i>
                            </div>
                            <h5 class="mb-0 text-primary">Form Edit Data Kader</h5>
                        </div>
                        <hr/>
                        <form action="{{ route('data-kader.update', $dataKader->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $dataKader->nama }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="no_hp" class="col-sm-3 col-form-label">No HP</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $dataKader->no_hp }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="jabatan" name="jabatan" required>
                                        <option value="" disabled>Pilih Jabatan</option>
                                        <option value="Ketua" {{ $dataKader->jabatan == 'Ketua' ? 'selected' : '' }}>Ketua</option>
                                        <option value="Sekretaris" {{ $dataKader->jabatan == 'Sekretaris' ? 'selected' : '' }}>Sekretaris</option>
                                        <option value="Bendahara" {{ $dataKader->jabatan == 'Bendahara' ? 'selected' : '' }}>Bendahara</option>
                                        <option value="Anggota" {{ $dataKader->jabatan == 'Anggota' ? 'selected' : '' }}>Anggota</option>
                                    </select>
                                </div>
                            </div>
                            
                            
                            <div class="row mb-3">
                                <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $dataKader->tempat_lahir }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $dataKader->tanggal_lahir }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                        <option value="Laki-laki" {{ $dataKader->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ $dataKader->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="pertama_kali" class="col-sm-3 col-form-label">Pertama Kali</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="pertama_kali" name="pertama_kali" value="{{ $dataKader->pertama_kali }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="pelatihan_diikuti" class="col-sm-3 col-form-label">Pelatihan Diikuti</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pelatihan_diikuti" name="pelatihan_diikuti" value="{{ $dataKader->pelatihan_diikuti }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="sertifikat" class="col-sm-3 col-form-label">Sertifikat</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="sertifikat" name="sertifikat">
                                    @if ($dataKader->sertifikat)
                                        <a href="{{ asset($dataKader->sertifikat) }}" target="_blank">Lihat Sertifikat</a>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-9 offset-sm-3">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('dataposyandu.index') }}" class="btn btn-secondary">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
