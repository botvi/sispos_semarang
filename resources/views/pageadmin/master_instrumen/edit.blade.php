@extends('template-admin.layout')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-xl-7 mx-auto">
                <hr/>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <h5 class="mb-0 text-primary">Edit Master Instrumen</h5>
                        <hr>
                        <form action="{{ route('master-instrumen.update', $instrumen->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-12">
                                <label for="nama" class="form-label">Nama Instrumen</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $instrumen->nama) }}" required>
                            </div>
                            <div class="col-12 mt-3">
                                <label for="gambar" class="form-label">Gambar</label>
                                <input type="file" class="form-control" id="gambar" name="gambar">
                                @if($instrumen->gambar)
                                    <img src="{{ asset('uploads/gambar_instrumen/' . $instrumen->gambar) }}" width="150" class="mt-2" alt="{{ $instrumen->nama }}">
                                @else
                                    <p class="text-muted mt-2">Tidak ada gambar saat ini.</p>
                                @endif
                            </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-primary px-5">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
