<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_calondpm WHERE id_calondpm='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data Calon DPM</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nomor Urut</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="id_calondpm" name="id_calondpm" value="<?php echo $data_cek['id_calondpm']; ?>"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Calon</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_calondpm" name="nama_calondpm" value="<?php echo $data_cek['nama_calondpm']; ?>"
					/>
				</div>
			</div>


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto Calon</label>
				<div class="col-sm-6">
					<input type="file" id="foto_calondpm" name="foto_calondpm">
					<p class="help-block">
						<font color="red">Format file Jpg"</font>
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
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
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

if (isset ($_POST['Ubah'])){

    if(!empty($sumber)){
        $foto= $data_cek['foto_calondpm'];
            if (file_exists("foto/$foto")){
            unlink("foto/$foto");}

        $sql_ubah = "UPDATE tb_calondpm SET
            nama_calondpm='".$_POST['nama_calondpm']."',
            foto_calondpm='".$nama_file."',
			prodi='".$prodidpm."',
			angkatan='".$angkatandpm."'
            WHERE id_calondpm='".$_POST['id_calondpm']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

    }elseif(empty($sumber)){
        $sql_ubah = "UPDATE tb_calondpm SET
            nama_calondpm='".$_POST['nama_calondpm']."',
			prodidpm='".$_POST['prodidpm']."',
			angkatandpm='".$_POST['angkatandpm']."'
            WHERE id_calondpm='".$_POST['id_calondpm']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);
        }

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-calon';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-calon';
            }
        })</script>";
    }
}

