@extends('layouts.apps')
@section('content')
<div class="container py-3">
    <div class="container-fluid d-flex justify-content-between">
      <h4 class="card-title">Jadwal Kadis</h4>
        <a href="{{ route('jadis.create') }}" class="btn btn-primary mb-3">Tambah Jadwal Kadis</a>
    </div>
          <div class="table-responsive">
            <table
              id="basic-datatables"
              class="display table table-striped table-hover">
              <thead>
                <tr>
                    <th>ID</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Waktu</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($jadwal_kadis as $jadwal)
                <tr>
                    <td style=" font-size: 16px;">{{  $loop->iteration  }}</td>
                    <td style=" font-size: 16px;">{{ $jadwal->tanggal }}</td>
                    <td style=" font-size: 16px;">{{ $jadwal->keterangan }}</td>
                    <td style=" font-size: 16px;">{{ $jadwal->waktu_mulai }} - {{ $jadwal->waktu_selesai }}</td>
                    <td style=" font-size: 16px;">{{ $jadwal->lokasi }}</td>
                    <td>
                        <a href="{{ route('jadis.edit', $jadwal->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('jadis.destroy', $jadwal->id) }}" method="POST" style="display:inline;">
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

