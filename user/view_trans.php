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
          <h2>DETAIL TRANSAKSI</h2>
            <?php
              $query = "SELECT * FROM `tbl_transaksi` INNER JOIN `tbl_kirim` ON `tbl_transaksi`.`Kd_Invoice` = `tbl_kirim`.`Kd_Invoice` INNER JOIN
              `tbl_customer` ON `tbl_customer`.`Kd_Customer` = `tbl_kirim`.`Kd_Customer` INNER JOIN `tbl_kota` 
              ON `tbl_customer`.`Kd_Kota` = `tbl_kota`.`Kd_Kota` WHERE `tbl_transaksi`.`Kd_Invoice` = '".$_REQUEST['kd_inv']."'";
			        $result = mysql_query($query); //execute the query $query 
	            $data = mysql_fetch_array($result);
			      ?>
            <div class="list-produk-det-1">
              <h4 align="center">Bukti Bayar Transaksi</h4>  
              <hr>
              <?php
               if ($data['Bukti_Bayar'] <> '') {
			        ?>
                <img src="bukti_bayar/<?php echo $data['Bukti_Bayar'] ?>" width="100%">
                <hr>
                <h4>Status Bayar&nbsp;:&nbsp;<?php echo $data['Status_Bayar'] ?></h4>
                <h4>Status Pengiriman&nbsp;:&nbsp;<?php echo $data['Status_Kirim'] ?></h4>
              <?php
			        }
              else { 
                echo "<h4 align=center>Belum Ada Pembayaran<br>Silahkan Melalukan Pembayaran Sesuai Dengan Total Transaksi & Upload Bukti Bayar
                <p>Nama&nbsp;:&nbsp;Aji Jumantara </p>
                <p>Transfer ke Rekening&nbsp;:&nbsp;BNI- MANDIRI-BCA</p></h4>";
                echo "<hr>";
                echo "<form role=form action=ubah_beli.php?kd_inv=".$_REQUEST['kd_inv']." method=post enctype=multipart/form-data>";
                echo "<label><h4>Upload Bukti Bayar</h4></label>";
                echo "<input type=file name=image>";
                echo "<hr>";
                echo "<button type=save name=submit>Save</button>";
                echo "</form>";
              }
              ?>
            </div>
            <div class="list-produk-det-2">
              <h4>Nama&nbsp;:&nbsp;<?php echo $data['Customer'] ?></h4>
              <h4>Alamat&nbsp;:&nbsp;<?php echo $data['Alamat'] ?>, <?php echo $data['Kota'] ?></h4> 
              <h4>Telepon&nbsp;:&nbsp;<?php echo $data['Telp'] ?></h4> 
              <hr>            
              <h4>No. Invoice&nbsp;:&nbsp;<?php echo $data['Kd_Invoice'] ?></h4>            
              <h4>Jumlah Barang&nbsp;:&nbsp;<?php echo $data['Jumlah_Barang'] ?></h4>             
              <h4>Total Pembelian&nbsp;:&nbsp;Rp. <?php echo number_format($data['Total_Beli'],0,',','.')?></h4>             
              <h4>Ongkos Kirim&nbsp;:&nbsp;Rp. <?php echo number_format($data['Fee_Kirim'],0,',','.')?></h4>              
              <h4>Total Pembayaran&nbsp;:&nbsp;Rp. <?php echo number_format($data['Total_Bayar'],0,',','.')?></h4>     
              <hr>            
              <table class="demo-table responsive">
              <thead>
                <tr>
                 <th width="23%" scope="col">Nama Barang</th>
                 <th width="17%" scope="col">Gambar</th>
                 <th width="19%" scope="col">Price</th>
                 <th width="16%" scope="col">Jumlah</th>
                 <th width="25%" scope="col">Total_Bayar</th>
                </tr>
              </thead>
              <tbody>
              <?php
					      $query1 = "SELECT * FROM `tbl_pembelian` INNER JOIN `tbl_produk` ON `tbl_pembelian`.`Kd_Barang` = `tbl_produk`.`Kd_Barang` 
                INNER JOIN `tbl_customer` ON `tbl_pembelian`.`Kd_Customer` = `tbl_customer`.`Kd_Customer` 
							  WHERE `Kd_Invoice` = '".$data['Kd_Invoice']."' ORDER BY `id_beli`";
					      $result1 = mysql_query($query1); //execute the query $query 
                while ($data1 = mysql_fetch_array($result1)) {
              ?>
                <tr>
                  <td><?php echo $data1['Nama'] ?></td>
                  <td><img src="../profiadmin/produk/<?php echo $data1['Foto'] ?>" width="45%"></td>
                  <td align="right">Rp. <?php echo number_format($data1['Harga_Jual'],0,',','.')?></td>
                  <td align="center"><?php echo $data1['Jumlah_Barang'] ?></td>
                  <td align="right">Rp. <?php echo number_format($data1['Total_Bayar'],0,',','.')?></td>
                </tr>
                <?php
				        }
			         ?>
                <tr>
                  <td colspan="4" align="left"><h4>Total Pembayaran</h4></td>
                  <td align="right"><h4>Rp. <?php echo number_format($data['Total_Bayar'],0,',','.')?></h4></td>
                </tr>
              </tbody>
             </table> 
            </div>
          </div>
        </div>      
        <footer>
            @copyright 2020 || by JUMANS
        </footer> 
    </div> 
</body>
</html>
<?php
}
?>