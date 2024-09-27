@extends('layouts.apps')

@section('content')
<div class="container">
    <div class="container-fluid  justify-content-between card-header">
        <h4 class="card-title">Detail Transaksi</h4>
    </div>
    <div class="card-body">
    <div class="table-responsive">
        <table id="basic-datatables" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>Tanggal</th>
                <th>Pegawai</th>
                <th>Nomor Polisi</th>
                <th>Nominal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bbmDetails as $detail)
                <tr>
                    <td>{{ $detail->id }}</td>
                    <td>{{ $detail->tanggal }}</td>
                    <td>{{ $detail->pegawai->nama }}</td>
                    <td>{{ $detail->kendaraan->nopol }}</td>
                    <td>{{ $detail->nominal }}</td>
                </tr>
            @endforeach
        </tbody>
        </table>
        <a href="{{ route('rekap.bbm') }}" class="btn btn-primary btn-sm mt-3">Kembali</a>
    </div>
</div>
</div>
@endsection
