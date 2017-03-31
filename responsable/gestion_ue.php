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
	   <META HTTP-EQUIV="Content-Language" CONTENT="FR"/ >
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
  include_once("header.php");
  include_once("crud_ue.php");
  include_once("modal_ue.php");
  include_once("fonctionPedago.php");
  ?>

  <?php
      if(isset($_REQUEST["ajouter"]))
      {
        $code_ue=$_REQUEST["code"];
        $lib=$_REQUEST['libelle'];
        ajouterUe($_SESSION["id_user"], $code_ue, $lib);
    ?>
      <script>
        alert('UE ajouté avec succes');
       document.location.href="gestion_ue.php";
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