<?php
include("../koneksi.php");	
   $cek = "DELETE FROM `tbl_jasakirim` WHERE `id_jasa` = '".$_REQUEST['delete_id']."'";
   $query_hapus = mysql_query($cek);	

	if($query_hapus) {
		header('Location: kelola_jasa.php');
	}
	else
		header('Location: kelola_jasa.php');