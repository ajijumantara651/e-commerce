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
                    <h1 class="page-header">Ubah Data Jasa Pengiriman</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                <?php
                                $query = "SELECT * FROM `tbl_jasakirim` WHERE `id_jasa` = '".$_REQUEST['id_jasa']."' ORDER BY `id_jasa`";
                                $result = mysql_query($query); //execute the query $query 
	                              $data = mysql_fetch_array($result)
								                ?>
                                <form role="form" action="ubah_jasa.php?id_jasa=<?php echo $data['id_jasa']?>" method="post">
									                  <div class="form-group">
                                        <label>Kode Jasa</label>
                                        <input class="form-control" name="Kd" value="<?php echo $data['Kd_Jasa'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Jasa Pengiriman</label>
                                        <input class="form-control" name="Nama_Jasa" value="<?php echo $data['Nama_Jasa'] ?>">
                                    </div>  
                                    <div class="form-group">
                                        <label>Ongkos Kirim</label>
                                        <input class="form-control" name="Ongkir" value="<?php echo $data['Ongkir'] ?>">
                                    </div>                       
                                    <button type="save" class="btn btn-primary" name="submit">Save</button>                             
                                    </div>  
                                    <div class="col-lg-6">                                      
                                    <div class="form-group">
                                      <label>Waktu Pengiriman</label>
                                      <textarea class="form-control" rows="4" name="Durasi"><?php echo $data['Durasi'] ?></textarea>
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