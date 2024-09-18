<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>UMPEG - DINKES TEGAL</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"/>
      <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}" />
    {{-- <link
      rel="icon"
      href="{{ asset('backend/assets/img/kaiadmin/favicon.ico') }}"
      type="image/x-icon"/> --}}
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Fonts and icons -->
    <script src="{{ asset('backend/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["{{ asset('backend/assets/css/fonts.min.css') }}"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>
    <style>
      .carousel-inner img {
          height: 300px; /* Sesuaikan dengan tinggi yang diinginkan */
          object-fit: cover; /* Agar gambar tetap proporsional */
      }

        .carousel-item img {
            filter: brightness(50%); /* Mengatur kecerahan gambar agar overlay lebih efektif */
        }
    </style>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/kaiadmin.min.css') }}" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/demo.css') }}" />
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <div class="sidebar" data-background-color="white">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="white">
            <a href="index.html" class="logo">
              <img
                src="{{ asset('backend/assets/img/kaiadmin/logodinkes.png') }}"
                alt="navbar brand"
                class="navbar-brand"
                height="35"/>
                <span class="logo-text ms-2">DINKES TEGAL</span>
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">
                <ul class="nav nav-secondary">
                    <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                        <a href="/dashboard" class="{{ request()->is('dashboard') ? '' : 'collapsed' }}" aria-expanded="{{ request()->is('dashboard') ? 'true' : 'false' }}">
                            <i class="fas fa-home"></i>
                            <p style="font-size: 18px;">Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">MENU</h4>
                    </li>
                    
                    <!-- Hanya tampil untuk Pimpinan -->
                    @if(Auth::user()->level == 'pimpinan')
                    <li class="nav-item {{ request()->is('user') ? 'active' : '' }}">
                        <a href="/user">
                            <i class="fas fa-address-card"></i>
                            <p style="font-size: 18px;">User</p>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('pimpinan.bbm') ? 'active' : '' }}">
                      <a href="{{ route('pimpinan.bbm') }}">
                          <i class="fas fa-paper-plane"></i>
                          <p style="font-size: 18px;">Pengajuan BBM</p>
                      </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('pimpinan.atk') ? 'active' : '' }}">
                      <a href="{{ route('pimpinan.atk') }}">
                          <i class="fas fa-paper-plane"></i>
                          <p style="font-size: 18px;">Pengajuan ATK</p>
                      </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('laporan.index') ? 'active' : '' }}">
                      <a href="{{ route('laporan.index') }}">
                          <i class="fas fa-file-alt"></i>
                          <p style="font-size: 18px;">Laporan Bulanan</p>
                      </a>
                  </li>                  
                    @endif
        
                    <!-- Hanya tampil untuk Admin -->
                    @if(Auth::user()->level == 'admin')
                    <li class="nav-item {{ request()->is('pegawai') ? 'active' : '' }}">
                        <a href="/pegawai">
                            <i class="fas fa-users"></i>
                            <p style="font-size: 18px;">Pegawai</p>
                        </a>
                    </li>
                    @endif
        
                    <!-- Hanya tampil untuk Opatk -->
                    @if(Auth::user()->level == 'opatk')
                    <li class="nav-item {{ request()->is('barang') ? 'active' : '' }}">
                        <a href="/barang">
                            <i class="fas fa-box-open"></i>
                            <p style="font-size: 18px;">Barang</p>
                        </a>
                    </li>
                    @endif
        
                    <!-- Hanya tampil untuk Opbbm -->
                    @if(Auth::user()->level == 'opbbm')
                    <li class="nav-item {{ request()->is('kendaraan') ? 'active' : '' }}">
                        <a href="/kendaraan">
                            <i class="fas fa-car-alt"></i>
                            <p style="font-size: 18px;">Kendaraan</p>
                        </a>
                    </li>
                    @endif
        
                    <!-- Hanya tampil untuk Admin -->
                    @if(Auth::user()->level == 'admin')
                    <li class="nav-item {{ request()->is('jadis') ? 'active' : '' }}">
                        <a href="/jadis">
                            <i class="far fa-calendar-alt"></i>
                            <p style="font-size: 18px;">Jadwal Kadis</p>
                        </a>
                    </li>
                    @endif
        
                    <!-- Menu Transaksi untuk Opatk dan Opbbm -->
                    @if(Auth::user()->level == 'opatk' || Auth::user()->level == 'opbbm')
                    <li class="nav-item {{ request()->is('peminjaman_atk') || request()->is('bbm') ? 'active' : '' }}">
                        <a data-bs-toggle="collapse" href="#charts">
                            <i class="fas fa-cart-plus"></i>
                            <p style="font-size: 18px;">Transaksi</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse {{ request()->is('peminjaman_atk') || request()->is('bbm') ? 'show' : '' }}" id="charts">
                            <ul class="nav nav-collapse">
                                @if(Auth::user()->level == 'opatk')
                                <li class="{{ request()->is('peminjaman_atk') ? 'active' : '' }}">
                                    <a href="/peminjaman_atk">
                                        <span class="sub-item">ATK</span>
                                    </a>
                                </li>
                                @endif
                                @if(Auth::user()->level == 'opbbm')
                                <li class="{{ request()->is('bbm') ? 'active' : '' }}">
                                    <a href="/bbm">
                                        <span class="sub-item">BBM</span>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        
      </div>
      <!-- End Sidebar -->

      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="index.html" class="logo">
                <img
                  src="{{ asset('backend/assets/img/kaiadmin/logo_light.svg') }}"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"/>
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div>
            <!-- End Logo Header -->
          </div>
          <!-- Navbar Header -->
          <nav
            class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
            <div class="container-fluid">
              <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                  <li class="nav-item topbar-user dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                      <div class="avatar-sm">
                        <img
                          src="{{ asset('images/profil3.jpg') }}"
                          alt="..."
                          class="avatar-img rounded-circle"/>
                      </div>
                      <span class="profile-username">
                        <span class="op-7" style="font-size: 20px">Hi,</span>
                        <span class="fw-bold" style="font-size: 20px">{{ Auth::user()->username }}</span>
                      </span>
                    </a>
                  </li>
                </ul>
              </nav>
              <div class="navbar-nav ms-auto">
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
            </div>
          </nav>
          <!-- End Navbar -->
        </div>

        <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h4 class="page-title">Dinas Kesehatan Kota Tegal</h4>
              {{-- <ul class="breadcrumbs">
                <li class="nav-home">
                  <a href="#">
                    <i class="icon-home"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Pages</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Starter Page</a>
                </li>
              </ul> --}}
            </div>
            <div class="row">
                <div class="col-md-12">
                  <div class="card card-round">
                    <div class="card-header">
                      <div class="card-head-row">
                        @yield('content')
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <footer class="footer">
          <div class="container-fluid d-flex justify-content-between">
            <div class="copyright">
              2024, made with <i class="fa fa-heart heart text-danger"></i> by
              <a href="http://www.themekita.com">Umpeg Dinkes Tegal</a>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('backend/assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('backend/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('backend/assets/js/plugin/chart.js/chart.min.js') }}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('backend/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Chart Circle -->
    <script src="{{ asset('backend/assets/js/plugin/chart-circle/circles.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('backend/assets/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('backend/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ asset('backend/assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugin/jsvectormap/world.js') }}"></script>

    <!-- Google Maps Plugin -->
    <script src="{{ asset('backend/assets/js/plugin/gmaps/gmaps.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('backend/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('backend/assets/js/kaiadmin.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('backend/assets/js/plugin/datatables/datatables.min.js') }}"></script>
    <!-- Kaiadmin JS -->
    <script src="{{ asset('backend/assets/js/kaiadmin.min.js') }}"></script>
    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="{{ asset('backend/assets/js/setting-demo2.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function () {
        $("#basic-datatables").DataTable({});

        $("#multi-filter-select").DataTable({
          pageLength: 5,
          initComplete: function () {
            this.api()
              .columns()
              .every(function () {
                var column = this;
                var select = $(
                  '<select class="form-select"><option value=""></option></select>'
                )
                  .appendTo($(column.footer()).empty())
                  .on("change", function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column
                      .search(val ? "^" + val + "$" : "", true, false)
                      .draw();
                  });

                column
                  .data()
                  .unique()
                  .sort()
                  .each(function (d, j) {
                    select.append(
                      '<option value="' + d + '">' + d + "</option>"
                    );
                  });
              });
          },
        });

        // Add Row
        $("#add-row").DataTable({
          pageLength: 5,
        });

        var action =
          '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $("#addRowButton").click(function () {
          $("#add-row")
            .dataTable()
            .fnAddData([
              $("#addName").val(),
              $("#addPosition").val(),
              $("#addOffice").val(),
              action,
            ]);
          $("#addRowModal").modal("hide");
        });
      });
    </script>

    <script>
      const passwordInput = document.querySelector('#password');
      const togglePassword = document.querySelector('#togglePassword');

      // Fungsi untuk toggle tampilan password
      togglePassword.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
      });

      // Fungsi untuk menampilkan ikon saat input password diisi
      passwordInput.addEventListener('input', function () {
        if (this.value.length > 0) {
          togglePassword.classList.remove('d-none');
        } else {
          togglePassword.classList.add('d-none');
        }
      });
    </script>

    <script>
      var SweetAlert2Demo = (function () {
        //== Demos
        var initDemos = function () {
          $("#alert_demo_3_3").click(function (e) {
            swal("Berhasil!", "Data berhasil ditambahkan!", {
              icon: "success",
              buttons: {
                confirm: {
                  className: "btn btn-success",
                },
              },
            });
          });

          $("#alert_demo_3_4").click(function (e) {
            swal("Berhasil!", "Data berhasil diubah!", {
              icon: "success",
              buttons: {
                confirm: {
                  className: "btn btn-success",
                },
              },
            });
          });

          $("#alert_demo_7").click(function (e) {
            swal({
              title: "Are you sure?",
              text: "You won't be able to revert this!",
              type: "warning",
              buttons: {
                confirm: {
                  text: "Yes, delete it!",
                  className: "btn btn-success",
                },
                cancel: {
                  visible: true,
                  className: "btn btn-danger",
                },
              },
            }).then((Delete) => {
              if (Delete) {
                swal({
                  title: "Deleted!",
                  text: "Your file has been deleted.",
                  type: "success",
                  buttons: {
                    confirm: {
                      className: "btn btn-success",
                    },
                  },
                });
              } else {
                swal.close();
              }
            });
          });
        };
        return {
            //== Init
            init: function () {
              initDemos();
            },
          };
        })();

      //== Class Initialization
      jQuery(document).ready(function () {
        SweetAlert2Demo.init();
      });
    </script>

  </body>
</html>