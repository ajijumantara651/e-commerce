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
    <title>E-COMMERCE</title>
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
          <h2>CONTACT US</h2>
            <?php
              $query = "SELECT * FROM `tbl_produk` INNER JOIN `tbl_kategori` ON `tbl_produk`.`Kd_Kategori` = `tbl_kategori`.`Kd_Kategori` 
              INNER JOIN `tbl_supplier` ON `tbl_produk`.`Kd_Supplier` = `tbl_supplier`.`Kd_Supplier` ORDER BY `id_barang`";
			        $result = mysql_query($query); //execute the query $query 
	            $data = mysql_fetch_array($result);
			  
              $query_cust = "SELECT * FROM `tbl_customer` WHERE `Kd_Customer` = '".$_SESSION['user']."' ORDER BY `id_customer`";
              $result_cust = mysql_query($query_cust); //execute the query $query 
	            $data1 = mysql_fetch_array($result_cust);
			      ?>
             <div class="list-produk-det-1">
              <img src="logo.jpeg" width="296">
               <strong><i>Member Of : SR12</i></strong>
             </div>
             <div class="list-produk-det-2">
              <h4 align="center">&nbsp;SR12 HERBAL SKINCARE</h4>  
              <hr>
              <h4><img src="images/wa.jpg"width= "100"> +62895322377420<h4>
              <hr>          
              <h4><img src="images/BNI.jpg"width= "100"> 0486021970</h4>  
              <hr>   
              <h5><img src="images/BCA.jpg" width= "100"> 2880020440</h5>
              <hr>
              <h5><img src="images/MANDIRI.jpg" width= "100"> 1550006237237</h5>  
              <hr>
              </div>
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