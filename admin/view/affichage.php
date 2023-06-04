<?php
    require_once '../controller/compteU.php';
session_start();

    $compteU =  new compteU();

    $comptes = $compteU->afficheruser();

    if (isset($_GET['idUser'])) {
        $compteU->deleteUser($_GET['idUser']);
        header('Location:affichage.php');
    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Project vigilantes || MEW </title>
<link  rel="stylesheet" href="../models/css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="../models/css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="../models/css/main.css">
 <link  rel="stylesheet" href="../models/css/font.css">
 <script src="../models/js/jquery.js" type="text/javascript"></script>

  <script src="../models/js/bootstrap.min.js"  type="text/javascript"></script>
 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
</head>

<body>

<?php include_once 'header.php'; ?>
<?php
// Il est bien connecté
echo 'Bienvenue admin ', $_SESSION['e'];
?>
<button><a href="recherchecompte.php">Rechercher</a></button>
<button><a href="profiladmin.php">menu</a></button>
<button><a href="deconnexion.php">Déconnecter</a></button>
<div class="bg1">
<h2 align="center">les comptes</h2>

<div class="row">

<div class="col-md-6"></div>
<div class="col-md-7 panel">
  <form class="form-horizontal">
  	<div class="panel"><div class="table-responsive"><table class="table table-striped title3">
<tr><td><b>id User</b></td><td><b>email</b></td><td><b>occupation</b></td><td><b>name</b></td><td><b>lastname</b></td><td><b>gender</b></td><td></td></tr>
  	<?php
					foreach ($comptes as $compte) {
				?>
			
<tr><td><strong><?= $compte['idUser'] ?></strong></td>
<td><strong><?= $compte['email'] ?></strong></td>
<td><strong><?= $compte['occupation'] ?></strong></td>
<td><strong><?= $compte['name'] ?></strong></td>
<td><strong><?= $compte['lastname'] ?></strong></td>
<td><strong><?= $compte['gender'] ?></strong>
	<a type="submit" class="glyphicon glyphicon-wrench" href = "updateadmin.php?idUser=<?= $compte['idUser'] ?>"></a>
						<a type="submit" class="glyphicon glyphicon-trash" href = "affichage.php?idUser=<?= $compte['idUser'] ?>"></a>
<?php 
					}
				?>
				</table></div></div>
</form>
</div><!--col-md-6 end-->
</div></div>
</div><!--container end-->

<?php include_once 'footer.php'; ?>
</body>

</html>
