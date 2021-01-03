<?php
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$database = "e-commerce";
	
	mysql_connect($hostname,$username,$password) or die("koneksi gagal");
	mysql_select_db($database) or die("database tidak ditemukan");
	?>