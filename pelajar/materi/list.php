<?php  
$id_course = $_GET['id'];
$list_materi = $materi->tampil($id_course);
$data_course = $course->ambil_course($id_course);
?>

<div class="content-header">
	<div class="container-fluid">
		<h1 class="text-center mx-auto">MATERI COURSE</h1>
		<h3 class="text-center mx-auto">{<?php echo $data_course['nama_course'] ?>}</h3>
	</div><!-- /.container-fluid -->
</div>
<hr>

<!-- <a class="btn btn-sm btn-success btn-block" href="?materi=tambah&id=<?php echo $id_course ?>" width="100"><i class="fas fa-plus-circle left"></i> TAMBAH MATERI BARU</a> -->
<a class="btn btn-sm btn-primary btn-block" href="?tugas=list&id=<?php echo $id_course ?>" width="100"><i class="fas fa-arrow-right"></i> HALAMAN TUGAS</a>
<hr>

<div class="card">
	<div class="card-body">
		<div class="table-responsive">


			<table class="table table-borderless table-striped table-earning table-hover" id="example2">
				<thead class="thead-dark">
					<tr>
						<th width="15px" class="text-center">No.</th>
						<th class="text-center" width="20%">Judul Materi</th>
						<th width="20%" class="text-center" >Tanggal</th>
						<th width="20%" class="text-center" >Aksi</th>
					</tr>
				</thead>

				<tbody>
						<?php foreach ($list_materi as $key => $value):?>
							<tr>
								<td width="10%"><?php echo $key+1 ?></td>
								<td><?php echo $value['judul_materi'] ?></td>
								<td><?php echo $value['tanggal_upload_materi'] ?></td>
								<td class="text-center">
									<a class="btn btn-sm btn-info" href="?materi=detail&id=<?php echo $value["id_materi"] ?>" width="50"><i class="fas fa-search"></i></a>
									<a class="btn btn-sm btn-warning" href="?materi=ubah&id=<?php echo $value["id_materi"] ?>" width="50" onclick="return confirm('Apakah anda yakin ingin mengubah data?')"><i class="fas fa-edit"></i></a>
									<a class="btn btn-sm btn-danger" href="?materi=hapus&id=<?php echo $value["id_materi"] ?>" width="50" onclick="return confirm('Apakah anda yakin ingin menghapus data?')"><i class="fas fa-trash-alt"></i></a>
								</td>
							</tr>
						<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
