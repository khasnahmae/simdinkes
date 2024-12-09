@extends('layouts.apps')
@section('content')
<div class="container py-3">
    <h4 class="card-title">Tambah Transaksi</h4>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf

        <div class="container-fluid py-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="detail_belanja_id" class="form-label">Detail Belanja</label>
                        <select name="detail_belanja_id" id="detail_belanja_id" class="form-control" required onchange="fetchDetailBelanjaData()">
                            <option value="">Pilih Detail Belanja</option>
                            @foreach ($detail_belanjas as $detail)
                                <option value="{{ $detail->id }}">{{ $detail->nama_kegiatan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                        <input type="text" id="nama_kegiatan" name="nama_kegiatan" class="form-control" readonly required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="satuan" class="form-label">Satuan</label>
                        <input type="text" id="satuan" name="satuan" class="form-control" readonly required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" step="0.01" id="harga" name="harga" class="form-control" required>
                        <small id="harga_alert" class="text-danger" style="display:none;">Harga melebihi anggaran!</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="qty" class="form-label">Qty</label>
                        <input type="number" name="qty" id="qty" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" step="0.01" id="jumlah" name="jumlah" class="form-control" readonly required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi</label>
                        <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nama_penyedia" class="form-label">Nama Penyedia</label>
                        <input type="text" name="nama_penyedia" id="nama_penyedia" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success btn-sm" id="alert_demo_3_3">Simpan Transaksi</button>
        <a href="{{ route('transaksi.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
    </form>
</div>

<script>
function fetchDetailBelanjaData() {
    const detailBelanjaId = document.getElementById('detail_belanja_id').value;
    
    if (detailBelanjaId) {
        fetch(`/get-detail-belanja/${detailBelanjaId}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('nama_kegiatan').value = data.nama_kegiatan;
                document.getElementById('satuan').value = data.satuan;
                document.getElementById('harga').value = ''; // Kosongkan agar diinput manual
                document.getElementById('jumlah').value = data.harga * document.getElementById('qty').value;
                // Simpan harga batas anggaran di atribut hidden
                document.getElementById('harga').setAttribute('data-max-harga', data.harga);
            });
    } else {
        document.getElementById('nama_kegiatan').value = '';
        document.getElementById('satuan').value = '';
        document.getElementById('harga').value = '';
        document.getElementById('jumlah').value = '';
    }
}

document.getElementById('harga').addEventListener('input', function() {
    const maxHarga = parseFloat(this.getAttribute('data-max-harga'));
    const inputHarga = parseFloat(this.value);

    // Cek apakah harga melebihi anggaran
    if (inputHarga > maxHarga) {
        document.getElementById('harga_alert').style.display = 'block';
        this.setCustomValidity('Harga melebihi anggaran!');
    } else {
        document.getElementById('harga_alert').style.display = 'none';
        this.setCustomValidity('');
    }

    const qty = document.getElementById('qty').value;
    document.getElementById('jumlah').value = inputHarga * qty;
});

document.getElementById('qty').addEventListener('input', function() {
    const harga = document.getElementById('harga').value;
    const qty = this.value;
    document.getElementById('jumlah').value = harga * qty;
});

</script>
@endsection
