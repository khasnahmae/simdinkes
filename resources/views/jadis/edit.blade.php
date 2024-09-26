@extends('layouts.apps')
@section('content')
<div class="container py-3">
    <h4 class="card-title">Tambah Data Kendaraan</h4>
        <form action="{{ route('jadis.update', $jadwal_kadis->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="container-fluid py-3">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tgl_mulai">Tanggal Mulai</label>
                            <input type="date" name="tgl_mulai" class="form-control" value="{{ $jadwal_kadis->tgl_mulai }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tgl_selesai">Tanggal Selesai</label>
                            <input type="date" name="tgl_selesai" class="form-control" value="{{ $jadwal_kadis->tgl_selesai }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <input type="text" name="lokasi" class="form-control" value="{{ $jadwal_kadis->lokasi }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" class="form-control" required>{{ $jadwal_kadis->keterangan }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success" id="alert_demo_3_4" >Update</button>
            <a href="{{ route('jadis.index') }}" class="btn btn-secondary btn-border">Batal</a>
        </form>
    </div>
@endsection