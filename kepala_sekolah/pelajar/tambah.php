<?php
// $data_kelas = $kelas->tampil();
?>

<?php


?>

<br>
<h1 class="text-center" style="font-weight: bold">ENTRI DATA SISWA BARU</h1>
<br>

<div class="card card-default">
	<div class="card-body">
		

		<form method="POST" enctype="multipart/form-data">

			<div class="form-group">
				<label>NIS</label>
				<input type="text" class="form-control" name="nis" placeholder="XXX-XXX-XXX" required="" value="">
			</div>

			<div class="form-group">
				<label>Nama</label>
				<input type="text" class="form-control" name="nama" placeholder="John Doe" required value="">
			</div>

			<div class="form-group">
				<label>Alamat</label>
					<input type="text" class="form-control" name="alamat" placeholder="StreetEnd">
				</div>

			<div class="form-group">
				<label>Jenis Kelamin</label>
				<select name="jk" id="jk" class="form-control" data-placeholder="Pilih Jenis Kelamin">
					<option value="Laki-Laki" class="">Laki-Laki</option>
					<option value="Perempuan" class="">Perempuan</option>
				</select>
			</div>

			<div class="form-group">
				<label>Tanggal Lahir</label>
				<div class="input-group date" id="reservationdate" data-target-input="nearest">
					<input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tgl_lahir" required placeholder="Tanggal Peminjaman : 01/01/01" value="<?php echo date("Y-m-d", strtotime("now")) ?>">
					<div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label>Kelas</label>
				<select class="form-control select2bs4" style="width: 100%;" data-placeholder="Pilih Kelas" name="kelas" id="kelas" required>
					<option value="" class="text-center"></option>
					<?php
					$query = "SELECT * FROM tb_kelas";
					$kelas = $mysqli->prepare($query);
					$kelas->execute();
					$res1 = $kelas->get_result();
					while ($row = $res1->fetch_assoc()) {
						echo "<option value='" . $row['id_kelas'] . "'>" . $row['nama_kelas'] . "</option>";
					}
					?>
				</select>
			</div>

			<div class="form-group">
				<label>PASSWORD</label>
					<input type="text" class="form-control" name="password" placeholder="*** *** ***">
				</div>
			</div>

<!-- 	<div class="form-group">
		<label>Gambar</label>
		<input type="file" class="form-control" name="gambar" value="">
	</div> -->
	<hr>

	<button class="btn btn-lg btn-success btn-block" name="simpan">Simpan</button>

</form>
</div>
</div>



<?php 

if (isset($_POST['simpan']))
{
	// $data = $pelajar->tampil();
	// foreach ($data as $key => $value) {
	// 	$nis[] = $value['nis'];
	// }
	// if (in_array($_POST['nis'], $nis)) {
	// 	echo "<script>alert('NIS Sudah Pernah Ditambahkan Silakan Cek Kembali Data!')</script>";
	// }
	// else{
	// print_r($_POST); die;
		$hasil = $pelajar->tambah($_POST['nis'], $_POST['nama'], $_POST['alamat'], $_POST['jk'], $_POST['tgl_lahir'], $_POST['kelas'], base64_encode($_POST['password']));

		if($hasil =='sukses')
		{
			echo "<script>alert('Berhasil Disimpan!')</script>";
			echo "<script>location='?pelajar'</script>";
		}
		else
		{
			echo "<script>alert('Data Gagal Disimpan');</script>";
		}
	}
// }
?>
