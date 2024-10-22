<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>SIOLA - DINKES TEGAL</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"/>
      <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}" />
    {{-- <link
      rel="icon"
      href="{{ asset('backend/assets/img/kaiadmin/favicon.ico') }}"
      type="image/x-icon"/> --}}
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
      {{-- @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"); --}}
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+5hb7xA5ef0TfveGkAI9ntgQJcKn7F5I6EG5Q0n" crossorigin="anonymous"> --}}
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
      .card-stats {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 15px;
        margin-bottom: 20px;
    }
    .icon-big {
        font-size: 3em;
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
            <a href="#" class="logo">
              <img
                src="{{ asset('images/siola.png') }}"
                alt="navbar brand"
                class="navbar-brand" style="width: 80px; height: auto;"/>
                {{-- <h4 class="logo-text">DINKES TEGAL</h4> --}}
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
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">MENU</h4>
                    </li>
                    @if(Auth::user()->level == 'pemimpin')
                    <li class="nav-item {{ request()->is('pengajuan/atkpimpinan') ? 'active' : '' }}">
                      <a href="/pengajuan/atkpimpinan">
                        <i class="fas fa-box-open"></i>
                          <p>Persetujuan ATK
                            @if($pendingAtkCount2 > 0)
                              <span class="badge badge-danger">{{ $pendingAtkCount2 }}</span>
                            @endif
                          </p>
                      </a>
                    </li>
                    <li class="nav-item {{ request()->is('pengajuan/bbmpimpinan') ? 'active' : '' }}">
                      <a href="/pengajuan/bbmpimpinan">
                        <i class="fas fa-box-open"></i>
                          <p>Persetujuan Bbm
                            @if($pendingBbmCount2 > 0)
                              <span class="badge badge-danger">{{ $pendingBbmCount2 }}</span>
                            @endif
                          </p>
                      </a>
                    </li>
                    @endif
                    <!-- Hanya tampil untuk Admin -->
                    @if(Auth::user()->level == 'admin')
                    <li class="nav-item {{ request()->is('siswa') || request()->is('suratmagang')|| request()->is('user') || request()->is('pegawai') || request()->is('jadis') || request()->is('barang') || request()->is('kendaraan') || request()->is('ttd') ? 'active' : '' }}">
                      <a data-bs-toggle="collapse" href="#formsDataMaster">
                        <i class="fas fa-layer-group"></i>
                        <p>Data Master</p>
                        <span class="caret"></span>
                      </a>
                      <div class="collapse {{ request()->is('siswa') || request()->is('suratmagang')|| request()->is('user') || request()->is('pegawai') || request()->is('jadis') || request()->is('barang') || request()->is('kendaraan') || request()->is('ttd') ? 'show' : '' }}" id="formsDataMaster">
                        <ul class="nav nav-collapse">
                          <li class="{{ request()->is('user') ? 'active' : '' }}">
                            <a href="/user">
                              <span class="sub-item">User</span>
                            </a>
                          </li>
                          <li class="{{ request()->is('pegawai') ? 'active' : '' }}">
                            <a href="/pegawai">
                              <span class="sub-item">Pegawai</span>
                            </a>
                          </li>
                          <li class="{{ request()->is('barang') ? 'active' : '' }}">
                            <a href="/barang">
                              <span class="sub-item">Barang</span>
                            </a>
                          </li>
                          <li class="{{ request()->is('kendaraan') ? 'active' : '' }}">
                            <a href="/kendaraan">
                              <span class="sub-item">Kendaraan</span>
                            </a>
                          </li>
                          <li class="{{ request()->is('jadis') ? 'active' : '' }}">
                            <a href="/jadis">
                              <span class="sub-item">Jadwal Kadis</span>
                            </a>
                          </li>
                          <li class="{{ request()->is('siswa') ? 'active' : '' }}">
                            <a href="/siswa">
                              <span class="sub-item">Siswa Magang</span>
                            </a>
                          </li>
                          <li class="{{ request()->is('suratmagang') ? 'active' : '' }}">
                            <a href="/suratmagang">
                              <span class="sub-item">Surat Magang</span>
                            </a>
                          </li>
                          <li class="{{ request()->is('ttd') ? 'active' : '' }}">
                            <a href="/ttd">
                              <span class="sub-item">Tanda Tangan</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="nav-item {{ request()->is('pengajuan/atk') ? 'active' : '' }}">
                      <a href="/pengajuan/atk">
                        <i class="fas fa-box-open"></i>
                          <p>Persetujuan ATK
                            @if($pendingAtkCount > 0)
                              <span class="badge badge-danger">{{ $pendingAtkCount }}</span>
                            @endif
                          </p>
                      </a>
                    </li>
                    <li class="nav-item {{ request()->is('pengajuan/bbm') ? 'active' : '' }}">
                      <a href="/pengajuan/bbm">
                        <i class="fas fa-car-alt"></i>
                          <p>Persetujuan BBM
                            @if($pendingBbmCount > 0)
                                <span class="badge badge-danger">{{ $pendingBbmCount }}</span>
                            @endif
                          </p>
                      </a>
                    </li>
                    <li class="nav-item {{ request()->is('rekap/atk') || request()->is('rekap/bbm') ? 'active' : '' }}">
                      <a data-bs-toggle="collapse" href="#sidebarLayouts">
                          <i class="fas fa-file-alt"></i>
                          <p>Rekapitulasi</p>
                          <span class="caret"></span>
                      </a>
                      <div class="collapse {{ request()->is('rekap/atk') || request()->is('rekap/bbm') ? 'show' : '' }}" id="sidebarLayouts">
                          <ul class="nav nav-collapse">
                              <li class="{{ request()->is('rekap/atk') ? 'active' : '' }}">
                                  <a href="/rekap/atk">
                                      <span class="sub-item">ATK</span>
                                  </a>
                              </li>
                              <li class="{{ request()->is('rekap/bbm') ? 'active' : '' }}">
                                  <a href="/rekap/bbm">
                                      <span class="sub-item">BBM</span>
                                  </a>
                              </li>
                          </ul>
                      </div>
                    </li>
                    <li class="nav-item {{ request()->is('atk') || request()->is('bbm') || request()->is('peminjaman-kendaraan') ? 'active' : '' }}">
                      <a data-bs-toggle="collapse" href="#formsTransaksi">
                          <i class="fas fa-cart-plus"></i>
                          <p>Transaksi</p>
                          <span class="caret"></span>
                      </a>
                      <div class="collapse {{ request()->is('atk') || request()->is('bbm') || request()->is('peminjaman-kendaraan') ? 'show' : '' }}" id="formsTransaksi">
                          <ul class="nav nav-collapse">
                              <li class="{{ request()->is('atk') ? 'active' : '' }}">
                                  <a href="/atk">
                                      <span class="sub-item">Permintaan ATK</span>
                                  </a>
                              </li>
                              <li class="{{ request()->is('bbm') ? 'active' : '' }}">
                                  <a href="/bbm">
                                      <span class="sub-item">Permintaan BBM</span>
                                  </a>
                              </li>
                              <li class="{{ request()->is('peminjaman-kendaraan') ? 'active' : '' }}">
                                  <a href="/peminjaman-kendaraan">
                                      <span class="sub-item">Peminjaman Kendaraaan</span>
                                  </a>
                              </li>
                          </ul>
                      </div>
                    </li>
                    @endif
                    <!-- Menu Transaksi untuk Operator -->
                    {{-- @if(Auth::user()->level == 'operator') --}}
                    @if(Auth::user()->level == 'operator')
                    <li class="nav-item {{ request()->is('tr_atk') || request()->is('tr_bbm') ? 'active' : '' }}">
                      <a data-bs-toggle="collapse" href="#base">
                          <i class="fas fa-cart-plus"></i>
                          <p>Transaksi</p>
                          <span class="caret"></span>
                      </a>
                      <div class="collapse {{ request()->is('tr_atk') || request()->is('tr_bbm') ? 'show' : '' }}" id="base">
                          <ul class="nav nav-collapse">
                              <li class="{{ request()->is('tr_atk') ? 'active' : '' }}">
                                  <a href="/tr_atk">
                                      <span class="sub-item">ATK</span>
                                  </a>
                              </li>
                              <li class="{{ request()->is('tr_bbm') ? 'active' : '' }}">
                                  <a href="/tr_bbm">
                                      <span class="sub-item">BBM</span>
                                  </a>
                              </li>
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
          <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
            <div class="container-fluid">
              <nav class="navbar navbar-header-left navbar-expand-lg navbar-form p-0 d-none d-lg-flex">
                <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                  <li>
                    <img src="{{ asset('images/siola2.png') }}" alt="navbar brand" class="navbar-brand" style="width: 150px; height: auto;"/>
                  </li>
                </ul>
              </nav>
              <div class="navbar-nav ms-auto me-3">
                <li class="nav-item topbar-user dropdown hidden-caret">
                  <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm">
                      @if(Auth::user()->level == 'admin')
                          <img src="{{ asset('images/profil3.jpg') }}" alt="Admin Avatar" class="avatar-img rounded-circle"/>
                      @elseif(Auth::user()->level == 'operator')
                          <img src="{{ asset('images/profil4.jpg') }}" alt="Pimpinan Avatar" class="avatar-img rounded-circle"/>
                      @else
                          <img src="{{ asset('images/profil3.jpg') }}" alt="Default Avatar" class="avatar-img rounded-circle"/>
                      @endif
                    </div>
                    <span class="profile-username">
                      {{-- <span class="op-7" style="font-size: 18px">Hi,</span> --}}
                      <span class="fw-bold" style="font-size: 20px">{{ Auth::user()->username }}</span>
                    </span>
                  </a>
                </li>
                @if(auth()->user()->level == 'admin' || auth()->user()->level == 'pemimpin')
                <li class="nav-item topbar-icon dropdown hidden-caret me-3">
                  <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bell"></i>
                    <span class="notification">{{ $notifications->where('is_read', false)->count() }}</span>
                  </a>
                  <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                    <li>
                      <div class="dropdown-title">
                        You have {{ $notifications->where('is_read', false)->count() }} new notifications
                      </div>
                    </li>
                    <li>
                      <div class="notif-scroll scrollbar-outer">
                        <div class="notif-center">
                          <a href="#">
                            <div class="ms-4">
                              {{-- <i class="fa fa-user-plus"></i> --}}
                            </div>
                            <div class="notif-center">
                              @foreach($notifications as $notification)
                                  <div class="notif-content">
                                      <span class="block">{{ $notification->title }}</span>
                                      <span class="block">{{ $notification->message }}</span>
                                      <span class="time">{{ $notification->created_at->diffForHumans() }}</span>
          
                                      @if(!$notification->is_read)
                                          <button class="btn btn-link mark-as-read" data-id="{{ $notification->id }}" style="color: blue; text-decoration: underline;">
                                              Tandai Baca
                                          </button>
                                      @endif
                                  </div>
                              @endforeach
                          </div>
                          </a>
                        </div>
                      </div>
                    </li>
                    <li>
                      <a class="see-all" href="javascript:void(0);" >See all notifications<i class="fa fa-angle-right"></i>
                      </a>
                    </li>
                  </ul>
                </li>
                @endif
                <li>
                  <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-sign-out-alt"></i> Logout
                    </button>
                  </form>
                </li>
            </div>
          </div>
          </nav>
          <!-- End Navbar -->
        </div>
        <div class="container">
          <div class="page-inner">
            <div class="page-header">
            </div>
            <div class="row">
                <div class="col-md-12">
                  <div class="card card-round">
                    <div class="card-header">
                      {{-- <div class="card-head-row"> --}}
                        @yield('content')
                      {{-- </div> --}}
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
          $(".delete-button").click(function (e) {
            var form = $(this).closest("form"); // Mengambil form terdekat
            e.preventDefault(); // Mencegah aksi form langsung dieksekusi
            Swal.fire({
                title: "Yakin ingin menghapus?",
                text: "Data yang sudah terhapus tidak bisa kembali lagi!",
                icon: "warning",
                showCancelButton: true, // Menampilkan tombol Cancel
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Tidak, batal!',
                buttonsStyling: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna mengklik tombol 'Yes, delete it!', submit form penghapusan
                    form.submit(); // Aksi submit akan berjalan hanya setelah konfirmasi
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // Jika pengguna mengklik 'No, cancel!', tidak terjadi apapun
                    Swal.fire({
                        title: 'Dibatalkan',
                        text: 'Data kamu aman :)',
                        icon: 'error',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
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
    <script>
        $(document).on('click', '.mark-as-read', function() {
          var notificationId = $(this).data('id');
          
          $.ajax({
              url: '/notifications/' + notificationId + '/read',
              type: 'POST',
              data: {
                  _token: '{{ csrf_token() }}'
              },
              success: function(response) {
                  if (response.success) {
                      // Sembunyikan notifikasi yang telah dibaca
                      location.reload(); // Bisa diganti dengan memperbarui DOM tanpa reload halaman
                  }
              },
              error: function(xhr) {
                  console.error(xhr.responseText);
              }
          });
      });

    </script>
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </body>
</html>