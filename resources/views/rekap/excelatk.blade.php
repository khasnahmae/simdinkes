<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Tanggal</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Pegawai</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rekapAtk as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->barang->nama_barang }}</td>
                <td>{{ $item->jumlah_barang }}</td>
                <td>{{ $item->pegawai->nama }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
