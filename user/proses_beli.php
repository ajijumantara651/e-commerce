<?php
include("../koneksi.php");
if (isset($_POST['submit'])) {
$Kd_Jasa = $_POST['jasa'];

$query = "SELECT `tbl_pembelian`.`Kd_Customer`, `Kd_Invoice`, SUM(`Jumlah_Barang`) AS jml, SUM(`Total_Bayar`) AS bayar FROM `tbl_pembelian`     
INNER JOIN `tbl_customer` ON `tbl_customer`.`Kd_Customer` = `tbl_pembelian`.`Kd_Customer` GROUP BY `Kd_Customer`, `Status_Beli` 
HAVING `Status_Beli` = 'Pending'";
$result = mysql_query($query); 
$data = mysql_fetch_array($result);

$Kd_Customer = $data['Kd_Customer'];
$Jumlah_Barang = $data['jml'];
$Total_Beli = $data['bayar'];
$Kd_Invoice = $data['Kd_Invoice'];

$query_jasa = "SELECT * FROM `tbl_jasakirim` WHERE `id_jasa` = '".$Kd_Jasa."' ORDER BY `id_jasa`";
$result_jasa = mysql_query($query_jasa); 
$data_jasa = mysql_fetch_array($result_jasa);
$Fee_Kirim = $data_jasa['Ongkir'];
$Estimasi_Waktu = $data_jasa['Durasi'];
$Nama_Jasa = $data_jasa['Nama_Jasa'];
$Total_Bayar = $Total_Beli + $Fee_Kirim;

$cek = "INSERT INTO `tbl_transaksi`(`Jumlah_Barang`, `Total_Beli`, `Fee_Kirim`, `Total_Bayar`, `Status_Bayar`, `Kd_Invoice`)
VALUES ('$Jumlah_Barang', '$Total_Beli', '$Fee_Kirim', '$Total_Bayar', 'Pending', '$Kd_Invoice')";
$query_add = mysql_query($cek);

  if($query_add) {
	$query_kirim = mysql_query("INSERT INTO `tbl_kirim`(`Kd_Customer`, `Kd_Invoice`, `Penyedia_Jasa`, `Status_Kirim`, `Estimasi_Waktu`, `Total_Fee`)
	                           VALUES ('$Kd_Customer', '$Kd_Invoice', '$Nama_Jasa', 'Pending', '$Estimasi_Waktu', '$Total_Bayar')");
							   
	$query_beli = mysql_query("UPDATE `tbl_pembelian` SET `Status_Beli` = 'Proses Beli' WHERE `Kd_Invoice` = '".$Kd_Invoice."'");
	
	$result_Stok = mysql_query("SELECT * FROM `tbl_pembelian` ORDER BY `id_beli`");
        while ($data_stok = mysql_fetch_array($result_Stok)) {
			  $Jumlah_Beli = $data_stok['Jumlah_Barang'];
		      $barang_1 = mysql_query("SELECT * FROM `tbl_produk` WHERE `Kd_Barang` = '".$data_stok['Kd_Barang']."'");
			  $data_barang = mysql_fetch_array($barang_1);
			  $Stok_Awal = $data_barang['Stok'];
			  $Stok_Akhir = $Stok_Awal - $Jumlah_Beli;
			  
              $Update_Stok = mysql_query("UPDATE `tbl_produk` SET `Stok` = '".$Stok_Akhir."' WHERE `Kd_Barang` = '".$data_stok['Kd_Barang']."'");
        };	
	header('Location: pengiriman.php');
}
else
	header('Location: pembelian.php');
}
?>