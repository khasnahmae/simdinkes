@extends('layouts.apps')

@section('content')
<div class="container py-3">
    <div class="container-fluid  justify-content-between">
        <h4 class="card-title mb-3">Detail Transaksi</h4>
    </div>
    <div class="table-responsive">
        <table id="basic-datatables" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>Tanggal</th>
                <th>Pegawai</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($atkDetails as $detail)
                <tr>
                    <td>{{ $detail->id }}</td>
                    <td>{{ $detail->tanggal }}</td>
                    <td>{{ $detail->pegawai->nama }}</td>
                    <td>{{ $detail->jumlah_barang }}</td>
                </tr>
            @endforeach
        </tbody>
        </table>
        <a href="{{ route('rekap.atk') }}" class="btn btn-primary mt-3">Kembali</a>
    </div>
</div>
@endsection
