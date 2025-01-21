@extends('layouts.apps')
@section('content')
    @if ($errors->has('foto'))
        <div class="alert alert-danger">
            {{ $errors->first('foto') }}
        </div>
    @endif
    <div class="container py-3">
        <h4 class="card-title">Tambah Data Berita</h4>
        <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid py-3">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" class="form-control" id="judul" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="subjudul">Subjudul</label>
                            <input type="text" name="subjudul" class="form-control" id="subjudul" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="isi">Isi</label>
                            <input type="text" name="isi" class="form-control" id="isi" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" class="form-control" id="foto" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group justify-content-start">
                <button type="submit" class="btn btn-success btn-sm" id="alert_demo_3_3">Simpan</button>
                <a href="{{ route('barang.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
            </div>
        </form>
    </div>
@endsection
