<?php  
$list_pelajar = $pelajar->tampil();
?>

<div class="content-header">
	<div class="container-fluid">
		<h1 class="text-center mx-auto">DAFTAR PELAJAR SMPN 1 SARMI</h1>
	</div><!-- /.container-fluid -->
</div>
<hr>

<hr>


<div class="card">
	<div class="card-body">
		<!-- <div class="text-left">
			<a href="anggota/anggota_pdf.php" target="_blank" class="btn btn-success"><i class="fa fa-file-pdf"></i> &nbsp PRINT</a>
			<br>
			<br>
		</div> -->
		<div class="table-responsive">


			<table class="table table-borderless table-striped table-earning table-hover" id="example2">
				<thead class="thead-dark">
					<tr>
						<th width="15px" class="text-center">No.</th>
						<th class="text-center">NIS</th>
						<th class="text-center">Nama</th>
						<th class="text-center">Kelas</th>
						<th width="" class="text-center" >Aksi</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($list_pelajar as $key => $value):?>
						<tr>
							<td><?php echo $key+1 ?></td>
							<td><?php echo $value['nis'] ?></td>
							<td><?php echo $value['nama_pelajar'] ?></td>
							<td class="text-center"><?php echo $value['nama_kelas'] ?></td>
							<td class="text-center">
								<a class="btn btn-sm btn-info" href="?pelajar=detail&id=<?php echo $value["id_pelajar"] ?>" width="50"><i class="fas fa-search"></i></a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

