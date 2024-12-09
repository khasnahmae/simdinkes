@extends('layouts.apps')
@section('content')
<div class="container">
    <div class="container-fluid  justify-content-between card-header">
        <h4 class="card-title">Detail Peminjaman Ruangan: {{ $ruangan->nama }}</h4>
    </div>
    @if($peminjaman->isEmpty())
        <!-- Jika tidak ada peminjaman -->
        <div class="alert alert-info">
            Belum ada peminjaman untuk ruangan ini.
        </div>
    @else
    <div class="card-body">
    <div class="table-responsive">
        <table id="basic-datatables" class="display table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Ruangan</th>
                    <th>Mulai</th>
                    <th>Selesai</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peminjaman as $pinjam)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pinjam->ruangan->nama }}</td>
                    <td>{{ $pinjam->mulai }}</td>
                    <td>{{ $pinjam->selesai }}</td>
                    <td>{{ $pinjam->keterangan }}</td>
                    <td>
                        @if($pinjam->mulai <= $currentTime && $pinjam->selesai >= $currentTime)
                            <span class="badge bg-danger">Sedang dipinjam oleh {{ $pinjam->user->username }}</span>
                        @elseif($pinjam->mulai > $currentTime)
                            <span class="badge bg-warning">Belum dimulai</span>
                        @else
                            <span class="badge bg-success">Selesai</span>
                        @endif
                    </td>
                    <td>
                        @if($pinjam->user_id === Auth::id()) 
                            @if($pinjam->mulai > $currentTime)
                                        <a href="{{ route('peminjaman-ruanganop.edit',  $pinjam->uuid) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('peminjaman-ruanganop.destroy',  $pinjam->uuid) }}" method="POST" style="display:inline;">
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
        <a href="{{ route('peminjaman-ruanganop.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
    </div>
</div>
@endif
</div>
@endsection
