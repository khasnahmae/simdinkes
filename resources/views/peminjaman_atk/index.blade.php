@extends('layouts.apps')
@section('content')
<div class="container py-3">
    <div class="container-fluid d-flex justify-content-between">
        <h4 class="card-title">Data Peminjaman ATK</h4>
            <a href="{{ route('peminjaman_atk.create') }}" class="btn btn-primary mb-3">Tambah Peminjaman</a>
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
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peminjaman_atk as $item)
                <tr>
                    <td style=" font-size: 16px;">{{  $loop->iteration  }}</td>
                    <td style=" font-size: 16px;">{{ $item->tanggal }}</td>
                    <td style=" font-size: 16px;">{{ $item->pegawai->nama }}</td>
                    <td style=" font-size: 16px;">{{ $item->barang->nama_barang }}</td>
                    <td style=" font-size: 16px;">{{ $item->jumlah_barang }}</td>
                    <td style="font-size: 16px;">{{ $item->status }}</td>
                    <td>
                        @if($item->status === 'Disetujui')
                            <a href="{{ route('peminjaman_atk.print', $item->id) }}" class="btn btn-info btn-sm">
                                <i class="fa fa-print"></i> Cetak
                            </a>
                        @endif
                        <a href="{{ route('peminjaman_atk.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('peminjaman_atk.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
