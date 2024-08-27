<?php  
$id_course = $_GET['id'];
?>
<div class="card card-default">
	<div class="card-body">

		<h1 class="text-center" style="font-weight: bold">ENTRI MATERI</h1>
		<br>
		<form method="POST" enctype="multipart/form-data">

			<div class="form-group">
				<label>Judul Materi</label>
				<input type="text" class="form-control" name="nama" required="" value="">
			</div>

			<div class="form-group">
				<label>Tanggal</label>
				<div class="input-group date" id="reservationdate" data-target-input="nearest">
					<input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tgl" required placeholder="Tanggal Peminjaman : 01/01/01" value="<?php echo date("Y-m-d", strtotime("now")) ?>">
					<div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label>Isi Materi</label>
				<textarea class="form-control" name="isi"></textarea>
			</div>

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
	$hasil = $materi->tambah($_GET['id'], $_POST['nama'], $_POST['isi'], $_POST['tgl']);

	if($hasil =='sukses')
	{
		$id_materi = $mysqli->insert_id;
		$hasil = $materi->tambah_detail_materi($id_materi, $_FILES['file']);
		echo "<script>alert('Berhasil Disimpan!')</script>";
		echo "<script>location='?materi=list&id=$id_course'</script>";
	}
	else
	{
		echo "<script>alert('Data Gagal Disimpan');</script>";
	}
}
?>