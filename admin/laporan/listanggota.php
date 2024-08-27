<?php  
$list_anggota = $anggota->tampil();
?>

<div class="content-header">
	<div class="container-fluid">
		<h1 class="text-center mx-auto">DAFTAR ANGGOTA PERPUSTAKAAN SMPN2 TEMPEL</h1>
	</div><!-- /.container-fluid -->
</div>
<hr>

<div class="card">
	<div class="card-body">
		<!-- <div class="text-left">
			<a href="anggota/anggota_pdf.php" target="_blank" class="btn btn-success"><i class="fa fa-file-pdf"></i> &nbsp PRINT</a>
			<br>
			<br>
		</div> -->
		<div class="table-responsive">


			<table class="table table-borderless table-striped table-earning table-hover" id="example1">
				<thead class="thead-dark">
					<tr>
						<th width="15px" class="text-center">No.</th>
						<th class="text-center">Nomor Anggota</th>
						<th class="text-center">Nama</th>
						<th class="text-center">Kelas</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($list_anggota as $key => $value):?>
						<tr>
							<td><?php echo $key+1 ?></td>
							<td><?php echo $value['nomor_anggota'] ?></td>
							<td><?php echo $value['nama_anggota'] ?></td>
							<td class="text-center"><?php echo $value['nama_kelas'] ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

