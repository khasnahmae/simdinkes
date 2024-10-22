@extends('layouts.apps')

@section('content')
<div class="container py-3">
    <h4 class="card-title">Edit Tanda Tangan</h4>

    <form action="{{ route('ttd.update', $ttd->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container-fluid py-3">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_kasie">Nama Kasie</label>
                        <input type="text" class="form-control" id="nama_kasie" name="nama_kasie" value="{{ $ttd->nama_kasie }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ttd_kasie">Tanda Tangan Kasie (Jika ingin diubah)</label>
                        <input type="file" class="form-control" id="ttd_kasie" name="ttd_kasie">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_pimpinan">Nama Pimpinan</label>
                        <input type="text" class="form-control" id="nama_pimpinan" name="nama_pimpinan" value="{{ $ttd->nama_pimpinan }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ttd_pimpinan">Tanda Tangan Pimpinan (Jika ingin diubah)</label>
                        <input type="file" class="form-control" id="ttd_pimpinan" name="ttd_pimpinan">
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success btn-sm" id="alert_demo_3_4">Update</button>
        <a href="{{ route('ttd.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>

    </form>
</div>
@endsection
