<?php  
$list_penerbit = $penerbit->tampil();

?>

<div class="content-header">
	<div class="container-fluid">
		<h1 class="text-center mx-auto">DAFTAR PENERBIT BUKU PERPUSTAKAAN SMPN2 TEMPEL</h1>
	</div><!-- /.container-fluid -->
</div>
<hr>

<div class="card">
	<div class="card-body">
		<div class="table-responsive">


			<table class="table table-borderless table-striped table-earning table-hover" id="example1">
				<thead class="thead-dark">
					<tr>
						<th width="15px" class="text-center">No.</th>
						<th class="text-center">Penerbit</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($list_penerbit as $key => $value):?>
						<tr>
							<td width="10%"><?php echo $key+1 ?></td>
							<td><?php echo $value['nama_penerbit'] ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
