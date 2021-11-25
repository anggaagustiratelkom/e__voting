<?php
$koneksi = new mysqli ("localhost","root","","db_vote");
?>
<div class="realtimedpm">
	<div class="card card-info autoload">
		<div class="card-header">
			<h3 class="card-title">
				<i class="fa fa-chart-pie"></i> Perolehan Suara DPM</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th><center>No Urut</center></th>
							<th><center>Nama Kandidat</center></th>
							<th><center>Foto Kandidat</center></th>
							<th><center>Prodi</center></th>
							<th><center>Angkatan</center></th>
							<th><center>Jumlah Suara</center></th>
						</tr>
					</thead>
					<tbody>

						<?php
					$no = 1;
					$sql = $koneksi->query("select * from tb_calondpm");
					while ($data= $sql->fetch_assoc()) {

						$id_calondpm = $data["id_calondpm"];
					?>

						<tr>
							<td align="center">
								<?php echo $data['id_calondpm']; ?>
							</td>
							<td align="center">
								<?php echo $data['nama_calondpm']; ?>
							</td>
							<td align="center">
								<img src="foto/<?php echo $data['foto_calondpm']; ?>" width="150px" />
							</td>
							<td align="center">
								<?php echo $data['prodi']; ?>
							</td>
							<td align="center">
								<?php echo $data['angkatan']; ?>
							</td>
							<td align="center">
								<h4>
									<?php
								$sql_hitung = "SELECT COUNT(DISTINCT id_pemilih) from tb_votedpm  
												where id_calondpm='$id_calondpm' AND id_pemilih NOT LIKE '0'";
								$q_hit= mysqli_query($koneksi, $sql_hitung);
								while($row = mysqli_fetch_array($q_hit)) {
									echo $row[0]." Suara";
								}
								
								$sql_ganda = "SELECT tab2.id_pemilih, tab2.tot from (
									select tab.id_pemilih, count(*) as tot from (
										SELECT *, count(*) FROM `tb_votedpm` group by id_pemilih, id_calondpm) as tab 
										group by tab.id_pemilih) as tab2 where tab2.tot > 1 ";
								$dapat = mysqli_query($koneksi, $sql_ganda);
								while ($row = mysqli_fetch_array($dapat)) {
									$id_pem = $row[0];
									$delete_voting=mysqli_query($koneksi, "DELETE FROM tb_votedpm 
																			WHERE id_pemilih ='$id_pem'");
									$delete_pemilih= mysqli_query($koneksi, "DELETE FROM tb_pengguna 
																			WHERE id_pengguna = '$id_pem'");
								}
							?>
								</h4>
							</td>

								
						</tr>

						<?php
						}
						?>
					</tbody>
					</tfoot>
				</table>
			</div>
		</div>
		<!-- /.card-body -->
	</div>