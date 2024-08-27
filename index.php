<?php
include "config/mysqli.php";  
if (isset($_SESSION['user'])) {
	$role = $user->ambil_user($_SESSION['user']['id']);
	if ($role['hak_akses'] =="Petugas") 
	{
		echo "<script>location='admin/';</script>";
	}
	elseif($role['hak_akses'] == "Pelajar") {
		echo "<script>location='pelajar/';</script>";
	}
	elseif($role['hak_akses'] == "Guru") {
		echo "<script>location='guru/';</script>";
	}
	elseif($role['hak_akses'] == "Kepala Sekolah") {
		echo "<script>location='kepala_sekolah/';</script>";
	}
} 
else {
	echo "<script>alert('Anda Harus Login Terlebih Dahulu!');</script>";
	echo "<script>location='login.php';</script>";	
} 
?>