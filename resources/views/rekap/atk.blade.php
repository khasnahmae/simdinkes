@extends('layouts.apps')
@section('content')
<div class="container py-3">
    <div class="container-fluid  justify-content-between">
        <h4 class="card-title mb-3">Rekap Permintaan ATK</h4>
        <form action="{{ route('rekap.atk') }}" method="GET" class="mb-3">
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
                    <button type="submit" class="btn btn-primary ">Tampilkan</button>
                    <a href="{{ route('rekap.downloadatk', ['month' => request('month'), 'year' => request('year')]) }}" class="btn btn-success"><i class="bi bi-filetype-pdf me-1"></i>PDF</a>
                    <a href="{{ route('rekap.excelatk', ['month' => request('month'), 'year' => request('year')]) }}" class="btn btn-success "><i class="bi bi-file-earmark-excel-fill me-1"></i></i>Excel</a>
                </div>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table id="basic-datatables" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Jumlah Transaksi</th>
                <th>Total Jumlah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rekapAtk as $item)
                <tr>
                    <td>{{ $item->barang->nama_barang }}</td>
                    <td>{{ $item->total_permintaan }}</td>
                    <td>{{ $item->total_jumlah }}</td>
                    <td>
                        <a href="{{ route('rekap.detailatk', ['id' => $item->barang_id]) }}" class="btn btn-info btn-sm">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection
