@extends('layouts.apps')
@section('content')
<div class="container">
    <div class="container-fluid d-flex justify-content-between card-header">
        <h4 class="card-title">Data Permintaan BBM</h4>
        <a href="{{ route('bbm.create') }}" class="btn btn-primary">Tambah Permintaan BBM</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card-body">
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
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->pegawai->nama }}</td>
                    <td>{{ $item->kendaraan->nopol }}</td>
                    <td>{{ $item->nama_kendaraan }}</td>
                    <td>{{ $item->jenis_bbm }}</td>
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
                        @if($item->status === 'Disetujui Pimpinan' && $item->realisasi === 'Menunggu Realisasi')
                            <a href="{{ route('bbm.print', $item->uuid) }}" class="btn btn-secondary btn-sm">
                                Cetak
                            </a>
                            <!-- Tombol untuk melakukan realisasi -->
                            <form action="{{ route('bbm.realisasi', $item->uuid) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-primary btn-sm">Realisasi</button>
                            </form>
                        @endif
                        @if($item->realisasi === 'Sudah Direalisasi')
                        <form action="{{ route('bbm.editrealisasi', $item->uuid) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-warning btn-sm"> Edit Realisasi</button>
                        </form>
                        @endif
                        @if($item->status === 'Pengajuan')
                            <a href="{{ route('bbm.edit', $item->uuid) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('bbm.destroy', $item->uuid) }}" method="POST" style="display:inline-block;">
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
</div>
@endsection
