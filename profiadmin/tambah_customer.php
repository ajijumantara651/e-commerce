<?php
include("../koneksi.php");
if (isset($_POST['submit'])){
	$Kd_Customer = $_POST['kode'];
	$Customer = $_POST['nama'];
	$Alamat = $_POST['alamat'];
	$Kd_Kota = $_POST['kota'];
	$Telp = $_POST['telepon'];
	$Email = $_POST['email'];
	$Gabung = $_POST['join'];
	$Jenkel = $_POST['gender'];
$cek = "INSERT INTO `tbl_customer` (`id_customer`,`Kd_Customer`,`Customer`,`Alamat`,`Kd_Kota`,`Telp`,`Email`,`Gabung`,`Jenkel`)
            VALUES(NULL, '$Kd_Customer', '$Customer', '$Alamat', '$Kd_Kota', '$Telp', '$Email', '$Gabung', '$Jenkel')";

		$query_add = mysql_query($cek);
			if ($query_add) {
				header('Location: kelola_customer.php');
			}
			else
				header('Location: add_customer.php');
}
?>