<?php
include("../koneksi.php");
if (isset($_POST['submit'])) {
    $id_customer = $_POST['id_customer'];
    $Kd_Customer = $_POST['kode'];
    $Customer = $_POST['nama'];
    $Alamat = $_POST['alamat'];
    $Telp = $_POST['telepon'];
    $Email = $_POST['email'];
    $Gabung = $_POST['join'];
    $Jenkel = $_POST['gender'];

    $cek = "UPDATE `tbl_customer` SET `id_customer` = '$id_customer', `Kd_customer` = '$Kd_customer', `Customer` = '$Customer', `Alamat` = '$Alamat', `Telp` = '$Telp', `Email` = '$Email', `Gabung` = '$Gabung', `Jenkel` = '$Jenkel' WHERE `id_customer` = '".$_REQUEST['id_customer']."' ";
    $query_edit = mysql_query($cek);

    if($query_edit) {
        header('Location: kelola_customer.php');
    }
    else
        header('Location: edit_customer.php');
}


?>