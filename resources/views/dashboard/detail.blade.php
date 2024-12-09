@extends('layouts.apps')

@section('content')
<div class="container">
    <div class="container-fluid d-flex justify-content-between card-header">
        <h4 class="card-title">Detail Transaksi : {{ $belanja->nama_belanja }}</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
          <table id="basic-datatables" class="display table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID transaksi</th>
                    <th>Nama Kegiatan</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($belanja->detail_belanja as $detail)
                    @foreach ($detail->transaksi as $transaksi)
                        <tr>
                            <td>{{ $transaksi->id }}</td>
                            <td>{{ $detail->nama_kegiatan }}</td>
                            <td>{{ number_format($transaksi->jumlah, 2) }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>         
          </table>
          <a href="{{ route('dashboard.index') }}" class="btn btn-outline-secondary btn-sm ">Kembali</a>
        </div>
    </div>
</div>
@endsection
