@extends('layouts.apps')

@section('content')
<div class="container py-3">
    <h4 class="card-title">Edit Peminjaman Kendaraan</h4>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('peminjaman-kendaraanop.update', $peminjaman->uuid) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="container-fluid py-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="kendaraan_id" class="form-label">Pilih Kendaraan</label>
                        <select name="kendaraan_id" class="form-select" required>
                            @foreach($kendaraan as $k)
                                <option value="{{ $k->id }}" {{ $k->id == $peminjaman->kendaraan_id ? 'selected' : '' }}>{{ $k->nopol }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="mulai" class="form-label">Tanggal Mulai</label>
                        <input type="datetime-local" name="mulai" class="form-control" value="{{ $peminjaman->mulai }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="selesai" class="form-label">Tanggal Selesai</label>
                        <input type="datetime-local" name="selesai" class="form-control" value="{{ $peminjaman->selesai }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" value="{{ $peminjaman->keterangan }}" required>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success btn-sm" id="alert_demo_3_4">Update</button>
        <a href="{{ route('peminjaman-kendaraanop.index')  }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
    </form>
</div>
@endsection
