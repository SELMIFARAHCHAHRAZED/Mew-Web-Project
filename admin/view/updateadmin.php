<?php
    require_once '../controller/compteU.php';
    require_once '../assets/compte.php';
session_start();

    $compteU =  new compteU();

     if (isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['gender']) && isset($_POST['email']) && isset($_POST['occupation']) && isset($_POST['password'])) {
        $compte = new compte($_POST['email'], $_POST['name'], $_POST['lastname'], $_POST['occupation'], $_POST['gender'], $_POST['password']);
        
        $compteU->updateUser($compte ,$_GET['idUser']);
    }
?>

<!DOCTYPE html>
 
<html lang="en">

<head>
<link  rel="stylesheet" href="../models/css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="../models/css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="../models/css/main.css">
 <link  rel="stylesheet" href="../models/css/font.css">
 <script src="../models/js/jquery.js" type="text/javascript"></script>

  <script src="../models/js/bootstrap.min.js"  type="text/javascript"></script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

    <?php
        if (isset($_GET['idUser'])) {
            $result = $compteU->getUserById($_GET['idUser']);
			if ($result !== false) {
    ?>
	<section class="container">
		<h2>Update compte</h2>
        <button><a href="affichage.php">les comptes</a></button>
		<div class="form-container">
            <form action="" method = "POST">
                <div class="bg1">
                <div class="row">
                    <div class="col-25">                
                        <label>email: </label>
                    </div>
                    <div class="col-75">
                        <input type="text" name = "email" value = "<?= $result['email'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">                
                        <label>nom: </label>
                    </div>
                    <div class="col-75">
                        <input type="text" name = "name" value = "<?= $result['name'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>prenom :</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name = "lastname" value = "<?= $result['lastname'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>occupation :</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name = "occupation" value = "<?= $result['occupation'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>gender :</label>
                    </div>
                    <div class="col-75">
                        <input type = "text" name = "gender" value = "<?= $result['gender'] ?>">
                    </div>
                </div>
                 <div class="row">
                    <div class="col-25">
                        <label>password </label>
                    </div>
                    <div class="col-75">
                        <input  name = "password" type= "password" value = "<?= $result['password'] ?>">
                    </div>
                </div>
                <br>
                <div class="row">
                    <input type="submit" value="Submit" name = "submit">
                </div>
            </form>
		</div></div>
	</section>

    <?php
        }
    }
        else {
            header('Location:affichage.php');
        }
    
    ?>
	
</body>

</html>