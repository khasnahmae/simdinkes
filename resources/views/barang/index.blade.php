@extends('layouts.apps')
@section('content')
<div class="container">
    <div class="container-fluid d-flex justify-content-between card-header">
      <h4 class="card-title">Data Barang</h4>
        <a href="{{ route('barang.create') }}" class="btn btn-primary">Tambah Data Barang</a>
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
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($barang as $brg)
                <tr>
                    <td>{{  $loop->iteration  }}</td>
                    <td>{{ $brg->nama_barang }}</td>
                    <td>
                      {{ $brg->stok }}
                      <!-- Tampilkan peringatan jika stok hampir habis -->
                      @if($brg->warning)
                        <span class="badge badge-danger">Hampir Habis, Restok Segera!</span>
                      @endif
                    </td>
                    <td>
                        <a href="{{ route('barang.edit', $brg->uuid) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('barang.destroy', $brg->uuid) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm delete-button">Hapus</button>
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

