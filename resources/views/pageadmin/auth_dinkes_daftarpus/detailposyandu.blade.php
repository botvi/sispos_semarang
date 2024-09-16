@extends('template-admin.layout')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <h3>Detail Posyandu</h3>
        <hr />

        <div class="card">
            <div class="card-header bg-warning">
                <h4 class="card-title">{{ $regPosyandu->nama }}</h4>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs nav-warning" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="tab" href="#infoPosyandu" role="tab" aria-selected="true">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class='bx bxs-data font-18 me-1'></i></div>
                                <div class="tab-title">Informasi Posyandu</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#dataPosyandu" role="tab" aria-selected="false">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class='bx bxs-data font-18 me-1'></i></div>
                                <div class="tab-title">Data Posyandu</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#dataKader" role="tab" aria-selected="false">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class='bx bxs-data font-18 me-1'></i></div>
                                <div class="tab-title">Data Kader</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#dataPeralatan" role="tab" aria-selected="false">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class='bx bxs-data font-18 me-1'></i></div>
                                <div class="tab-title">Data Peralatan Kesehatan</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#dataPerbekalan" role="tab" aria-selected="false">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class='bx bxs-data font-18 me-1'></i></div>
                                <div class="tab-title">Data Perbekalan Kesehatan</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#dataInstrumen" role="tab" aria-selected="false">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class='bx bxs-data font-18 me-1'></i></div>
                                <div class="tab-title">Data Instrumen Kesehatan</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#dataSasaran" role="tab" aria-selected="false">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class='bx bxs-data font-18 me-1'></i></div>
                                <div class="tab-title">Data Sasaran Posyandu</div>
                            </div>
                        </a>
                    </li>
                </ul>

                <div class="tab-content py-3">
                    <div class="tab-pane fade show active" id="infoPosyandu" role="tabpanel">
                        <h5>Informasi Posyandu</h5>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">RT</th>
                                    <td>{{ $regPosyandu->rt }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">RW</th>
                                    <td>{{ $regPosyandu->rw }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Puskesmas</th>
                                    <td>{{ $regPosyandu->puskesmas->nama }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Kecamatan</th>
                                    <td>{{ $regPosyandu->kecamatan->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Kelurahan</th>
                                    <td>{{ $regPosyandu->kelurahan->name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="dataPosyandu" role="tabpanel">
                        <h5>Informasi DataPosyandu</h5>
                        <table class="table table-bordered">
                            <tbody>
                                @if($dataPosyandu)
                                    <tr>
                                        <th scope="row">Strata Posyandu</th>
                                        <td>{{ $dataPosyandu->strata_posyandu }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tempat Kegiatan</th>
                                        <td>{{ $dataPosyandu->tempat_kegiatan }}</td>
                                    </tr>
                                   
                                    <tr>
                                        <th scope="row">SK Kelurahan</th>
                                        <td>
                                            @if($dataPosyandu->sk_kelurahan)
                                                <a href="{{ asset($dataPosyandu->sk_kelurahan) }}" target="_blank">Lihat SK Kelurahan</a>
                                            @else
                                                <p>Tidak ada SK Kelurahan tersedia.</p>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Foto Lokasi</th>
                                        <td>
                                            @if($dataPosyandu->foto_lokasi)
                                                <a href="{{ asset($dataPosyandu->foto_lokasi) }}" target="_blank">Lihat Foto Lokasi</a>
                                            @else
                                                <p>Tidak ada foto lokasi tersedia.</p>
                                            @endif
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="2">
                                            <div class="d-flex align-items-center">
                                                <div class="font-35 text-dark"><i class='bx bx-info-circle'></i></div>
                                                <div class="ms-3">
                                                    <h6 class="mb-0 text-dark">Warning </h6>
                                                    <div class="text-dark">Data Posyandu tidak ditemukan!</div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="dataKader" role="tabpanel">
                        <h5>Data Kader</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                        <th>No. HP</th>
                                        <th>Jabatan</th>
                                        <th>Tempat, Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Pertama Kali Menjadi Kader Posyandu</th>
                                        <th>Pelatihan Pertama & Sertifikat</th>
                                        <th>Pelatihan Kedua & Sertifikat</th>
                                        <th>Pelatihan Ketiga & Sertifikat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($dataKader as $kader)
                                    <tr>
                                        <td>{{ $kader->nama }}</td>
                                            <td>{{ $kader->no_hp }}</td>
                                            <td>{{ $kader->jabatan }}</td>
                                            <td>{{ $kader->tempat_lahir }}, {{ $kader->tanggal_lahir }}</td>
                                            <td>{{ $kader->jenis_kelamin }}</td>
                                            <td>{{ $kader->pertama_kali }}</td>
                                            <td>{{ $kader->pelatihan_diikuti1 }} / <a
                                                    href="{{ asset($kader->sertifikat1) }}" target="_blank">Lihat
                                                    Sertifikat</a></td>
                                            <td>{{ $kader->pelatihan_diikuti2 }} / <a
                                                    href="{{ asset($kader->sertifikat2) }}" target="_blank">Lihat
                                                    Sertifikat</a></td>
                                            <td>{{ $kader->pelatihan_diikuti3 }} / <a
                                                    href="{{ asset($kader->sertifikat3) }}" target="_blank">Lihat
                                                    Sertifikat</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">
                                            <div class="d-flex align-items-center">
                                                <div class="font-35 text-dark"><i class='bx bx-info-circle'></i></div>
                                                <div class="ms-3">
                                                    <h6 class="mb-0 text-dark">Warning </h6>
                                                    <div class="text-dark">Tidak ada data kader tersedia.</div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="dataPeralatan" role="tabpanel">
                        <h5>Data Peralatan Kesehatan</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Peralatan</th>
                                    <th>Jumlah</th>
                                    <th>Gambar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($dataPeralatanKes && !empty($dataPeralatanKes->peralatan))
                                    @foreach($dataPeralatanKes->peralatan as $item)
                                        @php
                                            $peralatan = $masterPeralatan->get($item['peralatan_id']);
                                        @endphp
                                        <tr>
                                            <td>{{ $peralatan ? $peralatan->nama : 'Unknown' }}</td>
                                            <td>{{ $item['jumlah'] }}</td>
                                            <td>
                                                @if($peralatan && $peralatan->gambar)
                                            
                                                    <img src="{{ asset('uploads/gambar_peralatankes/' . $peralatan->gambar) }}" alt="{{ $peralatan->nama }}" width="100">
                                                @else
                                                    Tidak ada gambar
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <tr>
                                            <td colspan="7">
                                                <div class="d-flex align-items-center">
                                                    <div class="font-35 text-dark"><i class='bx bx-info-circle'></i></div>
                                                    <div class="ms-3">
                                                        <h6 class="mb-0 text-dark">Warning </h6>
                                                        <div class="text-dark">Tidak ada data peralatan tersedia.</div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="dataPerbekalan" role="tabpanel">
                        <h5>Data Perbekalan Kesehatan</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Perbekalan</th>
                                    <th>Jumlah</th>
                                    <th>Gambar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($dataPerbekalanKes && !empty($dataPerbekalanKes->perbekalan))
                                    @foreach($dataPerbekalanKes->perbekalan as $item)
                                        @php
                                            $perbekalan = $masterPerbekalan->get($item['perbekalan_id']);
                                        @endphp
                                        <tr>
                                            <td>{{ $perbekalan ? $perbekalan->nama : 'Unknown' }}</td>
                                            <td>{{ $item['jumlah'] }}</td>
                                            <td>
                                                @if($perbekalan && $perbekalan->gambar)
                                                    <img src="{{ asset('uploads/gambar_perbekalankes/' . $perbekalan->gambar) }}" alt="{{ $perbekalan->nama }}" width="100">
                                                @else
                                                    Tidak ada gambar
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <tr>
                                        <td colspan="7">
                                            <div class="d-flex align-items-center">
                                                <div class="font-35 text-dark"><i class='bx bx-info-circle'></i></div>
                                                <div class="ms-3">
                                                    <h6 class="mb-0 text-dark">Warning </h6>
                                                    <div class="text-dark">Tidak ada data perbekalan tersedia.</div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="dataInstrumen" role="tabpanel">
                        <h5>Data Instrumen Kesehatan</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Instrumen</th>
                                    <th>Jumlah</th>
                                    <th>Gambar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($dataInstrumenKes && !empty($dataInstrumenKes->instrumen))
                                    @foreach($dataInstrumenKes->instrumen as $item)
                                        @php
                                            $instrumen = $masterInstrumen->get($item['instrumen_id']);
                                        @endphp
                                        <tr>
                                            <td>{{ $instrumen ? $instrumen->nama : 'Unknown' }}</td>
                                            <td>{{ $item['jumlah'] }}</td>
                                            <td>
                                                @if($instrumen && $instrumen->gambar)
                                                    <img src="{{ asset('uploads/gambar_instrumen/' . $instrumen->gambar) }}" alt="{{ $instrumen->nama }}" width="100">
                                                @else
                                                    Tidak ada gambar
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3">
                                            <div class="d-flex align-items-center">
                                                <div class="font-35 text-dark"><i class='bx bx-info-circle'></i></div>
                                                <div class="ms-3">
                                                    <h6 class="mb-0 text-dark">Warning </h6>
                                                    <div class="text-dark">Tidak ada data instrumen kesehatan tersedia.</div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="dataSasaran" role="tabpanel">
                        <h5>Data Sasaran Posyandu</h5>
                        <table class="table table-bordered">
                            <tbody>
                                @if($dataSasaran)
                                    <tr>
                                        <th scope="row">Jumlah Bayi</th>
                                        <td>{{ $dataSasaran->jumlah_bayi }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jumlah Balita</th>
                                        <td>{{ $dataSasaran->jumlah_balita }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jumlah Ibu Hamil</th>
                                        <td>{{ $dataSasaran->jumlah_ibu_hamil }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jumlah Ibu Nifas Menyusui</th>
                                        <td>{{ $dataSasaran->jumlah_ibu_nifas_menyusui }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jumlah Anak Usia Sekolah</th>
                                        <td>{{ $dataSasaran->jumlah_anak_usia_sekolah }}</td> <!-- Tambahkan jika diperlukan -->
                                    </tr>
                                    <tr>
                                        <th scope="row">Jumlah Usia Dewasa</th>
                                        <td>{{ $dataSasaran->jumlah_usia_dewasa }}</td> <!-- Tambahkan jika diperlukan -->
                                    </tr>
                                    <tr>
                                        <th scope="row">Jumlah Lansia</th>
                                        <td>{{ $dataSasaran->jumlah_lansia }}</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="2">
                                            <div class="d-flex align-items-center">
                                                <div class="font-35 text-dark"><i class='bx bx-info-circle'></i></div>
                                                <div class="ms-3">
                                                    <h6 class="mb-0 text-dark">Warning </h6>
                                                    <div class="text-dark">Tidak ada data sasaran Posyandu tersedia.</div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-header">
               <a href="/daftarpuskesmas" class="btn btn-sm btn-warning">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection

