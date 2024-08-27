<?php
$data_tugas = $tugas->ambil_tugas($_GET['id']);
?>

<style>
	.gambar
	{
		border-radius: 2%;
	}
</style>


<div class="content-header">
	<div class="container-fluid">
		<h1 class="text-center mx-auto">DETAIL TUGAS</h1>
		<h3 class="text-center mx-auto"><?php echo $data_tugas['judul_tugas'] ?></h3>
	</div><!-- /.container-fluid -->
</div>

<hr>

<div class="card card-default">
	<div class="card-body">
		<div class="table-responsive">
			
			<table class="table">
				<thead>

					<tr>
						<th width="20%">Tanggal Mulai</th>
						<th width="1%"></th>
						<td><?php echo $data_tugas['tgl_mulai'] ?></td>
					</tr>

					<tr>
						<th width="20%">Tanggal Selesai</th>
						<th width="1%"></th>
						<td><?php echo $data_tugas['tgl_akhir'] ?></td>
					</tr>

					<tr>
						<th width="20%">Deskripsi</th>
						<th width="1%"></th>
						<td><?php echo $data_tugas['deskripsi'] ?></td>
					</tr>

					<tr>
						
					</tr>

					<?php if (!empty($data_tugas['files'])) { ?>
					<tr>
						<th width="20%">File</th>
						<th width="1%"></th>
						<td>Unduh File : <a href="materi/file/tugas/<?php echo $data_tugas['files'] ?>"><?php echo $data_tugas['files']?> </a></td>
					</tr>
					<?php }?>
				</thead>
			</table>

		</div>
	</div>
</div>

