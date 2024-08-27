<?php  
$list_kelas = $kelas->tampil();
?>

<div class="content-header">
	<div class="container-fluid">
		<h1 class="text-center mx-auto">DAFTAR KELAS ANGGOTA PERPUSTAKAAN SMPN2 TEMPEL</h1>
	</div><!-- /.container-fluid -->
</div>
<hr>

<div class="card">
	<div class="card-body">
		<!-- <div class="text-left">
			<a href="kelas/kelas_pdf.php" target="_blank" class="btn btn-success"><i class="fa fa-file-pdf"></i> &nbsp PRINT</a>
			<br>
			<br>
		</div> -->
		<div class="table-responsive">


			<table class="table table-borderless table-striped table-earning table-hover" id="example2">
				<thead class="thead-dark">
					<tr>
						<th width="15px" class="text-center">No.</th>
						<th class="text-center">Nama Kelas</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($list_kelas as $key => $value):?>
						<tr>
							<td><?php echo $key+1 ?></td>
							<td class="text-center"><?php echo $value['nama_kelas'] ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

