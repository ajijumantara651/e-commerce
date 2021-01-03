<?php
include("koneksi.php");
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
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: #8B0000;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password], input[type=date], textarea, select {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
.mySlides {display:none;}
</style>
<body>
<div class="badan-utama">        
  <header>&nbsp;</header> 
        <nav class="navigasi">
        <?php
		  include("menu1.php");
	    ?>
        </nav> 
        <div class="banner">
          <div class="w3-content w3-display-container">
            <img class="mySlides" src="user/images/44.jpg"="width:100%"><img class="mySlides" src="images/555.jpg" style="width:100%">
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
          <h2>HALAMAN REGISTRASI</h2>
            <?php
	         $kode_cst = mysql_query("SELECT `id_customer` FROM `tbl_customer` ORDER BY `id_customer` DESC LIMIT 0,1"); 
	         $data_cst = mysql_fetch_array($kode_cst);
			     $Kode_Customer = $data_cst['id_customer'] + 1;
			?>
            <form action="tambah_cust.php" method="post">
              <div class="container">
                <label><b>User Name</b></label>
                <input type="text" name="username" id="username" value="<?php echo "CST00".$Kode_Customer ?>" readonly>            
                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" id="password" required>
                <hr>            
                <label for="kode"><b>Kode Customer</b></label>                
                <input type="text" name="kode" id="kode" value="<?php echo "CST00".$Kode_Customer ?>" readonly>           
                <label for="nama"><b>Nama Customer</b></label>
                <input type="text" name="nama" id="nama" placeholder="Enter Your Name"  required>           
                <label for="alamat"><b>Alamat</b></label>
                <textarea name="alamat" id="alamat"></textarea>           
                <label for="kota"><b>Nama Kota</b></label>
                <select name="kota" id="kota">
                <?php
	              $result_kategori = mysql_query("SELECT * FROM `tbl_kota` ORDER BY `id_kota`"); 
	                 while ($data_kategori = mysql_fetch_array($result_kategori)) {
				?>
                     <option value="<?php echo $data_kategori['Kd_Kota'] ?>"><?php echo $data_kategori['Kota'] ?></option>
                <?php
					}
				?>
                </select>           
                <label for="telp"><b>Telp Number</b></label>
                <input type="text" name="telepon" id="telepon" placeholder="Enter Your Telphone Number"  required>           
                <label for="email"><b>Email</b></label>
                <input type="text" name="email" id="email" placeholder="Enter Your Email"  required>           
                <label for="tgl"><b>Tanggal Registrasi</b></label>
                <input type="date" name="join" id="join" placeholder="Enter Your Date Of Registration"  required>           
                <label for="gender"><b>Gender</b></label>
                <select name="gender" id="gender">
                <option value="Wanita">Wanita</option>
                <option value="Pria">Pria</option>
                </select>
               <button type="submit" class="registerbtn" name="submit" >Register</button>
              </div>
            </form>
          </div>
        </div>      
        <footer>
            @copyright 2020 || by JUMANS
        </footer> 
    </div> 
</body>
</html>
