<?php
if(isset($_GET['kode'])){
            $sql_hapus = "DELETE FROM tb_pengguna WHERE id_pengguna='".$_GET['kode']."'";
            $sql_kurang = "DELETE FROM tb_vote WHERE id_pemilih='".$_GET['kode']."'";
            $query_hapus = mysqli_query($koneksi, $sql_hapus);
            $query_kurang = mysqli_query($koneksi, $sql_kurang);

            if ($query_hapus) {
                echo "<script>
                Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=data-pemilih';
                    }
                })</script>";
                }else{
                echo "<script>
                Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=data-pemilih';
                    }
                })</script>";
            }
        }

