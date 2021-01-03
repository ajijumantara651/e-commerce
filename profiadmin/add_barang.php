<?php
include("../koneksi.php");
session_start();
if(isset($_SESSION['nama'])){
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
           <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" 
           class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
           <i class="icon-align-justify"></i></a>
           <header class="navbar-header"><a href="../profiadmin/" class="navbar-brand"><img src="assets/img/logo.png" alt="" /></a></header>
           <ul class="nav navbar-top-links navbar-right">
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                </a>
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
         <a class="user-link" href="../profiadmin/">
         <img class="media-object img-thumbnail user-img" alt="User Picture" src="assets/img/user.gif" /></a><br />
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
                    <h1 class="page-header">TAMBAH DATA PRODUK</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
								<div class="col-lg-6">
								<?php
								$kode_brg = mysql_query("SELECT `id_barang` FROM `tbl_produk` ORDER BY `id_barang` DESC LIMIT 0,1"); 
								$data_brg = mysql_fetch_array($kode_brg);
								$Kode_Barang = $data_brg['id_barang'] + 1;
								?>
									<form role="form" action="tambah_barang.php" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<label>Kode Barang</label>
											<input class="form-control" name="Kd_Barang" value="<?php echo "0".$Kode_Barang ?>" readonly>
										</div>  
										<div class="form-group">
											<label>Kategori</label>
											<select name="Kd_Kategori" class="form-control">
												<option>Pilih Kategori</option>
												<?php
												  $result_kategori = mysql_query("SELECT * FROM `tbl_kategori` ORDER BY `id_kategori`");
													 while ($data_kategori = mysql_fetch_array($result_kategori)) {
												?>
													 <option value="<?php echo $data_kategori['Kd_Kategori'] ?>"><?php echo $data_kategori['Kategori'] ?></option>
												<?php
													}
												?>
											</select>
										</div>
										<div class="form-group">
											<label>Tanggal Beli</label>
											<input type="date" class="form-control" name="Tanggal_Beli" placeholder="Enter text">
										</div>
										<div class="form-group">
											<label>Harga Beli</label>
											<input class="form-control" name="Harga_Beli" placeholder="Enter text">
										</div>
										<div class="form-group">
											<label>Deskripsi</label>
											<textarea class="form-control" name="Deskripsi" placeholder="Enter text"></textarea>
										</div>
									<button type="save" class="btn btn-default" name="submit">Save</button>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label>Nama Produk</label>
										<input class="form-control" name="Nama" placeholder="Enter text">
									</div>  
									<div class="form-group">
										<label>Supplier</label>
										<select name="Kd_Supplier" class="form-control">
											<option>Pilih Supplier</option>
											<?php
											  $result_supplier = mysql_query("SELECT * FROM `tbl_supplier` ORDER BY `id_supplier`");
												 while ($data_supplier = mysql_fetch_array($result_supplier)) {
											?>
												 <option value="<?php echo $data_supplier['Kd_Supplier'] ?>"><?php echo $data_supplier['Nama_Supplier'] ?></option>
											<?php
												}
											?>
										</select>
									</div>
									<div class="form-group">
										<label>Jumlah</label>
										<input class="form-control" name="Stok" placeholder="Enter text">
									</div>
									<div class="form-group">
										<label>Harga Jual</label>
										<input class="form-control" name="Harga_Jual" placeholder="Enter text">
									</div>
									<div class="form-group">
										<label>Image Produk</label>
										<input type="file" class="form-control" name="image" placeholder="Enter text">
									</div>
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
    <div id="footer">
        <p>SR12 HERBAL SKINCARE</p>
    </div>
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</body>
</html>
<?php }?>