@extends('layouts.apps')
@section('content')
<div class="container py-3">
    <!-- Jadwal Kadis -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="card-title">Jadwal Kadis Mendatang</div>
                </div>
                <div class="card-body">
                    @if($jadwalKadis->isEmpty())
                        <p class="card-text">Tidak ada jadwal mendatang.</p>
                    @else
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Keterangan</th>
                                    <th>Lokasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jadwalKadis as $jadwal)
                                    <tr>
                                        <td>{{ $jadwal->tgl_mulai }}</td>
                                        <td>{{ $jadwal->tgl_selesai }}</td>
                                        <td>{{ $jadwal->keterangan }}</td>
                                        <td>{{ $jadwal->lokasi }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="card-title">Kendaraan yang Sedang Dipinjam</div>
                </div>
                <div class="card-body">
                    @if($kendaraanDipinjam->isEmpty())
                        <p class="card-text">Tidak ada kendaraan yang sedang dipinjam.</p>
                    @else
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Kendaraan</th>
                                    <th>Pegawai</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kendaraanDipinjam as $pinjam)
                                    <tr>
                                        <td>{{ $pinjam->kendaraan->nopol }}</td>
                                        <td>{{ $pinjam->pegawai->nama }}</td>
                                        <td>{{ $pinjam->mulai }}</td>
                                        <td>{{ $pinjam->selesai }}</td>
                                        <td>{{ $pinjam->keterangan }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Statistik Permintaan BBM</div>
                        <div class="card-tools">
                            <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                                <span class="btn-label">
                                    <i class="fa fa-pencil"></i>
                                </span>
                                Export
                            </a>
                            <a href="#" class="btn btn-label-info btn-round btn-sm">
                                <span class="btn-label">
                                    <i class="fa fa-print"></i>
                                </span>
                                Print
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container" style="min-height: 300px">
                        <canvas id="statisticsChart"></canvas>
                    </div>
                    <div id="myChartLegend"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Statistik Permintaan ATK</div>
                        <div class="card-tools">
                            <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                                <span class="btn-label">
                                    <i class="fa fa-pencil"></i>
                                </span>
                                Export
                            </a>
                            <a href="#" class="btn btn-label-info btn-round btn-sm">
                                <span class="btn-label">
                                    <i class="fa fa-print"></i>
                                </span>
                                Print
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container" style="min-height: 250px">
                        <canvas id="statisticsChartAtk"></canvas>
                    </div>
                    <div id="myChartLegend"></div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <!-- Widget 1: Total Pegawai -->
        <div class="col-sm-6 col-md-4">
            <div class="card card-stats card-primary card-round">
              <div class="card-body">
                <div class="row">
                  <div class="col-5">
                    <div class="icon-big text-center">
                      <i class="fas fa-users"></i>
                    </div>
                  </div>
                  <div class="col-7 col-stats">
                    <div class="numbers">
                      <p class="card-category">Total Pegawai</p>
                      <h4 class="card-title">{{ $jumlahPegawai }}</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    
        <!-- Widget 2: Total Permintaan BBM di Bulan Ini -->
        <div class="col-sm-6 col-md-4">
            <div class="card card-stats card-info card-round">
              <div class="card-body">
                <div class="row">
                  <div class="col-5">
                    <div class="icon-big text-center">
                        <i class="fas fa-gas-pump text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-stats">
                    <div class="numbers">
                      <p class="card-category">BBM Disetujui</p>
                      <h4 class="card-title">Rp {{ number_format($totalBbm, 0, ',', '.') }}</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    
        <!-- Widget 3: Total Permintaan ATK di Bulan Ini -->
        <div class="col-sm-6 col-md-4">
            <div class="card card-stats card-secondary card-round">
            <div class="card-body">
                <div class="row">
                <div class="col-5">
                    <div class="icon-big text-center">
                        <i class="fas fa-boxes text-success"></i>
                    </div>
                </div>
                <div class="col-7 col-stats">
                    <div class="numbers">
                    <p class="card-category">ATK Disetujui</p>
                    <h4 class="card-title">{{ $totalAtk }} Barang</h4>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>

    {{-- <div class="row">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="10000"> <!-- 10000 ms = 10 detik -->
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <img src="{{ asset('images/foto1.jpg') }}" class="d-block w-100" alt="Peringatan Hari Kesehatan Dunia">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="carousel-overlay"></div> <!-- Overlay Gelap -->
                        <h5 style=" font-size: 18px;">Peringatan Hari Kesehatan Dunia</h5>
                        <p style=" font-size: 12px;">Ikuti acara peringatan Hari Kesehatan Dunia pada 7 April 2024. Tema tahun ini adalah 'Kesehatan Mental untuk Semua'.</p>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="carousel-item">
                    <img src="{{ asset('images/foto2.jpg') }}" class="d-block w-100" alt="Pelatihan Kesehatan Masyarakat">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="carousel-overlay"></div> <!-- Overlay Gelap -->
                        <h5 style=" font-size: 18px;">Pelatihan Kesehatan Masyarakat</h5>
                        <p style=" font-size: 12px;">Pelatihan untuk tenaga medis pada 15 Mei 2024. Pendaftaran masih dibuka!</p>
                    </div>
                </div>
                <!-- Slide 3 -->
                <div class="carousel-item">
                    <img src="{{ asset('images/foto3.webp') }}" class="d-block w-100" alt="Pemeriksaan Kesehatan Gratis">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="carousel-overlay"></div> <!-- Overlay Gelap -->
                        <h5 style=" font-size: 18px;">Pemeriksaan Kesehatan Gratis</h5>
                        <p style=" font-size: 12px;">Jangan lewatkan pemeriksaan kesehatan gratis di Puskesmas Tegal pada 22 Juni 2024.</p>
                    </div>
                </div>
                <!-- Slide 4 -->
                <div class="carousel-item">
                    <img src="{{ asset('images/foto4.jpeg') }}" class="d-block w-100" alt="Sosialisasi Vaksinasi">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="carousel-overlay"></div> <!-- Overlay Gelap -->
                        <h5 style=" font-size: 18px;">Sosialisasi Vaksinasi</h5>
                        <p style=" font-size: 12px;">Sosialisasi mengenai pentingnya vaksinasi untuk anak-anak pada 30 Juli 2024.</p>
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
    
    </div> --}}

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('statisticsChart').getContext('2d');
        var statisticsChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'], // Label bulan
                datasets: @json($datasets) // Data untuk setiap kendaraan dengan warna yang berbeda
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    },
                    x: {
                        type: 'category',
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] // Sinkronisasi label
                    }
                }
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('statisticsChartAtk').getContext('2d');
        var statisticsChartAtk = new Chart(ctx, {
            type: 'radar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'], // Label bulan
                datasets: @json($datasetsatk) // Data untuk setiap barang dengan warna yang berbeda
            },
            options: {
                responsive: true,
                scales: {
                    r: { // Konfigurasi khusus untuk radar chart
                        angleLines: {
                            display: false // Menghilangkan garis sudut
                        },
                        suggestedMin: 0, // Nilai minimal sumbu Y (di lingkaran)
                        suggestedMax: 100, // Nilai maksimal sumbu Y (disesuaikan dengan data Anda)
                        ticks: {
                            display: false, // Menghilangkan angka pada sumbu lingkaran
                        },
                        pointLabels: {
                            display: true,  // Menampilkan label pada setiap sudut (barang)
                            font: {
                                size: 12  // Ukuran font label
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,  // Menampilkan legend dataset (opsional)
                    },
                    tooltip: {
                        enabled: true,  // Menampilkan tooltip saat mouse hover (opsional)
                    }
                }
            }
        });
    });
</script>
@endsection

