@extends('layouts.apps')
@section('content')
<div class="container">
    <div class="container-fluid d-flex justify-content-between card-header">
        <h4 class="card-title">Daftar Transaksi</h4>
            <a href="{{ route('transaksi.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>
    </div>
    @if (session('success'))
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
                    <th>ID Detail Belanja</th>
                    <th>Nama Kegiatan</th>
                    <th>Qty</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Tanggal Transaksi</th>
                    <th>Nama Penyedia</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksis as $transaksi)
                <tr>
                    <td>{{ $transaksi->id }}</td>
                    <td>{{ $transaksi->detail_belanja_id }}</td>
                    <td>{{ $transaksi->nama_kegiatan }}</td>
                    <td>{{ $transaksi->qty }}</td>
                    <td>{{ $transaksi->satuan }}</td>
                    <td>{{ number_format($transaksi->harga, 2) }}</td>
                    <td>{{ number_format($transaksi->jumlah, 2) }}</td>
                    <td>{{ $transaksi->tanggal_transaksi }}</td>
                    <td>{{ $transaksi->nama_penyedia }}</td>
                    <td>
                        <a href="{{ route('transaksi.edit', $transaksi->uuid) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('transaksi.destroy', $transaksi->uuid) }}" method="POST" style="display:inline;" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-button btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection
