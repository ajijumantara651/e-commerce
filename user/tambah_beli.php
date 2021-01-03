<?php
include("../koneksi.php");
$Id_Pesanan = $_REQUEST['id_pesan']; 
$Kd_Customer = $_REQUEST['customer']; 
$Kd_Barang = $_REQUEST['barang'];
$Jumlah_Barang = $_REQUEST['jumlah']; 
$Harga_Jual = $_REQUEST['harga']; 
$Total_Bayar = $_REQUEST['harga'];
$Kd_Invoice = $_REQUEST['invoice'];
	
  $cek = "INSERT INTO `tbl_pembelian`(`Kd_Barang`, `Kd_Customer`, `Jumlah_Barang`, `Harga_Jual`, `Total_Bayar`, `Kd_Invoice`, `Status_Beli`) 
         VALUES ('$Kd_Barang', '$Kd_Customer', '$Jumlah_Barang', '$Harga_Jual', '$Total_Bayar', '$Kd_Invoice', 'Pending')";
$query_add = mysql_query($cek);

if($query_add) {
	$query_del = mysql_query("DELETE FROM `tbl_pesanan` WHERE `id_pesan` = '".$Id_Pesanan."'");
	header('Location: pembelian.php');
}
else
	header('Location: troli.php');
?>