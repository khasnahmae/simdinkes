<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Bulanan BBM</title>
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
    <h4>Rekap Permintaan BBM Bulan {{ $monthName }} {{ $year }} </h4>
    <table cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Pegawai</th>
                <th>Nomor Polisi</th>
                <th>Kendaraan</th>
                <th>Nominal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rekapBbm as $bbm)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $bbm->tanggal }}</td>
                <td>{{ $bbm->pegawai->nama }}</td>
                <td>{{ $bbm->kendaraan->nopol }}</td>
                <td>{{ $bbm->nama_kendaraan }}</td>
                <td>Rp {{ number_format($bbm->nominal, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
