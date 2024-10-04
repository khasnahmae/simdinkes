@extends('layouts.apps')
@section('content')
<div class="container">
    <div class="container-fluid d-flex justify-content-between card-header">
      <h4 class="card-title">Data Pegawai</h4>
        <a href="{{ route('pegawai.create') }}" class="btn btn-primary">Tambah Data Pegawai</a>
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
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Bidang</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pegawai as $item)
                <tr>
                    <td>{{ $loop -> iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->nip}}</td>
                    <td>{{ $item->bidang }}</td>
                    <td>
                        <a href="{{ route('pegawai.edit', $item->uuid) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pegawai.destroy', $item->uuid) }}" method="POST" style="display:inline;">
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

