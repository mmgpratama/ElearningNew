<?php
$data_kelas = $kelas->tampil();
$nis = $_GET['id'];
$data_pelajar = $pelajar->ambil_pelajar($nis);
?>

<br>
<h1 class="text-center" style="font-weight: bold">ENTRI DATA SISWA BARU</h1>
<br>

<div class="card card-default">
	<div class="card-body">
		

		<form method="POST" enctype="multipart/form-data">

			<div class="form-group">
				<label>NIS</label>
				<input type="text" class="form-control" name="nis" placeholder="XXX-XXX-XXX" required="" value="<?php echo $data_pelajar['nis'] ?>" disabled>
			</div>

			<div class="form-group" hidden>
				<label>NIS</label>
				<input type="text" class="form-control" name="nis" placeholder="XXX-XXX-XXX" required="" value="<?php echo $data_pelajar['nis'] ?>">
			</div>

			<div class="form-group">
				<label>Nama</label>
				<input type="text" class="form-control" name="nama" placeholder="John Doe" required value="<?php echo $data_pelajar['nama_pelajar'] ?>">
			</div>

			<div class="form-group">
				<label>Alamat</label>
					<input type="text" class="form-control" name="alamat" placeholder="StreetEnd" value="<?php echo $data_pelajar['alamat_pelajar'] ?>">
				</div>

			<div class="form-group">
				<label>Jenis Kelamin</label>
				<select name="jk" id="jk" class="form-control" data-placeholder="Pilih Jenis Kelamin">
					<option value="Laki-Laki" <?php if ($data_pelajar['jenis_kelamin']=='Laki-Laki') {
						echo 'selected="selected"';
					}?> class="" >Laki-Laki</option>
					<option value="Perempuan" <?php if ($data_pelajar['jenis_kelamin']=='Perempuan') {
						echo 'selected="selected"';
					}?> class="">Perempuan</option>
				</select>
			</div>

			<div class="form-group">
				<label>Tanggal Lahir</label>
				<div class="input-group date" id="reservationdate" data-target-input="nearest">
					<input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tgl_lahir" required placeholder="Tanggal Peminjaman : 01/01/01" value="<?php echo $data_pelajar['tgl_lahir'] ?>">
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
						?>
						<option value="<?php echo $row['id_kelas'] ?>" <?php if ($row['id_kelas']==$data_pelajar['id_kelas']): echo 'selected="selected"';?>
						<?php endif ?>> <?php echo $row['nama_kelas'];?> </option>;
						<?php  
					}
					?>
				</select>
			</div>
	<hr>

	<button class="btn btn-lg btn-success btn-block" name="simpan">Simpan</button>

</form>
</div>
</div>



<?php 

if (isset($_POST['simpan']))
{
	// Validasi Data Ganda
	$data = $pelajar->tampil();
	foreach ($data as $key => $value) {
		$nis1[] = $value['nis'];
	}
	if($_POST['nis']!=$data_pelajar['nis'])
	{
		if (in_array($_POST['nis'], $nis1)) {
			echo "<script>alert('NIS Guru Sudah Pernah Ditambahkan Silakan Cek Kembali Data!')</script>";
		}
		else {
			// Jalankan Fungsi Ubah, Jika Tidak Ada Data Ganda
			$hasil = $pelajar->ubah($_POST['nama'], $_POST['alamat'], $_POST['jk'], $_POST['tgl_lahir'], $_POST['kelas'], $nis);

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
	}
		else
		{
	// Jalankan Fungsi Ubah, Jika Tidak Ada Data Ganda
			$hasil = $pelajar->ubah($_POST['nama'], $_POST['alamat'], $_POST['jk'], $_POST['tgl_lahir'], $_POST['kelas'], $nis);

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
	}
?>
