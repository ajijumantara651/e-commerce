<?php

  include("../koneksi.php"); 

    $cek = "DELETE FROM `tbl_kategori` WHERE `id_kategori` = '".$_REQUEST['delete_id']."' ";
      $query_delete = mysql_query($cek) or trigger_error(mysql_error().$cek);

    if($query_delete){
      header('Location: kelola_kategori.php');
    }else{
      echo"<script>alert('perubahan Gagal');</script>";
      echo"trigger_error(mysql_error().$query_delete)";
    }

?>