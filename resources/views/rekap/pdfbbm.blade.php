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
        tfoot td {
        border-top: 2px solid black; /* Untuk menegaskan garis di bagian bawah */
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
                <th>Tanggal Realisasi</th>
                <th>Nominal Realisasi</th>
                {{-- <th>Selisih</th> --}}
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
                <td>{{ $bbm->tanggal_realisasi }}</td>
                <td>Rp {{ number_format($bbm->nominal_realisasi, 2) }}</td>
                {{-- <td>Rp {{ number_format($bbm->nominal - $bbm->nominal_realisasi, 2) }}</td> --}}
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5"><strong>Total</strong></td>
                <td><strong>{{ number_format($totalNominal, 0, ',', '.') }}</strong></td> <!-- Total Nominal -->
                <td colspan="1"><strong>Total</strong></td>
                <td><strong>{{ number_format($totalRealisasi, 0, ',', '.') }}</strong></td> <!-- Total Nominal Realisasi -->
                {{-- <td><strong>{{ number_format($totalNominal - $totalRealisasi, 0, ',', '.') }}</strong></td> <!-- Total selisih --> --}}
            </tr>
        </tfoot>
    </table>
</body>
</html>
