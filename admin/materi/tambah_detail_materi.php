<?php  
$id_materi = $_GET['id'];
?>
<div class="card card-default">
	<div class="card-body">

		<h1 class="text-center" style="font-weight: bold">UBAH FILE MATERI</h1>
		<br>
		<form method="POST" enctype="multipart/form-data">

			<div class="form-group">

				<label for="exampleInputFile">File Upload</label> 

				<div class="input-group">
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="exampleInputFile" name="file[]" id="file" multiple>
						<label class="custom-file-label" for="exampleInputFile">Choose Files</label>
					</div>
				</div>
			</div>

			<hr>

			<button class="btn btn-lg btn-success btn-block" name="simpan">Simpan</button>
		</form>
	</div>
</div>

<?php 

if (isset($_POST['simpan']))
{
	
	// print_r($_POST); die;
	$hasil = $materi->tambah_detail_materi($id_materi, $_FILES['file']);

	if($hasil =='sukses')
	{
		echo "<script>alert('Berhasil Disimpan!')</script>";
		echo "<script>location='?materi=ubah&id=$id_materi'</script>";
	}
	else
	{
		echo "<script>alert('Data Gagal Disimpan');</script>";
	}
}
?>