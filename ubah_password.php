<?php
include("koneksi.php");
if (isset($_POST['ubah'])){
	$username = $_POST['username'];
  $pass_lama = $_POST['pass_lama'];
  $pass_baru = $_POST['pass_baru'];
	
$cek = "SELECT * FROM tbl_user WHERE `username` = '$username' AND `password` = '$pass_lama'";
$data = mysql_query($cek);
$result = mysql_num_rows($data);

if( ! $result >= 1) 
	{
    ?>
    <script language="JavaScript">
      alert('Password salah! ulangi lagi');
      window.location='cek_password.php';
    </script>

    <?php

    unset($_SESSION['user']);
    unset($_SESSION['nama']);
    session_destroy();
  }
      else if (empty($_POST['pass_baru'])) {
        echo "<script>alert('Harap isi semua');window.location='cek_password.php'</script>";
      }
      else {
        $cek = "UPDATE `tbl_user` SET `password` = '$pass_baru' WHERE `username` = '$username'";
        $data = mysql_query($cek);

        if ($data) {
          echo "<script>alert('Password berhasil Di ubah');window.location='login.php'</script>";
        }
        else {
          echo "<script>alert('ubah password gagal');window.location='ubah_password.php'</script>";
        }
      }

      
	}

?>
