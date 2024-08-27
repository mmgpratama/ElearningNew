<?php
$data_guru = $guru->ambil_guru($_GET['id']);
?>

<style>
	.gambar
	{
		border-radius: 2%;
	}
</style>

<!-- <p class="text-center">
	<img src="../images/buku/<?php echo $data_buku['gambar'] ?>" alt="Foto Tidak Tersedia" width="500px" class="gambar">
</p> -->
<div class="content-header">
	<div class="container-fluid">
		<h1 class="text-center mx-auto">DETAIL GURU</h1>
	</div><!-- /.container-fluid -->
</div>

<hr>

<div class="card card-default">
	<div class="card-body">
		<div class="table-responsive">
			
			<table class="table">
				<thead>
					<tr>
						<th width="20%">Nomor Induk Kepegawaian</th>
						<th width="1%"></th>
						<td><?php echo $data_guru['nip'] ?></td>
					</tr>

					<tr>
						<th width="20%">Nama</th>
						<th width="1%"></th>
						<td><?php echo $data_guru['nama_guru'] ?></td>
					</tr>

					<tr>
						<th width="20%">Alamat</th>
						<th width="1%"></th>
						<td><?php echo $data_guru['alamat_guru'] ?></td>
					</tr>

					<tr>
						<th width="20%">Jenis Kelamin</th>
						<th width="1%"></th>
						<td><?php echo $data_guru['jenis_kelamin_guru'] ?></td>
					</tr>
				</thead>
			</table>

		</div>
	</div>
</div>

