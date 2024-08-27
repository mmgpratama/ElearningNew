<?php
include "config/mysqli.php";  
if (isset($_SESSION['guru'])) {

	echo "<script>location='guru/';</script>";
} 
else {
	echo "<script>alert('Anda Harus Login Terlebih Dahulu Sebagai Guru!');</script>";
	echo "<script>location='login_guru.php';</script>";	
} 
?>