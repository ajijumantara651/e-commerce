<?php

  include("../koneksi.php"); 

  if(isset($_POST['submit'])){
    $Kd = $_POST['Kd_Jasa'];
    $Nama_Jasa = $_POST['Nama_Jasa'];
    $Durasi = $_POST['Durasi'];
    $Ongkir= $_POST['Ongkir'];

    $cek = "UPDATE `tbl_jasakirim` SET `Kd_Jasa` = '$Kd', `Nama_Jasa` = '$Nama_Jasa', `Durasi` = '$Durasi', `Ongkir` = '$Ongkir' WHERE `id_jasa` = '".$_REQUEST['id_jasa']."' ";
    $query_edit = mysql_query($cek) or trigger_error(mysql_error().$cek);

    if($query_edit){
      header('Location: kelola_jasa.php');
    }else{
      echo"<script>alert('perubahan Gagal');</script>";
      echo"trigger_error(mysql_error().$query_edit)";
    }
  }

?>