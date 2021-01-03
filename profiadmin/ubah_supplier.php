<?php

  include("../koneksi.php"); 

  if(isset($_POST['submit'])){
    $kd = $_POST['Kd_Supplier'];
    $Nama_Supplier = $_POST['Nama_Supplier'];
    $telp = $_POST['Telp'];
    $alamat = $_POST['Alamat'];

    $cek = "UPDATE `tbl_supplier` SET `Kd_Supplier` = '$kd', `Nama_Supplier` = '$Nama_Supplier', `Telp` = '$telp', `Alamat` = '$alamat' WHERE `id_supplier` = '".$_REQUEST['id_supplier']."' ";
    $query_edit = mysql_query($cek) or trigger_error(mysql_error().$cek);

    if($query_edit){
      header('Location: kelola_supplier.php');
    }else{
      echo"<script>alert('perubahan Gagal');</script>";
      echo"trigger_error(mysql_error().$query_edit)";
    }
  }

?>