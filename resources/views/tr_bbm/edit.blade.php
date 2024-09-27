@extends('layouts.apps')
@section('content')
<div class="container py-3">
    <h4 class="card-title">Edit Permintaan BBM</h4>
    <form action="{{ route('tr_bbm.update', $bbm->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="container-fluid py-3">
            <div class="row">
                {{-- <div class="col-md-4">
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="datetime-local" name="tanggal" class="form-control" id="tanggal" value="{{ $bbm->tanggal }}" required>
                    </div>
                </div> --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="pegawai_id">Pegawai</label>
                        <select name="pegawai_id" class="form-control" id="pegawai_id" required>
                            @foreach($pegawai as $pg)
                                <option value="{{ $pg->id }}" {{ $pg->id == $bbm->pegawai_id ? 'selected' : '' }}>{{ $pg->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nopol">Kendaraan</label>
                        <select name="nopol" class="form-control" id="nopol" required>
                            <option value="">Pilih Kendaraan</option>
                            @foreach($kendaraan as $kn)
                                <option value="{{ $kn->id }}" {{ $kn->id == $bbm->nopol ? 'selected' : '' }}>{{ $kn->nopol }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nama_kendaraan">Nama Kendaraan</label>
                        <input type="text" name="nama_kendaraan" class="form-control" id="nama_kendaraan" value="{{ $bbm->nama_kendaraan }}" readonly required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="jenis_bbm">Jenis BBM</label>
                        <input type="text" name="jenis_bbm" class="form-control" id="jenis_bbm" value="{{ $bbm->jenis_bbm }}" readonly required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nominal">Nominal</label>
                        <input type="number" name="nominal" class="form-control" id="nominal" step="0.01" value="{{ $bbm->nominal }}" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group justify-content-start">
            <button type="submit" class="btn btn-success btn-sm" id="alert_demo_3_4">Update</button>
            <a href="{{ route('tr_bbm.index') }}" class="btn btn-secondary btn-sm btn-border">Batal</a>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var kendaraanData = @json($kendaraan); // Mendapatkan data kendaraan dari Blade
    var nopolSelect = document.getElementById('nopol');
    var namaKendaraanInput = document.getElementById('nama_kendaraan');

    function updateNamaKendaraan() {
        var selectedNopol = nopolSelect.value;
        var selectedKendaraan = kendaraanData.find(function (kendaraan) {
            return kendaraan.id == selectedNopol;
        });
        if (selectedKendaraan) {
            namaKendaraanInput.value = selectedKendaraan.nama_kendaraan;
        } else {
            namaKendaraanInput.value = '';
        }
    }

    nopolSelect.addEventListener('change', updateNamaKendaraan);
    updateNamaKendaraan();
});
</script>
@endsection
