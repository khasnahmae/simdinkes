@extends('layouts.frontend')
@section('content')
    <!--================Header Area =================-->
    <header class="header_area">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.html"><img
                        src="{{ asset('backend/assets/img/kaiadmin/logodinkes.png') }}" alt=""
                        style="width: 40px; height: auto;"></a>
                <span class="title" style="font-size: 18px; color:black;">Dinas Kesehatan Kota Tegal</span>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="/">Beranda</a></li>

                        <li class="nav-item"><a class="nav-link" href="/berita-all">Berita</a></li>
                        <li class="nav-item"><a class="nav-link" href="#jadwal-section">Jadwal</a></li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">Profil</a>
                            <ul class="dropdown-menu">
                                <!--<li class="nav-item"><a class="nav-link" href="/tentangkami">Tentang Kami</a></li>-->
                                <li class="nav-item"><a class="nav-link" href="/kontak">Tentang Kami</a></li>
                                <li class="nav-item"><a class="nav-link" href="/galeri-all">Galeri</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="https://simtik.siola.my.id/">Simtik</a></li>
                        <li class="nav-item"><a class="btn main_btn mt-3" href="/login">Login</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Area =================-->

    <!--================Banner Area =================-->
    <section class="banner_area">
        <div class="booking_table d_flex align-items-center">
            <div class="overlay bg-parallax">
            </div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Melayani dengan IKHLAS</h2>
                    <h6>Menjadi Institusi terdepan dalam mewujudkan masyarakat Kota Tegal yang sehat dan mandiri</h6>
                </div>
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
    <!--================ Maklumat Pelayanan  =================-->

    <!--================ Pelayanan Publik  =================-->
    <section class="facilities_area section_gap">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
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
                                <p style="color: black;">{{ $item->created_at }}</p>
                                <a href="{{ route('berita-show', ['id' => $item->id]) }}" class="btn-read-more">Baca
                                    Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--================ Latest Blog Area  =================-->

    <!--================ Info Jadwal  =================-->
    <section id="jadwal-section" class="info_area section_gap">
        <div class="container">
            <!-- Nav Tabs -->
            <ul class="nav nav-tabs nav-tabs-custom border-bottom" id="jadwalTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="jadwal-kadis-tab" data-bs-toggle="tab"
                        data-bs-target="#jadwal-kadis" type="button" role="tab" aria-controls="jadwal-kadis"
                        aria-selected="true">
                        <i class="bi bi-calendar"></i><strong>Jadwal Kadis</strong>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="jadwal-atk-tab" data-bs-toggle="tab" data-bs-target="#jadwal-atk"
                        type="button" role="tab" aria-controls="jadwal-atk" aria-selected="false">
                        <i class="bi bi-box"></i> <strong>Peminjaman Ruangan</strong>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="jadwal-kendaraan-tab" data-bs-toggle="tab"
                        data-bs-target="#jadwal-kendaraan" type="button" role="tab"
                        aria-controls="jadwal-kendaraan" aria-selected="false">
                        <i class="bi bi-truck"></i> <strong>Jadwal Kendaraan</strong>
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
                <div class="tab-pane fade" id="jadwal-kendaraan" role="tabpanel" aria-labelledby="jadwal-kendaraan-tab">
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
    <!--================ Info Jadwal  =================-->

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
        style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1001; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 8px 16px rgba(0,0,0,0.2); width: 100%; max-width: 500px; max-height: 90vh; overflow: auto;">
        <div class="modal-header" style="display: flex; justify-content: space-between; align-items: center;">
            <h3 style="margin: 0; font-size: 1rem; font-weight: bold; color: #333;">Penilaian Layanan Dinkes Kota Tegal
            </h3>
            <button id="close-feedback-form" class="close-button"
                style="background: none; border: none; font-size: 1.5rem; color: #888; cursor: pointer;">&times;</button>
        </div>

        <form action="{{ route('feedback.store') }}" id="feedback-form" method="POST" style="margin-top: 20px;">
            @csrf

            <!-- Penilaian Kepuasan -->
            <div class="form-group text-center mb-5">
                <label class="form-label" for="kepuasan"
                    style="
                    font-size: 14px; color:black"><strong>Kualitas Pelayanan</strong></label>
                <div class="rating" data-aspect="kepuasan">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Kurang Sekali" data-value="1"
                        class="emoji">&#128544;</span>
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Kurang" data-value="2"
                        class="emoji">&#128542;</span>
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Biasa" data-value="3"
                        class="emoji">&#128528;</span>
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Baik" data-value="4"
                        class="emoji">&#128522;</span>
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Baik Sekali" data-value="5"
                        class="emoji">&#128525;</span>
                </div>
                <input type="hidden" name="kepuasan" id="kepuasan-hidden">
            </div>

            <!-- Penilaian Kecepatan -->
            <div class="form-group text-center mb-5">
                <label class="form-label" for="kecepatan"
                    style="
                    font-size: 14px; color:black"><strong>Kecepatan
                        Pelayanan</strong></label>
                <div class="rating" data-aspect="kecepatan">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Kurang Sekali" data-value="1"
                        class="emoji">&#128544;</span>
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Kurang" data-value="2"
                        class="emoji">&#128542;</span>
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Biasa" data-value="3"
                        class="emoji">&#128528;</span>
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Baik" data-value="4"
                        class="emoji">&#128522;</span>
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Baik Sekali" data-value="5"
                        class="emoji">&#128525;</span>
                </div>
                <input type="hidden" name="kecepatan" id="kecepatan-hidden">
            </div>

            <!-- Penilaian Kerapihan -->
            <div class="form-group text-center mb-5">
                <label class="form-label" for="kerapihan"
                    style="
                    font-size: 14px; color:black"><strong>Kerapihan
                        Petugas</strong></label>
                <div class="rating" data-aspect="kerapihan">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Kurang Sekali" data-value="1"
                        class="emoji">&#128544;</span>
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Kurang" data-value="2"
                        class="emoji">&#128542;</span>
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Biasa" data-value="3"
                        class="emoji">&#128528;</span>
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Baik" data-value="4"
                        class="emoji">&#128522;</span>
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Baik Sekali" data-value="5"
                        class="emoji">&#128525;</span>
                </div>
                <input type="hidden" name="kerapihan" id="kerapihan-hidden">
            </div>

            <!-- Nama Deskripsi Nomor Telepon -->
            <div class="form-group mb-3">
                <label class="form-label" style="color:black; font-size: 14px;"><strong>Deskripsi:</strong></label>
                <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsikan Penilaian Anda"
                    required>
            </div>
            <div class="gap-5" style="display:flex;">
                <div class="form-group">
                    <label class="form-label" style="color:black; font-size: 14px;"><strong>Nama:</strong></label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Anda" required>
                </div>
                <div class="form-group">
                    <label class="form-label" style="color:black; font-size: 14px;"><strong>Nomor
                            Telepon:</strong></label>
                    <input type="tel" name="telepon" class="form-control" placeholder="Masukkan No Telepon"
                        required>
                </div>
            </div>
            <!-- Submit Button -->
            <div style="text-align: center; margin-top: auto;">
                <button type="submit" class="btn submit_btn" style="cursor: pointer;">Kirim</button>
            </div>
        </form>
    </div>
    <!--================ Modal Penilaian ==================-->
@endsection
