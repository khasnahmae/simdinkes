@extends('layouts.apps')
@section('content')
    <div class="container">
        <div class="container-fluid d-flex justify-content-between card-header">
            <h4 class="card-title">Galeri Foto Dinas Kesehatan</h4>
            <a href="{{ route('galeri.create') }}" class="btn btn-primary">Tambah Foto Galeri</a>
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
                            <th>ID</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($galeri as $gl)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $gl->foto }}
                                    <img src="{{ asset('storage/galeri/' . $gl->foto) }}" alt="Foto galeri"
                                        class="img-thumbnail" style="width: 200px;">
                                </td>
                                <td>
                                    <form action="{{ route('galeri.destroy', $gl->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete-button">Hapus</button>
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
