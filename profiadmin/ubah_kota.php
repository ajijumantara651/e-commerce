<?php

    include("../koneksi.php"); 
 
    if(isset($_POST['submit'])){
        $kd = $_POST['Kd_Kota'];
        $Kota = $_POST['Kota'];

        $cek = "UPDATE `tbl_kota` SET `Kd_Kota` = '$kd', `Kota` = '$Kota' WHERE `id_kota` = '".$_REQUEST['id_kota']."' ";
        $query_edit = mysql_query($cek) or trigger_error(mysql_error().$cek);

        if($query_edit){
            header('Location: kelola_kota.php');
        }else{
            echo"<script>alert('perubahan Gagal');</script>";
            echo"trigger_error(mysql_error().$query_edit)";
        }
    }

?>