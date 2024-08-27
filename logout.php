<?php 

session_start();
unset($_SESSION['petugas']);
unset($_SESSION['pelajar']);
unset($_SESSION['guru']);
echo "<script>alert('Anda Berhasil Logout');</script>";
echo "<script>location = 'login.php';</script>";

?>