<?php
$data_tugas = $tugas->ambil_tugas_pelajar($_GET['id'], $_GET['id_tugas']);
$id_tugas = $data_tugas['id_tugas'];
$data_tugas2 = $tugas->tampil_detail_tugas_pelajar($id_tugas, $_GET['id']);
$data_nilai = $tugas->ambil_nilai_ON_tugas_pelajar($_GET['id_tugas'], $_GET['id']);

?>

<style>
	.gambar
	{
		border-radius: 2%;
	}
</style>


<div class="content-header">
	<div class="container-fluid">
		<h1 class="text-center mx-auto">DETAIL FILE PENGUMPULAN TUGAS</h1>
		<h3 class="text-center mx-auto"><?php echo $data_tugas['judul_tugas'] ?></h3>
		<h4 class="text-center mx-auto"><?php echo $data_tugas['nama_course'] ?></h4>
	</div><!-- /.container-fluid -->
</div>

<hr>

<div class="card card-default">
	<div class="card-body">
		<div class="table-responsive">
			
			<table class="table">
				<thead>


					<?php foreach ($data_tugas2 as $key => $value): ?>
						<tr>
							<th width="20%">File <?php echo $key+1; ?></th>
							<th width="1%"></th>
							<td>Unduh File : <a href="../../../admin/materi/file/tugas<?php echo $value['dokumen'] ?>"><?php echo $value['dokumen']?> </a></td>
						</tr>

						<tr>
							<?php if (!empty($data_nilai)): ?>
								<th width="20%">Nilai</th>
								<th width="1%"></th>
								<td><strong><?php echo $data_nilai['nilai'] ?></strong></td>
							<?php endif ?>
						</tr>
					<?php endforeach ?>
				</thead>
			</table>

		</div>
	</div>
</div>

