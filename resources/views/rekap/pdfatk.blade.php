<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Bulanan ATK</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h4>Rekap Permintaan ATK Bulan {{ $monthName }} {{ $year }}</h4>
    <table cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Pegawai</th>
                <th>Barang</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rekapAtk as $atk)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $atk->tanggal }}</td>
                <td>{{ $atk->pegawai->nama }}</td>
                <td>{{ $atk->barang->nama_barang }}</td>
                <td>{{ $atk->jumlah_barang }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
