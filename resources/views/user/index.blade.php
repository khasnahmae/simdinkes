@extends('layouts.apps')
@section('content')
<div class="container py-3">
    <div class="container-fluid d-flex justify-content-between">
      <h4 class="card-title">Data User</h4>
        <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Tambah User</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
          <div class="table-responsive">
            <table
              id="basic-datatables"
              class="display table table-striped table-hover">
              <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{  $loop->iteration  }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->level }}</td>
                    <td>
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-button">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
              </tbody>
        </table>
    </div>      
</div>
@endsection

