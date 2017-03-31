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
  <?php

  include_once("fonctionPedago.php");
  include_once("modal_planning.php");  
  include_once("header.php");
  include_once("crud_planning.php");

  
  ?>

  <?php
    if(isset($_REQUEST["ajouter"]))
    {
      $nom_cours=$_REQUEST["nomcours"];
      $hd=$_REQUEST["heured"];
      $hf=$_REQUEST["heuref"];
      $dd=$_REQUEST["dated"];
      $df=$_REQUEST["datef"];
      $prof=$_REQUEST['prof'];

      #On doit recuperer le ID du professeur correspondant au nom du professeur 
      $idprof=getId_prof($prof);

      
      # Maintenant on peu inserer dans la base de donnée
      ajoutPlanning($idprof,$dd,$df,$hd,$hf,$nom_cours);
      ?>
      <script>
        alert('planning ajouté avec succes');
       document.location.href="gestion_planning.php";
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