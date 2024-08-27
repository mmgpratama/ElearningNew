<?php
include 'header.php';

if (isset ($_GET['guru']) && empty($_GET['guru'])) {
  include 'guru/list.php';
}
elseif (isset($_GET ['guru']) && $_GET['guru']=='tambah') {
  include 'guru/tambah.php';
}
elseif (isset($_GET ['guru']) && $_GET['guru']=='hapus') {
  include 'guru/hapus.php';
}
elseif (isset($_GET ['guru']) && $_GET['guru']=='ubah') {
  include 'guru/ubah.php';
}
elseif (isset($_GET ['guru']) && $_GET['guru']=='laporan') {
  include 'laporan/list.php';
}
elseif (isset($_GET ['guru']) && $_GET['guru']=='detail') {
  include 'guru/detail.php';
}
elseif (isset($_GET['mapel']) && empty($_GET['mapel'])) {
  include 'mapel/list.php';
} 
elseif (isset($_GET['mapel']) && $_GET['mapel']=='hapus') {
  include 'mapel/hapus.php';
}
elseif (isset($_GET['mapel']) && $_GET['mapel']=='tambah') {
  include 'mapel/tambah.php';
}
elseif (isset($_GET['mapel']) && $_GET['mapel']=='ubah') {
  include 'mapel/ubah.php';
}
elseif (isset($_GET['pelajar']) && empty($_GET['pelajar'])) {
  include 'pelajar/list.php';
} 
elseif (isset($_GET['pelajar']) && $_GET['pelajar']=='hapus') {
  include 'pelajar/hapus.php';
}
elseif (isset($_GET['pelajar']) && $_GET['pelajar']=='detail') {
  include 'pelajar/detail.php';
}
elseif (isset($_GET['pelajar']) && $_GET['pelajar']=='laporan') {
  include 'laporan/listpelajar.php';
}
elseif (isset($_GET['pelajar']) && $_GET['pelajar']=='tambah') {
  include 'pelajar/tambah.php';
}
elseif (isset($_GET['pelajar']) && $_GET['pelajar']=='ubah') {
  include 'pelajar/ubah.php';
}
elseif (isset($_GET['kelas']) && empty($_GET['kelas'])) {
  include 'kelas/list.php';
}
elseif (isset($_GET['kelas']) && $_GET['kelas']=='ubah') {
  include 'kelas/ubah.php';
}
elseif (isset($_GET['kelas']) && $_GET['kelas']=='hapus') {
  include 'kelas/hapus.php';
}
elseif (isset($_GET['kelas']) && $_GET['kelas']=='tambah') {
  include 'kelas/tambah.php';
}
elseif (isset($_GET['course']) && empty ($_GET['course'])) {
  include 'course/list.php';
}
elseif (isset($_GET['course']) && $_GET['course']=='tambah') {
  include 'course/tambah.php';
}
elseif (isset($_GET['course']) && $_GET['course']=='ubah') {
  include 'course/ubah.php';
}
elseif (isset($_GET['course']) && $_GET['course']=='hapus') {
  include 'course/hapus.php';
}
elseif (isset($_GET['course']) && $_GET['course']=='detail') {
  include 'course/detail.php';
}
elseif (isset($_GET['course']) && $_GET['course']=='laporan') {
  include 'laporan/listcourse.php';
}
elseif (isset($_GET['materi']) && $_GET['materi']=='list') {
  include 'materi/list.php';
}
elseif (isset($_GET['materi']) && $_GET['materi']=='tambah') {
  include 'materi/tambah.php';
}
elseif (isset($_GET['materi']) && $_GET['materi']=='ubah') {
  include 'materi/ubah.php';
}
elseif (isset($_GET['materi']) && $_GET['materi']=='hapus') {
  include 'materi/hapus.php';
}
elseif (isset($_GET['materi']) && $_GET['materi']=='detail') {
  include 'materi/detail.php';
}
elseif (isset($_GET['detailmateri']) && $_GET['detailmateri']=='ubah') {
  include 'materi/ubah_detail_materi.php';
}
elseif (isset($_GET['detailmateri']) && $_GET['detailmateri']=='hapus') {
  include 'materi/hapus_detail_materi.php';
}
elseif (isset($_GET['detailmateri']) && $_GET['detailmateri']=='tambah') {
  include 'materi/tambah_detail_materi.php';
}
elseif (isset($_GET['tugas']) && $_GET['tugas']=='list') {
  include 'materi/tugas/list.php';
}
elseif (isset($_GET['tugas']) && $_GET['tugas']=='tambah') {
  include 'materi/tugas/tambah.php';
}
elseif (isset($_GET['tugas']) && $_GET['tugas']=='ubah') {
  include 'materi/tugas/ubah.php';
}
elseif (isset($_GET['tugas']) && $_GET['tugas']=='hapus') {
  include 'materi/tugas/hapus.php';
}
elseif (isset($_GET['tugas']) && $_GET['tugas']=='detail') {
  include 'materi/tugas/detail.php';
}
elseif (isset($_GET['tugas']) && $_GET['tugas']=='list_assign') {
  include 'materi/tugas/list_assign.php';
}
elseif (isset($_GET['tugas']) && $_GET['tugas']=='assign_detail') {
  include 'materi/tugas/assign_detail.php';
}
elseif (isset($_GET['tugas']) && $_GET['tugas']=='assign_nilai') {
  include 'materi/tugas/nilai.php';
}
elseif (isset($_GET['setting']) && empty ($_GET['setting'])) {
  include 'setting.php';
}

else
{
  include 'beranda.php';
}

?>

<?php 
include 'footer.php';
?>