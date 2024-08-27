<?php  
include_once '../config/mysqli.php';

if (!isset($_SESSION['user'])) {
  echo "<script>alert('Anda Harus Login Terlebih Dahulu!');</script>";
  echo "<script>location='../login.php';</script>";
}elseif (isset($_SESSION['user']))
{
  $role = $user->ambil_user($_SESSION['user']['id']);
  if ($role['hak_akses'] != "Pelajar") {
    echo "<script>alert('Anda Bukan Pelajar!');</script>";
    echo "<script>location='../index.php';</script>";
  }
}

$id_user = $_SESSION['user']['id'];
$query = "SELECT * FROM tb_pelajar WHERE id_user=$id_user";
$data = $mysqli->prepare($query);
$data->execute();
$res1 = $data->get_result();
$data_pelajar = $res1->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pelajar SMPN 1 SARMI | Dashboard</title>

  <!-- Jquery CSS -->
  <link rel="stylesheet" href="../assets/plugins/jquery-ui/jquery-ui.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <link rel="shortcut icon" href="../assets/dist/img/sarmi.png">
  <!-- Select2 -->
  <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css" rel="stylesheet">

  <!-- Toastr -->
  <link rel="stylesheet" href="../assets/plugins/toastr/toastr.min.css">


  <style type="text/css">
    @media(min-width: 768px)
    {
      #page-wrapper 
      {
        margin: 0 0 0 260px;
        padding: 15px;
        min-height: 1000px;
      }

      .navbar-side
      {
        width: 260px;
        position: absolute;
/*    z-index: 1;*/
min-height: 1000px;
}
}

</style>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
  <div class="page-wrapper wrapper">
    <div class="page-wrapper wrapper">
      <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="../assets/dist/img/sarmi.png" alt="AdminLTELogo" width="15%">
    </div>
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="?beranda" class="nav-link">Home</a>
          </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="fas fa-user-cog"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">Actions</span>
              <div class="dropdown-divider"></div>
              <a href="?setting" class="dropdown-item">
                <i class="fas fa-tools mr-2"></i> Settings
                <span class="float-right text-muted text-sm">#</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="../logout.php" class="dropdown-item">
                <i class="fas fa-lock mr-2"></i> Logout
                <span class="float-right text-muted text-sm">#</span>
              </a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="navbar-side main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index.php" class="brand-link">
          <img src="../assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Pelajar</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="../assets/dist/img/admin1.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block"><?php echo $data_pelajar['nama_pelajar'] ?></a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item">
            <a href="?beranda" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Kelola Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="?guru" class="nav-link" style="background-color: #18211a;">
                  <i class="fas fa-warehouse nav-icon" style="color: #dae6fb;"></i>
                  <p>Data Guru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?mapel" class="nav-link" style="background-color: #18211a;">
                  <i class="fas fa-clipboard-list nav-icon" style="color: #dae6fb;"></i>
                  <p>Data Mata Pelajaran</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="?course" class="nav-link" style="background-color: #18211a;">
                  <i class="fas fa-map nav-icon" style="color: #dae6fb;"></i>
                  <p>Data Course</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?course=mycourse" class="nav-link" style="background-color: #18211a;">
                  <i class="fas fa-map nav-icon" style="color: #dae6fb;"></i>
                  <p>My Course</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="?buku" class="nav-link" style="background-color: #18211a;">
                  <i class="fas fa-book nav-icon"style="color: #dae6fb;"></i>
                  <p>Data Buku</p>
                </a>
              </li> -->
            </ul>
          </li>
<!--           <li class="nav-item">
            <a href="" class="nav-link">
             <i class="nav-icon fas fa-sync-alt"></i>
             <p>
              Transaksi
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="?peminjaman" class="nav-link" style="background-color: #382c0a;">
                <i class="fas fa-upload nav-icon" style="color: #dae6fb;"></i>
                <p>Peminjaman</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?pengembalian" class="nav-link" style="background-color: #382c0a;">
                <i class="fas fa-download nav-icon" style="color: #dae6fb;"></i>
                <p>Pengembalian</p>
              </a>
            </li>
          </ul>
        </li> -->
        <!-- <li class="nav-item">
          <a href="?kehilangan" class="nav-link">
            <i class="fas fa-times-circle nav-icon" style="color: #dae6fb;"></i>
            <p>Kehilangan Buku</p>
          </a>
        </li>
      </li> -->
    </ul>
  </li>
</ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="content">
    <div class="container-fluid">