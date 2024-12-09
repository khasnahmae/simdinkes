@extends('layouts.apps')

@section('content')
<div class="container">
    <div class="container-fluid d-flex justify-content-between card-header">
        <h4 class="card-title">Daftar Detail Belanja</h4>
        <a href="{{ route('detail_belanja.create') }}" class="btn btn-primary mb-3">Tambah Detail Belanja</a>
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
                    <th>ID Belanja</th>
                    <th>Nama Kegiatan</th>
                    <th>Qty</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail_belanjas as $index => $detail)
                    <tr>
                        <td>{{ $detail->id  }}</td>
                        <td>{{ $detail->belanja_id }}</td>
                        <td>{{ $detail->nama_kegiatan }}</td>
                        <td>{{ $detail->qty }}</td>
                        <td>{{ $detail->satuan }}</td>
                        <td>{{ number_format($detail->harga, 2) }}</td>
                        <td>{{ number_format($detail->jumlah, 2) }}</td>
                        <td>
                            <a href="{{ route('detail_belanja.edit', $detail->uuid) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('detail_belanja.destroy', $detail->uuid) }}" method="POST" style="display:inline;">
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
