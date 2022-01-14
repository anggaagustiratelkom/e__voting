<?php
  include "inc/koneksi.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>E VOTING | Log in</title>
	<link rel="icon" href="dist/img/votinglogo.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<style>
		#textlogo{
			font: 750 32px sans-serif;
			background: #005190;
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
			margin-top:5px;
		}
		#body{
			background: rgb(40,40,154);
			background: linear-gradient(90deg, rgba(40,40,154,1) 0%, rgba(250,199,68,1) 100%);
		}
		
	</style>
</head>

<body id="body"class="hold-transition login-page">
	<div class="login-box">
		
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body rounded">
				<div class="login-logo">
					<h1 id="textlogo">E-VOTING</h1>
					<img class="mb-3 mt-3" src="dist/img/votingbaru.png" width=170px />
				</div>
				<p class="login-box-msg">Login Sistem</p>
				<form action="" method="post">
					<div class="input-group mb-3">
						<input type="number" class="form-control" name="npm" placeholder="NPM" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" name="password" placeholder="Password" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12 mb-3">
							<button type="submit" class="btn btn-warning btn-block btn-flat" id="masuk" name="btnLogin" title="Masuk Sistem">
								<b>Masuk</b>
							</button>
						</div>
						<!-- <div class="col-12">
							<a href="daftar_pemilih.php" class="btn btn-info btn-block btn-flat">
								<i class=""></i> Daftar</a>
							</button>
						</div> -->

						
						
				</form>

				</div>
			</div>
		</div>
		<!-- /.login-box -->

		<!-- jQuery -->
		<script src="plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- AdminLTE App -->
		<script src="dist/js/adminlte.min.js"></script>
		<!-- Alert -->
		<script src="plugins/alert.js"></script>

</body>

</html>

<script>
function myFunction() {
  var x = document.getElementById("masuk");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>

<!-- asdsadsadsadsa -->

<?php

if (isset($_POST['btnLogin'])) {  
	//anti inject sql
	$npm=mysqli_real_escape_string($koneksi,$_POST['npm']);
	$password=mysqli_real_escape_string($koneksi,$_POST['password']);

	//query login
	$sql_login = "SELECT * FROM tb_pengguna WHERE BINARY npm='$npm' AND password='$password'";
	$query_login = mysqli_query($koneksi, $sql_login);
	$data_login = mysqli_fetch_array($query_login,MYSQLI_BOTH);
	$jumlah_login = mysqli_num_rows($query_login);


	if ($jumlah_login == 1 ){
		session_start();
		$_SESSION["ses_id"]=$data_login["id_pengguna"];
		$_SESSION["ses_nama"]=$data_login["nama_pengguna"];
		// $_SESSION["ses_password"]=$data_login["password"];
		$_SESSION["ses_npm"]=$data_login["npm"];
		$_SESSION["ses_level"]=$data_login["level"];
		// $_SESSION["ses_status"]=$data_login["status"];
		// $_SESSION["ses_statusdpm"]=$data_login["statusdpm"];
		$_SESSION["ses_jenis"]=$data_login["jenis"];
		
		echo "<script>
			Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value)
				{window.location = 'index.php';}
			})</script>";
	}else{
		echo "<script>
			Swal.fire({title: 'Login Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value)
				{window.location = 'login';}
			})</script>";
			}
		}
