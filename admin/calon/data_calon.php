<div class="card card-info">
	<div class="card-header">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li align="center" class="nav-item pt-2 mr-2">
				<h5 class="card-title"><i class="fa fa-table"></i>  Tab </h5>
			</li>
			<li class="nav-item">
				<a class="nav-link border-left active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Data Calon BEM</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Data Calon DPM</a>
			</li>
		</ul>
	</div>

	<div class="tab-content" id="myTabContent">
		<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

			<div class="card-body">
				<div class="table-responsive">
					<div>
						<a href="?page=add-calon" class="btn btn-primary"><i class="fa fa-edit"></i> Tambah Data</a>
					</div>
					<br>
					<table class="example1 table table-bordered table-striped">
						<thead>
							<tr>
								<th align="center">No Urut</th>
								<th align="center">Nama Kandidat</th>
								<th align="center">Foto Kandidat</th>
								<th align="center">Visi</th>
								<th align="center">Misi</th>
								<th align="center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							$sql = $koneksi->query("select * from tb_calon");
							while ($data= $sql->fetch_assoc()) {
							?>

							<tr>
								<td align="center">
									<?php echo $data['id_calon']; ?>
								</td>
								<td align="center">
									<?php echo $data['nama_calon']; ?>
								</td>
								<td align="center">
									<img src="foto/<?php echo $data['foto_calon']; ?>" width="150px" />
								</td>
								<td align="center">
									<?php echo $data['visi']; ?>
								</td>
								<td align="center">
									<?php echo $data['misi']; ?>
								</td>
								<td>
									<a href="?page=edit-calon&kode=<?php echo $data['id_calon']; ?>" title="Ubah"
										class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
									<a href="?page=del-calon&kode=<?php echo $data['id_calon']; ?>" 
										onclick="return confirm('Apakah anda yakin hapus data ini ?')"
										title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
								</td>
							</tr>

							<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>

		</div>
		<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
			<div class="card-body">				
				<div class="table-responsive">
					<div>
						<a href="?page=add-calondpm" class="btn btn-primary"><i class="fa fa-edit"></i> Tambah Data</a>
					</div>
					<br>
					<table class="example1 table table-bordered table-striped">
						<thead>
							<tr>
								<th align="center">No Urut</th>
								<th align="center">Nama Kandidat</th>
								<th align="center">Foto Kandidat</th>
								<th align="center">Prodi</th>
								<th align="center">Angkatan</th>
								<th align="center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							$sql = $koneksi->query("select * from tb_calondpm");
							while ($data= $sql->fetch_assoc()) {
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
									<a href="?page=edit-calondpm&kode=<?php echo $data['id_calondpm']; ?>" title="Ubah"
										class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
									<a href="?page=del-calondpm&kode=<?php echo $data['id_calondpm']; ?>" 
										onclick="return confirm('Apakah anda yakin hapus data ini ?')"
										title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
											</td>
										</tr>
							<?php 
							} 
							?>
						</tbody>	
					</table>
				</div>
			</div>
		</div>
	</div>

</div>