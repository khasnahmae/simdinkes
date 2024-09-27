@extends('layouts.apps')
@section('content')
<div class="container ">
    <div class="container-fluid d-flex justify-content-between card-header">
      <h4 class="card-title">Data Kendaraan</h4>
        <a href="{{ route('kendaraan.create') }}" class="btn btn-primary ">Tambah Data Kendaraan</a>
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
                    <th>Nomor Polisi</th>
                    <th>Nama Kendaraan</th>
                    <th>Jenis</th>
                    <th>Tipe</th>
                    <th>Tahun</th>
                    <th>Warna</th>
                    <th>No Rangka</th>
                    <th>No Mesin</th>
                    <th>Jenis BBM</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($kendaraan as $knd)
                <tr>
                    <td>{{  $loop->iteration  }}</td>
                    <td>{{ $knd->nopol }}</td>
                    <td>{{ $knd->nama_kendaraan }}</td>
                    <td>{{ $knd->jenis }}</td>
                    <td>{{ $knd->tipe }}</td>
                    <td>{{ $knd->tahun }}</td>
                    <td>{{ $knd->warna }}</td>
                    <td>{{ $knd->no_rangka }}</td>
                    <td>{{ $knd->no_mesin }}</td>
                    <td>{{ $knd->jenis_bbm }}</td>
                    <td>
                      {{-- <div class="form-button-action">
                        <button type="button" data-bs-toggle="tooltip" title="Edit" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">    
                          <a href="{{ route('kendaraan.edit', $knd->id) }}"></a>
                          <i class="fa fa-edit"></i>
                        </button>
                          <i class="fa fa-times"></i>
                          <form action="{{ route('kendaraan.destroy', $knd->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" data-bs-toggle="tooltip" title="Hapus" class="btn btn-link btn-danger delete-button"></button>
                        </form>
                      </div> --}}
                        <a href="{{ route('kendaraan.edit', $knd->id) }}" class="btn btn-link btn-info" data-bs-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                        <form action="{{ route('kendaraan.destroy', $knd->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link btn-danger delete-button" data-bs-toggle="tooltip" title="Hapus"><i class="fa fa-times"></i></button>
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

