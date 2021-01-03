<?php

	include("../koneksi.php");

	if(isset($_POST['submit'])){
		$kd = $_POST['Kd_Supplier'];
		$nama_supplier = $_POST['Nama_Supplier'];
		$telp = $_POST['Telp'];
		$alamat = $_POST['Alamat'];

		$cek = "INSERT INTO `tbl_supplier` (`id_supplier`, `Kd_Supplier`, `Nama_Supplier`, `Telp`, `Alamat`)
			VALUE(NULL, '$kd', '$nama_supplier', '$telp', '$alamat')";

		$query_add = mysql_query($cek) or trigger_error(mysql_error().$cek);
		if($query_add){
			header('Location: kelola_supplier.php');
		}else{
			header('Location: kelola_supplier.php');
			echo"<script>alert('Data gagal di tambahkan');</script>";
		}
	}

?>