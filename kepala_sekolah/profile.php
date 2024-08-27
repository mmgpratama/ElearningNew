<?php  
$data_guru = $guru->ambil_guru($_SESSION['guru']['id']);
?>

<br>
<h1 class="text-center" style="font-weight: bold">PROFILE GURU</h1>
<br>

<div class="card card-default">
	<div class="card-body">
		

		<form method="POST" enctype="multipart/form-data">

			<div class="form-group">
				<label>Nomor Induk Kepegawaian (NIP)</label>
				<input type="text" class="form-control" name="nip" placeholder="NIP : 0000-000-00-0" required="" value="<?php echo $data_guru['nip'] ?>" data-inputmask="'mask': ['99999999 999999 9 999']" data-mask>
			</div>

			<div class="form-group">
				<label>Nama</label>
				<input type="text" class="form-control" name="nama" placeholder="John Doe" required value="<?php echo $data_guru['nama_guru'] ?>">
			</div>

			<div class="form-group">
				<label>Alamat</label>
				<input type="text" class="form-control" name="alamat" placeholder="Yogyakarta" required="" value="<?php echo $data_guru['alamat_guru'] ?>">
			</div>

			<div class="form-group">
				<label>Jenis Kelamin</label>
				<select name="jk" id="jk" class="form-control" data-placeholder="Pilih Jenis Kelamin">
					<option value="Laki-Laki" <?php if ($data_guru['jenis_kelamin_guru']=='Laki-Laki') {
						echo 'selected="selected"';
					}?> class="">Laki-Laki</option>
					<option value="Perempuan" <?php if ($data_guru['jenis_kelamin_guru']=='Perempuan') {
						echo 'selected="selected"';
					}?> class="">Perempuan</option>
				</select>
			</div>
			<hr>

			<button class="btn btn-lg btn-success" name="simpan">Simpan</button>

		</form>
	</div>
</div>



<?php 

if (isset($_POST['simpan']))
{
	// Validasi Data Ganda
	$data = $guru->tampil();
	foreach ($data as $key => $value) {
		$nip[] = $value['nip'];
	}
	if($_POST['nip']!=$data_guru['nip'])
	{
		if (in_array($_POST['nip'], $nip)) {
			echo "<script>alert('NIP Guru Sudah Pernah Ditambahkan Silakan Cek Kembali Data!')</script>";
		}
		else {
			// Jalankan Fungsi Ubah, Jika Tidak Ada Data Ganda
			$hasil = $guru->ubah($_POST['nip'], $_POST['nama'], $_POST['alamat'], $_POST['jk'], $_SESSION['guru']['id']);

			if($hasil =='sukses')
			{
				echo "<script>alert('Berhasil Disimpan!')</script>";
				echo "<script>location='?beranda'</script>";
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
			$hasil = $guru->ubah($_POST['nip'], $_POST['nama'], $_POST['alamat'], $_POST['jk'], $_SESSION['guru']['id']);

			if($hasil =='sukses')
			{
				echo "<script>alert('Berhasil Disimpan!')</script>";
				echo "<script>location='?guru'</script>";
			}
			else
			{
				echo "<script>alert('Data Gagal Disimpan');</script>";
			}
		}
	}
?>
