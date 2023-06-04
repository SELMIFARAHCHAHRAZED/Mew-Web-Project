<?php 
require_once '../controller/reclamationR.php';
session_start();

$recC = new reclamationR();
    if (!(isset($_GET['idRec']))) {
       
        header('Location:reclamationuser.php');
    }
    $result=$recC->getRecByidRec($_GET['idRec']);
     
 ?>
<!DOCTYPE html>
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
echo 'hi ', $_SESSION['b'];
?>
<button><a href="afficreclamation.php">tous les reclamations</a></button>
<button><a href="deconnexion.php">Déconnecter</a></button>


<form class="form-horizontal" >
<fieldset>
<!-- email input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="idRec"></label>  
  <div class="col-md-6">
   <h1><strong align="center"><?php  echo 'Reclamation n: ', $result["idRec"]  ?></strong></h1>
  </div>
</div>
<!-- username input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="iduser"></label>
  <div class="col-md-6">
   <h3 align="center"><?php  echo 'User ID : ', $result["iduser"]  ?></h3>
    
  </div>
</div>

<!-- name input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="idadmin"></label>
  <div class="col-md-6">
    <h3 align="center"><?php  echo 'Admin ID : ', $result["idadmin"]  ?></h3>
    
  </div>
</div>
<div class="form-group">

  <label class="col-md-3 control-label" for="sujet"></label>
  <div class="col-md-6">
       <h3 >Sujet: </h3>
    <textarea rows="2" cols="50" disabled="disabled" >
  <?php  echo  $result["sujet"]  ?>
        </textarea>
  </div>
</div>
<!-- occupation input-->

<div class="form-group">
  <label class="col-md-3 control-label" for="message"></label>
  <div class="col-md-6">
    <h3 >Contenu : </h3>
    <textarea rows="8" cols="120" disabled="disabled" >
   <?php  echo  $result["message"]  ?>
    </textarea>
  </div>

<!-- gender input-->

<div class="form-group">
  <label class="col-md-4 control-label" for="password"></label>
  <div class="col-md-4">
    <h3 >file taw ba3d</h3>
    
  </div>
</div>
      </div>
      <div class="modal-footer">
<a type="submit"  class="glyphicon glyphicon-comment
" href = "repondrec.php?idRec=<?= $result["idRec"] ?>"></a>
       <button><a href="affichreclamation.php"></a>fermer</button>
</div>
    </fieldset>

</form>

</div>
<?php include_once 'footer.php'; ?>
</body>
</html>