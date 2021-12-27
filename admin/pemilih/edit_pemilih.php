<?php
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_pengguna WHERE id_pengguna='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<input type='hidden' class="form-control" name="id_pengguna" value="<?php echo $data_cek['id_pengguna']; ?>"
			 readonly/>

            <div class="form-group row">
				<label class="col-sm-2 col-form-label">NPM</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" readonly="readonly" value="<?php echo $data_cek['npm']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama User</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" value="<?php echo $data_cek['nama_pengguna']; ?>"
					/>
				</div>
			</div>

			 <div class="form-group row">
				<label class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-6">
					<input type="password" class="form-control" id="pass" name="password" value="<?php echo $data_cek['password']; ?>"
					/>
					<input id="mybutton" onclick="change()" type="checkbox" class="form-checkbox"> Lihat Password
				</div>
			</div>

            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Nomor Handphone</label>
				<div class="col-sm-6">
					<input type="number" class="form-control" id="nohp" name="nohp" value="<?php echo $data_cek['nohp']; ?>"/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-6">
					<input type="email" class="form-control" id="email" name="email" value="<?php echo $data_cek['email']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Program Studi</label>
				<select class="col-sm-6 btn-group" id="prodi" name="prodi[]" required >
					<option value="" disabled selected>Pilih Program Studi</option>
					<option value="Administrasi Pembangunan Negara">Administrasi Pembangunan Negara</option>
					<option value="Administrasi Bisnis Sektor Publik">Administrasi Bisnis Sektor Publik</option>
					<option value="Manajemen Sumber Daya Manusia Aparatur">Manajemen Sumber Daya Manusia Aparatur</option>
				</select>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kelas</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="kelas" name="kelas" placeholder="xx-xxxx" required/>
					<small>Format xx-xxxx</small>
				</div>
			</div>

            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Angkatan Tahun</label>
				<select class="col-sm-3 btn-group" id="angkatan" name="angkatan[]" required >
					<option value="" disabled selected>Pilih Tahun</option>
					<option value="2018">2018</option>
					<option value="2019">2019</option>
					<option value="2020">2020</option>
					<option value="2021">2021</option>
				</select>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelas</label>
				<select class="col-sm-3 btn-group" id="jeniskelas" name="jeniskelas[]" required >
					<option value="" disabled selected>Pilih Jenis Regular/Karyawan</option>
					<option value="Regular">Regular</option>
					<option value="Karyawan">Karyawan</option>
				</select>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-pemilih" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

	if(!empty($_POST['prodi'])) {
		foreach($_POST['prodi'] as $prodi){
		// echo $prodi;
		}          
	}
	if(!empty($_POST['jeniskelas'])) {
		foreach($_POST['jeniskelas'] as $jeniskelas){
		// $kelas = $_POST['kelas'].$jeniskelas;
		// echo $jeniskelas;
		}          
	}if(!empty($_POST['angkatan'])) {
		foreach($_POST['angkatan'] as $angkatan){
		// echo $prodi;
		}
	}	

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_pengguna SET
        nama_pengguna='".$_POST['nama_pengguna']."',
        -- foto_pemilih=
        password='".$_POST['password']."',
		email='".$_POST['email']."',
		prodi='".$prodi."',
		kelas='".$_POST['kelas']."',
		jeniskelas='".$jeniskelas."',
		angkatan='".$angkatan."'
        WHERE id_pengguna='".$_POST['id_pengguna']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pemilih';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pemilih';
        }
      })</script>";
    }}
?>

<script type="text/javascript">
    function change()
    {
    var x = document.getElementById('pass').type;

    if (x == 'password')
    {
        document.getElementById('pass').type = 'text';
        document.getElementById('mybutton').innerHTML;
    }
    else
    {
        document.getElementById('pass').type = 'password';
        document.getElementById('mybutton').innerHTML;
    }
    }
</script>