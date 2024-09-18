@extends('layouts.apps')
@section('content')
<div class="container py-3">
    <div class="container-fluid d-flex justify-content-between">
      <h4 class="card-title">Data Barang</h4>
        <a href="{{ route('barang.create') }}" class="btn btn-primary mb-3">Tambah Data Barang</a>
    </div>
          <div class="table-responsive">
            <table
              id="basic-datatables"
              class="display table table-striped table-hover">
              <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($barang as $brg)
                <tr>
                    <td style=" font-size: 16px;">{{  $loop->iteration  }}</td>
                    <td style=" font-size: 16px;">{{ $brg->nama_barang }}</td>
                    <td style=" font-size: 16px;">{{ $brg->stok }}</td>
                    <td>
                        <a href="{{ route('barang.edit', $brg->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('barang.destroy', $brg->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger " onclick="return confirm('Apakah yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
              </tbody>
        </table>
    </div>      
</div>
@endsection

