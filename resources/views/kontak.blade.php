@extends('layouts.frontend')
@section('content')
    <!--================ Header Area =================-->
    @if ($errors->any())
        <div class="popup-wrapper-error" id="errorPopup">
            <div class="popup-content-error alert alert-errors">
                <p style="font-size: 36px;">🚨</p>
                <p style="color: black; font-size: 16px;"> Gagal mengirim pesan, coba lagi!</p>
                <button class="close-btn-error" onclick="closePopupError()">×</button>
            </div>
        </div>
    @endif


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
                        <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>

                        <li class="nav-item"><a class="nav-link" href="/berita-all">Berita</a></li>
                        <li class="nav-item submenu dropdown active">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">Profil</a>
                            <ul class="dropdown-menu">
                                <!--<li class="nav-item"><a class="nav-link" href="/tentangkami">Tentang Kami</a></li>-->
                                <li class="nav-item active"><a class="nav-link" href="/kontak">Tentang Kami</a></li>
                                <li class="nav-item"><a class="nav-link" href="/galeri-all">Galeri</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="https://simtik.siola.my.id/">Simtik</a></li>
                        <li class="nav-item"><a class="btn main_btn button_hovermain mt-3" href="/login">Login</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!--================ Header Area =================-->

    <!--================ Breadcrumb Area =================-->
    <section class="breadcrumb_area">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="page-cover text-center">
                <h2 class="page-cover-tittle f_48">Tentang Kami</h2>
                <ol class="breadcrumb">
                    <li><a href="/">Beranda</a></li>
                    <li class="active">Informasi Seputar Dinas Kesehatan Kota Tegal</li>
                </ol>
            </div>
        </div>
    </section>
    <!--================ Breadcrumb Area =================-->

    <!--================ Tentang Kami ===================-->
    <section class="about_history_area" style="margin-top: 5rem">
        <div class="container">
            <div class="row">
                <div class="col-md-5 d_flex align-items-center">
                    <div class="about_content ">
                        <h2 class="title_color">Visi & Misi</h2>
                        <h2 class="title_color">Struktur Organisasi</h2>
                        <h2 class="title_color">Booklet Pelayanan</h2>
                        <a href="images/booklet.pdf" download>
                            <button type="button" class="btn main_btn button_hovermain mt-3">Download PDF</button>
                        </a>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.287833379036!2d109.1332492743512!3d-6.856062993142366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fb7773e501b43%3A0x3c04de3023317b62!2sJl.%20Proklamasi%20No.16%2C%20Tegalsari%2C%20Kec.%20Tegal%20Bar.%2C%20Kota%20Tegal%2C%20Jawa%20Tengah%2052111!5e0!3m2!1sid!2sid!4v1737339526941!5m2!1sid!2sid"
                            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Tentang Kami ==================-->

    <!--================= Kontak ======================-->
    <section class="contact_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="title_color mb-3">Pertanyaan yang sering diajukan</h3>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Bagaimana cara PKL di Dinkes Kota Tegal?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Ajukan surat permohonan dari kampus ke Bagian Administrasi Dinkes.</strong>
                                    Atau bisa masuk ke menu SIMTIK pada website ini.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Berapa lama proses penerbitan izin rumah sakit/klinik?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Proses umumnya memakan waktu 7-14 hari kerja</strong> setelah dokumen
                                    lengkap diverifikasi.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Bagaimana cara menjadi peserta donor darah terdaftar?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Daftar melalui PMI Kota Tegal</strong> atau kunjungi UTD (Unit Transfusi
                                    Darah) di Jl. Gajah Mada, Komplek Alun-Alun Hanggawana Slawi. Syarat: usia 17-65
                                    tahun, berat badan minimal 45 kg, dan dalam kondisi sehat.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Bagaimana jika anak terlambat jadwal imunisasi dasar?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Segera konsultasi ke Puskesmas</strong> terdekat untuk jadwal imunisasi
                                    kejar (catch-up immunization). Petugas akan menyesuaikan dengan kondisi anak.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Bagaimana mengetahui berita ter update?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Kirimkan email aktif Anda dibagian footer website ini.</strong> Jadilah
                                    orang pertama yang mengetahui berita terbaru tentang Dinas Kesehatan Kota Tegal.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="padding-inline:32px;">
                    <h3 class="title_color">Tidak menemukan jawabannya?</h3>
                    <p style="color:black;" class="mb-4"><strong>Hubungi kami :</strong></p>
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-home" style="color: blue;"></i>
                            <h6>Tegal, Jawa Tengah</h6>
                            <p>Indonesia</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset" style="color: blue;"></i>
                            <h6>0283-353351</h6>
                            <p>Senin-Jumat 07.30-16.00</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-envelope" style="color: blue;"></i>
                            <h6>dinkeskotategal@gmail.com</h6>
                            <p>Pusat bantuan</p>
                        </div>
                    </div>
                    <form id="form" class="row contact_form" action="{{ route('contact') }}" method="POST"
                        novalidate="novalidate">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="Masukkan Nama"
                                    value="{{ old('name') }}" required>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" placeholder="Masukkan Email"
                                    value="{{ old('email') }}" required>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                    id="subject" name="subject" placeholder="Masukkan Subjek/Judul"
                                    value="{{ old('subject') }}" required>
                                @error('subject')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message" rows="1"
                                    placeholder="Isi Pesan" required></textarea>
                                @error('message')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" value="submit" class="btn main_btn button_hovermain">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--================= Kontak ======================-->
@endsection
