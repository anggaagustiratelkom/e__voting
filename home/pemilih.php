

<?php
	// include "inc/koneksi.php";
	$data_id = $_SESSION["ses_id"];

	$sql = $koneksi->query("select * from tb_pengguna where id_pengguna=$data_id");
	while ($data= $sql->fetch_assoc()) {

	$status=$data['status'];

}
?>

<?php if($status==1){ ?>

<div class="row">
	<div class="card card-info" style="width: 100%">
		<div class="card-header">
			<h3 class="card-title">
				<i class="fa fa-table"></i> Data Kandidat</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>
								<center>Kandidat Pilihan Anda</center>
							</th>
						</tr>
					</thead>
						<tbody>

							<?php
							$sql = $koneksi->query("select * from tb_calon");
							while ($data= $sql->fetch_assoc()) {
							?>

							<tr>
								<td align="center">
									<h1>
										<?php echo $data['id_calon']; ?>
									</h1>
									<br>
									<img src="foto/<?php echo $data['foto_calon']; ?>" width="400px" />
									<br><br>
									<h2>
										<?php echo $data['nama_calon']; ?>
									</h2>
									<br>

									<table class="table table-bordered table-striped">
										<tr class="text-center">
											<td>VISI</td>
											<td>MISI</td>
										</tr>
										<tr>
											<td><?php echo $data['visi']; ?></td>
											<td><?php echo $data['misi']; ?></td>
										</tr>
									</table>
									 <a href="?page=PsSQBpL&kode=<?php echo $data['id_calon']; ?>" class="btn btn-primary"  onclick="return confirm('Apakah anda yakin akan memilih paslon ini ?')"> 
										<i class="fa fa-edit"></i> Pilih Paslon <?php echo $data['id_calon']?>
									</a>
								
								</td>
							</tr>

							<?php
					}
					?>
						</tbody>
					<!-- </tfoot> -->
				</table>
			</div>
		</div>
	</div>
</div>

<?php
// $data_id = $_SESSION["ses_id"];
// include "inc/koneksi.php";
// if(isset ($_POST['pilihan'])){
// 	$sql_simpan = "INSERT INTO tb_vote (id_calon, id_pemilih) VALUES (
// 		'".$idcalon."',
// 		'".$data_id."');";
// 	$sql_simpan .= "UPDATE tb_pengguna set 
// 		status='0'
// 		WHERE id_pengguna='".$data_id."'";
// 	$query_simpan = mysqli_multi_query($koneksi, $sql_simpan);
// 	mysqli_close($koneksi);
	
// 	if ($query_simpan) {
// 		echo "<script>
// 		Swal.fire({title: 'Anda Berhasil Memilih',text: '',icon: 'success',confirmButtonText: 'OK'
// 		}).then((result) => {if (result.value){
// 			window.location = 'index.php?page=PsSQAdT';
// 			}
// 		})</script>";
// 		}else{
// 		echo "<script>
// 		Swal.fire({title: 'Anda Gagal Memilih',text: '',icon: 'error',confirmButtonText: 'OK'
// 		}).then((result) => {if (result.value){
// 			window.location = 'index.php?page=pemilih';
// 			}
// 		})</script>";
// 	  }}
	?>
<!-- /.card-body -->
<?php }elseif ($status==0) { ?>

<div class="alert alert-info alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<h4>
		<i class="icon fas fa-info"></i>Info</h4>
	<h3>Anda sudah menggukan Hak Suara dengan baik, Terimakasih.</h3>
</div>

<?php }  

