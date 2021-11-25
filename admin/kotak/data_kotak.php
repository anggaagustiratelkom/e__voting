<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Kotak Suara</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<table class="example1  table table-bordered table-striped" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Kandidat</th>
						<th>No Pemilih</th>
						<th>Waktu Memilih</th>
					
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$sql = $koneksi->query("SELECT v.id_pemilih, c.nama_calon, v.date 
					from tb_calon c 
					JOIN tb_vote v on c.id_calon = v.id_calon
					WHERE id_pemilih NOT LIKE '0'
					GROUP BY v.id_pemilih");
					while ($data= $sql->fetch_assoc()) {
					
					?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['nama_calon']; ?>
						</td>
						<td>
							<?php echo $data['id_pemilih']; ?>
						</td>
						<td>
							<?php echo $data['date']; ?>
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