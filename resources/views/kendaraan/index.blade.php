@extends('layouts.apps')
@section('content')
<div class="container py-3">
    <div class="container-fluid d-flex justify-content-between">
      <h4 class="card-title">Data Kendaraan</h4>
        <a href="{{ route('kendaraan.create') }}" class="btn btn-primary mb-3">Tambah Data Kendaraan</a>
    </div>
          <div class="table-responsive">
            <table
              id="basic-datatables"
              class="display table table-striped table-hover">
              <thead>
                <tr>
                    <th>ID</th>
                    <th>Nomor Polisi</th>
                    <th>Nama Kendaraan</th>
                    <th>Jenis</th>
                    <th>Tahun</th>
                    <th>Warna</th>
                    <th>No Rangka</th>
                    <th>No Mesin</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($kendaraan as $knd)
                <tr>
                    <td style=" font-size: 16px;">{{  $loop->iteration  }}</td>
                    <td style=" font-size: 16px;">{{ $knd->nopol }}</td>
                    <td style=" font-size: 16px;">{{ $knd->nama_kendaraan }}</td>
                    <td style=" font-size: 16px;">{{ $knd->jenis }}</td>
                    <td style=" font-size: 16px;">{{ $knd->tahun }}</td>
                    <td style=" font-size: 16px;">{{ $knd->warna }}</td>
                    <td style=" font-size: 16px;">{{ $knd->no_rangka }}</td>
                    <td style=" font-size: 16px;">{{ $knd->no_mesin }}</td>
                    <td>
                        <a href="{{ route('kendaraan.edit', $knd->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('kendaraan.destroy', $knd->id) }}" method="POST" style="display:inline;">
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

