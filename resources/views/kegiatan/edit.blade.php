@extends('layouts.apps')
@section('content')
<div class="container py-3">
    <h4 class="card-title">Edit Kegiatan</h4>
    <form action="{{ route('kegiatan.update', $kegiatan->uuid) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="container-fluid py-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id">Kode Kegiatan (ID):</label>
                        <input type="text" name="id" class="form-control" id="id" value="{{ $kegiatan->id }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nama_kegiatan">Nama Kegiatan:</label>
                        <input type="text" name="nama_kegiatan" class="form-control" id="nama_kegiatan" value="{{ $kegiatan->nama_kegiatan }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="alokasi_dana">Alokasi Dana:</label>
                        <input type="number" step="0.01" name="alokasi_dana" class="form-control" id="alokasi_dana" value="{{ $kegiatan->alokasi_dana }}" required>
                    </div>
                </div>
            </div>
        </div>
    <button type="submit" class="btn btn-success btn-sm" id="alert_demo_3_4">Update</button>
    <a href="{{ route('kegiatan.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
</form>
</div>
@endsection
