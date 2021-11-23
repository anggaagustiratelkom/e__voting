<?php
if(isset($_GET['kode'])){
            $sql_kurang = "DELETE FROM tb_vote WHERE id_pemilih='".$_GET['kode']."'";
            $query_kurang = mysqli_query($koneksi, $sql_kurang);
        }

