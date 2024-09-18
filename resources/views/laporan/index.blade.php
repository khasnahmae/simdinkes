@extends('layouts.apps')

@section('content')
<div class="container py-3">
    <h4 class="card-title">Laporan Bulanan</h4>

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('laporan.download') }}" class="btn btn-primary">Download PDF</a>
    </div>

    <!-- Tabel Laporan ATK -->
    <h5>Laporan Permintaan ATK Bulanan</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Pegawai</th>
                <th>Barang</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporanAtk as $atk)
            <tr>
                <td>{{ $atk->id }}</td>
                <td>{{ $atk->tanggal }}</td>
                <td>{{ $atk->pegawai->nama }}</td>
                <td>{{ $atk->barang->nama_barang }}</td>
                <td>{{ $atk->jumlah_barang }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Tabel Laporan BBM -->
    <h5>Laporan Permintaan BBM Bulanan</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Pegawai</th>
                <th>Kendaraan</th>
                <th>Nominal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporanBbm as $bbm)
            <tr>
                <td>{{ $bbm->id }}</td>
                <td>{{ $bbm->tanggal }}</td>
                <td>{{ $bbm->pegawai->nama }}</td>
                <td>{{ $bbm->nama_kendaraan }}</td>
                <td>{{ $bbm->nominal }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
