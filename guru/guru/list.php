<?php  
$list_guru = $guru->tampil();
?>

<div class="content-header">
	<div class="container-fluid">
		<h1 class="text-center mx-auto">DAFTAR GURU SMPN1 SARMI</h1>
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
						<th class="text-center">NIP</th>
						<th class="text-center">Nama</th>
						<th class="text-center">Alamat</th>
						<th class="text-center">Jenis Kelamin</th>
						<th width="" class="text-center" >Aksi</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($list_guru as $key => $value):?>
						<tr>
							<td><?php echo $key+1 ?></td>
							<td><?php echo $value['nip'] ?></td>
							<td><?php echo $value['nama_guru'] ?></td>
							<td><?php echo $value['alamat_guru'] ?></td>
							<td><?php echo $value['jenis_kelamin_guru'] ?></td>
							<td class="text-center">
								<a class="btn btn-sm btn-info" href="?guru=detail&id=<?php echo $value["id_guru"] ?>" width="50"><i class="fas fa-search"></i></a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

