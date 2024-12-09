@extends('layouts.apps')
@section('content')
<div class="container">
    <div class="container-fluid d-flex justify-content-between card-header">
      <h4 class="card-title">Data Ruangan</h4>
        <a href="{{ route('ruangan.create') }}" class="btn btn-primary">Tambah Data Ruangan</a>
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
                    <th>Nama Ruangan</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($ruangan as $rg)
                <tr>
                    <td>{{  $rg->id  }}</td>
                    <td>{{ $rg->nama }}</td>
                    <td>
                        <a href="{{ route('ruangan.edit', $rg->uuid) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('ruangan.destroy', $rg->uuid) }}" method="POST" style="display:inline;">
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

