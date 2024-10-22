@extends('layouts.apps')
@section('content')
<div class="container py-3">
    <h4 class="card-title">Tambah Data File Surat</h4>
    <form action="{{ route('suratmagang.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid py-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nama_kampus">Nama Kampus</label>
                        <input type="text" name="nama_kampus" class="form-control" id="nama_kampus" value="{{ old('nama_kampus') }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="file_surat">File Surat</label>
                        <input type="file" class="form-control-file" id="file_surat" name="file_surat">
                    </div>
                </div>                
            </div>
        </div>
        <div class="form-group justify-content-start">
            <button type="submit" class="btn btn-success btn-sm" id="alert_demo_3_3">Simpan</button>
            <a href="{{ route('suratmagang.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
        </div>
    </form>
</div>
@endsection


