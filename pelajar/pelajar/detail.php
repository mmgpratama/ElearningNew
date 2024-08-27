<?php
$data_pelajar = $pelajar->ambil_pelajar($_GET['id']);
?>

<!-- <style>
	.gambar
	{
		border-radius: 2%;
	}
</style>
 -->
<!-- <p class="text-center">
	<img src="../images/SuratKeluar/<?php echo $data_pelajar['gambar'] ?>" alt="Foto Tidak Tersedia" width="500px" class="gambar">
</p> -->

<div class="content-header">
	<div class="container-fluid">
		<h1 class="text-center mx-auto">DETAIL 	SISWA</h1>
	</div><!-- /.container-fluid -->
</div>

<div class="card card-default">
	<div class="card-body">
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th width="20%">NIS</th>
						<th width="1%"></th>
						<td><?php echo $data_pelajar['nis'] ?></td>
					</tr>

					<tr>
						<th width="20%">Nama Pelajar</th>
						<th width="1%"></th>
						<td><?php echo $data_pelajar['nama_pelajar'] ?></td>
					</tr>

					<tr>
						<th width="20%">Alamat</th>
						<th width="1%"></th>
						<td><?php echo $data_pelajar['alamat_pelajar'] ?></td>
					</tr>

					<tr>
						<th width="20%">Jenis Kelamin</th>
						<th width="1%"></th>
						<td><?php echo $data_pelajar['jenis_kelamin'] ?></td>
					</tr>

					<tr>
						<th width="20%">Tanggal Lahir</th>
						<th width="1%"></th>
						<td><?php echo $data_pelajar['tgl_lahir'] ?></td>
					</tr>

					<tr>
						<th width="20%">Kelas</th>
						<th width="1%"></th>
						<td><?php echo $data_pelajar['nama_kelas'] ?></td>
					</tr>

				</thead>
			</table>
		</div>
	</div>
</div>

