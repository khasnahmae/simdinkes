@extends('layouts.apps')
@section('content')
<div class="container">
    <div class="container-fluid d-flex justify-content-between card-header">
      <h4 class="card-title">Data Siswa</h4>
        <a href="{{ route('siswa.create') }}" class="btn btn-primary">Tambah Siswa</a>
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
                    <th>No</th>
                    <th>Nama</th>
                    <th>Sekolah</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($siswa as $ssw)
                <tr>
                    <td>{{  $loop->iteration  }}</td>
                    <td>{{ $ssw->nama }}</td>
                    <td>{{ $ssw->sekolah }}</td>
                    <td>
                        <a href="{{ route('siswa.edit', $ssw->uuid) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('siswa.show', $ssw->uuid) }}" class="btn btn-info btn-sm">Detail</a>
                        <form action="{{ route('siswa.destroy', $ssw->id) }}" method="POST" style="display:inline;">
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