<?php
  $sql = $koneksi->query("SELECT COUNT(id_calon) as tot_calon  from tb_calon");
  while ($data= $sql->fetch_assoc()) {
    $calon=$data['tot_calon'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_calondpm) as tot_calondpm  from tb_calondpm");
  while ($data= $sql->fetch_assoc()) {
    $calondpm=$data['tot_calondpm'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_pengguna) as tot_pemilih  from tb_pengguna where level='Pemilih'");
  while ($data= $sql->fetch_assoc()) {
    $pemilih=$data['tot_pemilih'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_pengguna) as sudah  from tb_pengguna where level='Pemilih' and status='0' and (statusdpm='0' or angkatan='2018')");
  while ($data= $sql->fetch_assoc()) {
    $sudah=$data['sudah'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_pengguna) as belumdpm  from tb_pengguna where level='Pemilih' and status='0' and statusdpm='1' and (angkatan='2019' or angkatan='2020' or angkatan='2021')");
  while ($data= $sql->fetch_assoc()) {
    $belumdpm=$data['belumdpm'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_pengguna) as belum  from tb_pengguna where level='Pemilih' and status='1' and statusdpm='1'");
  while ($data= $sql->fetch_assoc()) {
    $belum=$data['belum'];
  }

?>

<div class="row">
	<!-- col -->
	<div class="col-lg-4 col-6">
		<!-- small box -->
		<div class="small-box bg-primary">
			<div class="inner">
				<h5 align='center'>
					<?php echo $calon; ?>
				</h5>

				<p align='center'>Jumlah Kandidat Presma</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a href="?page=data-calon" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- /col -->
	<div class="col-lg-4 col-6">
		<!-- small box -->
		<div class="small-box bg-secondary">
			<div class="inner">
				<h5 align='center'>
					<?php echo $calondpm; ?>
				</h5>

				<p align='center'>Jumlah Kandidat DPM</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a href="?page=data-calon" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-4 col-6">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<h5 align='center'>
					<?php echo $pemilih; ?>
				</h5>

				<p align='center'>Jumlah Pemilih</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a href="?page=data-pemilih" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-4 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h5 align='center'>
					<?php echo $sudah; ?>
				</h5>

				<p align='center'>Sudah Memilih</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="?page=data-kotak" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-4 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h5 align='center'>
					<?php echo $belumdpm; ?>
				</h5>

				<p align='center'>Belum Memlih DPM</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="?page=data-pemilih" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-4 col-6">
		<!-- small box -->
		<div class="small-box bg-danger">
			<div class="inner">
				<h5 align='center'>
					<?php echo $belum; ?>
				</h5>

				<p align='center'>Belum Memlih</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="?page=data-pemilih" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>