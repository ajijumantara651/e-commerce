<?php
include("../koneksi.php");
$Customer = $_REQUEST['customer'];
$Barang = $_REQUEST['barang'];
$Jumlah = $_REQUEST['jumlah']; 
$Harga = $_REQUEST['jumlah'] * $_REQUEST['harga'];
$Tanggal =  date("Y-m-d");

$cek = "INSERT INTO `tbl_pesanan`(`Kd_Barang`, `Kd_Customer`, `Jumlah`, `Harga_Jual`, `Tanggal_Pesan`) VALUES ('$Barang', '$Customer', '$Jumlah', 
       '$Harga', '$Tanggal')";
$query_add = mysql_query($cek);

if($query_add) {
	header('Location: troli.php');
}
else
	header('Location: index.php');
?>