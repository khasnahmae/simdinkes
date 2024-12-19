<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dinas Kesehatan Kota Tegal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Import CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* General styles */
        body {
        font-family: Arial, sans-serif;
        overflow-x: hidden;
        }
        /* Navbar styles */
        .navbar {
            transition: background-color 0.3s ease, box-shadow 0.3s ease, backdrop-filter 0.3s ease;
            background-color: transparent !important;
            z-index: 1030; /* Nilai default Bootstrap untuk navbar */
        }

        .navbar.scrolled {
            background-color: rgba(255, 255, 255, 0.5) !important; /* Semi transparan */
            backdrop-filter: blur(30px); /* Efek frosted glass */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        /* Link styles */
        .navbar .nav-link {
            color: rgb(0, 0, 0);
            position: relative; /* Dibutuhkan untuk membuat garis bawah */
            padding-bottom: 5px; /* Beri jarak agar teks tidak terlalu dekat dengan garis */
        }

        .navbar .nav-link.active {
            font-weight: bold;
             color:rgb(0, 0, 0); !important;  Ubah warna teks jika link aktif
        }

        .navbar.scrolled .nav-link {
            color: #0056b3;
        }

        .navbar-brand {
            color: rgb(0, 0, 0);
        }

        .navbar.scrolled .navbar-brand {
            color: #0056b3;
        }

        /* Underline effect for nav links */
        .navbar .nav-link::after {
            content: ''; /* Membuat elemen pseudo */
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0; /* Awalnya tidak terlihat */
            height: 2px; /* Tinggi garis */
            background-color: #007bff; /* Warna biru untuk garis bawah */
            transition: width 0.3s ease; /* Animasi lebar */
        }

        .navbar .nav-link:hover::after,
        .navbar .nav-link.active::after {
            width: 100%; /* Tampilkan garis penuh pada hover atau aktif */
        }

        .hero-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 77px;
        background: linear-gradient(135deg, #f0f4ff, #d9e4ff);
        }

        .hero-content {
        max-width: 50%;
        }

        .hero-content h1 {
        font-size: 3rem;
        font-weight: bold;
        margin-bottom: 20px;
        color: #000;
        }

        .hero-content p {
        font-size: 1.2rem;
        margin-bottom: 30px;
        color: #555;
        }

        /* Style umum untuk button */
        .hero-buttons .btn {
            display: inline-block;
            padding: 12px 24px;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            border: none;
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }

        /* Button Login */
        .login-btn {
            background: linear-gradient(90deg, #4c84af, #4566a0); /* Warna hijau gradasi */
            color: white;

        }

        /* Button Simtik */
        .simtik-btn {
            background: linear-gradient(90deg, #f3db21, #fcd600); /* Warna biru gradasi */
            color: black;
        }

        /* Hover efek */
        .btn:hover {
            transform: translateY(-3px); /* Mengangkat tombol sedikit */
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.3);
        }

        /* Active (tekan) efek */
        .btn:active {
            transform: translateY(1px); /* Menekan tombol sedikit */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            opacity: 0.8;
        }

        /* Efek tambahan untuk Login */
        .login-btn:hover {
            background: linear-gradient(90deg, #4575a0, #3e5e8e);
            color: white;

        }

        /* Efek tambahan untuk Simtik */
        .simtik-btn:hover {
            background: linear-gradient(90deg, #fbd900, #d2b319);
            color: black;

        }

        .hero-image {
        position: relative;
        flex: 1;
        }

        .main-illustration {
        width: 100%;
        height: auto;
        }

        .review {
                display: flex;
                position: absolute;
                left: -200px;
                top: 450px;
                align-items: center;
                gap: 10px; /* Jarak antara ikon dan teks */
                background-color: #fff;
                padding: 12px 18px;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .rating-icon {
        width: 50px;
        height: 50px;
        }

        .rating-content {
        display: flex;
        flex-direction: column;
        align-items: flex-start; /* Rata kiri */
        }

        .rating-value {
        font-size: 1.5rem;
        font-weight: bold;
        color: #333;
        }

        .rating-text {
        font-size: 1rem;
        color: #666;
        margin-top: 4px;
        }

        .paper-plane {
        position: absolute;
        top: 0%;
        left: -100px;
        width: 100px;
        height: auto;
        }

        .news-container {
            position: relative;
            max-width: 1140px;
            margin: 0 auto;
            height: auto;
            padding-block: 16px;
        }

        .news-wrapper {
            display: flex;
            left: 0;
            transition: transform 0.5s ease-in-out;
        }

        .news-card {
            flex: 0 0 30%; /* 3 cards visible at a time */
            box-sizing: border-box;
            margin: 0 16px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            text-align: start;
            transition: transform 0.3s ease, box-shadow 0.3s ease; 
        }

        .news-card img {
            width: 100%;
            height: 200px;
            display: block;
            object-fit: cover;
        }

        .news-card-content {
            padding: 12px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .news-card h5 {
            font-size: 18px;
            margin: 8px 0;
            color: #333;
            font-weight: bold;
        }

        .news-card p {
            font-size: 14px;
            color: #666;
            margin: 0 0 8px;
        }

        .news-card a {
            font-size: 14px;
            color: #007BFF;
            text-decoration: none;
            margin-top: auto;
            display: inline-block;
        }

        .news-card a:hover {
            text-decoration: underline;
        }

        #about-us {
            background-color: #e2edff; /* Soft blue background */
            margin-inline: 75px;
            box-sizing: border-box;
            border-radius: 16px;
        }

        #about-us .container{
            padding-inline: 48px;
            padding-block: 48px;
        }
        
        .nav-tabs-custom .nav-link {
            color: #6c757d;
            display: flex;
            align-items: center;
            gap: 5px;
            font-weight: 500;
        }
        .nav-tabs-custom .nav-link.active {
            color: #5a52f6;
            position: relative;
        }
        .nav-tabs-custom .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: #5a52f6;
        }
        .nav-tabs-custom .nav-link i {
            font-size: 18px;
        }
        .table-custom {
            border: 1px solid #dee2e6;
        }
        .table-custom th, .table-custom td {
            text-align: center;
            vertical-align: middle;
        }

        /* General Footer Styles */
        .footer {
        background-color: #e2edff; /* Soft blue background */
        color: #333;
        padding: 20px 0;
        font-family: Arial, sans-serif;
        text-align: center; /* Center-align content */
        }

        .footer-center p {
        margin: 5px 0;
        font-size: 14px;
        line-height: 1.6;
        }

        .footer-center a {
        color: #007bff;
        text-decoration: none;
        }

        .footer-center a:hover {
        color: #0056b3; /* Highlight on hover */
        }

        /* Social Media Links */
        .social-media {
        margin: 10px 0;
        }

        .social-media a {
        display: inline-block;
        margin: 0 10px;
        font-size: 20px;
        color: #007bff;
        }

        .social-media a:hover {
        color: #0056b3;
        }

        /* Footer Bottom */
        .footer-center p:last-child {
        margin-top: 10px;
        font-size: 12px;
        color: #666;
        }
        .rating span {
            cursor: pointer;
            font-size: 24px;
            color: gray;
        }

        .rating span.selected {
            color: gold;
        }
        h2 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #000;
        }
        p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: #555;
        }
        /* Responsive Design */
        @media (max-width: 1024px) {
        body {
        font-family: Arial, sans-serif;
        overflow-x: hidden;
        }
        .review {
                display: flex;
                position: absolute;
                left: -150px;
                top: 350px;
                align-items: center;
                gap: 10px; /* Jarak antara ikon dan teks */
                background-color: #fff;
                padding: 12px 18px;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .rating-icon {
        width: 30px;
        height: 30px;
        }

        .rating-content {
        display: flex;
        flex-direction: column;
        align-items: flex-start; /* Rata kiri */
        }

        .rating-value {
        font-size: 1rem;
        font-weight: bold;
        color: #333;
        }

        .rating-text {
        font-size: 0.8rem;
        color: #666;
        margin-top: 4px;
        }

        .social-media a {
            margin: 0 5px;
        }
        }
        /* Responsive Design */
        @media (max-width: 992px) {
        body {
        font-family: Arial, sans-serif;
        overflow-x: hidden;
        }
        .review {
                display: flex;
                position: absolute;
                left: -80px;
                top: 300px;
                align-items: center;
                gap: 10px; /* Jarak antara ikon dan teks */
                background-color: #fff;
                padding: 12px 18px;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .rating-icon {
        width: 30px;
        height: 30px;
        }

        .rating-content {
        display: flex;
        flex-direction: column;
        align-items: flex-start; /* Rata kiri */
        }

        .rating-value {
        font-size: 1rem;
        font-weight: bold;
        color: #333;
        }

        .rating-text {
        font-size: 0.8rem;
        color: #666;
        margin-top: 4px;
        }

        .paper-plane {
        position: absolute;
        top: -10%;
        left: -50px;
        width: 80px;
        height: auto;
        }

        .social-media a {
            margin: 0 5px;
        }
        }
        @media (max-width: 912px) {
        body {
        font-family: Arial, sans-serif;
        overflow-x: hidden;
        }
        .navbar {
            transition: background-color 0.3s ease, box-shadow 0.3s ease, backdrop-filter 0.3s ease;
            background-color: white;
            z-index: 1030; /* Nilai default Bootstrap untuk navbar */
            max-width: 912px;
        }
        .news-container {
            position: relative;
            max-width: 912px;
            margin: 0 auto;
            height: auto;
            overflow-x: hidden;

        }

        .news-wrapper {
            display: flex;
            left: 0;
            transition: transform 0.5s ease-in-out;
        }
        .row {
            gap: 16px;
        }
        .social-media a {
            margin: 0 5px;
        }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
        body {
        font-family: Arial, sans-serif;
        overflow-x: hidden;
        }
        .navbar {
            transition: background-color 0.3s ease, box-shadow 0.3s ease, backdrop-filter 0.3s ease;
            background-color: white;
            z-index: 1030; /* Nilai default Bootstrap untuk navbar */
            max-width: 768px;
        }
        .hero-content {
        max-width: 100%;
        }
        .hero-image {
        display: none;
        }
        .paper-plane {
        display: none;
        }
        .news-container {
            position: relative;
            max-width: 768px;
            margin: 0 auto;
            height: auto;
        }

        .news-wrapper {
            display: flex;
            left: 0;
            transition: transform 0.5s ease-in-out;
        }

        .news-card {
            flex: 0 0 30%; /* 3 cards visible at a time */
            box-sizing: border-box;
            margin: 0 16px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            text-align: start;
            transition: transform 0.3s ease, box-shadow 0.3s ease; 
        }

        .social-media a {
            margin: 0 5px;
        }
        }
        /* Responsive Design */
        @media (max-width: 430px) {
        body {
        font-family: Arial, sans-serif;
        overflow-x: hidden;
        }

        .hero-content {
            max-width: 100%;
        }

        .hero-content h1 {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 20px;
        color: #000;
        }

        .hero-content p {
        font-size: 1rem;
        margin-bottom: 30px;
        color: #555;
        }
        .hero-image {
        display: none;
        }
        .paper-plane {
        display: none;
        }
        h2 {
            font-size: 1.5rem;
        }
        .text-center p {
            font-size: 0.8rem;
            padding-inline: 24px;
        }
        #about-us {
            background-color: #e2edff; /* Soft blue background */
            margin-inline: 24px;
            box-sizing: border-box;
            border-radius: 8px;
        }
        p {
            font-size: 0.8rem;
        }
        .news-container {
            position: relative;
            max-width: 430px;
            margin: 0 auto;
            height: auto;
        }

        .news-wrapper {
            display: flex;
            left: 0;
            transition: transform 0.5s ease-in-out;
        }

        .news-card {
            flex: 0 0 50%; /* 3 cards visible at a time */
            box-sizing: border-box;
            margin: 0 16px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            text-align: start;
            transition: transform 0.3s ease, box-shadow 0.3s ease; 
        }
        .news-card img {
            width: 100%;
            height: 100px;
            display: block;
            object-fit: cover;
        }
        .news-card h5 {
            font-size: 0.8rem;
        }
        .news-card p {
            font-size: 0.7rem;
        }
        .news-card a {
            font-size: 0.6rem;
        }
        .list-group {
            font-size: 0.9rem;

        }
        th {
            font-size: 0.6rem;
        }
        td {
            font-size: 0.4rem;
        }
        .footer {
            padding-inline: 24px;
        }
        .footer-center h4 {
            font-size: 1rem;
        }
        .footer-center p {
            font-size: 0.8rem;
        }
        p .cp {
            font-size: 0.2rem;
        }
        .social-media a {
            margin: 0 5px;
        }
        }
        
    </style>
</head>
<body data-bs-spy="scroll" data-bs-target="#navbarNav" data-bs-offset="70" tabindex="0">

<!-- Navbar -->
<nav id="navbarNav" class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a href="#" class="logo d-flex align-items-center">
            <img src="{{ asset('backend/assets/img/kaiadmin/logodinkes.png') }}" alt="navbar brand" class="navbar-brand" style="width: 40px; height: auto;">
        </a>
        <a class="navbar-brand" href="#"><strong>Pemerintah Kota Tegal</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#news">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about-us">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#info">Info</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section id="home" class="hero-section">
    <div class="hero-content">
        <h1>DINAS KESEHATAN <br> KOTA TEGAL</h1>
        <p>Layanan terpadu untuk mendukung kesehatan dan kesejahteraan masyarakat Kota Tegal.</p>
        <div class="hero-buttons">
          <a href="/login" class="btn login-btn me-3">Login</a>
          <a href="http://192.168.112.215:8002/landing" class="btn simtik-btn">Simtik</a>
        </div>
      </div>
      <div class="hero-image">
        <img src="images/amico.png" alt="Ilustrasi Kantor" class="main-illustration">
        <div class="review">
            <img src="images/star.png" alt="Star Icon" class="rating-icon" />
            <div class="rating-content">
              <div class="rating-value">+ <strong>{{ $totalPenilai }} </strong> Orang</div>
              <div class="rating-text">Memberikan penilaian</div>
            </div>
          </div>          
        <img src="images/plane.png" alt="Pesawat Kertas" class="paper-plane">
      </div>
    
</section>
<!-- News Section -->
<section id="news" class="py-5">
    <div class="news-container mb-3">
        <div class="text-center">
            <h2>BERITA TERBARU</h2>
            <p>Informasi terkini seputar program dan kegiatan Dinas Kesehatan Kota Tegal.</p>
        </div>
        <div class="news-wrapper">
            @foreach ($berita as $item)
            <div class="news-card">
                <img src="{{ asset('storage/berita/' . $item->foto) }}" alt="{{ $item->judul }}">
                <div class="news-card-content">
                    <h5>{{ \Illuminate\Support\Str::limit($item->judul, 30, '...') }}</h5>
                    <p>{{ \Illuminate\Support\Str::limit($item->isi, 70, '...') }}</p>
                    <a href="{{ route('berita-show', ['id' => $item->id]) }}" class="btn-read-more">Baca Selengkapnya</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- About Us Section -->
<section id="about-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex align-items-stretch">
                <img src="{{ asset('images/about.jpg') }}" 
                     alt="Tentang Kami" 
                     class="img-fluid rounded shadow h-100" 
                     style="object-fit: cover;">
            </div>
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h2>DINAS KESEHATAN</h2>
                <p>
                    Dinas Kesehatan Kota Tegal bertujuan untuk memberikan pelayanan kesehatan terbaik kepada masyarakat. Kami berkomitmen untuk mendukung program kesehatan nasional melalui inovasi, kerja sama, dan pengabdian yang maksimal.
                </p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item rounded"><i class="bi bi-check-circle text-success me-2"></i> Program Kesehatan Masyarakat</li>
                    <li class="list-group-item rounded"><i class="bi bi-check-circle text-success me-2"></i> Pengendalian Penyakit dan Imunisasi</li>
                    <li class="list-group-item rounded"><i class="bi bi-check-circle text-success me-2"></i> Edukasi Gaya Hidup Sehat</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="info" class="py-5">
    <div class="container py-5">
        <!-- Nav Tabs -->
        <ul class="nav nav-tabs nav-tabs-custom border-bottom" id="jadwalTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="jadwal-kadis-tab" data-bs-toggle="tab" data-bs-target="#jadwal-kadis" type="button" role="tab" aria-controls="jadwal-kadis" aria-selected="true">
                    <i class="bi bi-calendar"></i> Jadwal Kadis
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="jadwal-atk-tab" data-bs-toggle="tab" data-bs-target="#jadwal-atk" type="button" role="tab" aria-controls="jadwal-atk" aria-selected="false">
                    <i class="bi bi-box"></i> Peminjaman Ruangan
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="jadwal-kendaraan-tab" data-bs-toggle="tab" data-bs-target="#jadwal-kendaraan" type="button" role="tab" aria-controls="jadwal-kendaraan" aria-selected="false">
                    <i class="bi bi-truck"></i> Jadwal Kendaraan
                </button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content mt-4" id="jadwalTabContent">
            <!-- Jadwal Kadis -->
            <div class="tab-pane fade show active" id="jadwal-kadis" role="tabpanel" aria-labelledby="jadwal-kadis-tab">
                <table class="table table-bordered table-custom">
                    <thead class="table-primary">
                        <tr>
                            <th><i class="fa fa-calendar-day me-1"></i> Tanggal Mulai</th>
                            <th><i class="fa fa-calendar-check me-1"></i>Tanggal Selesai</th>
                            <th><i class="bi bi-geo-alt-fill me-1"></i>Lokasi</th>
                            <th><i class="fa fa-info-circle me-1"></i>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jadwalKadis as $jadwal)
                            <tr>
                                <td>{{ $jadwal->tgl_mulai }}</td>
                                <td>{{ $jadwal->tgl_selesai }}</td>
                                <td>{{ $jadwal->lokasi }}</td>
                                <td>
                                    <span class="badge bg-primary badge-status">
                                        {{ $jadwal->keterangan }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Jadwal Peminjaman ATK -->
            <div class="tab-pane fade" id="jadwal-atk" role="tabpanel" aria-labelledby="jadwal-atk-tab">
                <table class="table table-bordered table-custom">
                    <thead  class="table-primary">
                        <tr>
                            <th><i class="bi bi-briefcase-fill me-1"></i>Ruangan</th>
                            <th><i class="fa fa-calendar-day me-1"></i>Tanggal Mulai</th>
                            <th><i class="fa fa-calendar-check me-1"></i> Tanggal Selesai</th>
                            <th><i class="fa fa-info-circle me-1"></i> Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ruanganDipinjam as $pinjam)
                            <tr>
                                <td>{{ $pinjam->ruangan->nama }}</td>
                                <td>{{ $pinjam->mulai }}</td>
                                <td>{{ $pinjam->selesai }}</td>
                                <td>
                                    <span class="badge bg-primary badge-status">
                                        {{ $pinjam->keterangan }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Jadwal Kendaraan -->
            <div class="tab-pane fade" id="jadwal-kendaraan" role="tabpanel" aria-labelledby="jadwal-kendaraan-tab">
                <table class="table table-bordered table-custom">
                    <thead class="table-primary">
                        <tr>
                            <th><i class="fa fa-car me-1"></i> Kendaraan</th>
                            <th><i class="fa fa-user me-1"></i> Pegawai</th>
                            <th><i class="fa fa-calendar-day me-1"></i> Tanggal Mulai</th>
                            <th><i class="fa fa-calendar-check me-1"></i> Tanggal Selesai</th>
                            <th><i class="fa fa-info-circle me-1"></i> Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kendaraanDipinjam as $pinjam)
                            <tr>
                                <td>{{ $pinjam->kendaraan->nopol }}</td>
                                <td>{{ $pinjam->pegawai->nama }}</td>
                                <td>{{ $pinjam->mulai }}</td>
                                <td>{{ $pinjam->selesai }}</td>
                                <td>
                                    <span class="badge bg-primary badge-status">
                                        {{ $pinjam->keterangan }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<footer class="footer">
    <div class="footer-center">
      <h4>Dinas Kesehatan Kota Tegal</h4>
      <p>Jl. Proklamasi No.16, Kota Tegal, Jawa Tengah</p>
      <p>Email: <a href="mailto:dinkes@tegalkota.go.id">dinkes@tegalkota.go.id</a> | Telepon: <a href="tel:+62283 353351 ">+62283 353351 </a></p>
      <div class="social-media">
        <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
        <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
        <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a>
      </div>
      <p>© Copyright Active. All Rights Reserved. Designed by Divisi Umpeg Dinas Kesehatan Kota Tegal</p>
    </div>
  </footer>
<!-- Icon Melayang -->
<div id="floating-feedback" style="position: fixed; bottom: 20px; right: 20px; z-index: 1000;">
    <button id="open-admin-modal" title="Beri Penilaian" style="font-size: 24px; background: none; border: none; cursor: pointer;">
      ⭐
    </button>
</div>
  
  <!-- Modal Validasi Kode Admin -->
  <div id="admin-access-modal" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1001; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
    <div class="modal-content">
      <button id="close-admin-modal" class="close-button" style="float: right; background: none; border: none; font-size: 18px;">&times;</button>
      <h3>Validasi Kode Admin</h3>
      <label for="admin-code">Masukkan Kode Admin:</label>
      <input type="password" id="admin-code" placeholder="Kode Admin" style="display: block; margin-bottom: 10px; width: 100%; padding: 8px;">
      <button id="validate-admin-code" style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">Validasi</button>
    </div>
  </div>
  
  <!-- Modal Form Penilaian -->
  <div id="feedback-form-modal" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1001; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 8px 16px rgba(0,0,0,0.2); width: 100%; max-width: 500px;">
    <div class="modal-header" style="display: flex; justify-content: space-between; align-items: center;">
      <h3 style="margin: 0; font-size: 1.5rem; font-weight: bold; color: #333;">Beri Penilaian Layanan</h3>
      <button id="close-feedback-form" class="close-button" style="background: none; border: none; font-size: 1.5rem; color: #888; cursor: pointer;">&times;</button>
    </div>
  
    <form action="{{ route('feedback.store') }}" id="feedback-form" method="POST" style="margin-top: 20px;">
      @csrf
      
      <!-- Penilaian Kepuasan -->
      <div class="form-group">
        <label class="form-label" for="kepuasan">Kepuasan Pelanggan</label>
        <div class="rating" data-aspect="kepuasan">
          <span data-value="1">★</span>
          <span data-value="2">★</span>
          <span data-value="3">★</span>
          <span data-value="4">★</span>
          <span data-value="5">★</span>
        </div>
        <input type="hidden" name="kepuasan" id="kepuasan-hidden">
      </div>
  
      <!-- Penilaian Kecepatan -->
      <div class="form-group">
        <label class="form-label" for="kecepatan">Kecepatan Pelayanan</label>
        <div class="rating" data-aspect="kecepatan">
          <span data-value="1">★</span>
          <span data-value="2">★</span>
          <span data-value="3">★</span>
          <span data-value="4">★</span>
          <span data-value="5">★</span>
        </div>
        <input type="hidden" name="kecepatan" id="kecepatan-hidden">
      </div>
  
      <!-- Penilaian Kerapihan -->
      <div class="form-group">
        <label class="form-label" for="kerapihan">Kerapihan Petugas</label>
        <div class="rating" data-aspect="kerapihan">
          <span data-value="1">★</span>
          <span data-value="2">★</span>
          <span data-value="3">★</span>
          <span data-value="4">★</span>
          <span data-value="5">★</span>
        </div>
        <input type="hidden" name="kerapihan" id="kerapihan-hidden">
      </div>
  
      <!-- Nama dan Nomor Telepon -->
      <div class="form-group">
        <label class="form-label">Nama:</label>
        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Anda" required>
      </div>
      <div class="form-group">
        <label class="form-label">Nomor Telepon:</label>
        <input type="tel" name="telepon" class="form-control" placeholder="Masukkan No Telepon" required>
      </div>
  
      <!-- Submit Button -->
      <div style="text-align: right;">
        <button type="submit" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; font-weight: bold; cursor: pointer;">Kirim</button>
      </div>
    </form>
  </div>
  
  
  
<script>
const adminModal = document.getElementById('admin-access-modal');
const feedbackModal = document.getElementById('feedback-form-modal');
const openAdminModalButton = document.getElementById('open-admin-modal');
const closeAdminModalButton = document.getElementById('close-admin-modal');
const closeFeedbackModalButton = document.getElementById('close-feedback-form');
const validateButton = document.getElementById('validate-admin-code');
const adminCodeInput = document.getElementById('admin-code');

// Kode rahasia admin
const adminSecretCode = 'DINAS123';

// Fungsi untuk menampilkan modal
function showModal(modal) {
  modal.style.display = 'block';
}

// Fungsi untuk menyembunyikan modal
function hideModal(modal) {
  modal.style.display = 'none';
}

// Fungsi untuk mereset formulir penilaian
function resetFeedbackForm() {
  // Reset input bintang
  document.querySelectorAll('.rating').forEach((rating) => {
    rating.querySelectorAll('span').forEach((star) => {
      star.classList.remove('selected');
    });
  });

  // Reset input tersembunyi
  document.getElementById('kepuasan-hidden').value = '';
  document.getElementById('kecepatan-hidden').value = '';
  document.getElementById('kerapihan-hidden').value = '';

  // Reset input nama dan nomor telepon
  document.querySelector('input[name="nama"]').value = '';
  document.querySelector('input[name="telepon"]').value = '';
}

// Buka modal validasi kode admin saat tombol ikon diklik
openAdminModalButton.addEventListener('click', () => {
  showModal(adminModal);
});

// Tutup modal validasi kode admin
closeAdminModalButton.addEventListener('click', () => {
  hideModal(adminModal);
  adminCodeInput.value = ''; // Reset input kode validasi
});

// Validasi kode admin
validateButton.addEventListener('click', () => {
  const inputCode = adminCodeInput.value;

  if (inputCode === adminSecretCode) {
    Swal.fire({
      title: 'Berhasil!',
      text: 'Kode valid! Silakan beri penilaian.',
      icon: 'success',
      confirmButtonText: 'OK',
    }).then(() => {
      hideModal(adminModal); // Tutup modal validasi kode admin
      showModal(feedbackModal); // Tampilkan modal input penilaian
      resetFeedbackForm(); // Reset formulir penilaian
      adminCodeInput.value = ''; // Reset input kode validasi
    });
  } else {
    Swal.fire({
      title: 'Gagal!',
      text: 'Kode salah! Coba lagi.',
      icon: 'error',
      confirmButtonText: 'OK',
    }).then(() => {
      adminCodeInput.value = ''; // Reset input kode validasi
    });
  }
});

// Tutup modal saat klik di luar konten
window.addEventListener('click', (e) => {
  if (e.target === adminModal) {
    hideModal(adminModal);
    adminCodeInput.value = ''; // Reset input kode validasi
  }
  if (e.target === feedbackModal) {
    hideModal(feedbackModal);
    resetFeedbackForm(); // Reset formulir penilaian
  }
});

// Tutup modal input penilaian
closeFeedbackModalButton.addEventListener('click', () => {
  hideModal(feedbackModal);
  resetFeedbackForm(); // Reset form saat modal ditutup
});
// Tangani rating
document.querySelectorAll('.rating').forEach((rating) => {
  const stars = rating.querySelectorAll('span');
  const aspect = rating.getAttribute('data-aspect');
  const hiddenInput = document.getElementById(`${aspect}-hidden`);

  stars.forEach((star) => {
    star.addEventListener('click', () => {
      const value = star.getAttribute('data-value');
      hiddenInput.value = value;

      // Reset semua bintang
      stars.forEach((s) => s.classList.remove('selected'));

      // Tandai bintang yang dipilih
      for (let i = 0; i < value; i++) {
        stars[i].classList.add('selected');
      }
    });
  });
});

// Tangani pengiriman formulir
document.getElementById('feedback-form').addEventListener('submit', function (e) {
  e.preventDefault(); // Mencegah pengiriman form secara default

  const form = e.target;
  const formData = new FormData(form);

  fetch(form.action, {
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    },
    body: formData,
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error('Gagal mengirim data. Periksa kembali input Anda.');
      }
      return response.json();
    })
    .then((data) => {
      // Tutup modal
      hideModal(feedbackModal);

      // Reset formulir
      resetFeedbackForm();

      // Tampilkan notifikasi pop-up
      Swal.fire({
        title: 'Berhasil!',
        text: data.message || 'Feedback berhasil dikirim!',
        icon: 'success',
        confirmButtonText: 'OK',
      });
    })
    .catch((error) => {
      // Tampilkan pesan error
      Swal.fire({
        title: 'Gagal!',
        text: error.message || 'Terjadi kesalahan. Coba lagi nanti.',
        icon: 'error',
        confirmButtonText: 'OK',
      });
    });
});

</script>  
  
<script>
    const newsWrapper = document.querySelector('.news-wrapper');
    const newsCards = document.querySelectorAll('.news-card');
    const totalCards = newsCards.length;
    const cardWidth = newsCards[0].offsetWidth + 20; // Include margin
    let currentIndex = 0;

    // Duplicate first 3 cards to create seamless looping
    for (let i = 0; i < 3; i++) {
        const clone = newsCards[i].cloneNode(true);
        newsWrapper.appendChild(clone);
    }

    function slideNews() {
        currentIndex++;
        newsWrapper.style.transform = `translateX(-${currentIndex * cardWidth}px)`;

        // Reset to the start after the last visible card
        if (currentIndex >= totalCards) {
            setTimeout(() => {
                newsWrapper.style.transition = 'none';
                currentIndex = 0;
                newsWrapper.style.transform = `translateX(0)`;
                setTimeout(() => {
                    newsWrapper.style.transition = 'transform 0.5s ease-in-out';
                });
            }, 500); // Match the transition duration
        }
    }

    // Run animation every 2 seconds
    setInterval(slideNews, 5000);
</script>

<script>
   // Inisialisasi Scrollspy
document.addEventListener('DOMContentLoaded', () => {
    const scrollSpy = new bootstrap.ScrollSpy(document.body, {
        target: '#navbarNav',
        offset: 70,  // Sesuaikan offset jika perlu
    });
});

// Update CSS untuk memberi tahu elemen aktif
window.addEventListener('scroll', () => {
    const navbar = document.querySelector('.navbar');
    const navbarLinks = document.querySelectorAll('.navbar-nav .nav-link');

    // Mengecek posisi scroll dan menandai elemen aktif
    navbarLinks.forEach(link => {
        const section = document.querySelector(link.getAttribute('href'));
        const rect = section.getBoundingClientRect();
        
        // Jika bagian tersebut terlihat di layar, berikan kelas active
        if (rect.top <= 70 && rect.bottom >= 70) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });

    // Navbar berubah warna saat scroll
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

</script>

<script>
       // Change navbar color on scroll
       window.addEventListener('scroll', () => {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.classList.remove('transparent');
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
            navbar.classList.add('transparent');
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>

