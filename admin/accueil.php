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
	<title> Accueil</title>	
 </head>	
 <body>
  <?php
  include_once("menu.php");

  ?>
  <div class="container">
  	<div class="row">
      	<div class="page-header">
      		<h1>Bienvenue  <small class="text-danger">Veuillez choisir une action sur le menu</small></h1>
      	</div>

        <!-- gestion des Etudiants -->
      	<div class="col-md-4">
      		<div class="panel panel-primary">
      			<div class="panel-heading">
      				  <h3 class="text-center"> Gestion Etudiants</h3>
      			</div>
      			<div class="panel-body">
      				<a href="gestion_etudiant.php">
      						<img class="img-responsive users" src="../dist/img/users.png" width="50%"></img>
      				</a>	      				
      			</div>		
      		</div>
      	</div>
        <!-- gestion des Professeurs -->
        <div class="col-md-4">
          <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="text-center"> Gestion Professeurs</h3>
            </div>
            <div class="panel-body">
              <a href="gestion_professeur.php">
                  <img class="img-responsive users" src="../dist/img/users.png" width="50%"></img>
              </a>                
            </div>    
          </div>
        </div>
        <!-- gestion des Chercheurs -->
        <div class="col-md-4">
          <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="text-center"> Gestion Chercheurs</h3>
            </div>
            <div class="panel-body">
              <a href="gestion_chercheur.php">
                  <img class="img-responsive users" src="../dist/img/users.png" width="50%"></img>
              </a>                
            </div>    
          </div>
        </div>
             	     	


  	</div>
  </div>
  <div class="container">
    <div class="row">
      <!-- gestion des Responsables pédagogiques -->
        <div class="col-md-4">
          <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="text-center"> Responsable pédagogique</h3>
            </div>
            <div class="panel-body">
              <a href="pedagogique.php">
                  <img class="img-responsive users" src="../dist/img/users.png" width="50%"></img>
              </a>                
            </div>    
          </div>
        </div>


    </div>

  </div>	



<!-- 
 <div class="container">
    <nav class="navbar navbar-inverse navigation-bottom text-primary text-center">    	
      <span>  Copyright © 2014. All Rights reserved. Design By InputHub </span>			
   </nav>
</div>  -->
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
 
