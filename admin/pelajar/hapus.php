
<?php

$hasil = $pelajar->hapus($_GET["id"]);
if (empty($hasil))
{
	echo "<script>alert('Data Berhasil Dihapus')</script>";
	echo "<script>location='?pelajar'</script>";
} 
else
{	
	echo "<script>alert('Data Gagal Dihapus')</script>";
	echo "<script>location='?pelajar'</script>";
}
?>

