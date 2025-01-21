<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="image/favicon.png" type="image/png">
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
                        <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                        <li class="nav-item submenu dropdown active">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">Profil</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item active"><a class="nav-link" href="/tentangkami">Tentang Kami</a>
                                </li>
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

    <!--================Breadcrumb Area =================-->
    <section class="breadcrumb_area">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="page-cover text-center">
                <h2 class="page-cover-tittle f_48">Tentang Kami</h2>
                <ol class="breadcrumb">
                    <li><a href="/">Beranda</a></li>
                    <li>Tentang Kami</li>
                </ol>
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
    <!--================Breadcrumb Area =================-->


    <!--================ About History Area  =================-->
    <section class="about_history_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d_flex align-items-center">
                    <div class="about_content ">
                        <h2 class="title_color">Visi</h2>
                        <p>Menjadi Institusi terdepan dalam mewujudkan masyarakat Kota Tegal yang sehat dan mandiri.</p>
                        <h2 class="title_color">Misi</h2>
                        <p>1. Mampu menggerakkan kemitraan dan peran serta masyarakat dalam mewujudkan kemandirian
                            masyarakat untuk berperilaku hidup bersih dan sehat. <br> 2. Menyelenggarakan pembinaan,
                            pengawasan, pengendalian pelayanan kesehatan secara merata,
                            terjangkau dan bermutu melalui regulasi kesehatan dan pengembangan standar pelayanan
                            kesehatan. <br>3. Mewujudkan kondisi lingkungan sehat dan memantapkan
                            surveilance epidemiologi dalam mencegah dan mengendalikan penyakit serta penanggulangan
                            Kejadian Luar Biasa (KLB). <br>4. Mewujudkan ketersediaan obat dan perberkalan kesehatan
                            yang
                            bermutu, merata dan terjangkau serta pembinaan dan pengendalian bidang farmasi, makanan
                            minuman dan perbekalan kesehatan. <br>5. Meningkatkan mutu dan profesionalisme Sumber Daya
                            Kesehatan melalui regulasi kesehatan. <br>6. Mengembangkan sistem informasi manajemen
                            kesehatan
                            sesuai perkembangan ilmu pengetahuan dan teknologi. <br> 7. Menyelenggarakan pelayanan
                            kesehatan untuk bayi, balita, remaja, ibu hamil, lanjut usia dan gizi masyarakat</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <img class="img-fluid" style="margin-bottom: 16px" src="images/about.jpg" alt="img">
                    <img class="img-fluid" src="images/taman.jpg" alt="img">
                </div>
            </div>
        </div>
    </section>
    <!--================ About History Area  =================-->


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
