@extends('layouts.apps')
@section('content')
<div class="container py-3">
    <h4 class="card-title">Tambah Data Siswa</h4>
    <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid py-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nim">Nim</label>
                        <input type="text" name="nim" class="form-control" id="nim" value="{{ old('nim') }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" name="kelas" class="form-control" id="kelas" value="{{ old('kelas') }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="semester">Semester</label>
                        <input type="text" name="semester" class="form-control" id="semester" value="{{ old('semester') }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="sekolah">Sekolah</label>
                        <input type="text" name="sekolah" class="form-control" id="sekolah" value="{{ old('sekolah') }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tgl_mulai_pkl" class="form-label">Tanggal Mulai</label>
                        <input type="date" name="tgl_mulai_pkl" class="form-control" id="tgl_mulai_pkl" value="{{ old('tgl_mulai_pkl') }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tgl_selesai_pkl" class="form-label">Tanggal Selesai</label>
                        <input type="date" name="tgl_selesai_pkl" class="form-control" id="tgl_selesai_pkl" value="{{ old('tgl_selesai_pkl') }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control-file" id="foto" name="foto">
                    </div>
                </div>                
            </div>
        </div>
        <div class="form-group justify-content-start">
            <button type="submit" class="btn btn-success btn-sm" id="alert_demo_3_3">Simpan</button>
            <a href="{{ route('siswa.index') }}" class="btn btn-secondary btn-sm btn-border">Batal</a>
        </div>
    </form>
</div>
@endsection


