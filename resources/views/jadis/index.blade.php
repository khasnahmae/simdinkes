@extends('layouts.apps')
@section('content')
<div class="container">
    <div class="container-fluid d-flex justify-content-between card-header">
      <h4 class="card-title">Jadwal Kadis</h4>
        <a href="{{ route('jadis.create') }}" class="btn btn-primary">Tambah Jadwal Kadis</a>
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
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Keterangan</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($jadwal_kadis as $jadwal)
                <tr>
                    <td>{{  $loop->iteration  }}</td>
                    <td>{{ $jadwal->tgl_mulai }}</td>
                    <td>{{ $jadwal->tgl_selesai }}</td>
                    <td>{{ $jadwal->keterangan }}</td>
                    <td>{{ $jadwal->lokasi }}</td>
                    <td>
                        <a href="{{ route('jadis.edit', $jadwal->uuid) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('jadis.destroy', $jadwal->uuid) }}" method="POST" style="display:inline;">
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

