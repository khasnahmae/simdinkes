@extends('layouts.apps')

@section('content')
<div class="container py-3">
    <h4 class="card-title">Buat Peminjaman Ruangan Baru</h4>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('peminjaman-ruanganop.store') }}" method="POST">
        @csrf
        <div class="container-fluid py-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="ruangan_id" class="form-label">Pilih Ruangan</label>
                        <select name="ruangan_id" class="form-select" required>
                            <option value=""> Pilih Ruangan </option>
                            @foreach($ruangan as $rg)
                                <option value="{{ $rg->id }}">{{ $rg->nama }}</option>
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
            <a href="{{ route('peminjaman-ruanganop.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
        </div>
    </form>
</div>
@endsection
