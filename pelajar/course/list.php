<?php  
$list_course = $course->tampil();
$id_user = $_SESSION['user']['id'];
$datapelajar = $pelajar->ambil_pelajar_ONuser($id_user);
$id_pelajar = $datapelajar['id_pelajar'];
$list_course2 = $course->tampilONLY($id_pelajar);
$data = $course->ambil_detail_course_pelajar($id_pelajar);
foreach ($data as $key => $value) {
	$id_course1[] = $value['id_course'];
}
foreach ($list_course as $key => $value1){
	$id_course2[] = $value1['id_course'];
}
// sort($id_course1);
// sort($id_course2);
?>

<?php  
if (empty($list_course2)){
	echo '<script language="javascript">';
	echo 'alert("Data Kosong atau Silakan Periksa Fitur MyCourse Anda")';
	echo '</script>';

}

?>

<div class="content-header">
	<div class="container-fluid">
		<h1 class="text-center mx-auto">DAFTAR COURSE SMPN1 SARMI</h1>
	</div><!-- /.container-fluid -->
</div>
<hr>
<!-- <a class="btn btn-sm btn-success btn-block" href="?course=tambah" width="100"><i class="fas fa-plus-circle"></i>  TAMBAH COURSE BARU</a> -->
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
					<?php foreach ($list_course2 as $key => $value1):?>
						<tr>
							<td width="10%"><?php echo $key+1 ?></td>
							<td><?php echo $value1['nama_course'] ?></td>
							<td class="text-center">
								
								<a class="btn btn-sm btn-primary" href="?course=tambah&id=<?php echo $value1["id_course"] ?>" width="50" onclick="return confirm('Ingin Melakukan Enrollment?')"><i class="fas fa-edit"></i></a>

							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
