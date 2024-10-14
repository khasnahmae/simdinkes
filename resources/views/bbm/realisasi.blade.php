@extends('layouts.apps')
@section('content')
<div class="container py-3">
    <h4 class="card-title">Realisasi Pengajuan BBM</h4>

    <form action="{{ route('bbm.submitRealisasi', $bbm->uuid) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid py-3">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nominal_realisasi">Nominal Realisasi</label>
                    <input type="number" step="0.01" name="nominal_realisasi" id="nominal_realisasi" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="bukti_transaksi">Bukti Transaksi</label>
                    <input type="file" name="bukti_transaksi" id="bukti_transaksi" class="form-control" required>
                </div>
            </div>
        </div>
        </div>
        <button type="submit" class="btn btn-success btn-sm" id="alert_demo_3_3">Simpan Realisasi</button>
        <a href="{{ route('bbm.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
    </form>
</div>
@endsection
