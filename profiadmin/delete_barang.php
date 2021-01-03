<?php
include("../koneksi.php");
$result = mysql_query("SELECT * FROM `tbl_produk` WHERE `id_barang` = '".$_REQUEST['delete_id']."' ORDER BY `id_barang`");
$data = mysql_fetch_array($result);
$nama_file = $data['Foto'];
$target_file = "produk/".$nama_file;

$cek = "DELETE FROM `tbl_produk` WHERE `id_barang` = '".$_REQUEST['delete_id']."'";
$query_hapus = mysql_query($cek);
if($query_hapus){
	unlink($target_file);
	header('Location: kelola_barang.php');
}else{
	echo "<script type ='text/javascript'> alert ('Data gagal di hapus');document.location='javascript:history.back(1)';
		</script>";
}

?>