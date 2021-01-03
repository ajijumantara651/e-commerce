<?php
include("../koneksi.php");	
   $cek = "DELETE FROM `tbl_pembelian` WHERE `id_beli` = '".$_REQUEST['id_beli']."'";
   $query_edit = mysql_query($cek);	

	if($query_hapus) {
		header('Location: pembelian.php');
	}
	else
		header('Location: pembelian.php');