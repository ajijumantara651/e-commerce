<?php

  include("../koneksi.php");

  if(isset($_POST['submit'])){
    $kd = $_POST['Kd_Kategori'];
    $Kategori = $_POST['Kategori'];

    $cek = "INSERT INTO `tbl_kategori` (`id_kategori`, `Kd_Kategori`, `Kategori`)
      VALUE(NULL, '$kd', '$Kategori')";

    $query_add = mysql_query($cek) or trigger_error(mysql_error().$cek);
    if($query_add){
      header('Location: kelola_kategori.php');
    }else{
      header('Location: kelola_kategori.php');
      echo"<script>alert('Data gagal di tambahkan');</script>";
    }
  }

?>