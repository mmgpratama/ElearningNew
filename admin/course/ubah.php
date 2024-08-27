<?php
$id_course = $_GET['id'];
$data_course = $course->ambil_course($id_course);
?>

<?php


?>

<br>
<h1 class="text-center" style="font-weight: bold">PERUBAHAN DATA COURSE</h1>
<br>
<div class="card card-default">
	<div class="card-body">
		<form method="POST" enctype="multipart/form-data">

			<div class="form-group">
				<label>Nama Course</label>
				<input type="text" class="form-control" name="nama" required="" value="<?php echo $data_course['nama_course'] ?>" placeholder="Ex. John Doe">
			</div>

			<div class="form-group">
				<label>Enrollment Key</label>
				<div class="input-group" id="show_hide_password">
					<input class="form-control" type="password" value="<?php echo base64_decode($data_course['enrolment_key']) ?>" name="password" required placeholder="Password">
					<div class="input-group-append">
						<span class="input-group-text"><a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></span></a>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label>Guru</label>
				<select class="form-control select2bs4" style="width: 100%;" data-placeholder="Pilih Guru" name="guru" id="guru" required>
					<option value="" class="text-center"></option>
					<?php
					$query = "SELECT * FROM tb_guru";
					$guru = $mysqli->prepare($query);
					$guru->execute();
					$res1 = $guru->get_result();
					while ($row = $res1->fetch_assoc()) {
						?>
						<option value="<?php echo $row['id_guru'] ?>" <?php if ($row['id_guru']==$data_course['id_guru']): echo 'selected="selected"';?>
						<?php endif ?>> <?php echo $row['nip'] . " &mdash; " . $row['nama_guru'];?> </option>;
						<?php  
					}
					?>
				</select>
			</div>

			<div class="form-group">
				<label>Mata Pelajaran</label>
				<select class="form-control select2bs4" style="width: 100%;" data-placeholder="Pilih Mata Pelajaran" name="mapel" id="mapel" required>
					<option value="" class="text-center"></option>
					<?php
					$query = "SELECT * FROM tb_mapel";
					$mapel = $mysqli->prepare($query);
					$mapel->execute();
					$res1 = $mapel->get_result();
					while ($row = $res1->fetch_assoc()) {
						?>
						<option value="<?php echo $row['id_mapel'] ?>" <?php if ($row['id_mapel']==$data_course['id_mapel']): echo 'selected="selected"';?>
						<?php endif ?>> <?php echo $row['nama_mapel'];?> </option>;
						<?php  
					}
					?>
				</select>
			</div>

			<button class="btn btn-lg btn-success btn-block" name="simpan">Simpan</button>
		</form>
	</div>
</div>


	<?php 

	if (isset($_POST['simpan']))
	{
	// print_r($_POST); die;
		$hasil = $course->ubah($_POST['nama'], base64_encode($_POST['password']), $_POST['guru'], $_POST['mapel'], $id_course);

		if($hasil =='sukses')
		{
			echo "<script>alert('Berhasil Disimpan!')</script>";
			echo "<script>location='?course'</script>";
		}
		else
		{
			echo "<script>alert('Data Gagal Disimpan');</script>";
		}
	}
?>