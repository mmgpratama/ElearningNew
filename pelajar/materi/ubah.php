<?php 
$id_materi = $_GET['id']; 
$data_materi = $materi->ambil_materi($id_materi);
$id_course = $data_materi['id_course'];
?>

<div class="card card-default">
	<div class="card-body">

		<h1 class="text-center" style="font-weight: bold">ENTRI MATERI</h1>
		<br>
		<form method="POST" enctype="multipart/form-data">

			<div class="form-group">
				<label>Judul Materi</label>
				<input type="text" class="form-control" name="nama" required="" value="<?php echo $data_materi['judul_materi'] ?>">
			</div>

			<div class="form-group">
				<label>Tanggal</label>
				<div class="input-group date" id="reservationdate" data-target-input="nearest">
					<input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tgl" required placeholder="Tanggal Peminjaman : 01/01/01" value="<?php echo $data_materi['tanggal_upload_materi'] ?>">
					<div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label>Isi Materi</label>
				<textarea class="form-control" name="isi" required><?php echo $data_materi['isi_materi'] ?></textarea>
			</div>

			<div class="form-group">

				<label for="exampleInputFile">File Upload</label> 
				<?php
				$query = "SELECT * FROM tb_detail_materi WHERE id_materi='$id_materi'";
				$dm = $mysqli->prepare($query);
				$dm->execute();
				$res1 = $dm->get_result();
				while ($row = $res1->fetch_assoc()) {
					?>
					<input type="text" class="form-control" disabled value="<?php echo $row['file'] ?>">
					<?php  
				}
				?>
				<div class="input-group">
					<div class="custom-file">
						<?php
						$query = "SELECT * FROM tb_detail_materi WHERE id_materi='$id_materi'";
						$dm = $mysqli->prepare($query);
						$dm->execute();
						$res1 = $dm->get_result();
						while ($row = $res1->fetch_assoc()) {
							?>
							<input type="file" class="custom-file-input" id="exampleInputFile" name="file[]" id="file" multiple>
							<?php  
						}
						?>
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
	$hasil = $materi->ubah($_POST['nama'], $_POST['tgl'], $_POST['isi'], $id_materi);
	$hasil2 = $materi->ubah_detail($_FILES['file'], $id_materi);
	if($hasil =='sukses' && $hasil2=='sukses')
	{
		echo "<script>alert('Berhasil Disimpan!')</script>";
		echo "<script>location='?materi=list&id=$id_course</script>";
	}
	else
	{
		echo "<script>alert('Data Gagal Disimpan');</script>";
	}
}
?>