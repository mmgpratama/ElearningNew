<?php
$id_detail_materi = $_GET['id'];
$data_materi = $materi->ambil_detail_materi($id_detail_materi);
$id_materi = $data_materi['id_materi'];

$hasil = $materi->hapus_detail($_GET["id"]);
if (empty($hasil))
{
	echo "<script>alert('Berhasil Disimpan!')</script>";
		echo "<script>location='?materi=ubah&id=$id_materi'</script>";
} 
else
{	
	echo "<script>alert('Data Gagal Dihapus')</script>";
}
?>

