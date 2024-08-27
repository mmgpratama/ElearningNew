<?php
$data_pelajar = $pelajar->ambil_pelajar($_SESSION['pelajar']['id']);
?>

<?php


?>

<br>
<h1 class="text-center" style="font-weight: bold">ENTRI admin</h1>
<br>

<div class="card card-default">
	<div class="card-body">
		<form method="POST" enctype="multipart/form-data">

			<div class="form-group">
				<label>Nama Admin</label>
				<input type="text" class="form-control" name="nama" required="" value="<?php echo $data_pelajar['nama_pelajar']?>">
			</div>
			
			<button class="btn btn-lg btn-success btn-block" name="simpan">Simpan</button>
		</form>
	</div>
</div>

<?php 

if (isset($_POST['simpan']))
{
	// print_r($_POST); die;
	$hasil = $admin->ubah($data_admin['username'], $data_admin['password'], $data_admin['hak_akses'], $_POST['nama'], $data_admin['id_petugas']);

	if($hasil =='sukses')
	{
		echo "<script>alert('Berhasil Disimpan!')</script>";
		echo "<script>location='?beranda'</script>";
	}
	else
	{
		echo "<script>alert('Data Gagal Disimpan');</script>";
	}
}
?>
