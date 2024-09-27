@extends('layouts.apps')
@section('content')
<div class="container py-3">
    <h4 class="card-title">Tambah Permintaan ATK</h4>
    <form action="{{ route('atk.store') }}" method="POST">
        @csrf
        <div class="container-fluid py-3">
            <div class="row">
                {{-- <div class="col-md-4"> --}}
                    {{-- <div class="form-group">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="datetime-local" name="tanggal" class="form-control" required>
                    </div> --}}
                {{-- </div> --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="pegawai_id" class="form-label">Pegawai</label>
                        <select name="pegawai_id" class="form-control" required>
                            <option value="">Pilih Pegawai</option>
                            @foreach($pegawai as $pg)
                                <option value="{{ $pg->id }}">{{ $pg->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="barang_id" class="form-label">Barang</label>
                        <select name="barang_id" class="form-control" required>
                            <option value="">Pilih Barang</option>
                            @foreach($barang as $br)
                                <option value="{{ $br->id }}">{{ $br->nama_barang }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                        <input type="number" name="jumlah_barang" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>
            <button type="submit" class="btn btn-success btn-sm" id="alert_demo_3_3">Simpan</button>
            <a href="{{ route('atk.index') }}" class="btn btn-secondary btn-border btn-sm">Batal</a>
    </form>
</div>
@endsection
