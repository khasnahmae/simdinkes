@extends('layouts.apps')
@section('content')
<div class="container py-3">
    <div class="container-fluid d-flex justify-content-between">
        <h4 class="card-title">Data Pengajuan ATK</h4>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive">
        <table id="basic-datatables" class="display table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tanggal</th>
                    <th>Pegawai</th>
                    <th>Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($atk as $item)
                <tr>
                    <td style="font-size: 16px;">{{ $loop->iteration }}</td>
                    <td style="font-size: 16px;">{{ $item->tanggal }}</td>
                    <td style="font-size: 16px;">{{ $item->pegawai->nama }}</td>
                    <td style="font-size: 16px;">{{ $item->barang->nama_barang }}</td>
                    <td style="font-size: 16px;">{{ $item->jumlah_barang }}</td>
                    <td style="font-size: 16px;">{{ $item->status }}</td>
                    <td>
                        <!-- Tombol untuk menyetujui pengajuan -->
                        <form action="{{ route('atk.approve', $item->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Setujui</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
