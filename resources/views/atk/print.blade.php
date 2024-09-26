<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERMINTAAN ATK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
        td {
            font-size: 16px;
        }
        th {
            background-color: #f2f2f2;
        }
        h4 {
            text-align: left; /* Menjaga judul rata kiri */
        }
        .footer {
            display: flex; /* Menggunakan flexbox untuk footer */
            /* justify-content: flex-start; Mengatur agar kolom rata kiri */
            margin-top: 30px; /* Memberikan jarak yang cukup dari konten atas */
            margin-left: 20px;
            margin-right: 20px;
            padding: 20px 0; /* Menambahkan padding pada footer */
        }
        .footer .col {
            display: inline-block; /* Membuat kolom hug kontennya */
            text-align: center; /* Mengatur teks di tengah kolom */
            margin-right: 50px; /* Menambahkan margin kanan antar kolom */
        }
        .footer .col:last-child {
            margin-right: 0; /* Menghapus margin kanan kolom terakhir */
        }
        @media print {
            .footer {
                page-break-before: always; /* Memastikan footer tidak terputus saat dicetak */
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
        <h4>PERMINTAAN ATK <br> DINAS KESEHATAN KOTA TEGAL</h4>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Pegawai</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $atk->id }}</td>
                    <td>{{ $atk->barang->nama_barang }}</td>
                    <td>{{ $atk->jumlah_barang }}</td>
                    <td>{{ $atk->pegawai->nama }}</td>
                </tr>
            </tbody>
        </table>
        <div class="footer">
            <div class="col">
                <h5>Yang meminta</h5>
                <br><br>
                <h5>{{ Auth::user()->username }} <br> ( <span style="display:inline-block; width:150px; border-bottom:1px solid black;">&nbsp;</span> )</h5>
            </div>
            <div class="col">
                <h5>Mengetahui <br> Kassubag/Kasie <br> 
                    <img src="{{ public_path('storage/img/ttd1.png') }}" alt="Tanda Tangan" style="width: auto; height: 80px; display: block; "> <br>
                    ( <span style="display:inline-block; width:150px; border-bottom:1px solid black;">&nbsp;</span> )
                </h5>
            </div>
            <div class="col">
                <h5 style="text-align: left;">Tegal, {{ $bbm->tanggal }} <br> Disetujui <br> 
                    <img src="{{ public_path('storage/img/foto4.jpeg') }}" alt="Tanda Tangan" style="width: 120px; height: auto; display: block; "> <br>
                    ( <span style="display:inline-block; width:150px; border-bottom:1px solid black;">&nbsp;</span> )
                </h5>
            </div>
        </div>                       
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
