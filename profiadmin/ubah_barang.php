<?php
include("../koneksi.php");
$target_dir = "produk/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if(isset($_POST['submit'])){
	$id_barang = $_GET['id'];
	$kd_barang = $_POST['Kd_Barang'];
	$nama_barang = $_POST['Nama'];
	$deskripsi = $_POST['Deskripsi'];
	$kd_kategori = $_POST['Kd_Kategori'];
	$kd_supplier = $_POST['Kd_Supplier'];
	$tgl_beli = $_POST['Tanggal_Beli'];
	$stok = $_POST['Stok'];
	$harga_beli = $_POST['Harga_Beli'];
	$harga_jual = $_POST['Harga_Jual'];
	$Image_name = addslashes($_FILES['image']['name']);
	


	
	if($Image_name <> '')
		{
			$check = getimagesize($_FILES["image"]["tmp_name"]);
			if($check !== false){
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			}else{
				echo "File is not an image.";
				$uploadOk = 0;
			}
			
			if(file_exists($target_file)){
				echo "<br>Sorry, file already exists.</br>";
				$uploadOk = 0;
			}
			
			if($_FILES["image"]["size"] > 500000){
				echo "<br>Sorry, your file is too large.</br>";
				$uploadOk = 0;
			}
			
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
				echo "<br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</br>";
				$uploadOk = 0;
			}
			
			if($uploadOk == 0){
				echo "<br>Sorry, your file was not uploades.</br>";
			}else{
				
				$result = mysql_query("SELECT * FROM `tbl_produk` WHERE `id_barang` = '$id_barang' ORDER BY `id_barang`");
				$data = mysql_fetch_array($result);
				$image_1 = $data['Foto'];
				$nama_file = "produk/".$image_1;
				unlink($nama_file);
				
				if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
					$image_name = addslashes($_FILES["image"]["name"]);
					$cek = "UPDATE `tbl_produk` SET `Kd_Barang` = '$kd_barang', `Nama` = '$nama_barang', `Deskripsi` = '$deskripsi',
					`Kd_Kategori` = '$kd_kategori', `Kd_Supplier` = '$kd_supplier', `Tanggal_Beli` = '$tgl_beli', `Stok` = '$stok',
					`Harga_Beli` = '$harga_beli', `Harga_Jual` = '$harga_jual', `Foto` = '$image_name' WHERE `id_barang` = '$id_barang'";
					$query_add = mysql_query($cek);
					
					if($query_add){
						header('Location: kelola_barang.php');
					}
					else
						header('Location: edit_barang.php?id=$id_barang');
				}
			}
		}
		else
		{
			$cek = "UPDATE `tbl_produk` SET `Kd_Barang` = '$kd_barang', `Nama` = '$nama_barang', `Deskripsi` = '$deskripsi',
					`Kd_Kategori` = '$kd_kategori', `Kd_Supplier` = '$kd_supplier', `Tanggal_Beli` = '$tgl_beli', `Stok` = '$stok',
					`Harga_Beli` = '$harga_beli', `Harga_Jual` = '$harga_jual' WHERE `id_barang` = '$id_barang'";
			$query_add = mysql_query($cek);
		if($query_add)
		{
			header('Location: kelola_barang.php');
		}
		else
			header('Location: edit_barang.php?id=$id_barang');
		}
	}
?>