<?php
include("../koneksi.php");
if (isset($_POST['submit'])){
	$Kd_Jasa = $_POST['Kd_Jasa'];
	$Nama_Jasa = $_POST['Nama_Jasa'];
	$Durasi = $_POST['Durasi'];
	$Ongkir = $_POST['Ongkir'];
$cek = "INSERT INTO `tbl_jasakirim` (`id_jasa`,`Kd_Jasa`,`Nama_Jasa`,`Durasi`,`Ongkir`)
            VALUES(NULL, '$Kd_Jasa', '$Nama_Jasa', '$Durasi', '$Ongkir')";

		$query_add = mysql_query($cek);
			if ($query_add) {
				header('Location: kelola_jasa.php');
			}
			else
				header('Location: add_jasa.php');
}
?>