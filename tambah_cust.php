<?php
include("koneksi.php");
if (isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$Kd_Customer = $_POST['kode'];
	$customer = $_POST['nama'];
	$Alamat = $_POST['alamat'];
	$Kd_Kota = $_POST['kota'];
	$Telp = $_POST['telepon'];
	$Email = $_POST['email'];
	$Gabung = $_POST['join'];
	$Jenkel = $_POST['gender'];
$cek = "INSERT INTO `tbl_customer` (`id_customer`,`Kd_Customer`,`Customer`,`Alamat`,`Kd_Kota`,`Telp`,`Email`,`Gabung`,`Jenkel`)
            VALUES(NULL ,'$Kd_Customer', '$customer', '$Alamat', '$Kd_Kota', '$Telp', '$Email', '$Gabung', '$Jenkel')";

		$query_add = mysql_query($cek);
			if ($query_add) {
				$cek = "INSERT INTO `tbl_user`(`username`,`password`,`nama`) VALUES ('$username',
				'$password','$customer')";
				$query_add = mysql_query($cek);
				header('Location: login.php');
			}
			else
				header('Location: registrasi.php');
}
?>