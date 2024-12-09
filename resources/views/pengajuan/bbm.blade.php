@extends('layouts.apps')
@section('content')
<div class="container">
    <div class="container-fluid d-flex justify-content-between card-header">
        <h4 class="card-title">Data Pengajuan BBM</h4>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card-body">
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
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->pegawai->nama }}</td>
                    <td>{{ $item->kendaraan->nopol }}</td>
                    <td>{{ $item->nama_kendaraan }}</td>
                    <td>
                        @if($item->nominal == 0)
                                Full
                            @else
                                Rp {{ number_format($item->nominal, 2) }}
                            @endif
                    </td>
                    <td>
                        @if($item->status === 'Disetujui Kasie')
                            <span class="badge bg-primary">Disetujui Kasie</span>
                        @elseif ($item->status == 'Disetujui Pimpinan')
                            <span class="badge bg-success">Disetujui Pimpinan</span>
                        @elseif ($item->status == 'Ditolak')
                            <span class="badge bg-danger">Ditolak</span>
                        @elseif ($item->status == 'Ditolak oleh Pimpinan')
                            <span class="badge bg-danger">Ditolak Pimpinan</span>
                        @else
                            <span class="badge bg-warning">Pengajuan</span>
                        @endif
                    </td>
                    <td>
                        @if($item->status === 'Pengajuan')
                        <!-- Tombol untuk menyetujui pengajuan -->
                        <form action="{{ route('bbm.approve', $item->uuid) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">Setujui</button>
                        </form>
                        <!-- Tombol untuk menolak pengajuan -->
                        <form action="{{ route('bbm.reject', $item->uuid) }}" method="POST" style="display: inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                        </form>
                        @else
                            <button class="btn btn-sm btn-secondary" disabled>Sudah Disetujui</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection
