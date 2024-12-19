@extends('layouts.apps')
@section('content')
<div class="container">
    <div class="container-fluid d-flex justify-content-between card-header">
        <h4 class="card-title">Daftar Peminjaman Kendaraan</h4>
        <a href="{{ route('peminjaman-kendaraanop.create') }}" class="btn btn-primary">Buat Peminjaman Baru</a>
        <a href="{{ route('peminjaman-kendaraanop.detail') }}" class="btn btn-info">Lihat Detail</a>

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
                        <th>Kendaraan</th>
                        <th>Pegawai</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Keterangan</th>
                        {{-- <th>Status</th> --}}
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($peminjamanAktif as $pinjam)
                        <tr>
                            <td>{{ $pinjam->kendaraan->nopol }}</td>
                            <td>{{ $pinjam->pegawai->nama }}</td>
                            <td>{{ $pinjam->mulai }}</td>
                            <td>{{ $pinjam->selesai }}</td>
                            <td>{{ $pinjam->keterangan }}</td>
                            {{-- <td>
                                @if($pinjam->mulai <= $currentTime && $pinjam->selesai >= $currentTime)
                                    <span class="badge bg-danger">Sedang dipinjam oleh {{ $pinjam->pegawai->nama }}</span>
                                @elseif($pinjam->mulai > $currentTime)
                                    <span class="badge bg-warning">Belum dimulai</span>
                                @else
                                    <span class="badge bg-success">Selesai</span>
                                @endif
                            </td> --}}
                            <td>
                                @if($pinjam->pegawai->user->id === Auth::id()) 
                                    @if($pinjam->mulai > $currentTime)
                                        <a href="{{ route('peminjaman-kendaraanop.edit',  $pinjam->uuid) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('peminjaman-kendaraanop.destroy',  $pinjam->uuid) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm delete-button">Hapus</button>
                                        </form>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
