<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinas Kesehatan Kota Tegal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* General styles */
        body {
            overflow-x: hidden;
        }

        /* Hero Section */
        .hero-section {
                background-color: #f9fafb;
                background-image: 
                    linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), 
                    url('images/bg3.jpg');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                color: white; /* Warna teks agar kontras */
                top: 50px; /* Geser ke bawah */
                text-align: center; /* Tetap pusatkan */
                padding-top: 200px;
            padding-bottom: 100px;
        }
        
        .hero-content {
            max-width: 100%;

        }
        .button-info {
            display: flex;
            justify-content: center; /* Pusatkan horizontal */
            align-items: center; /* Pusatkan vertikal */
            height: 100px; /* Atur tinggi sesuai kebutuhan */
        }
        .hero-content h1 {
            font-size: 3rem; /* Ukuran besar untuk heading */
            color: #ffffff; /* Warna putih */
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7); /* Bayangan teks hitam */
            font-weight: bold; /* Penekanan pada heading */
            text-align: center; /* Pusatkan teks */
        }

        .hero-content p {
            font-size: 1.2rem; /* Ukuran teks deskripsi */
            color: #ffffff; /* Warna putih */
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.7); /* Bayangan teks */
            line-height: 1.6; /* Jarak antar baris */
            text-align: center; /* Pusatkan teks */
            padding-inline: 100px;
        }
        .hero-image img {
            height: 400px; /* Fixed height for uniform image size */
            object-fit: cover; /* Ensures image aspect ratio is maintained */
            border-radius: 10px;
        }

        .btn-jadwal {
            display: inline-block;
            background-color: rgba(0, 123, 255, 0.8); /* Warna biru semi-transparan */
            color: white; /* Warna teks putih untuk kontras */
            padding: 8px 16px; /* Ukuran padding tombol */
            border-radius: 5px; /* Sudut tombol melengkung */
            text-decoration: none; /* Hilangkan garis bawah */
            font-weight: bold; /* Tebalkan teks */
            border: 2px solid #ffffff; /* Tambahkan border putih */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2); /* Tambahkan bayangan */
            transition: background-color 0.3s ease, transform 0.2s ease; /* Animasi */
        }

        .btn-jadwal:hover {
            background-color: #0056b3; /* Warna biru lebih gelap saat hover */
            transform: scale(1.05); /* Efek zoom saat hover */
        }
        /* Navbar styles */
        .navbar {
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            background-color: transparent !important;
            z-index: 1030; /* Nilai default Bootstrap untuk navbar */
        }

        .navbar.scrolled {
            background-color: #fff !important;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar .nav-link {
            color: rgb(252, 252, 252);
            position: relative; /* Dibutuhkan untuk membuat garis bawah */
            padding-bottom: 5px; /* Beri jarak agar teks tidak terlalu dekat dengan garis */
        }

        .navbar .nav-link.active {
            /* color: #6cb1fb !important;  Ubah warna teks jika link aktif */
            font-weight: bold;
        }
        .navbar.scrolled .nav-link {
            color: black;
        }

        .navbar-brand {
            color: rgb(252, 252, 252);
        }

        .navbar.scrolled .navbar-brand {
            color: black;
        }

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

        .news-container {
            position: relative;
            width: 100%;
            max-width: 1140px;
            margin: 0 auto;
            overflow: hidden;
            height: 500px;
        }

        .news-wrapper {
            display: flex;
            position: absolute;
            left: 0;
            transition: transform 0.5s ease-in-out;
        }

        .news-card {
            flex: 0 0 30%; /* 3 cards visible at a time */
            box-sizing: border-box;
            margin: 0 10px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            text-align: center;
        }

        .news-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .news-card-content {
            padding: 15px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .news-card h5 {
            font-size: 18px;
            margin: 10px 0;
            color: #333;
            font-weight: bold;
        }

        .news-card p {
            font-size: 14px;
            color: #666;
            margin: 0 0 10px;
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
/* 
        #about-us {
            margin-top: 100px;
        } */

        /* General Footer Styles */
        .footer {
        background-color: #f5f9ff; /* Soft blue background */
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

        /* Responsive Design */
        @media (max-width: 768px) {
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
        <a class="navbar-brand" href="#"><strong>Dinas Kesehatan Kota Tegal</strong></a>
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
                    <a class="nav-link me-2" href="http://192.168.210.181:8002/landing">SIMTIK</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-success" href="/login">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section id="home" class="hero-section">
    <div class="container">
        <div class="row">
                <div class="hero-content">
                    <h1>Dinas Kesehatan Kota Tegal</h1>
                        <p style="color: #f2f2f2">
                            Berkomitmen untuk memberikan pelayanan kesehatan terbaik kepada masyarakat Kota Tegal.
                        </p>
                        <div class="button-info">
                            <a class="btn-jadwal btn btn-outline-primary"  href="#jadwal">Info Jadwal</a>
                        </div>
                </div>
            </div>
        </div>
</section>
<!-- News Section -->
<section id="news" class="py-5">
    <div class="news-container">
        <div class="text-center mb-4">
            <h1>Berita Terbaru</h1>
            <p>Informasi terkini seputar program dan kegiatan Dinas Kesehatan Kota Tegal.</p>
        </div>
        <div class="news-wrapper">
            @foreach ($berita as $item)
            <div class="news-card">
                <img src="{{ asset('storage/berita/' . $item->foto) }}" alt="{{ $item->judul }}">
                <div class="news-card-content">
                    <h5>{{ \Illuminate\Support\Str::limit($item->judul, 20, '...') }}</h5>
                    <p>{{ \Illuminate\Support\Str::limit($item->subjudul, 50, '...') }}</p>
                    {{-- <a href="{{ route('berita.show', $item->id) }}">Baca Selengkapnya</a> --}}
                    <a href="{{ route('berita-show', ['id' => $item->id]) }}" class="btn-read-more">Baca Selengkapnya</a>
                    {{-- <a href="http://192.168.210.181:8000/berita/{{ $item->id }}" class="btn-read-more" data-id="{{ $item->id }}">Baca Selengkapnya</a>                 --}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- About Us Section -->
<section id="about-us" class="py-5 bg-light">
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-6 d-flex align-items-center">
                <img src="{{ asset('images/tentang.jpg') }}" alt="Tentang Kami" class="img-fluid rounded shadow">
            </div>
            <div class="col-lg-6">
                <h1>Tentang Dinas Kesehatan</h1>
                <p class="mb-4">
                    Dinas Kesehatan Kota Tegal bertujuan untuk memberikan pelayanan kesehatan terbaik kepada masyarakat. Kami berkomitmen untuk mendukung program kesehatan nasional melalui inovasi, kerja sama, dan pengabdian yang maksimal.
                </p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><i class="bi bi-check-circle text-success me-2"></i> Program Kesehatan Masyarakat</li>
                    <li class="list-group-item"><i class="bi bi-check-circle text-success me-2"></i> Pengendalian Penyakit dan Imunisasi</li>
                    <li class="list-group-item"><i class="bi bi-check-circle text-success me-2"></i> Edukasi Gaya Hidup Sehat</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="jadwal" class="py-5">
    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="card-title"><strong>Jadwal Kadis</strong></div>
                        </div>
                        <div class="card-body">
                            @if($jadwalKadis->isEmpty())
                                <p class="card-text">Belum ada jadwal mendatang.</p>
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
                            <div class="card-title"><strong>Kendaraan yang Sedang Dipinjam</strong></div>
                        </div>
                        <div class="card-body">
                            @if($kendaraanDipinjam->isEmpty())
                                <p class="card-text">Belum ada kendaraan yang sedang dipinjam.</p>
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
    </div>
</section>
<footer class="footer">
    <div class="footer-center">
      <h4>Dinas Kesehatan Kota Tegal</h4>
      <p>	Jl. Proklamasi No.16, Kota Tegal, Jawa Tengah</p>
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
  
  {{-- <div class="modal fade" id="newsModal" tabindex="-1" aria-labelledby="newsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newsModalLabel">Judul Berita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="modalContent">Loading...</p>
            </div>
        </div>
    </div>
</div> --}}
{{-- <script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.btn-read-more').forEach(button => {
        button.addEventListener('click', () => {
            const beritaId = button.getAttribute('data-id');

            // Set loading state
            const modalTitle = document.getElementById('newsModalLabel');
            const modalBody = document.querySelector('#newsModal .modal-body');
            modalTitle.textContent = 'Loading...';
            modalBody.innerHTML = '<p>Loading...</p>';

            // Fetch detail berita
            fetch('/berita/' + beritaId)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Berita tidak ditemukan');
                    }
                    return response.json();
                })
                .then(data => {
                    modalTitle.textContent = data.judul;
                    modalBody.innerHTML = `
                        <img src="/storage/berita/${data.foto}" alt="${data.judul}" class="img-fluid mb-3">
                        <p>${data.isi}</p>
                    `;
                })
                .catch(err => {
                    modalTitle.textContent = 'Error';
                    modalBody.innerHTML = '<p>Terjadi kesalahan saat memuat data.</p>';
                    console.error(err);
                });

            // Show modal
            const newsModal = new bootstrap.Modal(document.getElementById('newsModal'));
            newsModal.show();
        });
    });
});
</script> --}}
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
<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


