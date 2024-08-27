<?php  
$id_course = $_GET['id'];
$list_tugas = $tugas->tampil($id_course);
$data_course = $course->ambil_course($id_course);
?>
<div class="content-header">
	<div class="container-fluid">
		<h1 class="text-center mx-auto">DAFTAR TUGAS</h1>
		<h3 class="text-center mx-auto">{<?php echo $data_course['nama_course'] ?>}</h3>
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
						<th class="text-center" width="20%">Judul Tugas</th>
						<th width="20%" class="text-center" >Tanggal Tugas</th>
						<th width="20%" class="text-center" >Tanggal Pengumpulan</th>
						<th width="20%" class="text-center" >Aksi</th>
					</tr>
				</thead>

				<tbody>
						<?php foreach ($list_tugas as $key => $value):?>
							<tr>
								<td width="10%"><?php echo $key+1 ?></td>
								<td><?php echo $value['judul_tugas'] ?></td>
								<td><?php echo $value['tgl_mulai'] ?></td>
								<td><?php echo $value['tgl_akhir'] ?></td>
								<td class="text-center">
									<a class="btn btn-sm btn-info" href="?tugas=detail&id=<?php echo $value["id_tugas"] ?>" width="50"><i class="fas fa-search"></i></a>
								</td>
							</tr>
						<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
