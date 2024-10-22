@extends('layouts.apps')
@section('content')
<div class="container">
    <div class="container-fluid d-flex justify-content-between card-header">
        <h4 class="card-title">Pengaturan Tanda Tangan</h4>
        <a href="{{ route('ttd.edit', $ttd->id) }}" class="btn btn-primary">Edit Tanda Tangan</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card-body">
        <div class="row">
            @if($ttd)
            <div class="col">
                <p class="h6"><strong>Nama Kasie: {{ $ttd->nama_kasie }}</strong></p>
                <img src="{{ asset('storage/' . str_replace('public/', '', $ttd->ttd_kasie)) }}" alt="Tanda Tangan Kasie" style="width: auto; height: 80px;">
            </div>
            <div class="col">
                <p class="h6"><strong>Nama Pimpinan: {{ $ttd->nama_pimpinan }}</strong></p>
                <img src="{{ asset('storage/' . str_replace('public/', '', $ttd->ttd_pimpinan)) }}" alt="Tanda Tangan Pimpinan" style="width: auto; height: 80px;">
            </div> 
            @else
                <p>Belum ada data tanda tangan.</p>
                <a href="{{ route('ttd.create') }}" class="btn btn-success mt-4">Tambah Tanda Tangan</a>
            @endif
        </div>
    </div>
</div>
@endsection
