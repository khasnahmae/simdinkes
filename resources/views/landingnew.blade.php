<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="images/favicon.png" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dinkes Kota Tegal</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/nice-select/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/owl-carousel/owl.carousel.min.css') }}">
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <style>
        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(calc(-250px * 4));
            }
        }

        .slider {
            background: white;
            box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.125);
            height: 100px;
            margin: auto;
            overflow: hidden;
            position: relative;
        }

        .slider::before,
        .slider::after {
            content: "";
            background: linear-gradient(to right, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 0) 100%);
            height: 100px;
            position: absolute;
            width: 200px;
            z-index: 2;
        }

        .slider::after {
            right: 0;
            top: 0;
            transform: rotateZ(180deg);
        }

        .slider::before {
            left: 0;
            top: 0;
        }

        .slide-track {
            animation: scroll 40s linear infinite;
            display: flex;
            width: calc(250px * 14);
        }

        .slide {
            height: 100px;
            width: 250px;
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

        .table-custom th,
        .table-custom td {
            text-align: center;
            vertical-align: middle;
        }

        .rating {
            display: flex;
            justify-content: center;
            gap: 10px;
            font-size: 2rem;
        }

        .rating .emoji {
            cursor: pointer;
            transition: transform 0.2s, opacity 0.2s;
        }

        .rating .emoji:hover {
            transform: scale(1.3);
        }

        .rating .emoji.selected {
            transform: scale(1.3);
            /* Zoom hanya pada emoji yang dipilih */
            color: #007bff;
            /* Ubah warna pada emoji yang dipilih */
            opacity: 1;
        }

        .rating .emoji:not(.selected) {
            opacity: 0.5;
            /* Kurangi opacity untuk emoji yang tidak dipilih */
        }

        .popup-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.5);
            /* Latar belakang gelap */
            z-index: 9999;
            /* Pastikan berada di atas elemen lain */
        }

        .popup-content {
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 90%;
            position: relative;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            background: transparent;
            border: none;
            font-size: 20px;
            cursor: pointer;
        }

        #open-admin-modal {
            display: none;
        }
    </style>

</head>

<body>
    <!--================Header Area =================-->
    <header class="header_area">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.html"><img
                        src="{{ asset('backend/assets/img/kaiadmin/logodinkes.png') }}" alt=""
                        style="width: 40px; height: auto;"></a>
                <span class="title" style="font-size: 18px; color:black;">Dinas Kesehatan Kota Tegal</span>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="/">Beranda</a></li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">Profil</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="/tentangkami">Tentang Kami</a></li>
                                <li class="nav-item"><a class="nav-link" href="/kontak">Kontak</a></li>
                                <li class="nav-item"><a class="nav-link" href="/galeri-all">Galeri</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="/berita-all">Berita</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Simtik</a></li>
                        <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Area =================-->

    <!--================Banner Area =================-->
    <section class="banner_area">
        <div class="booking_table d_flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0"
                data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Melayani dengan IKHLAS</h2>
                    <h6>Menjadi Institusi terdepan dalam mewujudkan masyarakat Kota Tegal yang sehat dan mandiri</h6>
                </div>
                @if (session('success'))
                    <div class="popup-wrapper">
                        <div class="popup-content alert alert-success">
                            {{ session('success') }}
                            <button class="close-btn" onclick="closePopup()">×</button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!--================Banner Area =================-->

    <!--================ Maklumat Pelayanan  =================-->
    <section class="accomodation_area section_gap">
        <div class="container">
            <div class="section_title text-center">
                <h2 class="title_color">Maklumat Pelayanan Publik</h2>
                <p>"Dengan ini kami seluruh jajaran Dinas Kesehatan Kota Tegal menyatakan berjanji dan sanggup untuk
                    melaksanakan pelayanan sesuai standar pelayanan yang telah ditetapkan, memberikan pelayanan sesuai
                    dengan kewajiban dan akan melakukan perbaikan secara terus menerus serta bersedia untuk menerima
                    sanksi dan / atau memberikan kompensasi apabila pelayanan yang diberikan tidak sesuai standar
                    pelayanan." </p>
            </div>
            <div class="row mb_30">
                <div class="slider">
                    <div class="slide-track">
                        <div class="slide">
                            <img src="{{ asset('images/bangga.png') }}" width="150" alt="" />
                        </div>
                        <div class="slide">
                            <img src="{{ asset('images/berakhlak.png') }}" width="150" alt="" />
                        </div>
                        <div class="slide">
                            <img src="{{ asset('images/germas.png') }}" width="150" alt="" />
                        </div>
                        <div class="slide">
                            <img src="{{ asset('images/amazingtegal.png') }}" width="150" alt="" />
                        </div>
                        <div class="slide">
                            <img src="{{ asset('images/bangga.png') }}" width="150" alt="" />
                        </div>
                        <div class="slide">
                            <img src="{{ asset('images/berakhlak.png') }}" width="150" alt="" />
                        </div>
                        <div class="slide">
                            <img src="{{ asset('images/germas.png') }}" width="150" alt="" />
                        </div>
                        <div class="slide">
                            <img src="{{ asset('images/amazingtegal.png') }}" width="150" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Accomodation Area  =================-->

    <!--================ Pelayanan Publik  =================-->
    <section class="facilities_area section_gap">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0"
            data-background="">
        </div>
        <div class="container">
            <div class="section_title text-center">
                <h2 class="title_w">Jenis Pelayanan Saat Ini</h2>
            </div>
            <div class="row mb_30">
                <div class="col-lg-4 col-md-6">
                    <div class="facilities_item">
                        <p>Surat permohonan Rekomendasi
                            Izin Praktek Nakes (24 jenis nakes).</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="facilities_item">
                        <p>Surat Izin Praktek Dokter (Dokter Umum / Dokter Gigi / Dokter Spesialis).</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="facilities_item">
                        <p>Permohonan Rekomendasi
                            Perizinan Fasilitas pelayanan
                            Kesehatan (16 jenis).</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="facilities_item">
                        <p>Pelayanan Pemenuhan Komitmen
                            sertifikasi SPP-PIRT.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="facilities_item">
                        <p>Pelayanan informasi status
                            keaktifan peserta JKN.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="facilities_item">
                        <p>Pelayanan Pendaftaran Peserta
                            JKN PBPU APBD II
                            .</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Pelayanan Publik  =================-->

    <!--================ Testimonial Area  =================-->
    <section class="testimonial_area section_gap">
        <div class="container">
            <div id="floating-feedback" style="bottom: 20px; right: 20px;">
                <button id="open-admin-modal" title="Beri Penilaian"
                    style="font-size: 24px; background: none; border: none; cursor: pointer;">
                    ⭐
                </button>
            </div>
            <div class="section_title text-center">
                <h2 class="title_color">Penilaian Masyarakat</h2>
                <p>Umpan balik dari masyarakat terhadap pelayanan yang diberikan
                </p>
            </div>
            <div class="testimonial_slider owl-carousel">
                @foreach ($feedback as $fb)
                    <div class="media testimonial_item">
                        <div class="media-body">
                            <p>{{ \Illuminate\Support\Str::limit($fb->deskripsi, 35, '...') }}</< /p>
                            <h4 class="sec_h4">{{ $fb->nama }}</h4>
                            <div class="star">
                                @php
                                    // Hitung jumlah bintang penuh dan bintang setengah
                                    $full_stars = floor($fb->average_rating);
                                    $half_star = $fb->average_rating - $full_stars >= 0.5 ? 1 : 0;
                                    $empty_stars = 5 - ($full_stars + $half_star);
                                @endphp

                                {{-- Tampilkan bintang penuh --}}
                                @for ($i = 0; $i < $full_stars; $i++)
                                    <a href="#"><i class="fa fa-star"></i></a>
                                @endfor

                                {{-- Tampilkan bintang setengah --}}
                                @if ($half_star)
                                    <a href="#"><i class="fa fa-star-half-o"></i></a>
                                @endif

                                {{-- Tampilkan bintang kosong --}}
                                @for ($i = 0; $i < $empty_stars; $i++)
                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                @endfor
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!--================ Testimonial Area  =================-->

    <!--================ Latest Blog Area  =================-->
    <section class="latest_blog_area section_gap">
        <div class="container">
            <div class="section_title text-center">
                <h2 class="title_color">Berita Terbaru</h2>
                <p>Informasi terkini seputar program dan kegiatan Dinas Kesehatan Kota Tegal
                </p>
            </div>
            <div class="row mb_30">
                @foreach ($berita as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-recent-blog-post">
                            <div class="thumb">
                                <img class="img-fluid" style="height: 250px"
                                    src="{{ asset('storage/berita/' . $item->foto) }}" alt="{{ $item->judul }}">
                            </div>
                            <div class="details">
                                <div class="tags">
                                </div>
                                <h4 class="sec_h4">{{ \Illuminate\Support\Str::limit($item->judul, 30, '...') }}
                                </h4>
                                <p>{{ \Illuminate\Support\Str::limit($item->isi, 70, '...') }}</p>
                                <p>{{ $item->created_at }}</p>
                                <a href="{{ route('berita-show', ['id' => $item->id]) }}" class="btn-read-more">Baca
                                    Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--================ Info Jadwal  =================-->

    <section class="info_area section_gap">
        <div class="container">
            <!-- Nav Tabs -->
            <ul class="nav nav-tabs nav-tabs-custom border-bottom" id="jadwalTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="jadwal-kadis-tab" data-bs-toggle="tab"
                        data-bs-target="#jadwal-kadis" type="button" role="tab" aria-controls="jadwal-kadis"
                        aria-selected="true">
                        <i class="bi bi-calendar"></i> Jadwal Kadis
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="jadwal-atk-tab" data-bs-toggle="tab" data-bs-target="#jadwal-atk"
                        type="button" role="tab" aria-controls="jadwal-atk" aria-selected="false">
                        <i class="bi bi-box"></i> Peminjaman Ruangan
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="jadwal-kendaraan-tab" data-bs-toggle="tab"
                        data-bs-target="#jadwal-kendaraan" type="button" role="tab"
                        aria-controls="jadwal-kendaraan" aria-selected="false">
                        <i class="bi bi-truck"></i> Jadwal Kendaraan
                    </button>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content mt-4" id="jadwalTabContent">
                <!-- Jadwal Kadis -->
                <div class="tab-pane fade show active" id="jadwal-kadis" role="tabpanel"
                    aria-labelledby="jadwal-kadis-tab">
                    <table class="table table-bordered table-custom">
                        <thead>
                            <tr>
                                <th>Tgl Mulai</th>
                                <th>Tgl Selesai</th>
                                <th>Lokasi</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwalKadis as $jadwal)
                                <tr>
                                    <td>{{ $jadwal->tgl_mulai }}</td>
                                    <td>{{ $jadwal->tgl_selesai }}</td>
                                    <td>{{ $jadwal->lokasi }}</td>
                                    <td>
                                        <span style="color: #5a52f6">
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
                        <thead>
                            <tr>
                                <th>Ruangan</th>
                                <th>Tgl Mulai</th>
                                <th>Tgl Selesai</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ruanganDipinjam as $pinjam)
                                <tr>
                                    <td>{{ $pinjam->ruangan->nama }}</td>
                                    <td>{{ $pinjam->mulai }}</td>
                                    <td>{{ $pinjam->selesai }}</td>
                                    <td>
                                        <span style="color: #5a52f6">
                                            {{ $pinjam->keterangan }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Jadwal Kendaraan -->
                <div class="tab-pane fade" id="jadwal-kendaraan" role="tabpanel"
                    aria-labelledby="jadwal-kendaraan-tab">
                    <table class="table table-bordered table-custom">
                        <thead>
                            <tr>
                                <th>Kendaraan</th>
                                <th>Pegawai</th>
                                <th>Tgl Mulai</th>
                                <th>Tgl Selesai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kendaraanDipinjam as $pinjam)
                                <tr>
                                    <td>{{ $pinjam->kendaraan->nopol }}</td>
                                    <td>{{ $pinjam->pegawai->nama }}</td>
                                    <td>{{ $pinjam->mulai }}</td>
                                    <td>{{ $pinjam->selesai }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!--================ start footer Area  =================-->
    <footer class="footer-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6 class="footer_title">Dasar Hukum</h6>
                        <p> UU N0.25 Tahun 2009 Tentang Pelayanan Publik.<br> Peraturan Presiden No.96 Tahun
                            2012 Tentang Pelayanan Publik.<br> Peraturan Menpan RB No.17 tahun 2017 Tentang Pedoman
                            Penilaian Penyelenggara Pelayanan Publik.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6 class="footer_title">Navigasi Link</h6>
                        <div class="row">
                            <div class="col-4">
                                <ul class="list_style">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Feature</a></li>
                                    <li><a href="#">Services</a></li>
                                    <li><a href="#">Team</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6 class="footer_title">Update Berita</h6>
                        <p>Informasi kesehatan terbaru dan berita terkini dari
                            Dinas Kesehatan. Bersama, wujudkan masyarakat yang lebih sehat dan sadar kesehatan.</p>
                        <div>
                            <form action="/langganan" method="POST" class="subscribe_form relative">
                                @csrf
                                <div class="input-group d-flex flex-row">
                                    <input name="email" placeholder="Alamat Email" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Alamat Email'" required type="email">
                                    <button type="submit" class="btn sub-btn"><span
                                            class="lnr lnr-location"></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border_line"></div>
            <div class="row footer-bottom d-flex justify-content-between align-items-center">
                <p class="col-lg-8 col-sm-12 footer-text m-0">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | Made with <i class="fa fa-heart-o"
                        aria-hidden="true"></i> by Umpeg
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
                <div class="col-lg-4 col-sm-12 footer-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!--================ End footer Area  =================-->

    <!--================ Modal Penilaian ==================-->

    <!-- Modal Validasi Kode Admin -->
    <div id="admin-access-modal"
        style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1001; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
        <div class="modal-content" style="border: none">
            <button id="close-admin-modal" class="close-button"
                style="float: right; background: none; border: none; font-size: 18px; color: #888; cursor: pointer;">&times;</button>
            <h3>Validasi Kode Admin</h3>
            <label for="admin-code">Masukkan Kode Admin:</label>
            <input type="password" id="admin-code" placeholder="Kode Admin"
                style="display: block; margin-bottom: 10px; width: 100%; padding: 8px;">
            <button id="validate-admin-code"
                style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">Validasi</button>
        </div>
    </div>

    <!-- Modal Form Penilaian -->
    <div id="feedback-form-modal"
        style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1001; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 8px 16px rgba(0,0,0,0.2); width: 100%; max-width: 500px;">
        <div class="modal-header" style="display: flex; justify-content: space-between; align-items: center;">
            <h3 style="margin: 0; font-size: 1.5rem; font-weight: bold; color: #333;">Beri Penilaian Layanan</h3>
            <button id="close-feedback-form" class="close-button"
                style="background: none; border: none; font-size: 1.5rem; color: #888; cursor: pointer;">&times;</button>
        </div>

        <form action="{{ route('feedback.store') }}" id="feedback-form" method="POST" style="margin-top: 20px;">
            @csrf

            <!-- Penilaian Kepuasan -->
            <div class="form-group text-center mb-4">
                <label class="form-label" for="kepuasan">Kepuasan Pelanggan</label>
                <div class="rating" data-aspect="kepuasan">
                    <span data-value="1" class="emoji">&#128544;</span>
                    <span data-value="2" class="emoji">&#128542;</span>
                    <span data-value="3" class="emoji">&#128528;</span>
                    <span data-value="4" class="emoji">&#128522;</span>
                    <span data-value="5" class="emoji">&#128525;</span>
                </div>
                <input type="hidden" name="kepuasan" id="kepuasan-hidden">
            </div>

            <!-- Penilaian Kecepatan -->
            <div class="form-group text-center mb-4">
                <label class="form-label" for="kecepatan">Kecepatan Pelayanan</label>
                <div class="rating" data-aspect="kecepatan">
                    <span data-value="1" class="emoji">&#128544;</span>
                    <span data-value="2" class="emoji">&#128542;</span>
                    <span data-value="3" class="emoji">&#128528;</span>
                    <span data-value="4" class="emoji">&#128522;</span>
                    <span data-value="5" class="emoji">&#128525;</span>
                </div>
                <input type="hidden" name="kecepatan" id="kecepatan-hidden">
            </div>

            <!-- Penilaian Kerapihan -->
            <div class="form-group text-center mb-4">
                <label class="form-label" for="kerapihan">Kerapihan Petugas</label>
                <div class="rating" data-aspect="kerapihan">
                    <span data-value="1" class="emoji">&#128544;</span>
                    <span data-value="2" class="emoji">&#128542;</span>
                    <span data-value="3" class="emoji">&#128528;</span>
                    <span data-value="4" class="emoji">&#128522;</span>
                    <span data-value="5" class="emoji">&#128525;</span>
                </div>
                <input type="hidden" name="kerapihan" id="kerapihan-hidden">
            </div>

            <!-- Nama Deskripsi Nomor Telepon -->
            <div class="form-group mb-3">
                <label class="form-label">Deskripsi:</label>
                <input type="text" name="deskripsi" class="form-control"
                    placeholder="Deskripsikan Penilaian Anda" required>
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Nama:</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Anda" required>
            </div>
            <div class="form-group mb-4">
                <label class="form-label">Nomor Telepon:</label>
                <input type="tel" name="telepon" class="form-control" placeholder="Masukkan No Telepon"
                    required>
            </div>

            <!-- Submit Button -->
            <div style="text-align: center;">
                <button type="submit"
                    style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; font-weight: bold; cursor: pointer;">Kirim</button>
            </div>
        </form>
    </div>
    <!--================ Modal Penilaian ==================-->

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
            document.querySelector('input[name="deskripsi"]').value = '';
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
            const emojis = rating.querySelectorAll('span');
            const aspect = rating.getAttribute('data-aspect');
            const hiddenInput = document.getElementById(`${aspect}-hidden`);

            emojis.forEach((emoji) => {
                emoji.addEventListener('click', () => {
                    const value = emoji.getAttribute('data-value');
                    hiddenInput.value = value;

                    // Reset semua emoji
                    emojis.forEach((e) => e.classList.remove('selected'));

                    // Tandai hanya emoji yang dipilih
                    emoji.classList.add('selected');
                });
            });
        });

        // Tangani pengiriman formulir
        document.getElementById('feedback-form').addEventListener('submit', function(e) {
            e.preventDefault(); // Mencegah pengiriman form secara default

            const form = e.target;
            const formData = new FormData(form);

            fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content'),
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
        function closePopup() {
            const popupWrapper = document.querySelector('.popup-wrapper');
            if (popupWrapper) {
                popupWrapper.style.display = 'none';
            }
        }

        // Sembunyikan pop-up secara otomatis setelah 3 detik
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(() => {
                const popupWrapper = document.querySelector('.popup-wrapper');
                if (popupWrapper) {
                    popupWrapper.style.display = 'none';
                }
            }, 3000); // 3000 ms = 3 detik
        });
    </script>

    <script>
        // Mendengarkan event keydown untuk mendeteksi tombol keyboard
        document.addEventListener('keydown', function(event) {
            if (event.ctrlKey && event.altKey && event.key === 'h') {
                // Tampilkan tombol penilaian
                document.getElementById('open-admin-modal').style.display = 'inline-block';
            }
        });
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('frontend/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('frontend/js/mail-script.js') }}"></script>
    <script src="{{ asset('frontend/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('frontend/vendors/nice-select/js/jquery.nice-select.js') }}"></script>
    <script src="{{ asset('frontend/js/mail-script.js') }}"></script>
    <script src="{{ asset('frontend/js/stellar.js') }}"></script>
    <script src="{{ asset('frontend/vendors/lightbox/simpleLightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
