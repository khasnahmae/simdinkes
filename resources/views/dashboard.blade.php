@extends('layouts.apps')
@section('content')
<div class="container py-3">
    <div class="row">
        <!-- Card Jumlah Pegawai -->
        {{-- <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Pegawai</h5>
                    <p class="card-text" style="font-size: 24px;">{{ $jumlahPegawai }}</p>
                </div>
            </div>
        </div> --}}
        
        <!-- Card Jumlah Barang -->
        {{-- <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Barang</h5>
                    <p class="card-text" style="font-size: 24px;">{{ $jumlahBarang }}</p>
                </div>
            </div>
        </div> --}}

        <!-- Card Transaksi BBM Terbaru -->
        {{-- <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Transaksi BBM Terbaru</h5>
                    <p class="card-text" style="font-size: 16px;">
                        Pegawai: {{ $transaksiBbmTerbaru->pegawai->nama }}<br>
                        Kendaraan: {{ $transaksiBbmTerbaru->kendaraan->nopol }}<br>
                        Nominal: Rp {{ number_format($transaksiBbmTerbaru->nominal, 2) }}
                    </p>
                </div>
            </div>
        </div> --}}

        <!-- Card Peminjaman ATK Terbaru -->
        {{-- <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Peminjaman ATK Terbaru</h5>
                    <p class="card-text" style="font-size: 16px;">
                        Pegawai: {{ $peminjamanAtkTerbaru->pegawai->nama }}<br>
                        Barang: {{ $peminjamanAtkTerbaru->barang->nama_barang }}<br>
                        Jumlah: {{ $peminjamanAtkTerbaru->jumlah_barang }}
                    </p>
                </div>
            </div>
        </div> --}}

        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <img src="{{ asset('images/foto1.jpg') }}" class="d-block w-100" alt="Peringatan Hari Kesehatan Dunia">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="carousel-overlay"></div> <!-- Overlay Gelap -->
                        <h5 style=" font-size: 24px;">Peringatan Hari Kesehatan Dunia</h5>
                        <p style=" font-size: 16px;">Ikuti acara peringatan Hari Kesehatan Dunia pada 7 April 2024. Tema tahun ini adalah 'Kesehatan Mental untuk Semua'.</p>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="carousel-item">
                    <img src="{{ asset('images/foto2.jpg') }}" class="d-block w-100" alt="Pelatihan Kesehatan Masyarakat">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="carousel-overlay"></div> <!-- Overlay Gelap -->
                        <h5 style=" font-size: 24px;">Pelatihan Kesehatan Masyarakat</h5>
                        <p style=" font-size: 16px;">Pelatihan untuk tenaga medis pada 15 Mei 2024. Pendaftaran masih dibuka!</p>
                    </div>
                </div>
                <!-- Slide 3 -->
                <div class="carousel-item">
                    <img src="{{ asset('images/foto3.webp') }}" class="d-block w-100" alt="Pemeriksaan Kesehatan Gratis">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="carousel-overlay"></div> <!-- Overlay Gelap -->
                        <h5 style=" font-size: 24px;">Pemeriksaan Kesehatan Gratis</h5>
                        <p style=" font-size: 16px;">Jangan lewatkan pemeriksaan kesehatan gratis di Puskesmas Tegal pada 22 Juni 2024.</p>
                    </div>
                </div>
                <!-- Slide 4 -->
                <div class="carousel-item">
                    <img src="{{ asset('images/foto4.jpeg') }}" class="d-block w-100" alt="Sosialisasi Vaksinasi">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="carousel-overlay"></div> <!-- Overlay Gelap -->
                        <h5 style=" font-size: 24px;">Sosialisasi Vaksinasi</h5>
                        <p style=" font-size: 16px;">Sosialisasi mengenai pentingnya vaksinasi untuk anak-anak pada 30 Juli 2024.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    
    </div>


    <!-- Jadwal Kadis -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title">Jadwal Kadis Mendatang</h5>
                </div>
                <div class="card-body">
                    @if($jadwalKadis->isEmpty())
                        <p class="card-text">Tidak ada jadwal mendatang.</p>
                    @else
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                    <th>Keterangan</th>
                                    <th>Lokasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jadwalKadis as $jadwal)
                                    <tr>
                                        <td>{{ $jadwal->tanggal }}</td>
                                        <td>{{ $jadwal->waktu_mulai }} - {{ $jadwal->waktu_selesai }}</td>
                                        <td>{{ $jadwal->keterangan }}</td>
                                        <td>{{ $jadwal->lokasi }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

