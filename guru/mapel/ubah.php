<?php
$id_mapel = $_GET['id'];
$data_mapel = $mapel->ambil_mapel($id_mapel);
?>

<?php


?>

<br>
<h1 class="text-center" style="font-weight: bold">PERUBAHAN KETERANGAN mapel BUKU</h1>
<br>

<div class="card card-default">
	<div class="card-body">
		<form method="POST" enctype="multipart/form-data">

			<div class="form-group">
				<label>Nama Mata Pelajaran</label>
				<input type="text" class="form-control" name="nama" required="" value="<?php echo $data_mapel['nama_mapel'] ?>">
			</div>
			
			<button class="btn btn-lg btn-success btn-block" name="simpan">Simpan</button>
		</form>
	</div>
</div>

<?php 

if (isset($_POST['simpan']))
{
	// print_r($_POST); die;
	$hasil = $mapel->ubah($_POST['nama'], $id_mapel);

	if($hasil =='sukses')
	{
		echo "<script>alert('Berhasil Disimpan!')</script>";
		echo "<script>location='?mapel'</script>";
	}
	else
	{
		echo "<script>alert('Data Gagal Disimpan');</script>";
	}
}
?>
