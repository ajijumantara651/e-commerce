<?php 
    session_start();
    if(isset($_SESSION['user']))
    {
        session_destroy();
        echo"<script>alert('Logout Berhasil'); window,location='../../e-commerce/'</script>";
    }
?>