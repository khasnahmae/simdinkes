<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Bulanan</title>
</head>
<body>
    <h1>Laporan Permintaan ATK Bulanan</h1>
    <table border="1" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Pegawai</th>
                <th>Barang</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporanAtk as $atk)
            <tr>
                <td>{{ $atk->id }}</td>
                <td>{{ $atk->tanggal }}</td>
                <td>{{ $atk->pegawai->nama }}</td>
                <td>{{ $atk->barang->nama_barang }}</td>
                <td>{{ $atk->jumlah_barang }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h1>Laporan Permintaan BBM Bulanan</h1>
    <table border="1" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Pegawai</th>
                <th>Kendaraan</th>
                <th>Nominal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporanBbm as $bbm)
            <tr>
                <td>{{ $bbm->id }}</td>
                <td>{{ $bbm->tanggal }}</td>
                <td>{{ $bbm->pegawai->nama }}</td>
                <td>{{ $bbm->nama_kendaraan }}</td>
                <td>{{ $bbm->nominal }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
