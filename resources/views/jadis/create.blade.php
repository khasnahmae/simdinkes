@extends('layouts.apps')
@section('content')
<div class="container py-3">
    <h4 class="card-title">Tambah Jadwal Kadis</h4>
        <form action="{{ route('jadis.store') }}" method="POST">
            @csrf
            <div class="container-fluid py-3">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tgl_mulai">Tanggal Mulai</label>
                            <input type="date" name="tgl_mulai" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tgl_selesai">Tanggal Selesai</label>
                            <input type="date" name="tgl_selesai" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <input type="text" name="lokasi" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success btn-sm" id="alert_demo_3_3" >Simpan</button>
            <a href="{{ route('jadis.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
        </form>
    </div>
@endsection