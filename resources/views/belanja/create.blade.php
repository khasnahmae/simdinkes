@extends('layouts.apps')
@section('content')
<div class="container py-3">
    <h4 class="card-title">Tambah Belanja</h4>
    <form action="{{ route('belanja.store') }}" method="POST">
        @csrf
        <div class="container-fluid py-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id">Kode Belanja (ID):</label>
                        <input type="text" name="id" class="form-control" id="id" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="kegiatan_id" class="form-label">ID Kegiatan</label>
                        <select name="kegiatan_id" class="form-control" required>
                            <option value="">Pilih ID Kegiatan</option>
                            @foreach($kegiatan as $kg)
                                <option value="{{ $kg->id }}">{{ $kg->id }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nama_belanja">Nama Belanja:</label>
                        <input type="text" name="nama_belanja" class="form-control" id="nama_belanja" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="alokasi_dana">Alokasi Dana:</label>
                        <input type="number" step="0.01" name="alokasi_dana" class="form-control" id="alokasi_dana" required>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success btn-sm" id="alert_demo_3_3">Simpan</button>
        <a href="{{ route('belanja.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
    </form>
</div>
@endsection

