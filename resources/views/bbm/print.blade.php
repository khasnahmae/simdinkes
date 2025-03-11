<!-- resources/views/bbm/print.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERMINTAAN BBM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        td {
            font-size: 16px;
        }

        th {
            background-color: #f2f2f2;
        }

        .header-table {
            width: 100%;
        }

        .header-table td {
            padding: 0;
            vertical-align: top;
        }

        .footer {
            display: flex;
            margin-top: 30px;
            margin-left: 20px;
            margin-right: 20px;
            padding: 20px 0;
        }

        .footer .col {
            display: inline-block;
            text-align: center;
            margin-right: 50px;
        }

        .footer .col:last-child {
            margin-right: 0;
            /* Menghapus margin kanan kolom terakhir */
        }

        @media print {
            .footer {
                page-break-before: always;
                /* Memastikan footer tidak terputus saat dicetak */
            }

            img {
                display: block !important;
                max-width: 100% !important;
                height: auto !important;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <table class="header-table" style="border: none;">
            <tr style="border: none;">
                <td style="text-align: left; border: none;">
                    <h4>PERMINTAAN BBM <br> DINAS KESEHATAN KOTA TEGAL</h4>
                </td>
                <td style="text-align: center; border: none;">
                    <h4>{{ $bbm->id }}</h4>
                </td>
            </tr>
        </table>
        <table>
            <thead>
                <tr>
                    <th>Kendaraan</th>
                    <th>Jenis BBM</th>
                    <th>Nominal</th>
                    <th>Pegawai</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $bbm->kendaraan->nopol }}</td>
                    <td>{{ $bbm->kendaraan->jenis_bbm }}</td>
                    <td>
                        @if ($bbm->nominal == 0)
                            Full
                        @else
                            Rp {{ number_format($bbm->nominal, 2) }}
                        @endif
                    </td>
                    <td>{{ $bbm->pegawai->nama }}</td>
                </tr>
            </tbody>
        </table>
        <div class="footer">
            <div class="col">
                <h5>Yang meminta</h5>
                <br><br>
                <h5>{{ $bbm->pegawai->nama }} <br> ( <span
                        style="display:inline-block; width:150px; border-bottom:1px solid black;">&nbsp;</span> )</h5>
            </div>
            <div class="col">
                <h5>Mengetahui <br> Kassubag/Kasie <br>
                    @if ($ttd && $ttd->ttd_kasie)
                        <img src="{{ public_path('storage/img/' . $ttd->ttd_kasie) }}" alt="Tanda Tangan Kasie"
                            style="width: auto; height: 80px; display: block;"> <br>
                    @else
                        <p>Tanda Tangan Kasie tidak terseda.</p>
                    @endif
                    {{ $ttd->nama_kasie ?? 'Nama Kasie tidak tersedia.' }} <br>
                    ( <span style="display:inline-block; width:150px; border-bottom:1px solid black;">&nbsp;</span> )
                </h5>
            </div>
            <div class="col">
                <h5>Tegal, {{ $bbm->tanggal }} <br> Disetujui <br>
                    @if ($ttd && $ttd->ttd_pimpinan)
                        <img src="{{ public_path('storage/img/' . $ttd->ttd_pimpinan) }}" alt="Tanda Tangan Pimpinan"
                            style="width: auto; height: 80px; display: block;"> <br>
                    @else
                        <p>Tanda Tangan Pimpinan tidak tersedia.</p>
                    @endif
                    {{ $ttd->nama_pimpinan ?? 'Nama Pimpinan tidak tersedia.' }} <br>
                    ( <span style="display:inline-block; width:150px; border-bottom:1px solid black;">&nbsp;</span> )
                </h5>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
