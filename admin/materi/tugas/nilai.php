<?php  
$id_pelajar = $_GET['id'];
$id_tugas = $_GET['id_tugas'];
$data_tugas = $tugas->ambil_tugas_pelajar($id_pelajar,$id_tugas);
$data_nilai = $tugas->ambil_nilai_ON_tugas_pelajar($id_tugas, $id_pelajar);

?>
<div class="card card-default">
	<div class="card-body">

		<h1 class="text-center mx-auto" style="font-weight: bold">ENTRI NILAI</h1>
		<h3 class="text-center mx-auto">{<?php echo $data_tugas['nama_pelajar'] ?>}</h3>
		<br>
		<form method="POST" enctype="multipart/form-data">

			<div class="form-group">
				<label>Nilai</label>
				<?php if (!empty($data_nilai)): ?>
					<input type="text" class="form-control" name="nilai" required="" value="<?php echo $data_nilai['nilai'] ?>">
				<?php else: ?>
					<input type="text" class="form-control" name="nilai" required="" value="">
				<?php endif ?>
			</div>
			<button class="btn btn-lg btn-success btn-block" name="simpan">Simpan</button>
		</form>
	</div>
</div>


<?php 

if (isset($_POST['simpan']))
{
	
	// print_r($_POST); die;
	if(empty($data_nilai['nilai'])){

		$hasil = $tugas->tambah_nilai($id_tugas, $id_pelajar, $_POST['nilai']);

		if($hasil =='sukses')
		{
			echo "<script>alert('Berhasil Disimpan!')</script>";
			echo "<script>location='?tugas=list_assign&id=$id_tugas'</script>";
		}
		else
		{
			echo "<script>alert('Data Gagal Disimpan');</script>";
		}
	}
	else {
		$hasil = $tugas->ubah_nilai($_POST['nilai'],$id_tugas, $id_pelajar);

		if($hasil =='sukses')
		{
			echo "<script>alert('Berhasil Disimpan!')</script>";
			echo "<script>location='?tugas=list_assign&id=$id_tugas'</script>";
		}
		else
		{
			echo "<script>alert('Data Gagal Disimpan');</script>";
		}
	}
}
?>