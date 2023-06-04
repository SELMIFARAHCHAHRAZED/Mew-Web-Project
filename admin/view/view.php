<?php
    require_once '../controller/compteU.php';
    require_once '../assets/compte.php';

    $compteU =  new compteU();

    if (isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['gender']) && isset($_POST['email']) && isset($_POST['occupation']) && isset($_POST['password'])) {
        $compte = new compte($_POST['email'], $_POST['name'], $_POST['lastname'], $_POST['occupation'], $_POST['gender'], $_POST['password']);
        
        $compteU->addUser($compte);

        header('Location:view.php');
    }
?>
<?php
session_start();
include_once '../assets/compte.php';
include_once '../controller/compteU.php';
$message="";
$userC = new compteU();
if (isset($_POST["uzer"]) &&
    isset($_POST["pass"])) {
    if (!empty($_POST["uzer"]) &&
        !empty($_POST["pass"]))
    {   $message=$userC->connexionUser($_POST["uzer"],$_POST["pass"]);
         $_SESSION['e'] = $_POST["uzer"];
         $result=$userC->getUserByEmail($_SESSION['e']);
         $_SESSION['a'] =$result['idUser'];
         
         $_SESSION['b'] =$result['name'];// on stocke dans le tableau une colonne ayant comme nom "e",
        //  avec l'email à l'intérieur
        if($message!='pseudo ou le mot de passe est incorrect'){
          if ($result['occupation'] == "admin")
            {header('Location:Profiladmin.php');}
           else {header('Location:ProfilUser.php');}}
        else{
            $message='pseudo ou le mot de passe est incorrect';
        }}
    else
        $message = "Missing information";}
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
<?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>
<script>
function validateForm() {var y = document.forms["form"]["name"].value;	var letters = /^[A-Za-z]+$/;if (y == null || y == "") {alert("Name must be filled out.");return false;}var l = document.forms["form"]["occupation"].value; var letter = /^[A-Za-z]+$/;if (l == null || l == "") {alert("occupation must be filled out.");return false;}var z =document.forms["form"]["username"].value;if (z == null || z == "") {alert("username must be filled out.");return false;}var x = document.forms["form"]["email"].value;var atpos = x.indexOf("@");var dotpos = x.lastIndexOf(".");if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {alert("Not a valid e-mail address.");return false;}var a = document.forms["form"]["password"].value;if(a == null || a == ""){alert("Password must be filled out");return false;}if(a.length<5 || a.length>25){alert("Passwords must be 5 to 25 characters long.");return false;}
var b = document.forms["form"]["cpassword"].value;if (a!=b){alert("Passwords must match.");return false;}}
function validatForm()
{var x = document.forms["fora"]["uzer"].value;var atpos = x.indexOf("@");var dotpos = x.lastIndexOf(".");if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {alert("Not a valid e-mail address.");return false;}var a = document.forms["fora"]["pass"].value;if(a == null || a == ""){alert("Password must be filled out");return false;}if(a.length<5 || a.length>25){alert("Passwords must be 5 to 25 characters long.");return false;}} 
</script>


</head>

<body>

<?php include_once 'header.php'; ?>
<div class="bg1">
<div class="row">



<div class="col-md-0"></div>
<div class="col-md-4 panel">
  <form class="form-horizontal" name="fora" onSubmit="return validatForm()" method="POST">
   <fieldset>
     <div class="form-group">
  <label class="col-md-12 control-label" for="uzer"></label>  
  <div class="col-md-12">
  <input id="uzer" name="uzer" placeholder="Enter your email" class="form-control input-md" type="text">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="pass"></label>  
  <div class="col-md-12">
  <input id="pass" type="password" name="pass" placeholder="Enter your password" autocomplete="off" class="form-control input-md" type="text">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" class="sub" value="se connecter" class="btn btn-primary"/>
  </div>
</div>
   </fieldset>
</form>
</div><!--col-md-6 end-->

<div class="col-md-6"></div>
<div class="col-md-4 panel">
<!-- sign in form begins -->  

  <form class="form-horizontal" name="form" onSubmit="return validateForm()" method="POST">
<fieldset>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="name" placeholder="Enter your name" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="lastname"></label>  
  <div class="col-md-12">
  <input id="lastname" name="lastname" placeholder="Enter your lastname" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="gender"></label>
  <div class="col-md-12">
    <select id="gender" name="gender" placeholder="Enter your gender" class="form-control input-md" >
   <option value="Male">Select Gender</option>
  <option value="M">Male</option>
  <option value="F">Female</option> 
<option value="O">Other</option></select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label title1" for="email"></label>
  <div class="col-md-12">
    <input id="email" name="email" placeholder="Enter your email" class="form-control input-md" type="email">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="occupation"></label>  
  <div class="col-md-12">
  <select id="occupation" name="occupation" placeholder="Enter your occupation" class="form-control input-md" >
   <option value="client">Select occupation</option>
  <option value="client">client</option>
  <option value="dresseur d'animaux">dresseur d'animaux</option> 
<option value="vétérinaire">vétérinaire</option></select>
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="password"></label>
  <div class="col-md-12">
    <input id="password" name="password" autocomplete="off" placeholder="Enter your password" class="form-control input-md" type="password">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-12control-label" for="cpassword"></label>
  <div class="col-md-12">
    <input id="cpassword" name="cpassword" autocomplete="off" placeholder="Confirm Password" class="form-control input-md" type="password">
    
  </div>
</div>
<?php if(@$_GET['q7'])
{ echo'<p style="color:red;font-size:15px;">'.@$_GET['q7'];}?>
<!-- Button -->
<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" class="sub" value="cree un compte" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form>
</div><!--col-md-6 end-->
</div></div>
</div><!--container end-->

<?php include_once 'footer.php'; ?>
</body>

</html>
