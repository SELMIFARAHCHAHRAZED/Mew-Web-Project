<?php 
require_once '../controller/reclamationR.php';
session_start();

$recC = new reclamationR();
    if (!(isset($_GET['idRec']))) {
       
        header('Location:userec.php');
    }
    $result=$recC->getRecByidRec($_GET['idRec']);
     
 ?>
 <?php
    require_once '../controller/reclamationR.php';
    require_once '../assets/reclamation.php';

    $reclamationR =  new reclamationR();
    $recC = new reclamationR();
$result=$recC->getRecByidRec($_GET['idRec']);
    if (isset($_POST['message']) && isset($_POST['file'])) {
        $reclamation = new reclamation($_SESSION['a'],$result["sujet"], $_POST['message'], $_POST['file']);
        
        $reclamationR->addRec($reclamation);

        header('Location:reclamationuser.php');
    }
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


<form class="form-horizontal"  method="POST">
<fieldset>


<!-- email input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="idRec"></label>  
  <div class="col-md-6">
   <h1><strong align="center"><?php  echo 'Reponse pour la reclamation n: ', $result["idRec"]  ?></strong></h1>
  </div>
</div>
<!-- username input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="iduser"></label>
  <div class="col-md-6">
   <h3 align="center"><?php  echo 'User ID : ',$_SESSION['a'] ?></h3>
    
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
    <textarea rows="8" cols="120" name="message">
    </textarea>
  </div>

<!-- gender input-->

<div class="form-group">
  <label class="col-md-4 control-label" for="file"></label>
  <div class="col-md-4">
    <input type="file" name="file">
    
  </div>
</div>
      </div>
      <div class="modal-footer">
      
<a href="reclamationuser.php"><input type="button" value="annuler" class="btn btn-primary" ></a>
<input  type="submit"  value="envoyer" class="btn btn-primary"/>

    </fieldset>
</form>

</div>
<?php include_once 'footer.php'; ?>
</body>
</html>