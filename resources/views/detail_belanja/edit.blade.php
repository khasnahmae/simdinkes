@extends('layouts.apps')
@section('content')
<div class="container py-3">
    <h4 class="card-title">Edit Detail Belanja</h4>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('detail_belanja.update', $detail_belanja->uuid) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="container-fluid py-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="belanja_id">Belanja</label>
                        <select name="belanja_id" id="belanja_id" class="form-control">
                            @foreach ($belanjas as $belanja)
                                <option value="{{ $belanja->id }}" {{ $belanja->id == $detail_belanja->belanja_id ? 'selected' : '' }}>
                                    {{ $belanja->nama_belanja }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nama_kegiatan">Nama Kegiatan</label>
                        <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control" value="{{ $detail_belanja->nama_kegiatan }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="qty">Qty</label>
                        <input type="number" name="qty" id="qty" class="form-control" value="{{ $detail_belanja->qty }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <input type="text" name="satuan" id="satuan" class="form-control" value="{{ $detail_belanja->satuan }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" step="0.01" name="harga" id="harga" class="form-control" value="{{ $detail_belanja->harga }}">
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success btn-sm" id="alert_demo_3_4">Update</button>
        <a href="{{ route('detail_belanja.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
    </form>
</div>
@endsection
