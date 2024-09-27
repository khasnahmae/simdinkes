@extends('layouts.apps')
@section('content')
<div class="container">
    <div class="container-fluid d-flex justify-content-between card-header">
        <h4 class="card-title">Data Permintaan ATK</h4>
            <a href="{{ route('tr_atk.create') }}" class="btn btn-primary">Tambah Permintaan</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
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
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Stok Barang</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($atk as $item)
                <tr>
                    <td>{{  $loop->iteration  }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->pegawai->nama }}</td>
                    <td>{{ $item->barang->nama_barang }}</td>
                    <td>{{ $item->jumlah_barang }}</td>
                    <td>{{ $item->barang->stok }}</td>
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
                            <a href="{{ route('tr_atk.print', $item->id) }}" class="btn btn-info btn-sm">
                                </i> Cetak
                            </a>
                        @endif
                        @if($item->status === 'Pengajuan')
                            <a href="{{ route('tr_atk.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('tr_atk.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm  delete-button">Hapus</button>
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
