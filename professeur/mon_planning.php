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
  include_once("header.php");
  include_once("fonctions.php");
  ?>
  <!-- definition de la barre verticale -->
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-2 col-md-2 navbar-default sidebar" role="navigation">
       <ul class="nav nav-sidebar">
      
                <li>
                  <a class="active" href="index.php"><i class="fa fa-dashboard fa-fw"></i> Accueil / Dashboard</a>
              </li>
              
              <li>
                  <a  href="gestion_notes.php"><i class="fa fa-user fa-fw"></i> Gestion des notes</a>
              </li>
             
              <li>
                 <a  href="mon_planning.php"><i class="fa fa-tag fa-fw"></i> Mon planning</a>
              </li>
             
              <li>
                 <a  href="mescours.php"><i class="fa fa-gear fa-fw"></i> Mes cours</a>
              </li>
           
              <li>
                 <a  href="#"><i class="fa fa-eye fa-fw"></i> Aide</a>
              </li>
     
       </ul>  
    </div>
    <!-- definition du contenu here -->
    <div class="col-md-10 col-lg-10">
      <div class="page-header text-center lead">
        <h1>Espace de Travail professeur </h1>
      </div>
      <div class="jumbotron">
        <h4 class="text-center">Mon Planning</h4>
      </div>

          <?php

          #recuperation de l'id du professeur
          $resultat=getIdbyLogin($_SESSION["login"]);
          while($row=mysql_fetch_row($resultat))
          {
            $id_user=$row[0];
          }
         
          if(!empty($id_user))
          {
            #On recuperer son planning
            $result= getPlanning($id_user);
            
            while($row1=mysql_fetch_row($result))
            {
              $data_debut[]=$row1[1];
              $data_fin[]=$row1[2];
              $heure_debut[]=$row1[3];
              $heure_fin[]=$row1[4];
              $nomcours[]=$row1[5];
            }

            
           if(!empty($data_debut))
            {
              ?>

  <div class="table-responsive">
            <table class="table  table-bordered table-striped table-condensed" id="mytable">
                <thead>
                  <tr class="active info">
                    <th>Cours</th>
                    <th>date de debut</th>
                    <th>date de fin</th>
                    <th>heure de debut</th>
                    <th>heure de fin</th>
                     
                  </tr>
                </thead>  
                <tbody>
                  <?php
                    for($i=0;$i<count($data_debut);$i++)
                       
                    {
                      echo "<tr>";
                      
                  ?>  
                  
                    <td> <?php echo $nomcours[$i];  ?></td>
                    <td> <?php echo $data_debut[$i];  ?></td>
                    <td> <?php echo $data_fin[$i];  ?></td>
                    <td> <?php echo $heure_debut[$i];  ?></td>
                    <td> <?php echo $heure_fin[$i];  ?></td>
                    
                    
                      </tr>
                  
                 <?php  
                    }

                  ?>
                </tbody>
              </table>
         </div>       

         <?php

         }else
            {
              ?>
           <div class="alert alert-danger">
          <b>Hello!</b> Aucun Planning n'a été défini pour  vous !
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
      <?php

            }

          }

        ?>
     </div>
     </div>
     </div> 

  

 <script type="text/javascript" src="../dist/js/jquery.js"></script>
 <script type="text/javascript" src="../dist/js/bootstrap.js"></script>
<script type="text/javascript">
$(function(){
$("div.alert").show("slow").delay(2000).hide("slow");
});
 </script>
 </body>
 </html>	