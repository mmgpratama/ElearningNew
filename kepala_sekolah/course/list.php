<?php  
$list_course = $course->tampilON_guru($_SESSION['guru']['id']);

?>

<div class="content-header">
	<div class="container-fluid">
		<h1 class="text-center mx-auto">DAFTAR COURSE SMPN1 SARMI</h1>
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
						<th class="text-center">Nama Course</th>
						<th class="text-center" >Aksi</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($list_course as $key => $value):?>
						<tr>
							<td width="10%"><?php echo $key+1 ?></td>
							<td><?php echo $value['nama_course'] ?></td>
							<td class="text-center">
								<a class="btn btn-sm btn-default" href="?materi=list&id=<?php echo $value['id_course'] ?>" width="50" onclick="return confirm('Anda akan dialihkan ke halaman materi')"><i class="fas fa-arrow-right"></i></a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
