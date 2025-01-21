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
    @if (session('success'))
        <div class="popup-wrapper">
            <div class="popup-content alert alert-success">
                {{ session('success') }}
                <button class="close-btn" onclick="closePopup()">×</button>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="popup-wrapper">
            <div class="popup-content alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
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
                                <li class="nav-item"><a class="nav-link" href="/tentangkami">Tentang Kami</a></li>
                                <li class="nav-item active"><a class="nav-link" href="/kontak">Kontak</a></li>
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
                <h2 class="page-cover-tittle f_48">Kontak</h2>
                <ol class="breadcrumb">
                    <li><a href="/">Beranda</a></li>
                    <li class="active">Informasi Kontak</li>
                </ol>
            </div>
        </div>
    </section>
    <!--================Breadcrumb Area =================-->


    <section class="contact_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.287833379036!2d109.1332492743512!3d-6.856062993142366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fb7773e501b43%3A0x3c04de3023317b62!2sJl.%20Proklamasi%20No.16%2C%20Tegalsari%2C%20Kec.%20Tegal%20Bar.%2C%20Kota%20Tegal%2C%20Jawa%20Tengah%2052111!5e0!3m2!1sid!2sid!4v1737339526941!5m2!1sid!2sid"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-5">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-home"></i>
                            <h6>Tegal, Jawa Tengah</h6>
                            <p>Indonesia</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6><a href="#">0283-353351</a></h6>
                            <p>Senin-Jumat 07.30-16.00</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-envelope"></i>
                            <h6><a href="#">dinkeskotategal@gmail.com</a></h6>
                            <p>Pusat bantuan</p>
                        </div>
                    </div>
                    <form class="row contact_form" action="{{ route('contact') }}" method="POST"
                        novalidate="novalidate">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter your name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter email address" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="subject"
                                    placeholder="Enter Subject" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" value="submit" class="btn theme_btn button_hover">Kirim</button>
                        </div>
                    </form>
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
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="{{ asset('frontend/js/gmaps.min.js') }}"></script>
    <!-- contact js -->
    <script src="{{ asset('frontend/js/jquery.form.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('frontend/js/contact.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
