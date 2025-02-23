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
                        <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>

                        <li class="nav-item"><a class="nav-link" href="/berita-all">Berita</a></li>
                        <li class="nav-item submenu dropdown active">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">Profil</a>
                            <ul class="dropdown-menu">
                                <!--<li class="nav-item"><a class="nav-link" href="/berita-all">Tentang Kami</a></li>-->
                                <li class="nav-item"><a class="nav-link" href="/kontak">Tentang Kami</a></li>
                                <li class="nav-item active"><a class="nav-link" href="/galeri-all">Galeri</a>
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
    <!--================Header Area =================-->

    <!--=================Breadcrumb Area =============-->
    <section class="breadcrumb_area">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="page-cover text-center">
                <h2 class="page-cover-tittle f_48">Galeri</h2>
                <ol class="breadcrumb">
                    <li><a href="/">Beranda</a></li>
                    <li class="active">Galeri Dinas Kesehatan</li>
                </ol>
            </div>
        </div>
    </section>
    <!--================Breadcrumb Area =================-->

    <!--================Galleri  Area =================-->
    <section class="gallery_area section_gap">
        <div class="container">
            <div class="section_title text-center">
                <h2 class="title_color">Galeri Photo</h2>
                <p>Kumpulan dokumentasi kegiatan di Dinas Kesehatan Kota Tegal</p>
            </div>
            <div class="row imageGallery1" id="gallery">
                @foreach ($galeri as $gl)
                    <div class="col-md-4 gallery_item">
                        <div class="gallery_img">
                            <img src="{{ asset('storage/galeri/' . $gl->foto) }}" alt="">
                            <div class="hover">
                                <a class="light" href="{{ asset('storage/galeri/' . $gl->foto) }}"><i
                                        class="fa fa-expand"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--================Galleri  Area =================-->
@endsection
