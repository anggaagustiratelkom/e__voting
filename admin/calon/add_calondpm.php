<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Calon DPM</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No urut</label>
				<div class="col-sm-6">
					<input type="number" class="form-control" id="id_calondpm" name="id_calondpm" placeholder="Nomor Urut" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Kandidat</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_calondpm" name="nama_calondpm" placeholder="Nama Calon">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto Kandidat</label>
				<div class="col-sm-6">
					<input type="file" id="foto_calondpm" name="foto_calondpm">
					<p class="help-block">
						<font color="red">"Format file Jpg"</font>
					</p>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Program Studi</label>
				<select class="col-sm-6 btn-group" id="prodidpm" name="prodidpm[]" required >
					<option value="" disabled selected>Pilih Program Studi</option>
					<option value="Administrasi Pembangunan Negara">Administrasi Pembangunan Negara</option>
					<option value="Administrasi Bisnis Sektor Publik">Administrasi Bisnis Sektor Publik</option>
					<option value="Manajemen Sumber Daya Manusia Aparatur">Manajemen Sumber Daya Manusia Aparatur</option>
				</select>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Angkatan</label>
				<select class="col-sm-3 btn-group" id="angkatandpm" name="angkatandpm[]" required >
					<option value="" disabled selected>Pilih Tahun</option>
					<option value="2019">2019</option>
					<option value="2020">2020</option>
					<option value="2021">2021</option>
				</select>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-calon" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    $sumber = @$_FILES['foto_calondpm']['tmp_name'];
    $target = 'foto/';
    $nama_file = @$_FILES['foto_calondpm']['name'];
    $pindah = move_uploaded_file($sumber, $target.$nama_file);

	if(!empty($_POST['prodidpm'])) {
		foreach($_POST['prodidpm'] as $prodidpm){
		// echo $prodi;
		}          
	}
	if(!empty($_POST['angkatandpm'])) {
		foreach($_POST['angkatandpm'] as $angkatandpm){
		// echo $prodi;
		}           
	}

    if (isset ($_POST['Simpan'])){

		if(!empty($sumber)){
        $sql_simpan = "INSERT INTO tb_calondpm (id_calondpm, nama_calondpm, foto_calondpm, prodi, angkatan) VALUES (
        '".$_POST['id_calondpm']."',
        '".$_POST['nama_calondpm']."',
        '".$nama_file."',
		'".$prodidpm."',
		'".$angkatandpm."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-calon';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-calondpm';
          }
      })</script>";
	}
}elseif(empty($sumber)){
	echo "<script>
	Swal.fire({title: 'Gagal, Foto Wajib Diisi',text: '',icon: 'error',confirmButtonText: 'OK'
	}).then((result) => {
		if (result.value) {
			window.location = 'index.php?page=add-calondpm';
		}
	})</script>";
  }
}   
