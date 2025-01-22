@extends('layouts.apps')
@section('content')
    <div class="container">
        <div class="container-fluid d-flex justify-content-between card-header">
            <h4 class="card-title">Daftar Peminjaman Ruangan</h4>
            <a href="{{ route('peminjaman-ruangan.create') }}" class="btn btn-primary">Buat Peminjaman Baru</a>
            <a href="{{ route('peminjaman-ruangan.detail') }}" class="btn btn-info">Lihat Detail</a>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Ruangan</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminjamanAktif as $pinjam)
                            <tr>
                                <td>{{ $pinjam->ruangan->nama }}</td>
                                <td>{{ $pinjam->mulai }}</td>
                                <td>{{ $pinjam->selesai }}</td>
                                <td>{{ $pinjam->keterangan }}</td>
                                <td>
                                    @if ($pinjam->mulai > $currentTime)
                                        <a href="{{ route('peminjaman-ruangan.edit', $pinjam->uuid) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('peminjaman-ruangan.destroy', $pinjam->uuid) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-danger btn-sm delete-button">Hapus</button>
                                        </form>
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
