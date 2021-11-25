<?php
	$data_id = $_SESSION["ses_id"];

	$sql = $koneksi->query("select * from tb_pengguna where id_pengguna=$data_id");
	while ($data= $sql->fetch_assoc()) {
		$status=$data['status'];
		$statusdpm=$data['statusdpm'];
		$prodi=$data['prodi'];
		$angkatan=$data['angkatan'];
	}
?>

<?php if(($status==1)&&($statusdpm==1)){ ?>

<div class="row">
	<div class="card card-info" style="width: 100%">
		<div class="card-header">
			<h3 class="card-title">
				<i class="fa fa-table"></i> Data Kandidat BEM</h3>
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

<?php } if(($status==0)&&($statusdpm==1)&&(($angkatan==2019)||($angkatan==2020)||($angkatan==2021))){ ?>
<div class="row">
	<div class="card card-info" style="width: 100%">
		<div class="card-header">
			<h3 class="card-title">
				<i class="fa fa-table"></i> Data Kandidat DPM</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>
								<center><?php echo($prodi) ?> <br> Angkatan <?php echo($angkatan) ?></center>
							</th>
						</tr>
					</thead>
						<tbody>
						<td>
							<div class="row" >
								<?php $sql = $koneksi->query("SELECT * FROM tb_calondpm WHERE prodi='$prodi' AND angkatan='$angkatan'");
								while ($datadpm= $sql->fetch_assoc()) {
								?>
									<div class="col-md-3">
										<div class="card">
											<h2 align="center">
												<?php echo $datadpm['id_calondpm']; ?>
											</h2>
											<img src="foto/<?php echo $datadpm['foto_calondpm']; ?>" class="card-img-top" alt="Calon <?php echo $datadpm['id_calondpm']; ?>">
											<div class="card-body" align="center">
												<h5><?php echo $datadpm['nama_calondpm']; ?></h5>
												<!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
												<a  href="?page=PsSQBpLdpm&kode=<?php echo $datadpm['id_calondpm']; ?>" class="btn btn-primary" >Pilih Calon <?php echo $datadpm['id_calondpm']; ?></a>
											</div>
										</div>
									</div>
								<?php
								}
								?>
							</div>
						</td>
						</tbody>
					<!-- </tfoot> -->
				</table>
			</div>
		</div>
	</div>
</div>

<!-- /.card-body -->
<?php } if(($status==0)&&(($statusdpm==0)||($angkatan==2018))){ ?>
	<div class="alert alert-info alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4> <i class="icon fas fa-info"></i>Info</h4>
		<h3>Anda sudah menggukan Hak Suara dengan baik, Terimakasih.</h3>
	</div>	
<?php } ?>

