<?php
$koneksi = new mysqli ("localhost","evor9683_evotingstialan","evotingstialan2021","evor9683_db_vote");
?>
<div class="realtime">
	<div class="card card-info autoload">
		<div class="card-header">
			<h3 class="card-title">
				<i class="fa fa-chart-pie"></i> Perolehan Suara</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No Urut</th>
							<th>Nama Kandidat</th>
							<th>
								<center>Foto Kandidat</center>
							</th>
							<th>Jumlah Suara</th>
						</tr>
					</thead>
					<tbody>

						<?php
					$no = 1;
					$sql = $koneksi->query("select * from tb_calon");
					while ($data= $sql->fetch_assoc()) {

						$id_calon = $data["id_calon"];
					?>

						<tr>
							<td>
								<?php echo $data['id_calon']; ?>
							</td>
							<td>
								<?php echo $data['nama_calon']; ?>
							</td>
							<td align="center">
								<img src="foto/<?php echo $data['foto_calon']; ?>" width="150px" />
							</td>
							<td>
								<h4>
									<?php
								$sql_hitung = "SELECT COUNT(DISTINCT id_pemilih) from tb_vote  
												where id_calon='$id_calon' AND id_pemilih NOT LIKE '0'";
								$q_hit= mysqli_query($koneksi, $sql_hitung);
								while($row = mysqli_fetch_array($q_hit)) {
									echo $row[0]." Suara";
								}
								
								$sql_ganda = "SELECT tab2.id_pemilih, tab2.tot from (
									select tab.id_pemilih, count(*) as tot from (
										SELECT *, count(*) FROM `tb_vote` group by id_pemilih, id_calon) as tab 
										group by tab.id_pemilih) as tab2 where tab2.tot > 1 ";
								$dapat = mysqli_query($koneksi, $sql_ganda);
								while ($row = mysqli_fetch_array($dapat)) {
									$id_pem = $row[0];
									$delete_voting=mysqli_query($koneksi, "DELETE FROM tb_vote 
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