<div class="card card-info">
	<div class="card-header">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li align="center" class="nav-item pt-2 mr-2">
				<h5 class="card-title"><i class="fa fa-table"></i>  Tab </h5>
			</li>
			<li class="nav-item">
				<a class="nav-link border-left active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Daftar Manual</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Export Excel</a>
			</li>
		</ul>
	</div>

	<div class="tab-content" id="myTabContent">
        <!-- Daftar Pemilih Manual -->
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="card card-info">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group row pt-4">
                            <label class="col-sm-2 col-form-label">NPM</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="npm" name="npm" placeholder="NPM Mahasiswa" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Pemilih</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" placeholder="Nama user" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nomor Handphone</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="nohp" name="nohp" placeholder="08xxxxxxxx" required/>
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
                        <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
                        <a href="index.php?page=data-pemilih" title="Kembali" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>

            <?php
                if (isset ($_POST['Simpan'])){
                    $cek_user=mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE email='$_POST[email]' || npm='$_POST[npm]'"));
                    if ($cek_user > 0) {
                        echo '<script language="javascript">
                            alert ("NPM atau Email Sudah Ada Yang Menggunakan");
                            window.location="index.php?page=data-pemilih";
                            </script>';
                            exit();
                    } 
                //mulai proses simpan data
                    else {
                        $pass_acak = mt_rand(100000, 999999); 
                        $email = $_POST['email'];
                        if(!empty($_POST['prodi'])) {
                            foreach($_POST['prodi'] as $prodi){
                            }          
                        }
                        if(!empty($_POST['jeniskelas'])) {
                            foreach($_POST['jeniskelas'] as $jeniskelas){
                            }          
                        }if(!empty($_POST['angkatan'])) {
                            foreach($_POST['angkatan'] as $angkatan){
                            }          
                        }else {
                            echo 'Please select the value.';
                        }
                        $sql_simpan = "INSERT INTO tb_pengguna (npm,nama_pengguna,password,nohp,email,prodi,kelas,jeniskelas,angkatan,level,status,statusdpm,jenis) VALUES (
                            '".$_POST['npm']."',
                            '".$_POST['nama_pengguna']."',
                            '".$pass_acak ."',
                            '".$_POST['nohp']."',
                            '".$email."',
                            '".$prodi."',
                            '".$_POST['kelas']."',
                            '".$jeniskelas."',
                            '".$angkatan."',
                            'Pemilih',
                            '1',
                            '1',
                            'PST')";
                            $query_simpan = mysqli_query($koneksi, $sql_simpan);
                            mysqli_close($koneksi);
                        
                        // require 'phpmailer/PHPMailerAutoload.php';
                        $mail = new PHPMailer();
                        $mail->isSMTP();
                        $mail -> SMTPDebug = 0;
                        $mail->SMTPSecure='ssl';
                        $mail->Host='ssl://smtp.gmail.com';
                        $mail->Port=465;
                        $mail->SMTPAuth=true;
                
                        $mail->Username='kpumpoliteknikstialanbdg@gmail.com';
                        $mail->Password='TIMKPUSTIABDG2021';
                
                        $mail->setFrom('kpumpoliteknikstialanbdg@gmail.com','KPUM POLITEKNIK STIA LAN BANDUNG');
                        $mail->addAddress($email);
                            
                        $mail->isHTML();
                        $mail->Subject='Password Login E-Voting Politeknik STIA LAN Bandung';
                        $mail->Body="Assalamualaikum Wr. Wb. <br><br> Salam Mahasiswa.<br><br> Berikut ini merupakan informasi terkait Password yang bisa digunakan untuk mengakses Sistem E-Voting Politeknik STIA LAN Bandung (dengan mengakses https://evotingpoliteknikstialanbandung.com/).<br><br> PASSWORD : '$pass_acak' <br><br> Semoga informasi ini dapat bermanfaat bagi anda. Untuk informasi lebih lanjut, silahkan menghubungi pihak Humas KPUM Politeknik STIA LAN Bandung. <br> Terima kasih. <br><br> Hormat kami, <br><br> KPUM Politeknik STIA LAN Bandung. <br><br> Surat ini dihasilkan oleh komputer dan tidak perlu dijawab kembali ke alamat email ini.";
                        $mail->Send();
                        if(!$mail->send()) {
                            echo "Mailer Error: " . $mail->ErrorInfo;
                        }else{
                            echo "Silahkan Buka Email untuk Melihat Password anda.";
                        }
                    }
                if ($query_simpan) {
                    echo "<script>
                    Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                    }).then((result) => {if (result.value){
                    window.location = 'index.php?page=data-pemilih';
                    }
                    })</script>";
                }else{
                    echo "<script>
                    Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                    }).then((result) => {if (result.value){
                        window.location = 'index.php?page=data-pemilih';
                    }
                    })</script>";
                }
                }
                //selesai proses simpan data
            ?>
		</div>

        <!-- Export Excel -->
        <div align="center" class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
			<div class="card-body">
				<div class="table-responsive">
                    <form action="" method="post" enctype="multipart/form-data">
                        <label class="col-sm-6 col-form-label">Pilih File (Ubah format menjadi Excel 97-2003 Workbook(*.xls))</label>
                        <div class="col-sm-6">
                            <input name="filepegawai" type="file" required="required"> 
                            <input name="import" type="submit" value="import">
                        </div>
                    </form>
				</div>
			</div>

            <?php
            if (isset ($_POST['import'])){
                // upload file xls
                $target = basename($_FILES['filepegawai']['name']) ;
                move_uploaded_file($_FILES['filepegawai']['tmp_name'], $target);
                
                // beri permisi agar file xls dapat di baca
                chmod($_FILES['filepegawai']['name'],0777);
                
                // mengambil isi file xls
                $data = new Spreadsheet_Excel_Reader($_FILES['filepegawai']['name'],false);
                // menghitung jumlah baris data yang ada
                $jumlah_baris = $data->rowcount($sheet_index=0);
                
                // jumlah default data yang berhasil di import
                $berhasil = 0;
                for ($i=2; $i<=$jumlah_baris; $i++){
                
                    // menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
                    $npm        = $data->val($i, 1);
                    $nama       = $data->val($i, 2);
                    $nohp       = $data->val($i, 3);
                    $email      = $data->val($i, 4);
                    $prodi      = $data->val($i, 5);
                    $kelas      = $data->val($i, 6);
                    $jeniskelas = $data->val($i, 7);
                    $angkatan   = $data->val($i, 8);
                    
                    if($npm != "" && $nama != "" && $email != "" && $prodi != "" && $kelas != "" && $angkatan != ""){
                        mysqli_query($koneksi,"INSERT INTO tb_pengguna (npm,nama_pengguna,password,nohp,email,prodi,kelas,jeniskelas,angkatan,level,status,statusdpm,jenis) 
                            VALUES ('$npm', '$nama', '', '$nohp', '$email', '$prodi', '$kelas', '$jeniskelas', '$angkatan', 'Pemilih', '1', '1', 'PST')");
                        $berhasil++;
                    }
                    
                }
                mysqli_close($koneksi);
                // hapus kembali file .xls yang di upload tadi
                unlink($_FILES['filepegawai']['name']);
                
                // alihkan halaman ke index.php
                if ($berhasil == $jumlah_baris - 4 ){
                    echo "<script>
                        Swal.fire({title: 'Tambah Data Berhasil',text: '$berhasil Data Berhasil Ditambahkan',icon: 'success',confirmButtonText: 'OK'
                        }).then((result) => {if (result.value)
                            {window.location = 'index.php?berhasil=$berhasil';}
                        })</script>";
                }else{
                    echo "<script>
                        Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                        }).then((result) => {if (result.value)
                            {window.location = 'index.php?berhasil=$berhasil';}
                        })</script>";
                        }
            }
            ?>

		</div>
		
	</div>

</div>