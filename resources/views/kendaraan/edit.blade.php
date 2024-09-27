@extends('layouts.apps')
@section('content')
<div class="container py-3">
    <h4 class="card-title">Tambah Data Kendaraan</h4>
    <form action="{{ route('kendaraan.update', $kendaraan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="container-fluid py-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nopol">Nomor Polisi</label>
                        <input type="text" name="nopol" class="form-control" id="nopol" value="{{ $kendaraan->nopol }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nama_kendaraan">Nama Kendaraan</label>
                        <input type="text" name="nama_kendaraan" class="form-control" id="nama_kendaraan" value="{{ $kendaraan->nama_kendaraan }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <input type="text" name="jenis" class="form-control" id="jenis" value="{{ $kendaraan->jenis }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tipe">Tipe</label>
                        <input type="text" name="tipe" class="form-control" id="tipe" value="{{ $kendaraan->tipe }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input type="text" name="tahun" class="form-control" id="tahun" value="{{ $kendaraan->tahun }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="warna">Warna</label>
                        <input type="text" name="warna" class="form-control" id="warna" value="{{ $kendaraan->warna }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="no_rangka">No Rangka</label>
                        <input type="text" name="no_rangka" class="form-control" id="no_rangka" value="{{ $kendaraan->no_rangka }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="no_mesin">No Mesin</label>
                        <input type="text" name="no_mesin" class="form-control" id="no_mesin" value="{{ $kendaraan->no_mesin }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="jenis_bbm">Jenis BBM</label>
                        <input type="text" name="jenis_bbm" class="form-control" id="jenis_bbm" value="{{ $kendaraan->jenis_bbm }}" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group justify-content-start">
            <button type="submit" class="btn btn-success btn-sm" id="alert_demo_3_4">Update</button>
            <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary btn-sm btn-border">Batal</a>
        </div>
    </form>
</div>
@endsection
