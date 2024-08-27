<br>
<h1 class="text-center" style="font-weight: bold">ENTRI DATA GURU</h1>
<br>

<div class="card card-default">
	<div class="card-body">
		
		
		<form method="POST" enctype="multipart/form-data">

			<div class="form-group">
				<label>Nomor Induk Kepegawaian (NIP)</label>
				<input type="text" class="form-control" name="nip" placeholder="NIP : 0000-000-00-0" required="" value="">
			</div>

			<div class="form-group">
				<label>Nama</label>
				<input type="text" class="form-control" name="nama" placeholder="John Doe" required value="">
			</div>

			<div class="form-group">
				<label>Alamat</label>
				<input type="text" class="form-control" name="alamat" placeholder="Yogyakarta" required="" value="">
			</div>

			<div class="form-group">
				<label>Jenis Kelamin</label>
				<select name="jk" id="jk" class="form-control" data-placeholder="Pilih Jenis Kelamin">
					<option value="Laki-Laki" class="">Laki-Laki</option>
					<option value="Perempuan" class="">Perempuan</option>
				</select>
			</div>

			<div class="form-group">
				<label>Username</label>
				<input type="text" class="form-control" name="username" placeholder="johndoe77" required value="">
			</div>

			<div class="form-group">
				<label>Password</label>
				<div class="input-group" id="show_hide_password">
					<input class="form-control" type="password" value="" name="password" required placeholder="Password">
					<div class="input-group-append">
						<span class="input-group-text"><a href=""><i class="fas fa-eye-slash" aria-hidden="true"></i></a></span>
					</div>
					<div class="invalid-feedback">
						Mohon isi kata sandi
					</div>
				</div>
			</div>
			<hr>

			<button class="btn btn-lg btn-success btn-block" name="simpan">Simpan</button>

		</form>
	</div>
</div>



<?php

$hak_akses = 'Guru'; 

if (isset($_POST['simpan']))
{
	$data_user = $user->tampil();
	foreach ($data_user as $key => $value) {
		$username[] = $value['username'];
	}
	if (in_array($_POST['username'], $username)) {
		echo "<script>alert('Username Guru Sudah Pernah Ditambahkan Silakan Cek Kembali Data!')</script>";
	}
	else
	{
		$hasil = $user->tambah($_POST['username'], base64_encode($_POST['password']), $hak_akses);
		$id_user = mysqli_insert_id($mysqli);
		if($hasil=='sukses')
		{
			$data = $guru->tampil();
			foreach ($data as $key => $value) {
				$nip[] = $value['nip'];
			}
			if (in_array($_POST['nip'], $nip)) {
				echo "<script>alert('NIP Guru Sudah Pernah Ditambahkan Silakan Cek Kembali Data!')</script>";
			}
			else
			{
				//Jika Tidak Ada Data Ganda, Jalankan Fungsi Tambah
				$hasil = $guru->tambah($_POST['nip'], $_POST['nama'], $_POST['alamat'], $_POST['jk'], $id_user);

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
		
		else {
			echo "<script>alert('Data Gagal Disimpan');</script>";
		}
	}
	// Validasi Data Ganda
	
}
?>
