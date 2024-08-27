<?php  
$id_course = $_GET['id'];
$data_course = $course->ambil_course($id_course);
?>
<div class="card card-default">
	<div class="card-body">

		<h1 class="text-center mx-auto" style="font-weight: bold">ENTRI TUGAS</h1>
		<h3 class="text-center mx-auto">{<?php echo $data_course['nama_course'] ?>}</h3>
		<br>
		<form method="POST" enctype="multipart/form-data">

			<div class="form-group">
				<label>Judul Tugas</label>
				<input type="text" class="form-control" name="nama" required="" value="">
			</div>

			<div class="form-group">
				<label>Tanggal Mulai</label>
				<div class="input-group date" id="reservationdate" data-target-input="nearest">
					<input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tgl" required placeholder="Tanggal Mulai : 01/01/01" value="<?php echo date("Y-m-d", strtotime("now")) ?>">
					<div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label>Tanggal Pengumpulan</label>
				<div class="input-group date" id="reservationdate2" data-target-input="nearest">
					<input type="text" class="form-control datetimepicker-input" data-target="#reservationdate2" name="tgl1" required placeholder="Tanggal Pengumpulan : 01/01/01" value="<?php echo date("Y-m-d", strtotime("+7 days", strtotime("now"))) ?>">
					<div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label>Deskripsi</label>
				<textarea class="form-control" name="isi" required></textarea>
			</div>

			<div class="form-group">
				<label for="exampleInputFile">File Upload (Jika Ada)</label>
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
	$hasil = $tugas->tambah($_POST['nama'], $_GET['id'], $_POST['isi'], $_POST['tgl'], $_POST['tgl1'], $_FILES['file']);

	if($hasil =='sukses')
	{
		echo "<script>alert('Berhasil Disimpan!')</script>";
		echo "<script>location='?tugas=list&id=$id_course'</script>";
	}
	else
	{
		echo "<script>alert('Data Gagal Disimpan');</script>";
	}
}
?>