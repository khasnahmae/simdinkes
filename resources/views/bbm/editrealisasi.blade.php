@extends('layouts.apps')
@section('content')
<div class="container py-3">
    <h4 class="card-title">Realisasi Pengajuan BBM</h4>

    <form action="{{ route('bbm.updateRealisasi', $bbm->uuid) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid py-3">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="id">ID</label>
                    <input type="text" name="id" class="form-control" id="id" value="{{ $bbm->id }}" readonly required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nopol">Nopol</label>
                    <input type="text" name="nopol" class="form-control" id="nopol" value="{{ $bbm->kendaraan->nopol }}" readonly required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="pegawai_id">Nama Pegawai</label>
                    <input type="text" name="pegawai_id" class="form-control" id="pegawai_id" value="{{ $bbm->pegawai->nama }}" readonly required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nominal_realisasi">Nominal Realisasi</label>
                    <input type="number" step="0.01" name="nominal_realisasi" id="nominal_realisasi" class="form-control" value="{{ $bbm->nominal_realisasi }}" required>
                </div>
            </div>
        </div>
        </div>
        <button type="submit" class="btn btn-success btn-sm" id="alert_demo_3_3">Update Realisasi</button>
        <a href="{{ route('bbm.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
    </form>
</div>
@endsection
