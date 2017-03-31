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
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="dist/font-awesome-4.1.0/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="dist/css/style_front.css"/>
<link rel="stylesheet" type="text/css" href="dist/animate.min.css"/>
	<title>Accueil</title>	
 </head>	
 <body>
  <?php
  #on va inclure  le menu
  include_once("menu.php");
  ?>
  <div class="container " >
    
      <diV class="page-header">
        <h1 class="text-danger">Bienvenue !</h1>
        Bienvenue sur le site de l'unité mixte internationale Ummisco.
      </diV>

    <div class="row">
      <div class="col-md-6">
        <div class="panel panel-danger">
          <div class="panel-heading">
            <h1 class="text-center">
              Axes de recherche
            </h1>
          </div>
          <div class="panel-body">
            <h3 class="text-info">Développer des outils pour la modélisation des systèmes complexes</h3>
            <li>Développement de méthodes mathématiques de modélisation </li>
            <li>Développement de méthodes informatique de modélisation </li>
            <li>Mettre en œuvre les outils de la modélisation des systèmes</li>
             <h3 class="text-info"> Maladies émergentes infectieuses : Epidémiologie et santé </h3>
               <li>Changement climatique et aléas naturels</li>
                <li>Ecosystèmes et ressources naturelles </li>
                <li>Modèles bio­économiques et sociaux</li>

          </div>

        </div>
      </div>

       <div class="col-md-4">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h1 class="text-center">
              Nos implantations
            </h1>
          </div>
          <div class="panel-body">
            <img class="img-responsive" src="locaux.png"></img>
          </div>

        </div>
      </div>

    </div>
  </div>
  <div class="container">

    <div class="row">
      <div class="col-md-3">
        <div class="panel panel-warning">
          <div class="panel-heading">
            <h1 class="text-center">
              Tutelles
            </h1>
          </div>
          <div class="panel-body">
            <img class="img-responsive" src="tutel.png"></img>
          </div>

        </div>


      </div>

      <div class="col-md-4">
        <div class="panel panel-danger">
          <div class="panel-heading">
            <h1 class="text-center">
              Nous contacter
            </h1>
          </div>
          <div class="panel-body">
            <h2 class="text-info pull-right">UMI 209 UMMISCO</h2>
            <p>Institut de Recherche pour le Développement
                32 avenue Henri Varagnat
              93143 Bondy Cedex
          </p>
          <p>
            <blockquote>
              Tel : +33 (0) 1 48 02 56 69
Fax : +33 (0) 1 48 47 30 88
Courriel : kathy.baumont_AT_bondy.ird.fr
            </blockquote>

          </p>  
          </div>

        </div>




      </div>
      </div>

  </div>

<?php
include_once("footer.php");
?>

 <script type="text/javascript" src="dist/js/jquery.js"></script>
 <script type="text/javascript" src="dist/js/bootstrap.js"></script>
 </script>
 </body>
 </html>	