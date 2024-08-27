<?php
$id_rasa = $_GET['id'];
$data_rasa = $rasa->ambil_rasa($id_rasa);
?>

<?php


?>


<h1 class="text-center" style="font-weight: bold">ENTRI PRODUK</h1>
<br>
<form method="POST" enctype="multipart/form-data">

	<div class="form-group">
		<label>Nama rasa</label>
		<input type="text" class="form-control" name="nama" required="" value="<?php echo $data_rasa['nama_rasa'] ?>">
	</div>

	<button class="btn btn-lg btn-success btn-block" name="simpan">Simpan</button>
</form>



<?php 

if (isset($_POST['simpan']))
{
	// print_r($_POST); die;
	$hasil = $rasa->ubah($_POST['nama'], $id_rasa);

	if($hasil =='sukses')
	{
		echo "<script>alert('Berhasil Disimpan!')</script>";
		echo "<script>location='?rasa'</script>";
	}
	else
	{
		echo "<script>alert('Data Gagal Disimpan');</script>";
	}
}
?>