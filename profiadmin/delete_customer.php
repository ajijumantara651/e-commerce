<?php
include("../koneksi.php");	
   $cek = "DELETE FROM `tbl_customer` WHERE `id_customer` = '".$_REQUEST['delete_id']."'";
   $query_hapus = mysql_query($cek);	

	if($query_hapus) {
		header('Location: kelola_customer.php');
	}
	else
		header('Location: kelola_customer.php');