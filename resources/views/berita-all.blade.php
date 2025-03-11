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

                        <li class="nav-item active"><a class="nav-link" href="/news">Berita</a></li>
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
                        <li class="nav-item"><a class="btn main_btn button_hovermain mt-3" href="/login">Login</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Area =================-->

    <!--================Breadcrumb Area =================-->
    <section class="breadcrumb_area blog_banner_two">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="page-cover text-center">
                <h2 class="page-cover-tittle f_48">Halaman Berita</h2>
                <div class="search-bar d-flex justify-content-center align-items-center" style="height: 20vh;">
                    <form method="GET" action="{{ route('search') }}" class="w-50">
                        <div class="form-group">
                            <input type="text" name="search" class="form-control"
                                placeholder="Masukkan kata kunci atau judul berita yang ingin dicari ..." required>
                        </div>
                        <button type="submit" class="btn main_btn">Cari</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--================Breadcrumb Area =================-->

    <!--================Blog Area =================-->
    <section class="blog_area single-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 posts-list">
                    @foreach ($berita as $brt)
                        <div class="single-post row mb-5">
                            <div class="col-lg-4">
                                <div class="feature-img">
                                    <img class="img-fluid"
                                        style="height: 250px; width: 100%; object-fit: cover; border-radius: 8px;"
                                        src="{{ asset('storage/berita/' . $brt->foto) }}" alt="{{ $brt->judul }}">
                                </div>
                                <div class="mt-3">
                                    <span style="margin-right: 16px;">
                                        <i class="lnr lnr-calendar-full"></i>{{ $brt->created_at }}
                                    </span>
                                    <span style="margin-right: 16px;">
                                        <i class="lnr lnr-eye"></i>{{ $brt->formatted_views }}
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <h2 style="color: rgb(42, 42, 42)">{{ $brt->judul }}</h2>
                                <p class="excert" style="color: rgb(53, 53, 53); font-size: 16px;">
                                    <strong>{{ $brt->subjudul }}</strong>
                                </p>
                                <p style="color: black">
                                    {{ \Illuminate\Support\Str::limit($brt->isi, 300, '...') }}
                                </p>
                                <a href="{{ route('berita-show', ['id' => $brt->id]) }}" class="btn-read-more">Baca
                                    Selengkapnya</a>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
    </section>
    <!--================Blog Area =================-->
@endsection
