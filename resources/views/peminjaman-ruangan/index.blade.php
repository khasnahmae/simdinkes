@extends('layouts.apps')
@section('content')
<div class="container">
    <div class="container-fluid d-flex justify-content-between card-header">
        <h4 class="card-title">Daftar Peminjaman Ruangan</h4>
        <a href="{{ route('peminjaman-ruangan.create') }}" class="btn btn-primary">Buat Peminjaman Baru</a>
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
                        <th>No</th>
                        <th>Nama Ruangan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ruangan as $rg)
                        @php
                            // Mencari apakah kendaraan ini sedang dipinjam (berdasarkan waktu sekarang)
                            $status = 'Available';
                            $peminjamanId = null; // Menyimpan ID peminjaman untuk edit dan hapus
                            foreach($peminjamanAktif as $peminjaman) {
                                if ($peminjaman->ruangan_id == $rg->id) {
                                    $status = 'Booked';
                                    $peminjamanId = $peminjaman->uuid; // Simpan UUID peminjaman
                                    break;
                                }
                            }
                        @endphp
                        <tr>
                            <td>{{ $rg->id }}</td>
                            <td>{{ $rg->nama }}</td>
                            <td>
                                @if($status === 'Booked')
                                    <span class="badge bg-danger">Sedang Dipinjam</span>
                                @else
                                    <span class="badge bg-success">Tersedia</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('peminjaman-ruangan.show', $rg->uuid) }}" class="btn btn-info btn-sm">Detail</a> <!-- Tombol Detail -->                                      
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
