<?php  
$data_pelajar = mysqli_query($mysqli, "SELECT COUNT(*) FROM tb_pelajar");
$total_pelajar = mysqli_fetch_array($data_pelajar)[0];
$data_guru = mysqli_query($mysqli, "SELECT COUNT(*) FROM tb_guru");
  $total_guru = mysqli_fetch_array($data_guru)[0];
  $data_nama_mapel = mysqli_query($mysqli, "SELECT tb_mapel.*, COUNT(tb_course.id_mapel) AS jumlah FROM tb_mapel LEFT JOIN tb_course ON tb_mapel.id_mapel=tb_course.id_mapel GROUP BY tb_mapel.nama_mapel");
  $total_nama_mapel = array();
  while ($data_pecah = $data_nama_mapel->fetch_assoc())
  {
    $total_nama_mapel[] = $data_pecah;
  }
// echo "<pre>";
// print_r($total_nama_mapel);
// echo "</pre>";
$data_mapel = mysqli_query($mysqli, "SELECT COUNT(*) FROM tb_mapel");
$total_mapel = mysqli_fetch_array($data_mapel)[0];
$data_course = mysqli_query($mysqli, "SELECT COUNT(*) FROM tb_course");
$total_course = mysqli_fetch_array($data_course)[0];

$data2_mapel = $mapel->tampil();
?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <h1 class="mx-auto text-center"><a href="?beranda">Dashboard Infografis E-Learning SMPN 1 Sarmi</a></h1>
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
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?php echo $total_pelajar ?></h3>

            <p>Pelajar</p>
          </div>
          <div class="icon">
            <i class="ion-ios-people"></i>
          </div>
          <a href="?pelajar" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?php echo $total_guru ?></sup></h3>

            <p>Guru</p>
          </div>
          <div class="icon">
            <i class="ion-ios-book"></i>
          </div>
          <a href="?guru" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3><?php echo $total_mapel ?></h3>

            <p>Mata Pelajaran</p>
          </div>
          <div class="icon">
            <i class="ion-ios-upload"></i>
          </div>
          <a href="?mapel" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3><?php echo $total_course ?></h3>

            <p>Courses</p>
          </div>
          <div class="icon">
            <i class="ion-ios-download"></i>
          </div>
          <a href="?course" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Recap Report</h5>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>

              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body bg-secondary">
            <div class="row">
              <div class="col">
                <table class="table table-borderless">
                  <thead>
                    <?php foreach ($total_nama_mapel as $key => $value): ?>
                      <tr class="chart-legend clearfix">
                        <th width="50%"><i class="far fa-circle text-warning"></i> <?php echo $value['nama_mapel'];?></th>
                        <th width="">:</th>
                        <th width="40%" class="text-center"><?php echo $value['jumlah']; ?> Courses</th>
                      </tr>
                    <?php endforeach ?>
                  </thead>
                </table>
              </div>
              <div class="chart-responsive">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- ./card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
  </div>
</div>
        <!-- /.row -->