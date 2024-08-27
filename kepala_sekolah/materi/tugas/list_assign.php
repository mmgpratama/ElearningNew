<?php  
$id_tugas = $_GET['id'];
$list_assignment = $tugas->tampil_detail_tugas($id_tugas);
foreach ($list_assignment as $key => $value) {
	$id_pelajar[] = $value['id_pelajar'];
}
$data_tugas = $tugas->ambil_tugas($id_tugas);
?>

<div class="content-header">
	<div class="container-fluid">
		<h1 class="text-center mx-auto" style="font-weight: bold;">DAFTAR PENGUMPUL TUGAS</h1>
		<h3 class="text-center mx-auto"><?php echo $data_tugas['judul_tugas'] ?></h3>
		<h4 class="text-center mx-auto"><?php echo $data_tugas['nama_course'] ?></h4>
	</div><!-- /.container-fluid -->
</div>

<hr>

<div class="card">
	<div class="card-body">
		<div class="table-responsive">


			<table class="table table-borderless table-striped table-earning table-hover" id="example2">
				<thead class="thead-dark">
					<tr>
						<th width="15px" class="text-center">No.</th>
						<th class="text-center" width="20%">Nama Siswa</th>
						<th width="20%" class="text-center" >Aksi</th>
					</tr>
				</thead>

				<tbody>
					<?php
					$nomor = 0;
					$query = "SELECT DISTINCT tb_detail_tugas.id_pelajar, tb_pelajar.nama_pelajar FROM tb_detail_tugas JOIN tb_pelajar ON tb_detail_tugas.id_pelajar = tb_pelajar.id_pelajar WHERE tb_detail_tugas.id_tugas='$id_tugas'";
					$dm = $mysqli->prepare($query);
					$dm->execute();
					$res1 = $dm->get_result();
					while ($row = $res1->fetch_assoc()) { 
						$nomor++;?>
						<tr>
							<td width="5%" class="text-center"><?php echo $nomor ?></td>
							<td><?php echo $row['nama_pelajar'] ?></td>
							<td class="text-center">
								<a class="btn btn-sm btn-info" href="?tugas=assign_detail&id=<?php echo $row["id_pelajar"] ?>&id_tugas=<?php echo $id_tugas; ?>" width="50"><i class="fas fa-search"></i></a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
