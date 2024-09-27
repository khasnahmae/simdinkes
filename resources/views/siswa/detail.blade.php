@extends('layouts.apps')
@section('content')
<div class="container py-3">
    <h4 class="card-title">Detail Data Siswa</h4>

    {{-- Tampilkan detail siswa --}}
        <div class="card-header mx-4 my-2">
            <h5><strong>{{ $siswa->nama }}</strong></h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <table cellspacing="0" cellpadding="10" class="table table-hover">
                        <tbody>
                            <tr>
                                <th><strong>NIM</strong></th>
                                <td>{{ $siswa->nim }}</td>
                            </tr>
                            <tr>
                                <th><strong>Kelas</strong></th>
                                <td>{{ $siswa->kelas }}</td>
                            </tr>
                            <tr>
                                <th><strong>Semester</strong></th>
                                <td>{{ $siswa->semester }}</td>
                            </tr>
                            <tr>
                                <th><strong>Sekolah</strong></th>
                                <td>{{ $siswa->sekolah }}</td>
                            </tr>
                            <tr>
                                <th><strong>Tanggal Mulai PKL</strong></th>
                                <td>{{ $siswa->tgl_mulai_pkl }}</td>
                            </tr>
                            <tr>
                                <th><strong>Tanggal Selesai PKL</strong></th>
                                <td>{{ $siswa->tgl_selesai_pkl }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    @if ($siswa->foto)
                        <img src="{{ asset('storage/siswa/' . $siswa->foto) }}" alt="Foto Siswa" class="img-thumbnail" style="width: 200px;">
                    @else
                        <p>Tidak ada foto</p>
                    @endif
                </div>
            </div>
    </div>
        {{-- Tombol kembali ke daftar siswa --}}
        <div class="mb-3">
            <a href="{{ route('siswa.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
    </div>
</div>
@endsection
