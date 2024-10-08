<?php  include 'config/mysqli.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Login | SMP Negeri 1 SARMI -- ELEARNING</title>

	<!-- Tempusdominus Bootstrap 4 -->
	<link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<!-- Toastr -->
	<link rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">
	<!-- Jquery CSS -->
	<link rel="stylesheet" href="assets/plugins/jquery-ui/jquery-ui.min.css">
	<!-- General CSS Files -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!-- Template CSS -->
	<link rel="stylesheet" href="assets/dist/css/new_style/style.css">
	<link rel="stylesheet" href="assets/dist/css/new_style/bootstrap.css">
	<link rel="stylesheet" href="assets/dist/css/new_style/bootstrap.min.css">
	<link rel="shortcut icon" href="assets/dist/img/sarmi.png">
</head>

<style> 
	body{
		background-color: #e9ecef;
	}


</style>

<body>
	<div id="app">
		<section class="section">
			<div class="container mt-5">
				<div class="row">
					<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
						<div class="text-center login-brand">
							<img class="text-center" src="assets/dist/img/sarmi.png" alt="logo" width="200">
						</div>

						<div class="card card-outline card-primary">
							<div class="card-header text-center">
								<h3>SMP NEGERI 1 SARMI</h3>
								<h4>LOGIN GURU</h4>
							</div>

							<div class="card-body">
								<form method="POST" action="" class="needs-validation" novalidate="">
									<div class="form-group">
										<label for="username">N I P</label>
										<input id="username" type="text" class="form-control" name="username" tabindex="" required autofocus placeholder="Username" data-inputmask="'mask': ['99999999 999999 9 999']" data-mask>
										<div class="invalid-feedback">
											Mohon isi username
										</div>
									</div>

									<div class="form-group">
										<label>Password</label>
										<div class="d-block input-group" id="show_hide_password">
											<input class="form-control" type="password" value="" name="password" required placeholder="Password">
											<div class="input-group-addon">
												<a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
											</div>
											<div class="invalid-feedback">
												Mohon isi kata sandi
											</div>
										</div>
									</div>


									<div class="form-group">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
											<label class="custom-control-label" for="remember-me">Ingat Saya</label>
										</div>
									</div>

									<div class="form-group">
										<button name="login_guru" type="submit" class="btn btn-primary btn-lg btn-block" tabindex="3">
											Login
										</button>
									</div>

									<div class="form-group">
										<a href="login_petugas.php" name="login_petugas" class="btn btn-success btn-lg btn-block" tabindex="3">
											Login Petugas
										</a> 
									</div>

									<div class="form-group">
										<a href="login_pelajar.php" name="login_pelajar" class="btn btn-warning btn-lg btn-block" tabindex="3">
											Login Pelajar
										</a> 
									</div>
								</form>

							</div>
						</div>
						<div class="simple-footer">
							Copyright &copy; SMPN 1 SARMI 2023
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<!-- General JS Scripts -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
	<!-- <script src="assets/dist/js/new_js/stisla.js"></script> -->

	<!-- JS Libraies -->

	<!-- Template JS File -->
  <!-- <script src="assets/dist/js/new_js/scripts.js"></script>
  	<script src="assets/dist/js/new_js/custom.js"></script> -->

  	<script src="assets/plugins/jquery/jquery.min.js"></script>
  	<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
  	<!-- InputMask -->
  	<script src="assets/plugins/moment/moment.min.js"></script>
  	<script src="assets/plugins/inputmask/jquery.inputmask.min.js"></script>
  	<!-- Tempusdominus Bootstrap 4 -->
  	<script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  	<script>
  		$(function () {
    //Datemask dd/mm/yyyy
  			$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
  			$('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })

  			//Money Euro
  			$('[data-mask]').inputmask()

    //Date picker
  			$('#reservationdate').datetimepicker({
  				format: 'YYYY/MM/DD'
  			});

  			$('#reservationdate2').datetimepicker({
  				format: 'YYYY/MM/DD'
  			});

    //Date and time picker
  			$('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
  		});
  	</script>

  	<script>
  		$( function() {
  			$( "#datepicker" ).datepicker();
  		} );
  	</script>

  	<script>
  		$(document).ready(function() {
  			$("#show_hide_password a").on('click', function(event) {
  				event.preventDefault();
  				if($('#show_hide_password input').attr("type") == "text"){
  					$('#show_hide_password input').attr('type', 'password');
  					$('#show_hide_password i').addClass( "fa-eye-slash" );
  					$('#show_hide_password i').removeClass( "fa-eye" );
  				}else if($('#show_hide_password input').attr("type") == "password"){
  					$('#show_hide_password input').attr('type', 'text');
  					$('#show_hide_password i').removeClass( "fa-eye-slash" );
  					$('#show_hide_password i').addClass( "fa-eye" );
  				}
  			});
  		});
  	</script>

  	<!-- Page Specific JS File -->
  </body>

  </html>

  <?php

  if (isset($_POST['login_guru'])) {
  	$hasil = $guru->login($_POST['username'], $_POST['password']);

  	if ($hasil=='sukses') {
  		echo "<script>alert('Berhasil Login!')</script>";
  		echo "<script>location='guru/';</script>";

  	}
  	elseif ($hasil=='salah') {
  		echo "<script>alert('Password Salah!!');</script>";
  		echo "<script>location='login_guru.php';</script>";
  	}
  	elseif ($hasil=='tidak_ada'){
  		echo "<script>alert('Akun Tidak Ditemukan');</script>";
  		echo "<script>location='login_guru.php';</script>";
  	}
  }

  ?>
