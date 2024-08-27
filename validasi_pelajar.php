<?php
include "config/mysqli.php";  
if (isset($_SESSION['pelajar'])) {

	echo "<script>location='pelajar/';</script>";
} 
else {
	echo "<script>alert('Anda Harus Login Terlebih Dahulu Sebagai Pelajar!');</script>";
	echo "<script>location='login_pelajar.php';</script>";	
} 
?>