<?php
session_start();
if(!(isset($_SESSION["login"])))
{
  header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<meta charset="utf-8"/>
	<META HTTP-EQUIV="Content-Language" CONTENT="FR"/ 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="author" content="inputHub"/>
	<meta name="contactstate" content="SENEGAl"/>
	<link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="../dist/font-awesome-4.1.0/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="../dist/css/style.css"/>
	<title> Gestion des utilisateurs</title>	
 </head>	
 <body>
<?php
  include_once("menu.php");
  include_once("menu_user.php");
?>



  <?php
  include_once("formulaire.php");
  include_once("fonction.php");
  //
  if(isset($_REQUEST["enregistrer"]))
  {
    $nom=$_REQUEST["nom"];
    $prenom=$_REQUEST["prenom"];
    $login=$_REQUEST["login"];
    $password=$_REQUEST["password"];
    $num_tel=$_REQUEST["numtel"];
    $email=$_REQUEST["email"];
    $type=$_REQUEST["type"];
    addUser($login,$password,$nom,$prenom,$email,$num_tel,$type);
  }



  ?>
 <script type="text/javascript" src="../dist/js/jquery.js"></script>
 <script type="text/javascript" src="../dist/js/bootstrap.js"></script>
<script type="text/javascript">
jQuery(function($) {

  //Preloader
  var preloader = $('.preloader');
  $(window).load(function(){
    preloader.remove();
  });
});
</script>
 </body>
 </html>  
 