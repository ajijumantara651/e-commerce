<?php
include("../koneksi.php");
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];

    $cek = "UPDATE `tbl_user` SET `username` = '$username', `password` = '$password', `nama` = '$nama' WHERE `id` = '".$_REQUEST['id']."' ";
    $query_edit = mysql_query($cek);

    if($query_edit) {
        header('Location: kelola_user.php');
    }
    else
        header('Location: edit_user.php');
}


?>