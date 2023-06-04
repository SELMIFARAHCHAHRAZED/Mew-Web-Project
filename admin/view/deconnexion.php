<?php
session_start();
session_destroy();?>

<!DOCTYPE html>
<html>
<head>
	<link  rel="stylesheet" href="../models/css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="../models/css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="../models/css/main.css">
 <link  rel="stylesheet" href="../models/css/font.css">
 <script src="../models/js/jquery.js" type="text/javascript"></script>

  <script src="../models/js/bootstrap.min.js"  type="text/javascript"></script>
	<title></title>
</head>
<body>
<?php  echo 'Vous êtes déconnecté. <a href="./view.php">Se connecter ?</a>';?>
</body>
</html>
""