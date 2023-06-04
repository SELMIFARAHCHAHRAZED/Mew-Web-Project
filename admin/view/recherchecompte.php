<?php
    require_once '../controller/compteU.php';
session_start();

    $compteU =  new compteU();

?>

<!DOCTYPE html>
<html lang="en">
<link  rel="stylesheet" href="../models/css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="../models/css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="../models/css/main.css">
 <link  rel="stylesheet" href="../models/css/font.css">
 <script src="../models/js/jquery.js" type="text/javascript"></script>

  <script src="../models/js/bootstrap.min.js"  type="text/javascript"></script>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>


	<section class="container">
		<h2></h2>
		<div class="form-container">
            <form action="" method = 'POST'>
                <div class="row">
                    <div class="col-25">                
                        <label>Search Name: </label>
                    </div>
                    <div class="col-75">
                        <input type = "text" name = 'name'>
                    </div>
                </div>
                <br>
                <div class="row">
                    <input type = "submit" value = "Search" name ="search">
                </div>
            </form>
		</div>
	</section>

	<?php
		if (isset($_POST['name']) && isset($_POST['search'])){
			$result = $compteU->getUserByName($_POST['name']);
			if ($result !== false) {
	?>
		<section class="container">
			<h2 align="center">les comptes trouvé:</h2>
			
			<div class="shop-items">
				
				<div class="shop-item">
					<div class="panel"><div class="table-responsive"><table class="table table-striped title3">
<tr><td><b>id User</b></td><td><b>email</b></td><td><b>occupation</b></td><td><b>name</b></td><td><b>lastname</b></td><td><b>gender</b></td><td></td></tr>
					<tr><td><strong><?= $result['idUser'] ?></strong></td>
<td><strong><?= $result['email'] ?></strong></td>
<td><strong><?= $result['occupation'] ?></strong></td>
<td><strong><?= $result['name'] ?></strong></td>
<td><strong><?= $result['lastname'] ?></strong></td>
<td><strong><?= $result['gender'] ?></strong>
					</table></div></div>
					</div>
				</div>
				
			</div>
		</section>
		<a href = "affichage.php" class="btn btn-primary shop-item-button">les comptes</a>
		<?php include_once 'footer.php'; ?>

	<script src="../assets/js/script.js"></script>
	<?php
		}
		else {
			echo "<div> No results found!!! </div>";
		}
	}
	?>

</body>

</html>