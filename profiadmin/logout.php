<?php 
    session_start();
    if(isset($_SESSION['nama']))
    {
        session_destroy();
        echo"<script>alert('Logout Berhasil'); window,location='../../e-commerce/'</script>";
    }
?>