<?php
  include "config/config.php";
  if (isset($_POST['tambah_akun'])) {
   extract($_POST);
    $ver = $_POST['veri'];
    $v = $_POST['ver'];
    if($ver != $v) {
      echo '<script>window.alert("Kode Verifikasi Anda Salah");history.back();</script>';
    }
    else{
      $select = $conn->query("SELECT * FROM akun WHERE ID_AKUN=".$_POST['idakun']);
      if($select -> num_rows == 0){
        $inuser = $conn -> query("INSERT INTO `akun`(`ID_AKUN`, `USERNAME`, `PASSWORD`,
          `NAMA`, `TELP`, `HAKAKSES`) 
          VALUES (".$_POST['idakun'].",'".$_POST['username']."','".sha1($_POST['password'])."',
            '".$_POST['nama']."','".$_POST['telp']."','2')");
        if($inuser){
          echo '<script>window.alert("Data Sudah Masuk. Silahkan Menunggu Verifikasi Dari Admin");window.location="index.php";</script>';
        }
      }else{
         echo '<script>window.alert("Coba Lagi!");window.location="index.php";</script>';
      }  
    }
  }
?>