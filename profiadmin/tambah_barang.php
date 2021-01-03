<?php
include("../koneksi.php");
$target_dir = "produk/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if(isset($_POST['submit'])){
	$Kode_Barang = $_POST['Kd_Barang'];
	$nama_barang = $_POST['Nama'];
	$deskripsi = $_POST['Deskripsi'];
	$kd_kategori = $_POST['Kd_Kategori'];
	$kd_supplier = $_POST['Kd_Supplier'];
	$tgl_beli = $_POST['Tanggal_Beli'];
	$stok = $_POST['Stok'];
	$harga_beli = $_POST['Harga_Beli'];
	$harga_jual = $_POST['Harga_Jual'];
	
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
		if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
			$image_name = addslashes($_FILES['image']['name']);
			
			$cek = "INSERT INTO `tbl_produk`(`Kd_Barang`, `Nama`, `Deskripsi`,`Kd_Kategori`, `Kd_Supplier`, 
			`Tanggal_Beli`, `Stok`, `Harga_Beli`, `Harga_Jual`, `Foto`) 
			VALUES ('$Kode_Barang', '$nama_barang', '$deskripsi', '$kd_kategori', '$kd_supplier', '$tgl_beli', '$stok', '$harga_beli', '$harga_jual', '$image_name')";
			$query_add = mysql_query($cek);
	
			if($query_add){
				header('Location: kelola_barang.php');
			}else{
				mysql_error();
			}
		}else{
			echo "<br>Sorry, there was an error uploading your file.</br>";
		}
	}
}
?>