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
          <h2>Profil</h2>
            <?php
              $query = "SELECT * FROM `tbl_customer` INNER JOIN `tbl_kota` ON `tbl_customer`.`Kd_Kota` = `tbl_kota`.`Kd_Kota` WHERE `Kd_Customer` = '".$_SESSION['user']."'";
			        $result = mysql_query($query); 
	            $data = mysql_fetch_array($result);
			      ?>
            <div class="list-produk-det-1">
              <img src="sr12.png" width="296">
               <strong><i>Member Of : SR12</i></strong>
             </div>
            <div class="list-produk-det-2">
              <h4>Nama&nbsp;:&nbsp;<?php echo $data['Customer'] ?></h4>
              <h4>Alamat&nbsp;:&nbsp;<?php echo $data['Alamat'] ?>, <?php echo $data['Kota'] ?></h4> 
              <h4>Telepon&nbsp;:&nbsp;<?php echo $data['Telp'] ?></h4> 
              <hr>
              <h4 align="center">&nbsp; MEMEBER SR12 HERBAL SKINCARE</h4>  
              <hr>
              <h4>Alamat Kantor : Jl Pepaya. Perum Rajeg Mulya Residence Blok E4 no 7 rt 05/06, Rajeg, Kec. Rajeg, Tangerang, Banten 15540</h4>  
              <hr>            
              <p>&ldquo;SR 12&rdquo; <em>Herbal Skincare</em> merupakan perusahaan  yang bergerak dibidang Herbal &amp; Skin Care yang berdiri pada tahun 2005 oleh  Mr. Toni Firmansyah,S.Farm.Apt, Sebagai Direktur Utama, Asrianty Salam,  S.Farm  sebagai ahli farmasi yang  bertanggung jawab terhada plant Operational.Shendy Yulian, SE.Sy bersama Deni  Hakim, S.P sebagai mitra penyalur produk yang akan dihasilkan.</p>
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