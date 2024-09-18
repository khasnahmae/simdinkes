<!-- resources/views/bbm/print.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Permintaan ATK</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: auto;
        }
        .header, .footer {
            text-align: center;
        }
        .content {
            margin-top: 20px;
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
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Permintaan ATK</h1>
        </div>
        <div class="content">
            <h2>Detail Permintaan ATK</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <td>{{ $atk->id }}</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>{{ $atk->tanggal }}</td>
                </tr>
                <tr>
                    <th>Pegawai</th>
                    <td>{{ $atk->pegawai->nama }}</td>
                </tr>
                <tr>
                    <th>Barang</th>
                    <td>{{ $atk->barang->nama_barang }}</td>
                </tr>
                <tr>
                    <th>Jumlah Barang</th>
                    <td>{{ $atk->jumlah_barang }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $atk->status }}</td>
                </tr>
            </table>
        </div>
        <div class="footer">
            <p>Terima kasih atas perhatian Anda.</p>
        </div>
    </div>
</body>
</html>
