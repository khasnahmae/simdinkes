@extends('layouts.apps')
@section('content')
<div class="container py-3">
    <div class="container-fluid  justify-content-between">
        <h4 class="card-title mb-3">Rekap Permintaan BBM</h4>
        <form action="{{ route('rekap.bbm') }}" method="GET" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <select name="month" class="form-control">
                        @for ($m = 1; $m <= 12; $m++)
                            <option value="{{ $m }}" {{ $m == old('month', date('m')) ? 'selected' : '' }}>
                                {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                            </option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-4">
                    <select name="year" class="form-control">
                        @for ($y = date('Y'); $y >= 2000; $y--)
                            <option value="{{ $y }}" {{ $y == old('year', date('Y')) ? 'selected' : '' }}>
                                {{ $y }}
                            </option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                    <a href="{{ route('rekap.downloadbbm', ['month' => request('month'), 'year' => request('year')]) }}" class="btn btn-success">Download</a>
                </div>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table id="basic-datatables" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th>Nomor Polisi</th>
                <th>Jumlah Transaksi</th>
                <th>Total Nominal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rekapBbm as $item)
                <tr>
                    <td>{{ $item->kendaraan->nopol }}</td>
                    <td>{{ $item->total_transaksi }}</td>
                    <td>{{ $item->total_nominal }}</td>
                    <td>
                        <a href="{{ route('rekap.detailbbm', ['id' => $item->nopol]) }}" class="btn btn-info btn-sm">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection
