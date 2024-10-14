@extends('layouts.apps')
@section('content')
<div class="container py-3">
    <h4 class="card-title">Edit Permintaan ATK</h4>
    <form action="{{ route('tr_atk.update', $atk->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="container-fluid py-3">
            <div class="row">
                {{-- <div class="col-md-4">
                    <div class="form-group">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="datetime-local" name="tanggal" class="form-control" value="{{ $atk->tanggal }}" required>
                    </div>
                </div> --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="pegawai_id" class="form-label">Pegawai</label>
                        <select name="pegawai_id" class="form-control" required>
                            @foreach($pegawai as $pg)
                                <option value="{{ $pg->id }}" {{ $atk->pegawai_id == $pg->id ? 'selected' : '' }}>
                                    {{ $pg->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="barang_id" class="form-label">Barang</label>
                        <select name="barang_id" class="form-control" required>
                            @foreach($barang as $br)
                                <option value="{{ $br->id }}" {{ $atk->barang_id == $br->id ? 'selected' : '' }}>
                                    {{ $br->nama_barang }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                        <input type="number" name="jumlah_barang" class="form-control" value="{{ $atk->jumlah_barang }}" required>
                    </div>
                </div>
            </div>
        </div>
            <button type="submit" class="btn btn-success btn-sm" id="alert_demo_3_4">Update</button>
            <a href="{{ route('tr_atk.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
        </form>
</div>
@endsection
