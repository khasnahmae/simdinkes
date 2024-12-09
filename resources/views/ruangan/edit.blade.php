@extends('layouts.apps')
@section('content')
<div class="container py-3">
    <h4 class="card-title">Edit Data Barang</h4>
    <form action="{{ route('ruangan.update', $ruangan->uuid) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="container-fluid py-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nama">Nama Ruangan</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="{{ $ruangan->nama }}" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group justify-content-start">
            <button type="submit" class="btn btn-success btn-sm" id="alert_demo_3_4">Update</button>
            <a href="{{ route('ruangan.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
        </div>
    </form>
</div>
@endsection
