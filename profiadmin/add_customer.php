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
                    <h1 class="page-header">TAMBAH DATA CUSTOMER</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                <?php
                                $kode_cst = mysql_query("SELECT `id_customer` FROM `tbl_customer` ORDER BY `id_customer` DESC LIMIT 0,1"); 
                                $data_cst = mysql_fetch_array($kode_cst);
                                $Kode_Customer = $data_cst['id_customer'] + 1;
			                          ?>
                                <form role="form" action="tambah_customer.php" method="post">
									                <div class="form-group">
                                        <label>Kode Customer</label>
                                        <input class="form-control" name="kode" id="kode" value="<?php echo "CST00".$Kode_Customer ?>" readonly>
                                    </div>  
                                    <div class="form-group">
                                      <label>Alamat</label>
                                      <textarea class="form-control" rows="4" name="alamat"></textarea>
                                  </div>                                  
								                	<div class="form-group">
                                         <label>Alamat E-mail</label>
                                         <input type="email" class="form-control" name="email" placeholder="Enter text">
                                    </div>  
                                    <div class="form-group">
                                         <label>Gender</label>
                                         <select class="form-control" name="gender">
                                           <option value="0">Pilih</option>
                                           <option value="Pria">Pria</option>
                                           <option value="Wanita">Wanita</option>
                                        </select>
                                    </div>                                                                     
                                <button type="save" class="btn btn-primary" name="submit">Save</button>                             
                                </div>   
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nama Customer</label>
                                        <input class="form-control" name="nama" placeholder="Enter text">
                                    </div>
                                    <div class="form-group">
                                      <label>Kota</label>
                                        <select class="form-control" name="kota">
										                    <option value="0">----- Pilih Kota -----</option>
                                        <?php
									                        $query_kategori = "SELECT * FROM `tbl_kota` ORDER BY `id_kota`";
	
									                        $result_kategori = mysql_query($query_kategori);  
	                                        while ($data_kategori = mysql_fetch_array($result_kategori)) {
									                      ?>
                                           <option value="<?php echo $data_kategori['Kd_Kota'] ?>"><?php echo $data_kategori['Kota'] ?></option>
                                          <?php
											                  }
										                       ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                         <label>No Telepon/HP</label>
                                         <input class="form-control" name="telepon" placeholder="Enter text">
                                    </div>
                                    <div class="form-group">
                                         <label>Tanggal Gabung</label>
                                         <input type="date" class="form-control" name="join" placeholder="Enter text">
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