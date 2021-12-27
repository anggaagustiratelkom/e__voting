<?php
    //Mulai Sesion
    session_start();
    if (isset($_SESSION["ses_npm"])==""){
	header("location: login");
    
    }else{
      $data_id = $_SESSION["ses_id"];
      $data_nama = $_SESSION["ses_nama"];
    //   $data_npm = $_SESSION["ses_npm"];
	  $data_level = $_SESSION["ses_level"];
	//   $data_status = $_SESSION["ses_status"];
	//   $data_statusdpm = $_SESSION["ses_statusdpm"];
	  $data_jenis = $_SESSION["ses_jenis"];
    }

    //KONEKSI DB
    include "inc/koneksi.php";
	// menghubungkan dengan library excel reader
	include "inc/excel_reader.php";
	require 'phpmailer/PHPMailerAutoload.php';
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Aplikasi E Voting</title>
	<link rel="icon" href="dist/img/votinglogo.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Alert -->
	<script src="plugins/alert.js"></script>
	<!-- Auto Refresh -->
	<!-- <script src="jquery-3.1.1.js" type="text/javascript"></script> -->
	<script>
		setInterval(function() {
			$(".realtime").load("admin/suara/data_suara.php").fadeIn("slow");
		}, 1000);
		setInterval(function() {
			$(".realtimedpm").load("admin/suara/data_suaradpm.php").fadeIn("slow");
		}, 1000);
	</script>
</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-yellow navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#">
						<i class="fas fa-bars"></i>
					</a>
				</li>

			</ul>

			<!-- SEARCH FORM -->
			<ul class="navbar-nav ml-auto">

				<li class="nav-item d-none d-sm-inline-block">
					<a href="index.php" class="nav-link">
						<b>Sistem Informasi Pemungutan Suara Berbasis Online</b>
					</a>
				</li>
			</ul>

		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="index.php" class="brand-link">
				<img src="dist/img/votingbaru.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
				<span class="brand-text font-weight-light"> E - VOTING</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="index.php" class="d-block">
							<?php echo $data_nama; ?>
						</a>
						<span class="badge badge-success">
							<?php echo $data_level; ?>
						</span>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

						<!-- Level  -->
						<?php
						if ($data_level=="Administrator"){
						?>
						<li class="nav-item">
							<a href="index.php" class="nav-link">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>

						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-cogs"></i>
								<p>
									Kelola Data
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="?page=data-pengguna" class="nav-link">
										<i class="nav-icon far fa-user ml-2"></i>
										<p>
											Admin/Petugas
										</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=data-calon" class="nav-link">
										<i class="nav-icon far fa-user ml-2"></i>
										<p>Kandidat</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=data-pemilih" class="nav-link">
										<i class="nav-icon far fa-user ml-2"></i>
										<p>Pemilih</p>
									</a>
								</li>
							</ul>
						</li>

						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon far fa fa-chart-pie"></i>
								<p>
									Quick Count
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="?page=data-suara" class="nav-link">
										<i class="nav-icon fas fa-chart-area ml-2"></i>
										<p> BEM </p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=data-suaradpm" class="nav-link">
										<i class="nav-icon fas fa-chart-area ml-2"></i>
										<p> DPM </p>
									</a>
								</li>
							</ul>
						</li>
						
						<br>
						<!-- <li class="nav-header">Setting</li> -->
						

						<?php
						} elseif($data_level=="Petugas"){
						?>

						<li class="nav-item">
							<a href="index.php" class="nav-link">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>

						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-cogs"></i>
								<p>
									Kelola Data
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="?page=data-calon" class="nav-link">
										<i class="nav-icon far fa-user ml-2"></i>
										<p>Kandidat</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=data-pemilih" class="nav-link">
										<i class="nav-icon far fa-user ml-2"></i>
										<p>Pemilih</p>
									</a>
								</li>
							</ul>
						</li>

						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon far fa fa-chart-pie"></i>
								<p>
									Quick Count
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="?page=data-suara" class="nav-link">
										<i class="nav-icon fas fa-chart-area ml-2"></i>
										<p> BEM </p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=data-suaradpm" class="nav-link">
										<i class="nav-icon fas fa-chart-area ml-2"></i>
										<p> DPM </p>
									</a>
								</li>
							</ul>
						</li>
						
						<!--<li class="nav-header">Setting</li>-->
						<br>

						<?php
          				} elseif($data_level=="Pemilih"){
          				?>
						<li class="nav-item">
							<a href="index.php" class="nav-link">
								<i class="nav-icon far fa fa-edit"></i>
								<p>
									Bilik Suara
								</p>
							</a>
						</li>

						<li class="nav-header">Setting</li>
						<?php
							}
						?>

						<li class="nav-item">
							<a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="logout.php" class="nav-link">
								<i class="nav-icon far fa-circle text-danger"></i>
								<p>
									Logout
								</p>
							</a>
						</li>

				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			</section>

			<!-- Main content -->
			<section class="content">
				<!-- /. WEB DINAMIS DISINI ############################################################################### -->
				<div class="container-fluid">

					<?php 
      if(isset($_GET['page'])){
          $hal = $_GET['page'];
  
          switch ($hal) {
              //Klik Halaman Home Pengguna
              	case 'admin':
                  include "home/admin.php";
                  break;
              	case 'petugas':
                  include "home/admin.php";
				  break;
				case 'pemilih':
                  include "home/pemilih.php";
                  break;

				//Pengguna
				case 'data-pengguna':
					include "admin/pengguna/data_pengguna.php";
					break;
				case 'add-pengguna':
					include "admin/pengguna/add_pengguna.php";
					break;
				case 'edit-pengguna':
					include "admin/pengguna/edit_pengguna.php";
					break;
				case 'del-pengguna':
					include "admin/pengguna/del_pengguna.php";
					break;
					
					//calon
				case 'data-calon':
					include "admin/calon/data_calon.php";
					break;
				case 'add-calon':
					include "admin/calon/add_calon.php";
					break;
				case 'add-calondpm':
					include "admin/calon/add_calondpm.php";
					break;
				case 'edit-calon':
					include "admin/calon/edit_calon.php";
					break;
				case 'edit-calondpm':
					include "admin/calon/edit_calondpm.php";
					break;
				case 'del-calon':
					include "admin/calon/del_calon.php";
					break;
				case 'del-calondpm':
					include "admin/calon/del_calondpm.php";
					break;
					
					//Pemilih
				case 'data-pemilih':
					include "admin/pemilih/data_pemilih.php";
					break;
				case 'add-pemilih':
					include "admin/pemilih/add_pemilih.php";
					break;
				case 'approve-password-pemilih':
					include "admin/pemilih/approve_password.php";
					break;
				case 'edit-pemilih':
					include "admin/pemilih/edit_pemilih.php";
					break;
				case 'del-pemilih':
					include "admin/pemilih/del_pemilih.php";
					break;
				
					
					//Bilik suara
				case 'PsSQAdT':
					include "pemilih/calon/data_calon.php";
					break;
				case 'PsSQBpL':
					include "pemilih/calon/pilih_calon.php";
					break;
				case 'PsSQBpLdpm':
					include "pemilih/calon/pilih_calondpm.php";
					break;
				case 'PsSQBBK':
                  	include "pemilih/calon/buka_calon.php";
				  	break;
				case 'view':
                  	include "pemilih/calon/view_calon.php";
				  	break;

				  
				//Kotak suara
				case 'data-kotak':
                  include "admin/kotak/data_kotak.php";
				  break;
				case 'data-suara':
                  include "admin/suara/data_suara.php";
                  break;
				case 'data-suaradpm':
				  include "admin/suara/data_suaradpm.php";
				  break;
				case 'del-kotak':
				  include "admin/kotak/del_kotak.php";
				  break;



          
              //default
              default:
                  echo "<center><h1> ERROR !</h1></center>";
                  break;    
          }
      }else{
        // Auto Halaman Home Pengguna
          if($data_level=="Administrator"){
              include "home/admin.php";
              }
          elseif($data_level=="Petugas"){
              include "home/admin.php";
              }
          elseif($data_level=="Pemilih"){
              include "home/pemilih.php";
              }
          }
    ?>

				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="float-left d-sm-block">
				Copyright &copy;
				<a target="_blank" href="https://www.instagram.com/anggaagustira/">
					<strong> Angga Agustira</strong>
				</a>
				All rights reserved.
			</div>
			<br>
			Create 2021
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 -->
	<script src="plugins/select2/js/select2.full.min.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- page script -->
	<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
	
	<script>
		$(function() {
			$(".example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>

	<script>
		$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})
		})
	</script>

</body>

</html>