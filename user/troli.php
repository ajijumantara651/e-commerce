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
          <h2>DAFTAR PESANAN CUSTOMER</h2>
            <table class="demo-table responsive">
              <thead>
                <tr>
                    <th width="8%" scope="col">No</th>
                    <th width="15%" scope="col">Nama</th>
                    <th width="15%" scope="col">Gambar</th>
                    <th width="25%" scope="col">Deskripsi</th>
                    <th width="15%" scope="col">Price</th>
                    <th width="8%" scope="col">Jumlah</th>
                    <th width="15%" scope="col">Tanggal</th>
                    <th width="15%" scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                 <?php
					          $query = "SELECT * FROM `tbl_pesanan` INNER JOIN `tbl_produk` ON `tbl_pesanan`.`Kd_Barang` = `tbl_produk`.`Kd_Barang` 
			              INNER JOIN `tbl_customer` ON `tbl_pesanan`.`Kd_Customer` = `tbl_customer`.`Kd_Customer` 
							      WHERE `tbl_customer`.`Kd_Customer` = '".$_SESSION['user']."' ORDER BY `id_pesan`";
				          	$result = mysql_query($query); 
                    $No = 1;
                    while ($data = mysql_fetch_array($result)) {
			            ?>
                <tr>
				            <td><?php echo $No ?></td>
                    <td><?php echo $data['Nama'] ?></td>
                    <td><img src="../profiadmin/produk/<?php echo $data['Foto'] ?>" width="45%"></td>
                    <td><?php echo $data['Deskripsi'] ?></td>
                    <td>Rp. <?php echo number_format($data['Harga_Jual'],0,',','.')?></td>
                    <td><?php echo $data['Jumlah'] ?></td>
                    <td><?php echo $data['Tanggal_Pesan'] ?></td>
                    <td><a class="tombol-1 tombol-1-beli" href="view_beli.php?id_pesan=<?php echo $data['id_pesan'] ?>">Beli</a></td>
                </tr>
                <?php
					      $No++;
                }
                ?>
              </tbody>
           </table>
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