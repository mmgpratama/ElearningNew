<?php  
$id_user = $_SESSION['user']['id'];
$datapelajar = $pelajar->ambil_pelajar_ONuser($id_user);
$id_pelajar = $datapelajar['id_pelajar'];
?>
<br>
<h1 class="text-center" style="font-weight: bold">ENTRI ENROLLMENT KEY</h1>
<br>


<div class="card card-default">
	<div class="card-body">
		

		<form method="POST" enctype="multipart/form-data">

			<div class="form-group">
				<label>Enrollment Key</label>
				<div class="input-group" id="show_hide_password">
					<input class="form-control" type="password" value="" name="password" required placeholder="Password">
					<div class="input-group-append">
						<span class="input-group-text"><a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></span></a>
					</div>
				</div>
			</div>

			<button class="btn btn-lg btn-success btn-block" name="simpan">Enroll</button>
		</form>

	</div>
</div>



<?php 

if (isset($_POST['simpan']))
{
	// print_r($_POST); die;
	$id_course = $_GET['id'];
	$data_course = $course->ambil_course($_GET['id']);
	$enroll = $data_course['enrolment_key'];
	if (base64_encode($_POST['password'])==$enroll) {
		// code...

		$hasil = $course->tambah_course_pelajar($_GET['id'], $id_pelajar);

		if($hasil =='sukses')
		{
			echo "<script>alert('Berhasil Disimpan!')</script>";
			echo "<script>location='?materi=list&id=$id_course'</script>";
		}
	}
	else
	{
		echo "<script>alert('Data Gagal Disimpan');</script>";
	}
}
?>