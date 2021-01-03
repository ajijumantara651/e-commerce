<?php

  include("../koneksi.php"); 

    $cek = "DELETE FROM `tbl_kota` WHERE `id_kota` = '".$_REQUEST['delete_id']."' ";
      $query_delete = mysql_query($cek) or trigger_error(mysql_error().$cek);

    if($query_delete){
      header('Location: kelola_kota.php');
    }else{
      echo"<script>alert('perubahan Gagal');</script>";
      echo"trigger_error(mysql_error().$query_delete)";
    }

?>