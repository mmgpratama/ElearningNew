<?php  
$list_mapel = $mapel->tampil();

?>

<div class="content-header">
	<div class="container-fluid">
		<h1 class="text-center mx-auto">DAFTAR MATA PELAJARAN</h1>
	</div><!-- /.container-fluid -->
</div>
<hr>

<hr>

<div class="card">
	<div class="card-body">
		<div class="table-responsive">


			<table class="table table-borderless table-striped table-earning table-hover" id="example2">
				<thead class="thead-dark">
					<tr>
						<th width="15px" class="text-center">No.</th>
						<th class="text-center" width="20%">Nama Mata Pelajaran</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($list_mapel as $key => $value):?>
						<tr>
							<td width="10%"><?php echo $key+1 ?></td>
							<td><?php echo $value['nama_mapel'] ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
