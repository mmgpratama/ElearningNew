<?php
$data_materi = $materi->ambil_materi($_GET['id']);
$data_materi_file = $materi->ambil_file_materi($_GET['id']);
?>

<style>
	.gambar
	{
		border-radius: 2%;
	}
</style>


<div class="content-header">
	<div class="container-fluid">
		<h1 class="text-center mx-auto">DETAIL MATERI</h1>
		<h3 class="text-center mx-auto"><?php echo $data_materi['judul_materi'] ?></h3>
	</div><!-- /.container-fluid -->
</div>

<hr>

<div class="card card-default">
	<div class="card-body">
		<div class="table-responsive">
			
			<table class="table">
				<thead>

					<tr>
						<th width="20%">Tanggal</th>
						<th width="1%"></th>
						<td><?php echo $data_materi['tanggal_upload_materi'] ?></td>
					</tr>

					<tr>
						<th width="20%">Isi Materi</th>
						<th width="1%"></th>
						<td><?php echo $data_materi['isi_materi'] ?></td>
					</tr>

					<?php foreach ($data_materi_file as $key => $value): ?>
					<tr>
						<th width="20%">File <?php echo $key+1; ?></th>
						<th width="1%"></th>
						<td>Unduh File : <a href="../../admin/materi/file/<?php echo $value['file'] ?>"><?php echo $value['file']?> </a></td>
					</tr>
					<?php endforeach ?>
				</thead>
			</table>

		</div>
	</div>
</div>

