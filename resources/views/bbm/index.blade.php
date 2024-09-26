@extends('layouts.apps')
@section('content')
<div class="container py-3">
    <div class="container-fluid d-flex justify-content-between">
        <h4 class="card-title">Data Permintaan BBM</h4>
        <a href="{{ route('bbm.create') }}" class="btn btn-primary mb-3">Tambah Permintaan BBM</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive">
        <table
          id="basic-datatables"
          class="display table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tanggal</th>
                    <th>Pegawai</th>
                    <th>Kendaraan</th>
                    <th>Nama Kendaraan</th>
                    <th>Jenis BBM</th>
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
                    <td>{{ $item->jenis_bbm }}</td>
                    <td>{{ $item->nominal }}</td>
                    <td>
                        @if($item->status === 'Disetujui')
                            <span class="badge bg-primary">Disetujui</span>
                        @elseif ($item->status == 'Ditolak')
                            <span class="badge bg-danger">Ditolak</span>
                        @else
                            <span class="badge bg-warning">Pengajuan</span>
                        @endif
                    </td>
                    <td>
                        @if($item->status === 'Disetujui')
                            <a href="{{ route('bbm.print', $item->id) }}" class="btn btn-info btn-sm">
                                Cetak
                            </a>
                        @endif
                        @if($item->status === 'Pengajuan')
                            <a href="{{ route('bbm.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('bbm.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm delete-button">Hapus</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
