@extends('layouts.apps')
@section('content')
<div class="container py-3">
    <h4 class="card-title">Tambah User</h4>
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
            <div class="container-fluid py-3">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group position-relative">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                            <i class="fas fa-eye position-absolute d-none" id="togglePassword" style="right: 20px; top: 50px; cursor: pointer;"></i>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select name="level" class="form-control" id="level" required>
                                <option value="admin">Admin</option>
                                <option value="operator">Operator</option>
                                <option value="pemimpin">Pemimpin</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>        
                <button type="submit" class="btn btn-success btn-sm" id="alert_demo_3_3">Simpan</button>
                <a href="{{ route('user.index') }}" class="btn btn-secondary btn-sm btn-border">Batal</a>
            </form>
        </div>
@endsection