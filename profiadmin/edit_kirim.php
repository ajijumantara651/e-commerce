<?php
include("../koneksi.php");
session_start();
if (isset($_SESSION['nama'])) 
{
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
  <meta charset="UTF-8" />
  <title>Administrator</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="assets/css/main.css" />
  <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
  <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
</head>
<body class="padTop53 " >
  <div id="wrap">
     <div id="top">
        <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
           <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
           <i class="icon-align-justify"></i></a>
           <header class="navbar-header"><a href="../profiadmin/" class="navbar-brand"><img src="assets/img/logo.png" alt="" /></a></header>
           <ul class="nav navbar-top-links navbar-right">
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i></a>
				 <ul class="dropdown-menu dropdown-user">
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="icon-signout"></i> Logout </a></li>
                 </ul>
              </li>
           </ul>
        </nav>
      </div>
    <div id="left">
      <div class="media user-media well-small">
         <a class="user-link" href="../profiadmin/"><img class="media-object img-thumbnail user-img" alt="User Picture" src="assets/img/user.gif" /></a><br />
         <div class="media-body">
            <h5 class="media-heading">Admin</h5>
            <ul class="list-unstyled user-info">                        
               <li><a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a>&nbsp;&nbsp;Online</li> 
            </ul>
        </div><br />
      </div>
      <?php
		include("menu.php");
	  ?>
      </div>
       <div id="content">
          <div class="inner">
             <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">UBAH DATA PENGIRIMAN</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                <?php
                                  $query = "SELECT * FROM `tbl_kirim` INNER JOIN `tbl_customer` ON 
                                            `tbl_kirim`.`Kd_Customer` = `tbl_customer`.`Kd_Customer` INNER JOIN `tbl_kota` ON 
                                            `tbl_kota`.`Kd_Kota` = `tbl_customer`.`Kd_Kota` INNER JOIN `tbl_transaksi` ON
                                            `tbl_transaksi`.`Kd_Invoice` = `tbl_kirim`.`Kd_Invoice` WHERE `id_kirim` = '".$_REQUEST['id_kirim']."' 
                                            ORDER BY `id_kirim`";
                                  $result = mysql_query($query) or trigger_error(mysql_error().$query); //execute the query $query 
                                  $data = mysql_fetch_array($result);
								                ?>
                              <form role="form" action="ubah_kirim.php?id_kirim=<?php echo $data['id_kirim']?>" method="post" 
                                enctype="multipart/form-data">
                                    <div class="form-group">
                                          <label>Jasa Pengiriman</label>
                                          <input class="form-control" name="jasa" value="<?php echo $data['Penyedia_Jasa']?>" readonly>
                                    </div>                                 
                                    <div class="form-group">
                                          <label>Status Pengiriman</label>
                                          <select class="form-control" name="status">
                                            <option value="<?php echo $data['Status_Kirim']?>"><?php echo $data['Status_Kirim']?></option>
                                            <option value="Proses Kirim">Proses Kirim</option>
                                            <option value="Done">Done</option>
                                        </select>
                                    </div>   
                                    <div class="form-group">
                                          <label>Tanggal Pengiriman</label>
                                          <input type="date" class="form-control" name="tanggal" value="<?php echo $data['Tanggal_Kirim']?>">
                                    </div>  
                                    <div class="form-group">
                                        <label>Nomor Invoice</label>
                                        <input class="form-control" name="invoice" value="<?php echo $data['Kd_Invoice']?>" readonly>
                                    </div>                            
                                    <div class="form-group">
                                          <label>Estimasi Waktu Pengiriman</label>
                                          <input class="form-control" name="estimasi" value="<?php echo $data['Estimasi_Waktu']?>" readonly>
                                    </div>                              
                                    <div class="form-group">
                                          <label>Total Pembayaran</label>
                                          <input class="form-control" name="bayar" value="<?php echo $data['Total_Fee']?>" readonly>
                                    </div>                                                                      
                                    <button type="save" class="btn btn-primary" name="submit">Save</button>                             
                                    </div>   
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nama Customer</label>
                                        <input class="form-control" name="invoice" value="<?php echo $data['Customer']?>" readonly>
                                    </div>                            
                                    <div class="form-group">
                                          <label>Alamat Tujuan</label>
                                          <input class="form-control" name="estimasi" value="<?php echo $data['Alamat']?>, <?php echo $data['Kota']?>"
                                          readonly>
                                    </div>                              
                                    <div class="form-group">    
                                          <label>Ongkos Kirim</label>
                                          <input class="form-control" name="bayar" value="<?php echo $data['Fee_Kirim']?>" readonly>
                                    </div>
                                    <div class="form-group">
                                          <img src="bukti_kirim/<?php echo $data['Bukti_Kirim']?>" width="350">
                                    </div>
                                    <div class="form-group">
                                          <label>Bukti Kirim</label>
                                          <input type="file" class="form-control" name="image" placeholder="Enter text">
                                    </div>                                
                                  </form>                                    
                                </div>                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    <div id="footer">
        <p>SR12 HERBAL SKINCARE</p>
    </div>
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</body>
</html>
<?php
}
?>