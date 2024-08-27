<?php 
$id_pelajar = $_SESSION['user']['id']; 
$data_mapel = mysqli_query($mysqli, "SELECT COUNT(*) FROM tb_mapel");
$total_mapel = mysqli_fetch_array($data_mapel)[0];
$data_course = mysqli_query($mysqli, "SELECT COUNT(*) FROM tb_course");
$total_course = mysqli_fetch_array($data_course)[0];
$data_mycourse = mysqli_query($mysqli, "SELECT COUNT(*) FROM tb_detail_course WHERE id_pelajar='$id_pelajar'");
$total_mycourse = mysqli_fetch_array($data_mycourse)[0];
$data_guru = mysqli_query($mysqli, "SELECT COUNT(*) FROM tb_guru");
$total_guru = mysqli_fetch_array($data_guru)[0];
?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <h1 class="mx-auto text-center"><a href="?beranda">Dashboard Pelajar SMPN 1 SARMI</a></h1>
    <hr>
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="card">
  <div class="card-body">
    <!-- Main content -->
    <div class="row">
      <div class="col-6">
        <!-- small box -->
        <!-- <div class="small-box bg-info">
          <div class="inner">
            <h3><?php echo $total_guru ?></h3>

            <p>Guru</p>
          </div>
          <div class="icon">
            <i class="ion-ios-people"></i>
          </div>
          <a href="?guru" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div> -->
      </div>
      <!-- ./col -->
      <div class="col-6">
        <!-- small box -->
        <!-- <div class="small-box bg-success">
          <div class="inner">
            <h3><?php echo $total_mapel ?></sup></h3>

            <p>Mata Pelajaran</p>
          </div>
          <div class="icon">
            <i class="ion-ios-book"></i>
          </div>
          <a href="?mapel" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div> -->
      </div>
      <!-- ./col -->
      <div class="col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3><?php echo $total_course ?></h3>

            <p>Courses</p>
          </div>
          <div class="icon">
            <i class="ion-ios-upload"></i>
          </div>
          <a href="?peminjaman" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3><?php echo $total_mycourse ?></h3>

            <p>My Courses</p>
          </div>
          <div class="icon">
            <i class="ion-ios-download"></i>
          </div>
          <a href="?pengembalian" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
  </div>
</div>
        <!-- /.row -->