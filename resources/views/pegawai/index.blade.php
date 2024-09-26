@extends('layouts.apps')
@section('content')
<div class="container py-3">
    <div class="container-fluid d-flex justify-content-between">
      <h4 class="card-title">Data Pegawai</h4>
        <a href="{{ route('pegawai.create') }}" class="btn btn-primary mb-3">Tambah Data Pegawai</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
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
                @foreach ($pegawai as $key => $item)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->bidang }}</td>
                    <td>{{ $item->nip }}</td>
                    <td>
                        <a href="{{ route('pegawai.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('pegawai.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-button">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
              </tbody>
        </table>
    </div>      
</div>
@endsection

