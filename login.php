<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>E-COMMERCE</title>
   <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
</head>
<body>
<div id="login">
  <h1><em><strong><h4><a href="index.php"><img src="images/LOGO.png" width="200"></a></h4></strong></em></h1>
  <form action="cek_login.php" method="POST">
      <input type="text" placeholder="Username" name="username" />
      <input type="password" placeholder="Password" name="pass" />
      <input type="submit" name="login" value="Login" />
   </form>
   <form action="registrasi.php" method="POST">
      <input type="submit" name="regis" value="Registrasi" />
   </form>
   <form action="cek_password.php" method="POST">
      <input type="submit" name="reset" value="Reset Password" />
   </form>

   </div>
   <script src="js/index.js"></script>
</body>
</html>