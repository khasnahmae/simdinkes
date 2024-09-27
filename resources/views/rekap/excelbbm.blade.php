<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Pegawai</th>
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
            <td>{{ $bbm->nama_kendaraan }}</td>
            <td>Rp {{ number_format($bbm->nominal, 2) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>