<?php 
session_start();

$mysqli = new mysqli("localhost","root","","elearning_new");
// error_reporting(0);

$user = new user($mysqli);
class user {
	public $koneksi;
	public function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	public function tampil()
	{
		$hasil = $this->koneksi->query("SELECT * FROM user");
		$wadah = array();

		while ($data_pecah = $hasil->fetch_assoc())
		{
			$wadah[] = $data_pecah;
		}
		return $wadah;
	}

	public function ambil_user($id)
	{
		$ambil_user = $this->koneksi->query("SELECT * FROM user WHERE id_user = '$id'");

		$data_pecah = $ambil_user->fetch_assoc();

		return $data_pecah;	
	}

	public function login($usname, $pass)
	{
		$hasil = $this->koneksi->query("SELECT * FROM user WHERE username = '$usname'");

		if ($hasil->num_rows > 0) 
		{
			$data_pecah = $hasil->fetch_assoc();
			$password_benar = $data_pecah['password'];

			$password_user = $pass;
			$password_user_encrypted = base64_encode($password_user);


			if ($password_user_encrypted == $password_benar) {
				
				$_SESSION['user']['id'] = $data_pecah['id_user'];
				return 'sukses';
			}
			else 
			{
				return 'salah';
			}
		} 
		else 
		{
			return 'tidak_ada';
		}
	}
	
	public function tambah($username, $password, $hak_akses)
	{
		
		$this->koneksi->query("INSERT INTO user(username, password, hak_akses) VALUES
			('$username', '$password', '$hak_akses')");

		return "sukses";
	}

	public function ubah($username, $password, $hak_akses, $nama, $id)
	{
		
		$this->koneksi->query("UPDATE user SET username='$username', password='$password', hak_akses='$hak_akses', nama_user='$nama' WHERE id_user='$id'");

		return "sukses";
	}

	public function hapus($id)
	{
		$this->koneksi->query("DELETE FROM user WHERE id_user='$id'");
		if (mysqli_error($this->koneksi)) {
			return "gagal";
		};
	}
	
}

$guru = new guru($mysqli);
class guru {
	public $koneksi;
	public function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	public function tampil()
	{
		$hasil = $this->koneksi->query("SELECT * FROM tb_guru");
		$wadah = array();

		while ($data_pecah = $hasil->fetch_assoc())
		{
			$wadah[] = $data_pecah;
		}
		return $wadah;
	}

	public function tambah($nip, $nama, $alamat, $jk, $id_user)
	{
		$this->koneksi->query("INSERT INTO tb_guru(nip, nama_guru, alamat_guru, jenis_kelamin_guru, id_user) VALUES
			('$nip', '$nama', '$alamat', '$jk', '$id_user')");

		return "sukses";
	}

	public function ambil_guru($id)
	{
		$ambil_guru = $this->koneksi->query("SELECT * FROM tb_guru WHERE id_guru = '$id'");

		$data_pecah = $ambil_guru->fetch_assoc();

		return $data_pecah;	

	}

	public function ambil_guru_ONuser($id)
	{
		$ambil_guru = $this->koneksi->query("SELECT * FROM tb_guru JOIN user ON tb_guru.id_user=user.id_user WHERE tb_guru.id_user = '$id'");

		$data_pecah = $ambil_guru->fetch_assoc();

		return $data_pecah;	

	}

	public function login($usname, $pass)
	{
		$hasil = $this->koneksi->query("SELECT * FROM tb_guru WHERE nip = '$usname'");

		if ($hasil->num_rows > 0) 
		{
			$data_pecah = $hasil->fetch_assoc();
			$password_benar = $data_pecah['password'];

			$password_guru = $pass;
			$password_guru_encrypted = base64_encode($password_guru);


			if ($password_guru_encrypted == $password_benar) {
				
				$_SESSION['guru']['id'] = $data_pecah['id_guru'];
				return 'sukses';
			}
			else 
			{
				return 'salah';
			}
		} 
		else 
		{
			return 'tidak_ada';
		}
	}

	public function ubah($nip, $nama, $alamat, $jk, $id)
	{
		$hasil = $this->koneksi->query("UPDATE tb_guru SET nip='$nip', nama_guru='$nama', alamat_guru='$alamat', jenis_kelamin_guru='$jk' WHERE id_guru='$id'");

		return "sukses";
	}

	public function hapus($id)
	{
		$this->koneksi->query("DELETE FROM tb_guru WHERE id_guru='$id'");
		if (mysqli_error($this->koneksi)) {
			return "gagal";
		}
	}
}

$pelajar = new pelajar($mysqli);
class pelajar {
	public $koneksi;
	public function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	public function tampil()
	{
		$hasil = $this->koneksi->query("SELECT * FROM tb_pelajar JOIN tb_kelas ON tb_pelajar.id_kelas=tb_kelas.id_kelas");
		$wadah = array();

		while ($data_pecah = $hasil->fetch_assoc())
		{
			$wadah[] = $data_pecah;
		}
		return $wadah;
	}

	public function ambil_pelajar($id)
	{
		$ambil_pelajar = $this->koneksi->query("SELECT * FROM tb_pelajar JOIN tb_kelas ON tb_pelajar.id_kelas=tb_kelas.id_kelas JOIN user ON tb_pelajar.id_user=user.id_user WHERE id_pelajar = '$id'");

		$data_pecah = $ambil_pelajar->fetch_assoc();

		return $data_pecah;	
	}

	public function ambil_pelajar_ONuser($id)
	{
		$ambil_pelajar = $this->koneksi->query("SELECT * FROM tb_pelajar JOIN tb_kelas ON tb_pelajar.id_kelas=tb_kelas.id_kelas JOIN user ON tb_pelajar.id_user=user.id_user WHERE tb_pelajar.id_user = '$id'");

		$data_pecah = $ambil_pelajar->fetch_assoc();

		return $data_pecah;	
	}

	public function tambah($nis, $nama, $alamat, $jk, $tgl, $id_kelas, $id_user)
	{
		$this->koneksi->query("INSERT INTO tb_pelajar(nis, nama_pelajar, alamat_pelajar, jenis_kelamin,	tgl_lahir,	id_kelas, id_user) VALUES
			('$nis', '$nama', '$alamat', '$jk', '$tgl', '$id_kelas', '$id_user')");

		return "sukses";
	}

	public function ubah($nis, $nama, $alamat, $jk, $tgl, $id_kelas, $id)
	{
		$this->koneksi->query("UPDATE tb_pelajar SET nis='$nis', nama_pelajar='$nama', alamat_pelajar='$alamat', jenis_kelamin='$jk', tgl_lahir= '$tgl', id_kelas='$id_kelas' WHERE id_pelajar='$id'");

		return "sukses";
	}

	public function hapus($id)
	{
		$this->koneksi->query("DELETE FROM tb_pelajar WHERE id_pelajar='$id'");
		if (mysqli_error($this->koneksi)) {
			return "gagal";
		}
	}

	public function login($nis, $pass)
	{
		$hasil = $this->koneksi->query("SELECT * FROM tb_pelajar WHERE nis = '$nis'");

		if ($hasil->num_rows > 0) 
		{
			$data_pecah = $hasil->fetch_assoc();
			$password_benar = $data_pecah['password'];

			$password_pelajar = $pass;
			$password_pelajar_encrypted = base64_encode($password_pelajar);


			if ($password_pelajar_encrypted == $password_benar) {
				
				$_SESSION['pelajar']['id'] = $data_pecah['id_pelajar'];
				return 'sukses';
			}
			else 
			{
				return 'salah';
			}
		} 
		else 
		{
			return 'tidak_ada';
		}
	}
}

$mapel = new mapel($mysqli);

class mapel {
	public $koneksi;

	public function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	public function tampil()
	{
		$hasil = $this->koneksi->query("SELECT * FROM tb_mapel");
		$wadah = array();

		while ($data_pecah = $hasil->fetch_assoc())
		{
			$wadah[] = $data_pecah;
		}
		return $wadah;
	}

	public function ambil_mapel($id)
	{
		$hasil = $this->koneksi->query("SELECT * FROM tb_mapel WHERE id_mapel='$id'");
		$data_pecah = $hasil->fetch_assoc();

		return $data_pecah;
	}

	public function tambah($nama)
	{
		$this->koneksi->query("INSERT INTO tb_mapel(nama_mapel) VALUES
			('$nama')");

		return "sukses";
	}

	public function ubah($nama, $id)
	{
		$this->koneksi->query("UPDATE tb_mapel SET nama_mapel='$nama' WHERE id_mapel='$id'");

		return "sukses";
	}

	public function hapus($id)
	{
		$this->koneksi->query("DELETE FROM tb_ mapel WHERE id_mapel='$id'");
		if (mysqli_error($this->koneksi)) {
			return "gagal";
		}
	}
}

$kelas = new kelas($mysqli);

class kelas {
	public $koneksi;

	public function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	public function tampil()
	{
		$hasil = $this->koneksi->query("SELECT * FROM tb_kelas");
		$wadah = array();

		while ($data_pecah = $hasil->fetch_assoc())
		{
			$wadah[] = $data_pecah;
		}
		return $wadah;
	}

	public function ambil_kelas($id)
	{
		$hasil = $this->koneksi->query("SELECT * FROM tb_kelas WHERE id_kelas='$id'");
		$data_pecah = $hasil->fetch_assoc();

		return $data_pecah;
	}

	public function tambah($nama)
	{
		$this->koneksi->query("INSERT INTO tb_kelas(nama_kelas) VALUES
			('$nama')");

		return "sukses";
	}

	public function ubah($nama, $id)
	{
		$this->koneksi->query("UPDATE tb_kelas SET nama_kelas='$nama' WHERE id_kelas='$id'");

		return "sukses";
	}

	public function hapus($id)
	{
		$this->koneksi->query("DELETE FROM tb_kelas WHERE id_kelas='$id'");
		if (mysqli_error($this->koneksi)) {
			return "gagal";
		}
	}
}

$course = new course($mysqli);

class course {
	public $koneksi;

	public function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	public function tampil()
	{
		$hasil = $this->koneksi->query("SELECT * FROM tb_course JOIN tb_guru ON tb_course.id_guru=tb_guru.id_guru JOIN tb_mapel ON tb_course.id_mapel=tb_mapel.id_mapel");
		$wadah = array();

		while ($data_pecah = $hasil->fetch_assoc())
		{
			$wadah[] = $data_pecah;
		}
		return $wadah;
	}

	public function tampilON_guru($id)
	{
		$hasil = $this->koneksi->query("SELECT * FROM tb_course JOIN tb_guru ON tb_course.id_guru=tb_guru.id_guru JOIN tb_mapel ON tb_course.id_mapel=tb_mapel.id_mapel JOIN user ON tb_guru.id_user=user.id_user WHERE tb_course.id_guru='$id'");
		$wadah = array();

		while ($data_pecah = $hasil->fetch_assoc())
		{
			$wadah[] = $data_pecah;
		}
		return $wadah;
	}

	public function tampilONLY($id)
	{
		$hasil = $this->koneksi->query("SELECT * FROM tb_course JOIN tb_guru ON tb_course.id_guru=tb_guru.id_guru JOIN tb_mapel ON tb_course.id_mapel=tb_mapel.id_mapel WHERE tb_course.id_course NOT IN(SELECT id_course FROM tb_detail_course WHERE tb_detail_course.id_pelajar='$id')");
		$wadah = array();

		while ($data_pecah = $hasil->fetch_assoc())
		{
			$wadah[] = $data_pecah;
		}
		return $wadah;
	}

	public function tampilONMapel($id)
	{
		$hasil = $this->koneksi->query("SELECT * FROM tb_course JOIN tb_mapel ON tb_course.id_mapel=tb_mapel.id_mapel WHERE tb_course.id_mapel='$id'");
		$wadah = array();

		while ($data_pecah = $hasil->fetch_assoc())
		{
			$wadah[] = $data_pecah;
		}
		return $wadah;
	}

	public function ambil_course($id)
	{
		$hasil = $this->koneksi->query("SELECT * FROM tb_course JOIN tb_guru ON tb_course.id_guru=tb_guru.id_guru JOIN tb_mapel ON tb_course.id_mapel=tb_mapel.id_mapel WHERE id_course='$id'");
		$data_pecah = $hasil->fetch_assoc();

		return $data_pecah;
	}

	public function tambah($nama, $enrol, $id_guru, $id_mapel)
	{
		$this->koneksi->query("INSERT INTO tb_course(nama_course, enrolment_key, id_guru, id_mapel) VALUES
			('$nama', '$enrol', '$id_guru', '$id_mapel')");

		return "sukses";
	}

	public function tambah_course_pelajar($id_course, $id_pelajar)
	{
		$this->koneksi->query("INSERT INTO tb_detail_course(id_course, id_pelajar) VALUES
			('$id_course', '$id_pelajar')");

		return "sukses";

	}

	public function ambil_detail_course($id)
	{
		$hasil = $this->koneksi->query("SELECT * FROM tb_course JOIN tb_detail_course ON tb_course.id_course=tb_detail_course.id_course JOIN tb_pelajar ON tb_detail_course.id_pelajar=tb_pelajar.id_pelajar WHERE tb_detail_course.id_detail_course='$id'");
		$data_pecah = $hasil->fetch_assoc();

		return $data_pecah;
	}

	public function ambil_detail_course_pelajar($id)
	{
		$hasil = $this->koneksi->query("SELECT * FROM tb_detail_course JOIN tb_course ON tb_course.id_course=tb_detail_course.id_course JOIN tb_pelajar ON tb_detail_course.id_pelajar=tb_pelajar.id_pelajar WHERE tb_detail_course.id_pelajar='$id'");
		$wadah = array();

		while ($data_pecah = $hasil->fetch_assoc())
		{
			$wadah[] = $data_pecah;
		}
		return $wadah;
	}

	public function cek_course($id)
	{
		$hasil = $this->koneksi->query("SELECT id_course FROM tb_course WHERE id_course NOT IN(SELECT id_course FROM tb_detail_course WHERE tb_detail_course.id_pelajar='$id'");
			$data_pecah=$hasil->fetch_assoc();

			return $data_pecah;
		}



		public function ubah($nama, $enrol, $id_guru, $id_mapel, $id)
		{
			$this->koneksi->query("UPDATE tb_course SET nama_course='$nama', enrolment_key='$enrol', id_guru='$id_guru', id_mapel='$id_mapel' WHERE id_course='$id'");

			return "sukses";
		}

		public function hapus($id)
		{
			$this->koneksi->query("DELETE FROM tb_course WHERE id_course='$id'");
			if (mysqli_error($this->koneksi)) {
				return "gagal";
			}
		}
	}

	$materi = new materi($mysqli);

	class materi {
		public $koneksi;

		public function __construct($mysqli)
		{
			$this->koneksi = $mysqli;
		}

		public function tampil1()
		{
			$hasil = $this->koneksi->query("SELECT * FROM tb_materi");
			$wadah = array();

			while ($data_pecah = $hasil->fetch_assoc())
			{
				$wadah[] = $data_pecah;
			}
			return $wadah;
		}

		public function tampil($id)
		{
			$hasil = $this->koneksi->query("SELECT * FROM tb_materi JOIN tb_course ON tb_materi.id_course=tb_course.id_course WHERE tb_materi.id_course='$id'");
			$wadah = array();

			while ($data_pecah = $hasil->fetch_assoc())
			{
				$wadah[] = $data_pecah;
			}
			return $wadah;
		}


		public function ambil_materi($id)
		{
			$hasil = $this->koneksi->query("SELECT * FROM tb_materi JOIN tb_detail_materi ON tb_materi.id_materi=tb_detail_materi.id_materi JOIN tb_course ON tb_materi.id_course=tb_course.id_course WHERE tb_detail_materi.id_materi='$id'");
			$data_pecah = $hasil->fetch_assoc();

			return $data_pecah;
		}

		public function ambil_file_materi($id)
		{
			$hasil = $this->koneksi->query("SELECT * FROM tb_detail_materi JOIN tb_materi ON tb_detail_materi.id_materi=tb_materi.id_materi JOIN tb_course ON tb_materi.id_course=tb_course.id_course WHERE tb_detail_materi.id_materi='$id'");
			while ($data_pecah = $hasil->fetch_assoc())
			{
				$wadah[] = $data_pecah;
			}
			return $wadah;
		}

		public function ambil_detail_materi($id)
		{
			$hasil = $this->koneksi->query("SELECT * FROM tb_detail_materi JOIN tb_materi ON tb_detail_materi.id_materi=tb_materi.id_materi JOIN tb_course ON tb_materi.id_course=tb_course.id_course WHERE tb_detail_materi.id_detail_materi='$id'");
			$data_pecah = $hasil->fetch_assoc();

			return $data_pecah;
		}

		public function tambah($id_course, $judul, $isi, $tgl)
		{
			$this->koneksi->query("INSERT INTO tb_materi(id_course, judul_materi, isi_materi, tanggal_upload_materi) VALUES
				('$id_course', '$judul', '$isi','$tgl')");

			return "sukses";
		}

		public function tambah_detail_materi($id_materi, $files)
		{
			$files = $_FILES;
			$jumlahFile = count($files['file']['name']);

			for ($i = 0; $i < $jumlahFile; $i++) {
				$nama_file = $files['file']['name'][$i];

				$lokasi_sementara = $files['file']['tmp_name'][$i];

				if (empty($lokasi_sementara)) {
					$hasil = $this->koneksi->query("INSERT INTO tb_tugas(judul_tugas, id_course, deskripsi, tgl_mulai, tgl_akhir) VALUES
						('$judul', '$id_course', '$deskripsi', '$tgl_mulai', '$tgl_akhir')");
				}
				else {

					$nama_file_renamed = date('Y-m-d_h-i-s') . '_' . $id_materi . '_' . $nama_file;

					move_uploaded_file($lokasi_sementara, "../admin/materi/file/$nama_file_renamed");

					$hasil = $this->koneksi->query("INSERT INTO tb_detail_materi(id_materi, file) VALUES
						('$id_materi', '$nama_file_renamed')");

				}
			}
			return "sukses";
		}

		public function ubah($judul, $tgl, $isi, $id_materi)
		{
			$this->koneksi->query("UPDATE tb_materi SET judul_materi='$judul', tanggal_upload_materi='$tgl', isi_materi='$isi' WHERE id_materi='$id_materi' ");

			return "sukses";
		}

		public function ubah_detail_materi($files, $id)
		{
			$files = $_FILES;

			$namafile = $files['file']['name'];

			$lokasifile = $files['file']['tmp_name'];

			if (!empty($lokasifile)) 
			{
				$detail_materi = $this->ambil_detail_materi($id);
				$file_lama = $detail_materi['file'];

				if (file_exists("../admin/materi/file/$file_lama")) 
				{
					unlink("../admin/materi/file/$file_lama");	
				}

				$ekstensifile = pathinfo($namafile, PATHINFO_EXTENSION);

				$ekstensiboleh = array("jpg","jpeg","JPG","JPEG","PNG","png","ppt", "PPT", "PPTX", "pptx", "pdf", "PDF", "doc", "docx");

				if (in_array($ekstensifile, $ekstensiboleh)) 
				{
					$namafiks = date('Y-m-d_h-i-s') . '_' . $id . '_' . $namafile;

					move_uploaded_file($lokasifile, "../admin/materi/file/$namafiks");

					$this->koneksi->query("UPDATE tb_detail_materi SET file='$namafiks' WHERE id_detail_materi='$id'");
					return "sukses";
				}
				else 
				{
					return "gagal";
				}
			} 
			else
			{
				return "sukses";
			}
		}

		public function hapus($id)
		{
			$this->koneksi->query("DELETE FROM tb_materi WHERE id_materi='$id'");
			if (mysqli_error($this->koneksi)) {
				return "gagal";
			}
		}

		public function hapus_detail($id)
		{
			$this->koneksi->query("DELETE FROM tb_detail_materi WHERE id_detail_materi='$id'");
			if (mysqli_error($this->koneksi)) {
				return "gagal";
			}
		}
	}

	$tugas = new tugas($mysqli);

	class tugas {
		public $koneksi;

		public function __construct($mysqli)
		{
			$this->koneksi = $mysqli;
		}

		public function tampil($id)
		{
			$hasil = $this->koneksi->query("SELECT * FROM tb_tugas WHERE id_course='$id'");
			$wadah = array();

			while ($data_pecah = $hasil->fetch_assoc())
			{
				$wadah[] = $data_pecah;
			}
			return $wadah;
		}

		public function tampiljoindetail($id)
		{
			$hasil = $this->koneksi->query("SELECT * FROM tb_tugas JOIN tb_detail_tugas ON tb_tugas.id_tugas=tb_detail_tugas.id_tugas WHERE tb_tugas.id_course='$id'");
			$wadah = array();

			while ($data_pecah = $hasil->fetch_assoc())
			{
				$wadah[] = $data_pecah;
			}
			return $wadah;
		}

		public function tampil_detail_tugas($id)
		{
			$hasil = $this->koneksi->query("SELECT * FROM tb_detail_tugas JOIN tb_tugas ON tb_detail_tugas.id_tugas=tb_tugas.id_tugas JOIN tb_course ON tb_tugas.id_course=tb_course.id_course JOIN tb_pelajar ON tb_detail_tugas.id_pelajar=tb_pelajar.id_pelajar WHERE tb_detail_tugas.id_tugas='$id'");
			$wadah = array();

			while ($data_pecah = $hasil->fetch_assoc())
			{
				$wadah[] = $data_pecah;
			}
			return $wadah;
		}

		public function tampil_detail_tugas_pelajar($id,$id_pelajar)
		{
			$hasil = $this->koneksi->query("SELECT * FROM tb_detail_tugas JOIN tb_tugas ON tb_detail_tugas.id_tugas=tb_tugas.id_tugas JOIN tb_course ON tb_tugas.id_course=tb_course.id_course JOIN tb_pelajar ON tb_detail_tugas.id_pelajar=tb_pelajar.id_pelajar WHERE tb_detail_tugas.id_tugas='$id' && tb_detail_tugas.id_pelajar='$id_pelajar'");
			$wadah = array();

			while ($data_pecah = $hasil->fetch_assoc())
			{
				$wadah[] = $data_pecah;
			}
			return $wadah;
		}

		public function ambil_tugas($id)
		{
			$hasil = $this->koneksi->query("SELECT * FROM tb_tugas JOIN tb_course ON tb_tugas.id_course=tb_course.id_course WHERE id_tugas ='$id'");
			$data_pecah = $hasil->fetch_assoc();

			return $data_pecah;
		}

		public function ambil_tugas_pelajar($id, $id_tugas)
		{
			$hasil = $this->koneksi->query("SELECT * FROM tb_detail_tugas JOIN tb_tugas ON tb_detail_tugas.id_tugas=tb_tugas.id_tugas JOIN tb_course ON tb_tugas.id_course=tb_course.id_course JOIN tb_pelajar ON tb_detail_tugas.id_pelajar=tb_pelajar.id_pelajar WHERE tb_detail_tugas.id_pelajar ='$id' AND tb_detail_tugas.id_tugas='$id_tugas'");
			$data_pecah = $hasil->fetch_assoc();

			return $data_pecah;
		}

		public function ambil_detail_tugas($id)
		{
			$hasil = $this->koneksi->query("SELECT * FROM tb_detail_tugas JOIN tb_tugas ON tb_detail_tugas.id_tugas=tb_tugas.id_tugas JOIN tb_course ON tb_tugas.id_course=tb_course.id_course JOIN tb_pelajar ON tb_detail_tugas.id_pelajar=tb_pelajar.id_pelajar WHERE tb_detail_tugas.id_detail_tugas ='$id'");
			$data_pecah = $hasil->fetch_assoc();

			return $data_pecah;
		}

		public function ambil_detail_tugas_oncourse($id, $id_course)
		{
			$hasil = $this->koneksi->query("SELECT * FROM tb_detail_tugas JOIN tb_tugas ON tb_detail_tugas.id_tugas=tb_tugas.id_tugas JOIN tb_course ON tb_tugas.id_course=tb_course.id_course JOIN tb_pelajar ON tb_detail_tugas.id_pelajar=tb_pelajar.id_pelajar WHERE tb_detail_tugas.id_pelajar ='$id' AND tb_tugas.id_course='$id_course'");

			$wadah = array();
			while ($data_pecah = $hasil->fetch_assoc())
			{
				$wadah[] = $data_pecah;
			}
			return $wadah;
		}

		public function tambah($judul, $id_course, $deskripsi, $tgl_mulai, $tgl_akhir, $files)
		{
			

			$files = $_FILES;
			$jumlahFile = count($files['file']['name']);

			for ($i = 0; $i < $jumlahFile; $i++) {
				$nama_file = $files['file']['name'][$i];

				$lokasi_sementara = $files['file']['tmp_name'][$i];

				if (empty($lokasi_sementara)) {
					$hasil = $this->koneksi->query("INSERT INTO tb_tugas(judul_tugas, id_course, deskripsi, tgl_mulai, tgl_akhir) VALUES
						('$judul', '$id_course', '$deskripsi', '$tgl_mulai', '$tgl_akhir')");
				}
				else {

					$nama_file_renamed = date('Y-m-d_h-i-s').'_'. $nama_file;

					move_uploaded_file($lokasi_sementara, "../admin/materi/file/tugas/$nama_file_renamed");

					$hasil = $this->koneksi->query("INSERT INTO tb_tugas(judul_tugas, id_course, deskripsi, tgl_mulai, tgl_akhir, files) VALUES
						('$judul', '$id_course', '$deskripsi', '$tgl_mulai', '$tgl_akhir', '$nama_file_renamed')");
				}
			}

			return "sukses";
		}

		public function tambah_detail_tugas($id_tugas, $id_pelajar, $files)
		{
			$files = $_FILES;
			$jumlahFile = count($files['file']['name']);

			for ($i = 0; $i < $jumlahFile; $i++) {
				$nama_file = $files['file']['name'][$i];

				$lokasi_sementara = $files['file']['tmp_name'][$i];

				$nama_file_renamed = date('Y-m-d_h-i-s') . '_' . $id_pelajar . '_' . $nama_file;

				move_uploaded_file($lokasi_sementara, "../admin/materi/file/tugas/$nama_file_renamed");

				$hasil = $this->koneksi->query("INSERT INTO tb_detail_tugas(id_tugas, id_pelajar, dokumen) VALUES
					('$id_tugas', '$id_pelajar' , '$nama_file_renamed')");

			}
			return "sukses";
		}

		public function ubah($judul, $deskripsi, $tgl_mulai, $tgl_akhir, $files, $id)
		{
			$namafile = $files['name'];

			$lokasifile = $files['tmp_name'];

			if (!empty($lokasifile)) 
			{
				$det_tugas = $this->ambil_tugas($id);

				$file_lama = $det_tugas["files"];

				if (file_exists("../admin/materi/file/tugas/$file_lama")) 
				{
					unlink("../admin/materi/file/tugas/$file_lama");	
				}

				$ekstensifile = pathinfo($namafile, PATHINFO_EXTENSION);

				$ekstensiboleh = array("jpg","jpeg","JPG","JPEG","PNG","png","DOC", "DOCX", "PDF", "pdf", "doc", "docx", "xlsx", "XLSX", "xls", "XLS", "ODT", "odt");

				if (in_array($ekstensifile, $ekstensiboleh)) 
				{
					$namafiks = date('Y-m-d_h-i-s') . '_' . $id . '_' . $judul[$i] . $namafile;

					move_uploaded_file($lokasifile, "../admin/materi/file/tugas/$namafiks");

					$this->koneksi->query("UPDATE tb_tugas SET judul_tugas='$judul', deskripsi='$deskripsi', tgl_mulai='$tgl_mulai', tgl_akhir='$tgl_akhir', files='$namafiks' WHERE id_tugas='$id' ");

					return "sukses";
				}

				else 
				{
					return "gagal";
				}

			} 
			else
			{
				$this->koneksi->query("UPDATE tb_tugas SET judul_tugas='$judul', deskripsi='$deskripsi', tgl_mulai='$tgl_mulai', tgl_akhir='$tgl_akhir' WHERE id_tugas='$id' ");

				return "sukses";
			}
		}

		public function ubah_detail_tugas($id, $files)
		{
			$files = $_FILES;

			$namafile = $files['file']['name'];

			$lokasifile = $files['file']['tmp_name'];

			if (!empty($lokasifile)) 
			{
				$detail_tugas = $this->ambil_detail_tugas($id);
				$file_lama = $detail_tugas['dokumen'];

				if (file_exists("../admin/materi/file/tugas/$file_lama")) 
				{
					unlink("../admin/materi/file/tugas/$file_lama");	
				}

				$ekstensifile = pathinfo($namafile, PATHINFO_EXTENSION);

				$ekstensiboleh = array("jpg","jpeg","JPG","JPEG","PNG","png","ppt", "PPT", "PPTX", "pptx", "pdf", "PDF", "doc", "docx");

				if (in_array($ekstensifile, $ekstensiboleh)) 
				{
					$namafiks = date('Y-m-d_h-i-s') . '_' . $id . '_' . $namafile;

					move_uploaded_file($lokasifile, "../admin/materi/file/tugas/$namafiks");

					$this->koneksi->query("UPDATE tb_detail_tugas SET dokumen='$namafiks' WHERE id_detail_tugas='$id'");
					return "sukses";
				}
				else 
				{
					return "gagal";
				}
			} 
			else
			{
				return "sukses";
			}
		}

		public function hapus_detail_tugas($id)
		{
			$this->koneksi->query("DELETE FROM tb_detail_tugas WHERE id_detail_tugas='$id'");
			if (mysqli_error($this->koneksi)) {
				return "gagal";
			}
		}

		public function hapus($id)
		{
			$this->koneksi->query("DELETE FROM tb_tugas WHERE id_tugas='$id'");
			if (mysqli_error($this->koneksi)) {
				return "gagal";
			}
		}

		public function tambah_nilai($id_tugas, $id_pelajar, $nilai)
		{
			$this->koneksi->query("INSERT INTO tb_nilai(id_tugas, id_pelajar, nilai) VALUES('$id_tugas','$id_pelajar','$nilai')");
			
			return "sukses";
		}

		public function ambil_nilai($id_nilai)
		{
			$hasil = $this->koneksi->query("SELECT * FROM tb_nilai JOIN tb_pelajar ON tb_nilai.id_pelajar=tb_pelajar.id_pelajar JOIN tb_tugas ON tb_nilai.id_tugas=tb_tugas.id_tugas WHERE id_nilai=$id_nilai");
			$data_pecah = $hasil->fetch_assoc();

			return $data_pecah;
		}

		public function ambil_nilai_ON_tugas_pelajar($id_tugas, $id_pelajar)
		{
			$hasil = $this->koneksi->query("SELECT * FROM tb_nilai JOIN tb_pelajar ON tb_nilai.id_pelajar=tb_pelajar.id_pelajar JOIN tb_tugas ON tb_nilai.id_tugas=tb_tugas.id_tugas WHERE tb_nilai.id_tugas='$id_tugas' AND tb_nilai.id_pelajar='$id_pelajar'");

			$data_pecah = $hasil->fetch_assoc();

			return $data_pecah;
		}

		public function ubah_nilai($nilai, $id_tugas, $id_pelajar)
		{
			$this->koneksi->query("UPDATE tb_nilai SET nilai=$nilai WHERE id_tugas=$id_tugas AND id_pelajar=$id_pelajar");
			
			return "sukses";
		}
	}

