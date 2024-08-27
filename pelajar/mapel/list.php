<?php  
$list_mapel = $mapel->tampil();

?>

<div class="content-header">
	<div class="container-fluid">
		<h1 class="text-center mx-auto">DAFTAR MATA PELAJARAN</h1>
	</div><!-- /.container-fluid -->
</div>
<hr>

<a class="btn btn-sm btn-success btn-block" href="?mapel=tambah" width="100"><i class="fas fa-plus-circle left"></i> TAMBAH MATA PELAJARAN BARU</a>
<hr>

<div class="card">
	<div class="card-body">
		<div class="table-responsive">


			<table class="table table-borderless table-striped table-earning table-hover" id="example2">
				<thead class="thead-dark">
					<tr>
						<th width="15px" class="text-center">No.</th>
						<th class="text-center" width="20%">Nama Mata Pelajaran</th>
						<th width="20%" class="text-center" >Aksi</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($list_mapel as $key => $value):?>
						<tr>
							<td width="10%"><?php echo $key+1 ?></td>
							<td><?php echo $value['nama_mapel'] ?></td>
							<td class="text-center">
								<a class="btn btn-sm btn-warning" href="?mapel=ubah&id=<?php echo $value["id_mapel"] ?>" width="50" onclick="return confirm('Apakah anda yakin ingin mengubah data?')"><i class="fas fa-edit"></i></a>
								<a class="btn btn-sm btn-danger" href="?mapel=hapus&id=<?php echo $value["id_mapel"] ?>" width="50" onclick="return confirm('Apakah anda yakin ingin menghapus data?')"><i class="fas fa-trash-alt"></i></a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
