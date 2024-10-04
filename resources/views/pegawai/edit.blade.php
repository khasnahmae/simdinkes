@extends('layouts.apps')
@section('content')
<div class="container py-3">
    <h4 class="card-title">Edit Data Pegawai</h4>
    <form action="{{ route('pegawai.update', $pegawai->uuid) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="container-fluid py-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="{{ $pegawai->nama }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" name="nip" class="form-control" id="nip" value="{{ $pegawai->nip }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="bidang">Bidang</label>
                        <input type="text" name="bidang" class="form-control" id="bidang" value="{{ $pegawai->bidang }}" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group justify-content-start">
            <button type="submit" class="btn btn-success btn-sm" id="alert_demo_3_4">Update</button>
            <a href="{{ route('pegawai.index') }}" class="btn btn-secondary btn-sm btn-border">Batal</a>
        </div>
    </form>
</div>
@endsection
