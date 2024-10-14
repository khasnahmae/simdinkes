@extends('layouts.apps')

@section('content')
<div class="container py-3">
    <h4 class="card-title">Buat Peminjaman Kendaraan Baru</h4>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('peminjaman-kendaraan.store') }}" method="POST">
        @csrf
        <div class="container-fluid py-3">
            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="pegawai_id" class="form-label">Pilih Pegawai</label>
                        <select name="pegawai_id" class="form-select" required>
                            <option value=""> Pilih Pegawai </option>
                            @foreach($pegawai as $p)
                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="kendaraan_id" class="form-label">Pilih Kendaraan</label>
                        <select name="kendaraan_id" class="form-select" required>
                            <option value=""> Pilih Kendaraan </option>
                            @foreach($kendaraan as $k)
                                <option value="{{ $k->id }}">{{ $k->nopol }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="mulai" class="form-label">Tanggal Mulai</label>
                        <input type="datetime-local" name="mulai" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="selesai" class="form-label">Tanggal Selesai</label>
                        <input type="datetime-local" name="selesai" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group justify-content-start">
            <button type="submit" class="btn btn-success btn-sm" >Simpan</button>
            <a href="{{ route('peminjaman-kendaraan.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
        </div>
    </form>
</div>
@endsection
