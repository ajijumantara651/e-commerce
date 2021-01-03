<?php
include("koneksi.php");
if (isset($_POST['login'])){
	$username = $_POST['username'];
	$pass = $_POST['pass'];
	
$cek = mysql_num_rows(mysql_query("SELECT * FROM tbl_user WHERE username = '$username' and password = '$pass'"));
$data = mysql_fetch_array(mysql_query("SELECT * FROM tbl_user WHERE username = '$username' and password = '$pass'"));

if($cek == 1)
	{
		session_start();
		$_SESSION['user'] = $data['username'];
		$_SESSION['nama'] = $data['nama'];
		if ($data['id'] ==1) 
		{
	echo "<script>alert('Login Berhasil');window.location='profiadmin/'</script>";
	}
	else 	
		echo "<script>alert('Login Berhasil');window.location='user/'</script>";
	}
else 
	{
		echo "<script>alert('Login anda Salah');window.location='index.php'</script>";
		echo $cek;
	}
}
?>
