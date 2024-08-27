<?php
$data_course = $course->tampil();
?>

<?php


?>

<br>
<h1 class="text-center" style="font-weight: bold">ENTRI COURSE</h1>
<br>

<div class="card card-default">
	<div class="card-body">
		<form method="POST" enctype="multipart/form-data">

			<div class="form-group">
				<label>Nama Course</label>
				<input type="text" class="form-control" name="nama" required="" value="" placeholder="Ex. John Doe">
			</div>

			<div class="form-group">
				<label>Enrollment Key</label>
				<div class="input-group" id="show_hide_password">
					<input class="form-control" type="password" value="" name="password" required placeholder="Password">
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
						echo "<option value='" . $row['id_guru'] . "'>" . $row['nip'] . " &mdash; " . $row['nama_guru'] . "</option>";
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
						echo "<option value='" . $row['id_mapel'] . "'>" . $row['nama_mapel'] . "</option>";
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
	$hasil = $course->tambah($_POST['nama'], base64_encode($_POST['password']), $_POST['guru'], $_POST['mapel']);

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