<?php
$id_detail_tugas = $_GET['id'];
$data_tugas = $tugas->ambil_detail_tugas($id_detail_tugas);
$id_tugas = $data_tugas['id_tugas'];

$hasil = $tugas->hapus_detail_tugas($_GET["id"]);
if (empty($hasil))
{
	echo "<script>alert('Berhasil Disimpan!')</script>";
	echo "<script>location='?tugas=detail&id=$id_tugas'</script>";
} 
else
{	
	echo "<script>alert('Data Gagal Dihapus')</script>";
}
?>

