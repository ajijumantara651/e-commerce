<?php
include("../koneksi.php");
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];

    $cek = "INSERT INTO `tbl_user` (`username`, `password`, `nama`) VALUES ('$username', '$password', '$nama')";
    $query_add = mysql_query($cek);

    if($query_add) {
        header('Location: kelola_user.php');
    }
    else
        header('Location: add_user.php');
}
?>