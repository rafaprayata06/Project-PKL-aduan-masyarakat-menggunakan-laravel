

    

@extends('layout.tampalate')

@section('style')


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this page -->

    <link rel="stylesheet" href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            @if(Auth::guard('web')->user()->level== 'admin')
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home-petugas-admin">
                <div class="sidebar-brand-icon rotate-n-15">
                
                        <i class="bi bi-wrench-adjustable-circle-fill"></i>
                </div>
                <div class="sidebar-brand-text mx-3"> Admin <sup><i class="bi bi-person-gear"></i></sup></div>
            </a>
                @else
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home-petugas-admin">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="bi bi-wrench-adjustable-circle-fill"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3"> Petugas <sup><i class="fa-solid fa-user-secret"></i></sup></div>
                </a>
                @endif
                
        

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/home-petugas-admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="bi bi-megaphone"></i>
                    <span>Pengaduan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pengaduan</h6>
                        <a class="collapse-item" href="/belum-petugas">Belum Di Proses</a>
                        <a class="collapse-item" href="/proses-petugas">Sedang Di Proses</a>
                        <a class="collapse-item" href="/selesai-petugas">Selesai</a>
                    </div>
                </div>
            </li>
            
            <div class="sidebar-heading">
                Pengguna
            </div>
            <li class="nav-item">
                <a class="nav-link" href="/rating">
                    <i class="bi bi-envelope"></i>
                    <span>Semua Saran</span></a>
            </li>
            @if (Auth::guard('web')->user()->level=='admin')
            <li class="nav-item">
                <a class="nav-link" href="/detail/user">
                    <i class="fa-solid fa-user-tie"></i>
                    <span>Masyarakat</span></a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="/petugas">
                    <i class="fa-solid fa-user-secret"></i>
                    <span>Petugas</span></a>
            </li>
            @endif
            <div class="sidebar-heading">
                Berita Terkini Di Tangsel
            </div>
            <li class="nav-item">
                <a class="nav-link" href="/berita/create">
                    <i class="bi bi-grid-3x2"></i>
                    <span>Table Berita</span></a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="/berita">
                    <i class="bi bi-newspaper"></i>
                    <span>Semua Berita</span></a>
            </li>
            
            <!-- Nav Item - Utilities Collapse Menu -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
            
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            

            <!-- Nav Item - Pages Collapse Menu -->
           

            <!-- Nav Item - Charts -->
           

            <!-- Nav Item - Tables -->
             
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    <p><i class="bi bi-calendar-check"style="font-size:0.7rem;"></i> <b><span id="tampil" style="font-size:13;">
                    </span></b></p>&nbsp;&nbsp;&nbsp;
                   <p><i class="bi bi-clock" style="font-size:0.7rem;"></i> <b><span id="jam" style="font-size:13;"></span></b></p>
                   
                   <script>
                    var date = new Date();
            var tahun = date.getFullYear();
            var bulan = date.getMonth();
            var tanggal = date.getDate();
            var hari = date.getDay();
            var jam = date.getHours();
            var menit = date.getMinutes();
            var detik = date.getSeconds();
            switch(hari) {
             case 0: hari = "Minggu"; break;
             case 1: hari = "Senin"; break;
             case 2: hari = "Selasa"; break;
             case 3: hari = "Rabu"; break;
             case 4: hari = "Kamis"; break;
             case 5: hari = "Jum'at"; break;
             case 6: hari = "Sabtu"; break;
            }
            switch(bulan) {
             case 0: bulan = "Januari"; break;
             case 1: bulan = "Februari"; break;
             case 2: bulan = "Maret"; break;
             case 3: bulan = "April"; break;
             case 4: bulan = "Mei"; break;
             case 5: bulan = "Juni"; break;
             case 6: bulan = "Juli"; break;
             case 7: bulan = "Agustus"; break;
             case 8: bulan = "September"; break;
             case 9: bulan = "Oktober"; break;
             case 10: bulan = "November"; break;
             case 11: bulan = "Desember"; break;
            }
            var tampilTanggal = "Tanggal: " + hari + ", " + tanggal + " " + bulan + " " + tahun;
             
                document.getElementById("tampil").innerHTML = tampilTanggal;
                </script>
                  <script type="text/javascript">
                      window.onload = function() { jam(); }
                     
                      function jam() {
                          var e = document.getElementById('jam'),
                          d = new Date(), h, m, s;
                          h = d.getHours();
                          m = set(d.getMinutes());
                          s = set(d.getSeconds());
                     
                          e.innerHTML = h +':'+ m +':'+ s;
                     
                          setTimeout('jam()', 1000);
                      }
                     
                      function set(e) {
                          e = e < 10 ? '0'+ e : e;
                          return e;
                      }
                  </script>
                
                <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                      


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::guard('web')->user()->name }}</span>
                                <img src="{{ url('tmp_file').'/'.Auth::guard('web')->user()->foto }}"   width="41" height="38" class="rounded-circle flex-shrink-0">
        
                                </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/detail/admin">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                
                    
                    <!-- DataTales Example -->
                   @yield('konci')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white" style="margin-top:13%;">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; RPL 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" jika ingin meninggalkan web ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary btn-sm" href="/petugas-admin/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

</body>

</html>
    
@endsection