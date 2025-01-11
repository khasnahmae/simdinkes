@extends('layouts.apps')
@section('content')
    <div class="container py-3">
        <h4 class="card-title">Edit Data Berita</h4>
        <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="container-fluid py-3">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" class="form-control" id="judul"
                                value="{{ $berita->judul }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="subjudul">Subjudul</label>
                            <input type="text" name="subjudul" class="form-control" id="subjudul"
                                value="{{ $berita->subjudul }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="isi">Isi</label>
                            <input type="text" name="isi" class="form-control" id="isi"
                                value="{{ $berita->isi }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" class="form-control" id="foto"
                                value="{{ $berita->foto }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group justify-content-start">
                <button type="submit" class="btn btn-success btn-sm" id="alert_demo_3_4">Update</button>
                <a href="{{ route('berita.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
            </div>
        </form>
    </div>
@endsection
