<?php
$id_course = $_GET['id'];

$hasil = $materi->hapus($_GET["id"]);
if (empty($hasil))
{
	echo "<script>alert('Data Berhasil Dihapus')</script>";
	echo "<script>location='?materi=list&id=$id_course'</script>";
} 
else
{	
	echo "<script>alert('Data Gagal Dihapus')</script>";
}
?>

