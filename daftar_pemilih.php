<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>E VOTING | Daftar </title>
	<link rel="icon" href="dist/img/votinglogo.png">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--Font Awesome -->
	<!--<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">-->
	 <!--Ionicons -->
	<!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
	<!-- DataTables -->
	<!--<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">-->
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	 <!--Google Font: Source Sans Pro -->
	<!--<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">-->
	 <!--Alert -->
	<script src="plugins/alert.js"></script>
	 <!--Auto Refresh -->
	<script src="jquery-3.1.1.js" type="text/javascript"></script>
</head>

<?php 
    //KONEKSI DB
    include "inc/koneksi.php";
?>

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i>Daftar Pemilih</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NPM</label>
				<div class="col-sm-6">
					<input type="number" class="form-control" id="npm" name="npm" placeholder="NPM Mahasiswa" required>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="email" name="email" placeholder="example" required/>
				</div>
				
				<select class="col-sm-3 btn-group" id="emailbelakang" name="emailbelakang[]" placeholder="NPM Mahasiswa" required >
					<option value="" disabled selected>Pilih Email yang Digunakan</option>
					<option value="@gmail.com">@gmail.com</option>
					<option value="@poltek.stialanbandung.ac.id">@poltek.stialanbandung.ac.id</option>
					<option value="@yahoo.com">@yahoo.com</option>
				</select>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Pemilih</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" placeholder="Nama user" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nomor Handphone</label>
				<div class="col-sm-6">
					<input type="number" class="form-control" id="nohp" name="nohp" placeholder="08xxxxxxxx" required/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Program Studi</label>
				<select class="col-sm-6 btn-group" id="prodi" name="prodi[]" required >
					<option value="" disabled selected>Pilih Program Studi</option>
					<option value="Administrasi Pembangunan Negara">Administrasi Pembangunan Negara</option>
					<option value="Administrasi Bisnis Sektor Publik">Administrasi Bisnis Sektor Publik</option>
					<option value="Manajemen Sumber Daya Manusia Aparatur">Manajemen Sumber Daya Manusia Aparatur</option>
				</select>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kelas</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="kelas" name="kelas" placeholder="xx-xxxx" required/>
					<small>Format xx-xxxx</small>
				</div>
				
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelas</label>
				<select class="col-sm-3 btn-group" id="jeniskelas" name="jeniskelas[]" required >
					<option value="" disabled selected>Pilih Jenis Regular/Karyawan</option>
					<option value="Regular">Regular</option>
					<option value="Karyawan">Karyawan</option>
				</select>
				
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="login.php" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

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

<?php
	// $selected_val = $_POST['emailbelakang'];  // Storing Selected Value In Variable
	// echo "You have selected :" .$selected_val;  // Displaying Selected Value 
    // $email = $_POST['email'].$_POST['emailbelakang'];
	$pass_acak = mt_rand(100000, 999999); 
	if (isset ($_POST['Simpan'])){
		$cek_user=mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE email='$_POST[email]' || npm='$_POST[npm]'"));
		if ($cek_user > 0) {
			echo '<script language="javascript">
				  alert ("NPM atau Email Sudah Ada Yang Menggunakan");
				  window.location="daftar_pemilih";
				  </script>';
				  exit();
		} 
    //mulai proses simpan data
        else {
			if(!empty($_POST['emailbelakang'])) {
				foreach($_POST['emailbelakang'] as $emailbelakang){
				$email = $_POST['email'].$emailbelakang;
				// echo $email;
				}          
			}
			if(!empty($_POST['prodi'])) {
				foreach($_POST['prodi'] as $prodi){
				// echo $prodi;
				}          
			}
			if(!empty($_POST['jeniskelas'])) {
				foreach($_POST['jeniskelas'] as $jeniskelas){
				// $kelas = $_POST['kelas'].$jeniskelas;
				// echo $jeniskelas;
				}          
			} else {
				echo 'Please select the value.';
			}
			$sql_simpan = "INSERT INTO tb_pengguna (npm,nama_pengguna,password,nohp,email,prodi,kelas,jeniskelas,level,status,statusdpm,jenis) VALUES (
				'".$_POST['npm']."',
				'".$_POST['nama_pengguna']."',
				'".$pass_acak ."',
				'".$_POST['nohp']."',
				'".$email."',
				'".$prodi."',
				'".$_POST['kelas']."',
				'".$jeniskelas."',
				'Pemilih',
				'1',
				'1',
				'PST')";
		    	$query_simpan = mysqli_query($koneksi, $sql_simpan);
			    mysqli_close($koneksi);
			
			require 'phpmailer/PHPMailerAutoload.php';
			$mail = new PHPMailer();
			$mail->isSMTP();
			$mail -> SMTPDebug = 0;
			$mail->SMTPSecure='ssl';
			$mail->Host='ssl://smtp.gmail.com';
			$mail->Port=465;
			$mail->SMTPAuth=true;
	
			$mail->Username='kpumpoliteknikstialanbdg@gmail.com';
			$mail->Password='TIMKPUSTIABDG2021';
	
			$mail->setFrom('kpumpoliteknikstialanbdg@gmail.com','KPUM POLITEKNIK STIA LAN BANDUNG');
			$mail->addAddress($email);
				
			$mail->isHTML();
			$mail->Subject='Password Login E-Voting Politeknik STIA LAN Bandung';
			$mail->Body="Assalamualaikum Wr. Wb. <br><br> Salam Mahasiswa.<br><br> Berikut ini merupakan informasi terkait Password yang bisa digunakan untuk mengakses Sistem E-Voting Politeknik STIA LAN Bandung (dengan mengakses https://evotingpoliteknikstialanbandung.com/).<br><br> PASSWORD : '$pass_acak' <br><br> Semoga informasi ini dapat bermanfaat bagi anda. Untuk informasi lebih lanjut, silahkan menghubungi pihak Humas KPUM Politeknik STIA LAN Bandung. <br> Terima kasih. <br><br> Hormat kami, <br><br> KPUM Politeknik STIA LAN Bandung. <br><br> Surat ini dihasilkan oleh komputer dan tidak perlu dijawab kembali ke alamat email ini.";
			$mail->Send();
			if(!$mail->send()) {
				echo "Mailer Error: " . $mail->ErrorInfo;
			}else{
				echo "Silahkan Buka Email untuk Melihat Password anda.";
			}
    	}
      if ($query_simpan) {
        echo "<script>
        Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
          }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-pemilih';
          }
        })</script>";
      }else{
        echo "<script>
        Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value){
            window.location = 'index.php?page=add-pemilih';
          }
        })</script>";
	  }
	}
	
     //selesai proses simpan data
