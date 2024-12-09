@extends('layouts.apps')

@section('content')
<div class="container py-3">
    <h4 class="card-title">Tambah Data Pegawai</h4>
    <form action="{{ route('pegawai.store') }}" method="POST">
        @csrf
        <div class="container-fluid py-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="user_id">Pilih User</label>
                        <select name="user_id" id="user_id" class="form-control" required>
                            <option value="">-- Pilih User --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->username }}</option>
                            @endforeach
                        </select>
                    </div>   
                </div>            
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" name="nip" class="form-control" id="nip" value="{{ old('nip') }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="bidang">Bidang</label>
                        <input type="text" name="bidang" class="form-control" id="bidang" value="{{ old('bidang') }}" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group justify-content-start">
            <button type="submit" class="btn btn-success btn-sm" id="alert_demo_3_3">Simpan</button>
            <a href="{{ route('pegawai.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
        </div>
    </form>
</div>

@endsection
