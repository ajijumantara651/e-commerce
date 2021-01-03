<?php
include("../koneksi.php");
session_start();
if (isset($_SESSION['user'])) 
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Commerce</title>
    <link rel="stylesheet" href="tampilan.css">
    <link rel="stylesheet" href="w3.css">
</head>
<style>
.mySlides {display:none;}
</style>
<body>     
    <div class="badan-utama">        
     <header>&nbsp;</header> 
        <nav class="navigasi">
        <?php
		  include("../menu.php");
	    ?>
        </nav> 
        <div class="banner">
          <div class="w3-content w3-display-container">
            <img class="mySlides" src="images/44.jpg"="width:100%">
            <img class="mySlides" src="images/555.jpg" style="width:100%">
            <img class="mySlides" src="images/777.jpg" style="width:100%">
            <img class="mySlides" src="images/888.jpg" style="width:100%">                
          <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
          <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
          </div>
          <script>
             var slideIndex = 1;
                showDivs(slideIndex);
                
                function plusDivs(n) {
                  showDivs(slideIndex += n);
                }
                
                function showDivs(n) {
                  var i;
                  var x = document.getElementsByClassName("mySlides");
                  if (n > x.length) {slideIndex = 1}
                  if (n < 1) {slideIndex = x.length}
                  for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";  
                  }
                  x[slideIndex-1].style.display = "block";  
                }
          </script>
        </div>          
        <div class="menu-tengah1">
          <div class="badan">
          <h2>DETAIL PESANAN</h2>
            <?php
              $query = "SELECT * FROM `tbl_produk` INNER JOIN `tbl_kategori` 
              ON `tbl_produk`.`Kd_Kategori` = `tbl_kategori`.`Kd_Kategori` 
			        INNER JOIN `tbl_supplier` 
              ON `tbl_produk`.`Kd_Supplier` = `tbl_supplier`.`Kd_Supplier` INNER JOIN `tbl_pesanan` 
					    ON `tbl_produk`.`Kd_Barang` = `tbl_pesanan`.`Kd_Barang` INNER JOIN `tbl_customer` 
              ON `tbl_pesanan`.`Kd_Customer` = 
					   `tbl_customer`.`Kd_Customer`  WHERE `id_pesan` = '".$_REQUEST['id_pesan']."'ORDER BY `id_barang`";
              $result = mysql_query($query); //execute the query $query 
	            $data = mysql_fetch_array($result);
			  
              $cek_inv = "SELECT SUBSTR(`Kd_Invoice`,9,1) AS `Total` FROM `tbl_transaksi` ORDER BY `Kd_Invoice` DESC LIMIT 0,1";
              $result1 = mysql_query($cek_inv); //execute the query $query 
	            $data_inv = mysql_fetch_array($result1);
              $Kode = $data_inv['Total'] + 1;
			      ?>
             <div class="list-produk-det-1">
              <img src="../profiadmin/produk/<?php echo $data['Foto'] ?>" width="100%">
             </div>
             <div class="list-produk-det-2">
              <form class="w3-container" action="tambah_beli.php">
                <div class="w3-section">
                  <label><b>Kode Pesanan</b></label>
                  <input class="w3-input w3-border" type="text" value="<?php echo $data['id_pesan'] ?>" name="id_pesan" readonly>
                  <label><b>Nama Customer</b></label>
                  <select class="w3-input w3-border" name="customer">
                    <option value="<?php echo $data['Kd_Customer'] ?>"><?php echo $data['Customer'] ?></option>
                  </select>
                  <label><b>No Invoice</b></label>
                  <input class="w3-input w3-border" type="text" value="INV/BRG/<?php echo $Kode ?>/2020" name="invoice" readonly>
                  <label><b>Nama Barang</b></label>
                  <select class="w3-input w3-border" name="barang">
                    <option value="<?php echo $data['Kd_Barang'] ?>"><?php echo $data['Nama'] ?></option>
                  </select>
                  <label><b>Jumlah Beli</b></label>
                  <input class="w3-input w3-border" type="text" value="<?php echo $data['Jumlah'] ?>" name="jumlah">
                  <label><b>Harga Beli</b></label>
                  <input class="w3-input w3-border" type="text" value="<?php echo $data['Harga_Jual'] ?>" name="harga" readonly>  
                  <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Add Chart</button>
                </div>
              </form>                
             </div>
          </div>
        </div>      
        <footer>
            @copyright 2020 || JUMANS
        </footer> 
    </div> 
</body>
</html>
<?php
}
?>