<?php
$id_course = $_GET['id_course'];
$id_tugas = $_GET['id'];

$hasil = $tugas->hapus($_GET["id"]);
if (empty($hasil))
{
	echo "<script>alert('Data Berhasil Dihapus')</script>";
	echo "<script>location='?tugas=list&id=$id_course'</script>";
} 
else
{	
	echo "<script>alert('Data Gagal Dihapus')</script>";
	echo "<script>location=''</script>";
}
?>

