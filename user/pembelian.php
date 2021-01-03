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
            <img class="mySlides" src="images/888.jpg" style="width:100%">
            <img class="mySlides" src="images/777.jpg" style="width:100%">                
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
          <h2>DAFTAR PEMBELIAN BARANG</h2>
            <table class="demo-table responsive">
              <thead>
                <tr>
                    <th width="8%" scope="col">No</th>
                    <th width="16%" scope="col">No Invoice</th>
                    <th width="16%" scope="col">Nama</th>
                    <th width="20%" scope="col">Gambar</th>
                    <th width="41%" scope="col">Deskripsi</th>
                    <th width="15%" scope="col">Price</th>
                    <th width="15%" scope="col">Jumlah</th>
                    <th width="15%" scope="col">Total_Bayar</th>
                    <th width="15%" scope="col">Status</th>
                    <th width="15%" scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                 <?php
					        $query = "SELECT * FROM `tbl_pembelian` INNER JOIN `tbl_produk` ON `tbl_pembelian`.`Kd_Barang` = `tbl_produk`.`Kd_Barang` 
                  INNER JOIN `tbl_customer` ON `tbl_pembelian`.`Kd_Customer` = `tbl_customer`.`Kd_Customer` 
							    WHERE `tbl_customer`.`Kd_Customer` = '".$_SESSION['user']."' AND `Status_Beli` = 'Pending' ORDER BY `id_beli`";
					        $result = mysql_query($query); //execute the query $query 
	                $No = 1;
	                while ($data = mysql_fetch_array($result)) {
			          ?>
                <tr>
				            <td><?php echo $No ?></td>
                    <td><?php echo $data['Kd_Invoice'] ?></td>
                    <td><?php echo $data['Nama'] ?></td>
                    <td><img src="../profiadmin/produk/<?php echo $data['Foto'] ?>" width="45%"></td>
                    <td><?php echo $data['Deskripsi'] ?></td>
                    <td>Rp. <?php echo number_format($data['Harga_Jual'],0,',','.')?></td>
                    <td><?php echo $data['Jumlah_Barang'] ?></td>
                    <td>Rp. <?php echo number_format($data['Total_Bayar'],0,',','.')?></td>
					          <td><div align="left"><?php echo $data['Status_Beli'] ?></div></td>
                    <td><a class="tombol-1 tombol-1-detail" href="delete_beli.php?id_beli=<?php echo $data['id_beli'] ?>">Hapus</a></td>
                </tr>
              <?php
				      	$No++;
				        }
              ?>
                <tr>
                  <td colspan="7">
                  <?php
					          $result1 = mysql_query("SELECT COUNT(*) AS Total FROM `tbl_pembelian`
                    WHERE `Kd_Customer` = '".$_SESSION['user']."' AND `Status_Beli` = 'Pending' ORDER BY `id_beli`"); 
					          $data_cek = mysql_fetch_array($result1);
					
					          $jasa = mysql_query("SELECT * FROM `tbl_jasakirim` ORDER BY `id_jasa`"); 
					
					          if ($data_cek['Total'] >= 1) {
				          ?>
                  <form action="proses_beli.php" method="post">
                    <select name="jasa" class="myInput">
                        <?php
                          while ($data_jasa = mysql_fetch_array($jasa)) {
                        ?>
                        <option value="<?php echo $data_jasa['Kd_Jasa'] ?>">Nama Pengiriman : <?php echo $data_jasa['Nama_Jasa'] ?>, 
                        Durasi : <?php echo $data_jasa['Durasi'] ?>, Ongkos Kirim : <?php echo $data_jasa['Ongkir'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                  </td>
                  <td>
                  <input type="submit" class="tombol-1 tombol-beli" name="submit" id="submit" value="Beli" required>&nbsp;
                  </form>
                  <?php
                    }
                    else {
                      echo "Silahkan Beli Produk";
                    }
                   ?>
                  </td>
                </tr>
              </tbody>
           </table>
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