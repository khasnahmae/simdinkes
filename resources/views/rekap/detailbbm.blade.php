@extends('layouts.apps')

@section('content')
<div class="container">
    <div class="container-fluid  justify-content-between card-header">
        <h4 class="card-title">Detail Transaksi</h4>
    </div>
    <div class="card-body">
    <div class="table-responsive">
        <table id="basic-datatables" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>Tanggal</th>
                <th>Pegawai</th>
                <th>Nomor Polisi</th>
                <th>Nominal</th>
                <th>Tanggal Realisasi</th>
                <th>Nominal Realisasi</th>
                {{-- <th>Selisih</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($bbmDetails as $detail)
                <tr>
                    <td>{{ $detail->id }}</td>
                    <td>{{ $detail->tanggal }}</td>
                    <td>{{ $detail->pegawai->nama }}</td>
                    <td>{{ $detail->kendaraan->nopol }}</td>
                    <td>
                        @if($detail->nominal == 0)
                            Full
                        @else
                            Rp {{ number_format($detail->nominal, 2) }}
                        @endif
                    </td>
                    <td>{{ $detail->tanggal_realisasi }}</td>
                    <td>Rp {{ number_format($detail->nominal_realisasi, 2) }}</td>
                    {{-- <td>Rp {{ number_format($detail->nominal - $detail->nominal_realisasi, 2) }}</td> --}}
                </tr>
            @endforeach
        </tbody>
        </table>
        <a href="{{ route('rekap.bbm') }}" class="btn btn-outline-secondary btn-sm ">Kembali</a>
    </div>
</div>
</div>
@endsection
