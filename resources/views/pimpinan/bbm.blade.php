@extends('layouts.apps')
@section('content')
<div class="container py-3">
    <div class="container-fluid d-flex justify-content-between">
        <h4 class="card-title">Data Pengajuan BBM</h4>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive">
        <table id="basic-datatables" class="display table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tanggal</th>
                    <th>Pegawai</th>
                    <th>Kendaraan</th>
                    <th>Nama Kendaraan</th>
                    <th>Nominal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bbm as $item)
                <tr>
                    <td style="font-size: 16px;">{{ $loop->iteration }}</td>
                    <td style="font-size: 16px;">{{ $item->tanggal }}</td>
                    <td style="font-size: 16px;">{{ $item->pegawai->nama }}</td>
                    <td style="font-size: 16px;">{{ $item->kendaraan->nopol }}</td>
                    <td style="font-size: 16px;">{{ $item->nama_kendaraan }}</td>
                    <td style="font-size: 16px;">{{ $item->nominal }}</td>
                    <td style="font-size: 16px;">{{ $item->status }}</td>
                    <td>
                        <!-- Tombol untuk menyetujui pengajuan -->
                        <form action="{{ route('bbm.approve', $item->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">Setujui</button>
                        </form>
                        <!-- Tombol untuk menolak pengajuan -->
                        <form action="{{ route('bbm.reject', $item->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
