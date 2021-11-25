<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pemilih</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<table class="example1  table table-bordered table-striped" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>NPM</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Prodi</th>
						<th>Kelas</th>
						<th>Jenis Kelas</th>
						<th>No HP</th>
						<th>Waktu</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				<div class="col-5">
					<!-- <form class="form-horizontal" action="" method="post"
						name="frmCSVImport" id="frmCSVImport"
						enctype="multipart/form-data">
						<div class="input-row">
							<label class="col-md-4 control-label">Choose CSV
								File</label> <input type="file" name="file"
								id="file" accept=".csv">
							<button type="submit" id="submit" name="import"
								class="btn-submit">Import</button>
							<br />

						</div>

					</form> -->
				</div>
		
				<div class="form-group row">
					<label align="center" class="col-lg-2 col-form-label ">Tambah Pemilih</label>
					<div class="col-sm-2">
						<a href="index.php?page=add-pemilih" class="btn btn-success btn-block">
							<i class=""></i> Daftar</a>
					</div>
					
					<label align="center" class="col-sm-2 col-form-label border-left ml-2">Hapus Pemilih</label>
					<form action="" method="post" enctype="multipart/form-data">
					
						<select class="col-sm-3 btn-group-center mr-5" id="hapusprodi" name="hapusprodi[]" required >
							<option value="" disabled selected>Pilih Prodi yang akan dihapus</option>
							<option value="Administrasi Pembangunan Negara">Administrasi Pembangunan Negara</option>
							<option value="Administrasi Bisnis Sektor Publik">Administrasi Bisnis Sektor Publik</option>
							<option value="Manajemen Sumber Daya Manusia Aparatur">Manajemen Sumber Daya Manusia Aparatur</option>
						</select>
						<input type="submit" name="deleteall" value="Hapus Semua" class="col-lg-2 btn btn-danger" onclick="return confirm('Apakah anda yakin hapus data ini ?')">
					</form>
				</div>
				<br>
			<?php

			  if (isset ($_POST['deleteall'])){
			    if(!empty($_POST['hapusprodi'])) {
					foreach($_POST['hapusprodi'] as $hapusprodi){
						// echo $hapusprodi;
					}       
				}
				else {
					echo 'Please select the value.';
				} 
				$sql_prodi = "SELECT id_pengguna FROM tb_pengguna WHERE level='Pemilih' AND prodi='$hapusprodi'";
				$dapat = mysqli_query($koneksi, $sql_prodi);
					while ($row = mysqli_fetch_array($dapat)) {
						$id_pem = $row[0];
						$delete_voting=mysqli_query($koneksi, "DELETE FROM tb_vote 
																WHERE id_pemilih ='$id_pem'");
						// echo $id_pem;
					}
				$delete_pemilih=mysqli_query($koneksi, "DELETE FROM tb_pengguna WHERE level='Pemilih' AND prodi= '$hapusprodi'");
			  }	
              $no = 1;
              $sql = $koneksi->query("select * from tb_pengguna where jenis='PST'");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['npm']; ?>
						</td>
						<td>
							<?php echo $data['nama_pengguna']; ?>
						</td>
						<td>
							<?php echo $data['email']; ?>
						</td>
						<td>
							<?php echo $data['prodi']; ?>
						</td>
						<td>
							<?php echo $data['kelas']; ?>
						</td>
						<td>
							<?php echo $data['jeniskelas']; ?>
						</td>
						<td>
							<?php echo $data['nohp']; ?>
						</td>
						<td>
							<?php echo $data['date']; ?>
						</td>
						<td>
						<?php 	$stt = $data['status'];
								$sttdpm = $data['statusdpm'];
								$angkatan = $data['angkatan'];
							 	if(($stt == '1')&&($sttdpm == '1')){ ?>
									<span class="badge badge-danger">Belum memilih</span>
						<?php	}elseif(($stt == '0')&&($sttdpm == '1')&&(($angkatan == '2019')||($angkatan == '2020')||($angkatan == '2021'))){ ?>
									<span class="badge badge-warning">Belum memilih DPM</span>
						<?php 	}elseif(($stt == '0')&&(($sttdpm == '0')||($angkatan == '2018'))){ ?>
									<span class="badge badge-primary">Sudah memilih</span>
						<?php 	} ?>
						</td>
						
						<td>
							<a href="?page=edit-pemilih&kode=<?php echo $data['id_pengguna']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-pemilih&kode=<?php echo $data['id_pengguna']; ?>" onclick="return confirm('Hapus Data Ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
								
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