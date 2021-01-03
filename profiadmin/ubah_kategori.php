<?php

    include("../koneksi.php"); 
 
    if(isset($_POST['submit'])){
        $kd = $_POST['Kd_Kategori'];
        $Kategori = $_POST['Kategori'];

        $cek = "UPDATE `tbl_kategori` SET `Kd_Kategori` = '$kd', `Kategori` = '$Kategori' WHERE `id_kategori` = '".$_REQUEST['id_kategori']."' ";
        $query_edit = mysql_query($cek) or trigger_error(mysql_error().$cek);

        if($query_edit){
            header('Location: kelola_kategori.php');
        }else{
            echo"<script>alert('perubahan Gagal');</script>";
            echo"trigger_error(mysql_error().$query_edit)";
        }
    }

?>