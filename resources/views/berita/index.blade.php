@extends('layouts.apps')
@section('content')
<div class="container">
    <div class="container-fluid d-flex justify-content-between card-header">
      <h4 class="card-title">Data Berita</h4>
        <a href="{{ route('berita.create') }}" class="btn btn-primary">Tambah Data Berita</a>
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
                    <th>Judul</th>
                    <th>Subjudul</th>
                    <th>Isi</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($berita as $brt)
                <tr>
                    <td>{{  $loop->iteration  }}</td>
                    <td>{{ $brt->judul }}</td>
                    <td>{{ $brt->subjudul }}</td>
                    <td>{{ $brt->isi }}</td>
                    <td>{{ $brt->foto }}
                      <img src="{{ asset('storage/berita/' . $brt->foto) }}" alt="Foto Berita" class="img-thumbnail" style="width: 200px;">
                    </td>
                    <td>
                        <a href="{{ route('berita.edit', $brt->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('berita.destroy', $brt->id) }}" method="POST" style="display:inline;">
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

