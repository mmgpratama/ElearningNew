<?php  
$list_buku = $buku->tampil();
?>

<div class="content-header">
	<div class="container-fluid">
		<h1 class="text-center mx-auto">DAFTAR BUKU PERPUSTAKAAN SMPN2 TEMPEL</h1>
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
						<th class="text-center">ISBN buku</th>
						<th class="text-center">Judul Buku</th>
						<th class="text-center">Jumlah</th>
						<th class="text-center">Penerbit</th>
						<th class="text-center">Kategori</th>
						<th class="text-center">Rak</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($list_buku as $key => $value):?>
						<tr>
							<td><?php echo $key+1 ?></td>
							<td><?php echo $value['isbn'] ?></td>
							<td><?php echo $value['judul'] ?></td>
							<td><?php echo $value['jumlah'] ?></td>
							<td><?php echo $value['nama_penerbit'] ?></td>
							<td><?php echo $value['nama_kategori'] ?></td>
							<td><?php echo $value['nama_rak'] ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

