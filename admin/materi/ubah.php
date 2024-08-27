<?php 
$id_materi = $_GET['id']; 
$data_materi = $materi->ambil_materi($id_materi);
$id_course = $data_materi['id_course'];
// $detail_materi = $materi->ambil_file_materi($id_materi);
?>

<div class="card card-default">
	<div class="card-body">

		<h1 class="text-center" style="font-weight: bold">EDIT MATERI</h1>
		<br>
		<form method="POST" enctype="multipart/form-data">

			<div class="form-group">
				<label>Judul Materi</label>
				<input type="text" class="form-control" name="nama" required="" value="<?php echo $data_materi['judul_materi'] ?>">
			</div>

			<div class="form-group">
				<label>Tanggal</label>
				<div class="input-group date" id="reservationdate" data-target-input="nearest">
					<input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tgl" required placeholder="Tanggal Peminjaman : 01/01/01" value="<?php echo $data_materi['tanggal_upload_materi'] ?>">
					<div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label>Isi Materi</label>
				<textarea class="form-control" name="isi" required><?php echo $data_materi['isi_materi'] ?></textarea>
			</div>

			<div class="form-group">

				<label for="exampleInputFile">File Upload</label> 
				<?php
				$query = "SELECT * FROM tb_detail_materi WHERE id_materi='$id_materi'";
				$dm = $mysqli->prepare($query);
				$dm->execute();
				$res1 = $dm->get_result();
				while ($row = $res1->fetch_assoc()) {
					?>
					<div class="input-group input-group-sm">
						<input type="text" class="form-control" disabled value="<?php echo $row['file'] ?>">
						<span class="input-group-append">
							<a class="btn btn-sm btn-warning" href="?detailmateri=ubah&id=<?php echo $row["id_detail_materi"] ?>" width="50" onclick="return confirm('Apakah anda yakin ingin mengubah data?')"><i class="fas fa-edit"></i></a>

							<a class="btn btn-sm btn-danger" href="?detailmateri=hapus&id=<?php echo $row["id_detail_materi"] ?>" width="50" onclick="return confirm('Apakah anda yakin ingin menghapus data?')"><i class="fas fa-trash-alt"></i></a>
						</span>
						<br>
					</div>
						
					<?php  
				}
				?>
			</div>
			<br>
			<a class="btn btn-md btn-primary" href="?detailmateri=tambah&id=<?php echo $id_materi ?>">Upload File Materi</a>
			<hr>

			<button class="btn btn-lg btn-success btn-block" name="simpan">Simpan</button>
		</form>
	</div>
</div>


<?php 

if (isset($_POST['simpan']))
{

	// print_r($_POST); die;
	$hasil = $materi->ubah($_POST['nama'], $_POST['tgl'], $_POST['isi'], $id_materi);
	if($hasil =='sukses')
	{
		echo "<script>alert('Berhasil Disimpan!')</script>";
		echo "<script>location='?materi=list&id=$id_course'</script>";
	}
	else
	{
		echo "<script>alert('Data Gagal Disimpan');</script>";
	}
}
?>