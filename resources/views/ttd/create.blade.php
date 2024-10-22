@extends('layouts.apps')

@section('content')
<div class="container">
    <h2>Tambah Tanda Tangan</h2>

    <form action="{{ route('ttd.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_kasie">Nama Kasie</label>
            <input type="text" class="form-control" id="nama_kasie" name="nama_kasie" required>
        </div>

        <div class="form-group">
            <label for="ttd_kasie">Tanda Tangan Kasie</label>
            <input type="file" class="form-control" id="ttd_kasie" name="ttd_kasie">
        </div>

        <div class="form-group">
            <label for="nama_pimpinan">Nama Pimpinan</label>
            <input type="text" class="form-control" id="nama_pimpinan" name="nama_pimpinan" required>
        </div>

        <div class="form-group">
            <label for="ttd_pimpinan">Tanda Tangan Pimpinan</label>
            <input type="file" class="form-control" id="ttd_pimpinan" name="ttd_pimpinan">
        </div>

        <button type="submit" class="btn btn-success mt-3">Simpan</button>
    </form>
</div>
@endsection
