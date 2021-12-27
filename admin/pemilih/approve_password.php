<?php
if(isset($_GET['kode'])){
    $pass_acak = mt_rand(100000, 999999); 
    $sql_email = $koneksi->query("SELECT email FROM tb_pengguna WHERE id_pengguna='".$_GET['kode']."'");
    while ($data_email= $sql_email->fetch_assoc()) {
        $email = $data_email['email'];
    }
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
        
        echo "<script>
            Swal.fire({title: 'Approve Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
            }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-pemilih';
            }
        })</script>";
        echo "Mailer Error: " . $mail->ErrorInfo;
    }else{
        
        $sql_approve_pass = "UPDATE tb_pengguna SET
        password='".$pass_acak."'
        WHERE id_pengguna='".$_GET['kode']."'";
        $query_approve_pass = mysqli_query($koneksi, $sql_approve_pass);
        echo "Silahkan Buka Email untuk Melihat Password anda.";
        if ($query_approve_pass) {
            echo "<script>
                Swal.fire({title: 'Approve Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=data-pemilih';
                }
            })</script>";
        }else{
            echo "<script>
                Swal.fire({title: 'Approve Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=data-pemilih';
                }
            })</script>";
        }
    }
    
}