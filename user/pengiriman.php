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
          <h2>DAFTAR TRANSAKSI</h2>
            <table class="demo-table responsive">
              <thead>
                <tr>
                    <th width="6%" scope="col">No</th>
                    <th width="15%" scope="col">No Invoice</th>
                    <th width="13%" scope="col">Total Bayar</th>
                    <th width="11%" scope="col">Jasa Kirim</th>
                    <th width="11%" scope="col">Durasi</th>
                    <th width="12%" scope="col">Bukti Bayar</th>
                    <th width="12%" scope="col">Bukti Kirim</th>
                    <th width="9%" scope="col">Status Kirim</th>
                    <th width="11%" scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
					        $query = "SELECT * FROM `tbl_transaksi` INNER JOIN `tbl_kirim` ON `tbl_transaksi`.`Kd_Invoice` = `tbl_kirim`.`Kd_Invoice` INNER JOIN
					        `tbl_customer` ON `tbl_customer`.`Kd_Customer` = `tbl_kirim`.`Kd_Customer` INNER JOIN `tbl_kota` 
							    ON `tbl_customer`.`Kd_Kota` = `tbl_kota`.`Kd_Kota` ORDER BY id_transaksi";
					        $result = mysql_query($query); 
	                $No = 1;
	                while ($data = mysql_fetch_array($result)) {
			          ?>
                <tr>
				    <td><?php echo $No ?></td>
                  <td><?php echo $data['Kd_Invoice'] ?></td>
                  <td>Rp. <?php echo number_format($data['Total_Bayar'],0,',','.')?></td>
                  <?php
                    if ($data['Penyedia_Jasa'] <> '') {
					        ?>
                    <td><?php echo $data['Penyedia_Jasa'] ?></td>
                  <?php
                    }
                    else {
                      echo "<td>Belum ada Proses Pengiriman</td>";
                    }
					        ?>
                    <td><?php echo $data['Estimasi_Waktu'] ?></td>
                  <?php
                    if ($data['Bukti_Bayar'] <> '') {
					        ?>
                    <td><img src="bukti_bayar/<?php echo $data['Bukti_Bayar'] ?>" width="100%"></td>
                    <?php
                            }
                    else {
                      echo "<td>Belum ada Proses Pembayaran</td>";
                    }
                      if ($data['Bukti_Kirim'] <> '') {
                    ?>
                    
                    <td><img src="../profiadmin/bukti_kirim/<?php echo $data['Bukti_Kirim'] ?>" width="100%"></td>
                    <?php
                    }
                    else {
                      echo "<td>Belum ada Proses Pengiriman</td>";
                    }
                    ?>
                    <td><div align="left"><?php echo $data['Status_Kirim'] ?></div></td>
                    <td><a class="tombol-1 tombol-1-detail" href="view_trans.php?kd_inv=<?php echo $data['Kd_Invoice'] ?>">Detail</a></td>
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
            @copyright 2020 || by JUMANS
        </footer> 
    </div> 
</body>
</html>
<?php
}
?>