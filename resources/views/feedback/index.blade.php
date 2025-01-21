@extends('layouts.apps')
@section('content')
    <div class="container">
        <div class="container-fluid d-flex justify-content-between card-header">
            <h4 class="card-title">Data Review</h4>
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
                            <th>No</th>
                            <th>Nama</th>
                            <th>No Hp</th>
                            <th>Deskripsi</th>
                            <th>Kepuasan</th>
                            <th>Kecepatan</th>
                            <th>Kerapian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($feedback as $fd)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $fd->nama }}</td>
                                <td>{{ substr($fd->telepon, 0, -4) . '****' }}</td>
                                <td>{{ $fd->deskripsi }}</td>
                                <td>{{ $fd->kepuasan }}</td>
                                <td>{{ $fd->kecepatan }}</td>
                                <td>{{ $fd->kerapihan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
