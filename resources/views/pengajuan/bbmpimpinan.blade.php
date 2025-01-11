@extends('layouts.apps')
@section('content')
    <div class="container">
        <div class="container-fluid d-flex justify-content-between card-header">
            <h4 class="card-title">Data Pengajuan BBM</h4>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Berhasil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{-- notifikasi akan tampil di dalam modal ini --}}
                    <div class="modal-body">
                        {{ session('success') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="warningModal" tabindex="-1" role="dialog" aria-labelledby="warningModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="warningModalLabel">Peringatan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ session('warning') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>Pegawai</th>
                            <th>Kendaraan</th>
                            <th>Nama Kendaraan</th>
                            <th>Nominal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bbm as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->pegawai->nama }}</td>
                                <td>{{ $item->kendaraan->nopol }}</td>
                                <td>{{ $item->nama_kendaraan }}</td>
                                <td>
                                    @if ($item->nominal == 0)
                                        Full
                                    @else
                                        Rp {{ number_format($item->nominal, 2) }}
                                    @endif
                                </td>
                                <td>
                                    @if ($item->status === 'Disetujui Kasie')
                                        <span class="badge bg-primary">Disetujui Kasie</span>
                                    @elseif ($item->status == 'Disetujui Pimpinan')
                                        <span class="badge bg-success">Disetujui Pimpinan</span>
                                    @elseif ($item->status == 'Ditolak')
                                        <span class="badge bg-danger">Ditolak</span>
                                    @elseif ($item->status == 'Ditolak oleh Pimpinan')
                                        <span class="badge bg-danger">Ditolak Pimpinan</span>
                                    @else
                                        <span class="badge bg-warning">Pengajuan</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->status === 'Disetujui Kasie')
                                        <!-- Tombol untuk menyetujui pengajuan -->
                                        <form action="{{ route('bbm.approve2', $item->uuid) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary btn-sm">Setujui</button>
                                        </form>
                                        <!-- Tombol untuk menolak pengajuan -->
                                        <form action="{{ route('bbm.reject2', $item->uuid) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                                        </form>
                                    @else
                                        <button class="btn btn-sm btn-secondary" disabled>Sudah Disetujui</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        @endif

        @if (session('warning'))
            Swal.fire({
                icon: 'warning',
                title: 'Peringatan',
                text: '{{ session('warning') }}',
                confirmButtonText: 'OK'
            });
        @endif
    </script>
@endsection
