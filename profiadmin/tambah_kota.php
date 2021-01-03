<?php

  include("../koneksi.php");

  if(isset($_POST['submit'])){
    $kd = $_POST['Kd_Kota'];
    $Kota = $_POST['Kota'];

    $cek = "INSERT INTO `tbl_kota` (`id_kota`, `Kd_Kota`, `Kota`)
      VALUE(NULL, '$kd', '$Kota')";

    $query_add = mysql_query($cek) or trigger_error(mysql_error().$cek);
    if($query_add){
      header('Location: kelola_kota.php');
    }else{
      header('Location: kelola_kota.php');
      echo"<script>alert('Data gagal di tambahkan');</script>";
    }
  }

?>