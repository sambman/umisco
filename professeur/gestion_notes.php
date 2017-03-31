<?php
  session_start();
if(!(isset($_SESSION["login"])))
{
  header("location:../index.php");
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
	<link rel="stylesheet" type="text/css" href="style_responsable.css"/>
	<title>Accueil</title>	
 </head>	
 <body>
  <div class="alert alert-success">
          <b>Bonjour!</b> Bienvenue <?php echo  strtoupper($_SESSION["prenom"])."  ".strtoupper($_SESSION["nom"]);  ?>
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  </div>
  <?php
  #on va inclure  le menu
  include_once("fonctions.php");
  include_once("header.php");
  include_once("crud.php");
  include_once("modal.php");


  ?>
 
 <?php
  if(isset($_REQUEST["ajouter"]))
  {
    $note=$_REQUEST["note"];
    $id_user=$_REQUEST["id_user"];
    $id_cours=$_REQUEST["idcours"];
    #a ajouter dan la base
    $id_etu=substr($id_user,(strpos($id_user, ':')+1));
    $id_cour=substr($id_cours,(strpos($id_cours, ':')+1));
     addnote($note,$id_cour,$id_etu);
     ?>
          <script>
          alert("Vous avez ajouter une note avec succes ");
          document.location.href="index.php";
          </script>
      

    <?php
    

  }

 ?> 

 <script type="text/javascript" src="../dist/js/jquery.js"></script>
 <script type="text/javascript" src="../dist/js/bootstrap.js"></script>
<script type="text/javascript">
$(function(){
$("div.alert").show("slow").delay(2000).hide("slow");
});
 </script>
 </body>
 </html>	