<?php
$data_tugas = $tugas->ambil_tugas($_GET['id']);
$id_tugas = $_GET['id'];
$id_course = $data_tugas['id_course'];
$id_user = $_SESSION['user']['id'];
$datapelajar = $pelajar->ambil_pelajar_ONuser($id_user);
$id_pelajar = $datapelajar['id_pelajar'];
$data_detail_tugas = $tugas->ambil_detail_tugas_oncourse($id_pelajar,$id_course);
$tgl_now = date("Y-m-d", strtotime("now"));
$deadline = $data_tugas['tgl_akhir'];
$tgl_deadline = date("Y-m-d", strtotime("$deadline"));
echo "$tgl_deadline";
echo "<br>";
echo "$tgl_now";
$nilai_pelajar = $tugas->ambil_nilai_ON_tugas_pelajar($id_tugas, $id_pelajar);
?>

<style>
	.gambar
	{
		border-radius: 2%;
	}
</style>


<div class="content-header">
	<div class="container-fluid">
		<h1 class="text-center mx-auto">DETAIL TUGAS</h1>
		<h3 class="text-center mx-auto"><?php echo $data_tugas['judul_tugas'] ?></h3>
	</div><!-- /.container-fluid -->
</div>

<hr>

<div class="card card-default">
	<div class="card-body">
		<form method="POST" enctype="multipart/form-data">
			<div class="table-responsive">
				<table class="table">
					<thead>

						<tr>
							<th width="20%">Tanggal Mulai</th>
							<th width="1%"></th>
							<td><?php echo $data_tugas['tgl_mulai'] ?></td>
						</tr>

						<tr>
							<th width="20%">Tanggal Selesai</th>
							<th width="1%"></th>
							<td><?php echo $data_tugas['tgl_akhir'] ?></td>
						</tr>

						<tr>
							<th width="20%">Deskripsi</th>
							<th width="1%"></th>
							<th><?php echo $data_tugas['deskripsi'] ?></th>
						</tr>

						<?php if (!empty($nilai_pelajar)): ?>							
							<tr>
								<th width="20%">Nilai</th>
								<th width="1%"></th>
								<th><?php echo $nilai_pelajar['nilai'] ?></th>
							</tr>
						<?php else: ?>
							<tr>
								<th width="20%">Nilai</th>
								<th width="1%"></th>
								<th>Nilai Belum Tersedia</th>
							</tr>
						<?php endif ?>

						<?php if (!empty($data_tugas['files'])) { ?>
							<tr>
								<th width="20%">File</th>
								<th width="1%"></th>
								<td>Unduh File : <a href="../../../admin/materi/file/tugas/<?php echo $data_tugas['files'] ?>"><?php echo $data_tugas['files']?> </a></td>
							</tr>
						<?php }?>

						<?php if (!empty($data_detail_tugas)): ?>
							<tr>
								<th width="20%" style="vertical-align: middle;">Assignment</th>
								<th width="1%"></th>
								<th>
									<?php foreach ($data_detail_tugas as $key => $value) { ?>
										<label for="">File No. <?php echo $key+1 ?> : </label>
										<div class="input-group input-group-md">
											<input type="text" class="form-control" disabled value="<?php echo $value['dokumen'] ?>">
											<span class="input-group-append">
												<a class="btn btn-sm btn-warning" href="?detailtugas=ubah&id=<?php echo $value["id_detail_tugas"] ?>" width="50" onclick="return confirm('Apakah anda yakin ingin mengubah data?')"><i class="fas fa-edit"></i></a>

												<a class="btn btn-sm btn-danger" href="?detailtugas=hapus&id=<?php echo $value["id_detail_tugas"] ?>" width="50" onclick="return confirm('Apakah anda yakin ingin menghapus data?')"><i class="fas fa-trash-alt"></i></a>
											</span>
											<br>
										</div>
										<br>
									<?php } ?>
									<a class="btn btn-md btn-primary" href="?detailtugas=tambah&id=<?php echo $id_tugas ?>">Upload File Tugas</a>
								</th>
							</tr>
						<?php endif ?>

						<?php if (empty($data_detail_tugas) AND ($tgl_now <= $tgl_deadline)): ?>

						<tr>
							<th width="20%">Assignment</th>
							<th width="1%"></th>
							<th>
								<div class="input-group">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="exampleInputFile" name="file[]" id="file" oninput="hide_disp()" multiple value="">
										<label class="custom-file-label" for="exampleInputFile">Choose Files</label>
									</div>
								</div>
							</th>
						</tr>
					<?php endif ?>
				</thead>
			</table>

		</div>
		<button class="btn btn-lg btn-success btn-block" id="simpan" name="simpan" style="display: none;">Simpan</button>
		<script> 
			function hide_disp(){
				var x = document.getElementById("simpan");
				if (x.style.display === "none") {
					x.style.display = "block";
				} else {
					x.style.display = "none";
				}
			}
		</script>
	</form>
</div>
</div>

<?php  
if (isset($_POST['simpan']))
{
	
	// print_r($_POST); die;
	$hasil = $tugas->tambah_detail_tugas($_GET['id'], $id_pelajar, $_FILES['file']);

	if($hasil =='sukses')
	{
		echo "<script>alert('Berhasil Disimpan!')</script>";
		echo "<script>location='?tugas=detail&id=$id_tugas'</script>";
	}
	else
	{
		echo "<script>alert('Data Gagal Disimpan');</script>";
	}
}

?>

