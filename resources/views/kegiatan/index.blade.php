@extends('layouts.apps')
@section('content')
<div class="container">
    <div class="container-fluid d-flex justify-content-between card-header">
      <h4 class="card-title">Data Kegiatan</h4>
        <a href="{{ route('kegiatan.create') }}" class="btn btn-primary">Tambah Kegiatan</a>
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
                        <th>Nama Kegiatan</th>
                        <th>Alokasi Dana</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kegiatans as $kegiatan)
                    <tr>
                        <td>{{ $kegiatan->id }}</td>
                        <td>{{ $kegiatan->nama_kegiatan }}</td>
                        <td>Rp {{ number_format($kegiatan->alokasi_dana, 2) }}</td>
                        <td>
                            <a href="{{ route('kegiatan.edit', $kegiatan->uuid) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('kegiatan.destroy', $kegiatan->uuid) }}" method="POST" style="display:inline;">
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