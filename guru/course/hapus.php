
<?php

$hasil = $course->hapus($_GET["id"]);
if (empty($hasil))
{
	echo "<script>alert('Data Berhasil Dihapus')</script>";
	echo "<script>location='?course'</script>";
} 
else
{	
	echo "<script>alert('Data Gagal Dihapus')</script>";
	echo "<script>location='?course'</script>";
}
?>

