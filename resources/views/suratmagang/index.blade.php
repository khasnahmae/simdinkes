@extends('layouts.apps')
@section('content')
<div class="container">
    <div class="container-fluid d-flex justify-content-between card-header">
        <h4 class="card-title">Data Surat Magang</h4>
        <a href="{{ route('suratmagang.create') }}" class="btn btn-primary">Tambah File Surat Magang</a>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="card-body">
        <div class="table-responsive">
            <table id="basic-datatables" class="display table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama Kampus</th>
                        <th>File Surat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($suratmagang as $sm)
                    <tr>
                        <td>{{ $sm->id }}</td>
                        <td>{{ $sm->nama_kampus }}</td>
                        <td><a href="{{ asset('storage/suratmagang/' . $sm->file_surat) }}" target="_blank">Lihat Surat</a></td>
                        <td>
                            <a href="{{ route('suratmagang.edit', $sm->uuid) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('suratmagang.destroy', $sm->uuid) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm  delete-button">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection