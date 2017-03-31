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
  include_once("fonction.php");
?>
<div class="container">
     <div class="page-header ">
         <h2 class="text-success"> Gestion des Responsables pédagogiques </h2>
     </div>
    <div class="row">
      <div class="col-md-12">
        <nav class="navbar navbar-default  navigation-top" role="navigation">
          <ul class="nav navbar-nav ">
            <li class="active"> <a href="accueil.php"><span class="glyphicon glyphicon-home"></span> Home  </a> </li>         
             <li class="#"> <a href="pedagogique.php"><span class="glyphicon glyphicon-ok"></span> Lister Responsables pédagogiques  </a> </li>
             <li class="#"> <a href="definir_responsablepedago.php"><span class="glyphicon glyphicon-ok"></span> Definir Responsable pédagogique </a>  </li>
             <li class="#"> <a href="retirer_responsablepedago.php"><span class="glyphicon glyphicon-remove"></span> Retirer Responsable pédagogique </a>  </li>    
         </ul>
         </nav> 
      </div>
    </div>
  </div>

  <?php
    # Recuperation des professeurs d'abord
    $result=getProfesseurs();
    while($row=mysql_fetch_row($result))
    {
      $idProf[]=$row[0];
      $loginProf[]=$row[1];
      $nomProf[]=$row[3];
      $prenomProf[]=$row[4];
    }
    if(!empty($idProf))
    {

    ?>
      <div class="container">
          <diV class="row">
            <div class="col-md-12">
              <div class="table-responsive">
                    <table class="table  table-bordered table-striped table-condensed" id="mytable">
                        <thead>
                          <tr class="active">
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>login</th>
                            <th>grade</th> 
                            <th>Specialité</th>
                          </tr>
                        </thead>  
                        <tbody>

     <?php                     
      for($i=0;$i<count($idProf);$i++)
      {
        #Pour chaque Professeur on verifie s'il est responsable ou pas
        $result1=getProfesseursbyId($idProf[$i]);
        while($row1=mysql_fetch_row($result1))
        {
          $grade[]=$row1[1];
          $specialite[]=$row1[2];
          $role[]=$row1[3];
        }
        ## On verifie les professeurs dont leur role est non nul
        for($j=0;$j<count($role);$j++)
        {
          if($role[$j]=="1")
          {
        ?>
            <tr>
                    <td> <?php echo $nomProf[$i];  ?></td>
                    <td> <?php echo $prenomProf[$i];  ?></td>
                    <td> <?php echo $loginProf[$i];  ?></td>
                    <td> <?php echo $grade[$j];  ?></td>
                    <td> <?php echo $specialite[$j];  ?></td>
            </tr>      

            <?php
            
          }

        }

        $grade=array();
        $specialite= array();
        $role= array();

      }
      $idProf=array();
      $loginProf=array();
      $nomProf=array();
      $prenomProf=array();
      ?>
                </tbody>
              </table>
         </div>       
                  
    </div>
  </diV>
</div>
<?php


    }else
    {
      ?>
          <div class="alert alert-danger">
          <b>Hello!</b> Aucun Responsable pédagogique pour l'instant !
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>

  

      <?php

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
 