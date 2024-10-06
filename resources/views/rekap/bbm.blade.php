@extends('layouts.apps')
@section('content')
<div class="container">
    <div class="container-fluid  justify-content-between card-header">
        <h4 class="card-title">Rekap Permintaan BBM</h4>
        <form action="{{ route('rekap.bbm') }}" method="GET">
            <div class="row">
                <div class="col-md-3">
                    <select name="month" class="form-control">
                        @for ($m = 1; $m <= 12; $m++)
                            <option value="{{ $m }}" {{ $m == old('month', date('m')) ? 'selected' : '' }}>
                                {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                            </option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="year" class="form-control">
                        @for ($y = date('Y'); $y >= 2000; $y--)
                            <option value="{{ $y }}" {{ $y == old('year', date('Y')) ? 'selected' : '' }}>
                                {{ $y }}
                            </option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary btn-sm">Tampilkan</button>
                    <a href="{{ route('rekap.downloadbbm', ['month' => request('month'), 'year' => request('year')]) }}" class="btn btn-info btn-sm"><i class="bi bi-filetype-pdf me-1"></i>PDF</a>
                    <a href="{{ route('rekap.excelbbm', ['month' => request('month'), 'year' => request('year')]) }}" class="btn btn-success btn-sm"><i class="bi bi-file-earmark-excel-fill me-1"></i>Excel</a>
                </div>
            </div>
        </form>
    </div>
    <div class="card-body">
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
                    <td>Rp {{ number_format($item->total_nominal, 2) }}</td>
                    <td>
                        <a href="{{ route('rekap.detailbbm', ['uuid' => $item->nopol]) }}" class="btn btn-info btn-sm">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
</div>
@endsection
