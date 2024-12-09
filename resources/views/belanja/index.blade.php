@extends('layouts.apps')
@section('content')
<div class="container">
    <div class="container-fluid d-flex justify-content-between card-header">
      <h4 class="card-title">Data Belanja</h4>
        <a href="{{ route('belanja.create') }}" class="btn btn-primary">Tambah Belanja</a>
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
                        <th>ID Kegiatan</th>
                        <th>Nama Belanja</th>
                        <th>Alokasi Dana</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($belanjas as $belanja)
                    <tr>
                        <td>{{ $belanja->id }}</td>
                        <td>{{ $belanja->kegiatan_id }}</td>
                        <td>{{ $belanja->nama_belanja }}</td>
                        <td>Rp {{ number_format($belanja->alokasi_dana, 2) }}</td>
                        <td>
                            <a href="{{ route('belanja.edit', $belanja->uuid) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('belanja.destroy', $belanja->uuid) }}" method="POST" style="display:inline;">
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