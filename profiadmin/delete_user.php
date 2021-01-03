<?php
include("../koneksi.php");	
   $cek = "DELETE FROM `tbl_user` WHERE `id` = '".$_REQUEST['delete_id']."'";
   $query_edit = mysql_query($cek);	

	if($query_edit) {
		header('Location: kelola_user.php');
	}
	else
		header('Location: kelola_user.php');
?>