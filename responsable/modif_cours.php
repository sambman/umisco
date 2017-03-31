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
	<title>Modifier cours</title>	
 </head>	
 <body>
  
<?php

  include_once("fonctionPedago.php");
  include_once("modal_cours.php");  
  include_once("header.php");
  include_once("crud_cours.php");
  ?>
<?php
if (isset($_GET["id"])) 
  {
    $id=$_GET["id"];
    //recuperation des données de l'ue
    $result=getCours_byId($id);
    while($row=mysql_fetch_row($result))
    {
     $nom[]=$row[1];
     $description[]=$row[2];
     $coef[]=$row[3];
     $credit[]=$row[4];
     $cat[]=$row[5];
    }
    if(!empty($id))
    {
      ?>
  <div class="container">
          <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="panel panel-success">
                    <div class="panel-heading">
                      <div class="page-header">
                      <p>
                        <h1 class="text-center">  Modifier cours</h1>
                      </p>
                    </div>
                    </div>
                    <div class="panel-body">
                          <form action="modif_cours.php" method="POST" id="form3">
                              <div class="row">
                              <div class="col-md-6">
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                <label for="text">Nom:</label> 
                                  <input type="text" name="nom"  value="<?php echo $nom[0] ?>"class="form-control" tabindex="1" required  autofocus> <br/>
                                  <label for="text"> Description</label>
                                  <textarea name="description" class="form-control" tabindex="3" required><?php echo $description[0]?></textarea><br/>
                                  </div>
                                <div class="col-sm-6 col-xs-6 col-md-6 col-md-6">
                                  <label for="text">Coefficient:</label> 
                                  <input type="number" name="coef" min="1" value="<?php echo $coef[0] ?>" class="form-control" tabindex="2" required > <br/>
                                  <label for="text"> Catégorie</label> 
                                  <input type="text" name="categorie" value="<?php echo $cat[0] ?>"class="form-control" tabindex="1" required autofocus> <br/>
                                  
                                  <label for="text">Crédit:</label> 
                                  <input type="number" name="credit"  value="<?php echo $credit[0] ?>" min="1" class="form-control" tabindex="6" required > <br/>                
                                </div>
                              </div>
                          </form>                      
                      </div>
                      <div class="panel-footer">
                      <button type="submit" class="btn btn-success" name="enregistrer" onclick="return confirm('Voulez vous vraiment modifier ce cours');" form="form3">Enregistrer</button>
                    </div>
              </div>
            </div>
  </div>
 </div> 
<?php
    }
    else
    {
      ?>
           <div class="alert alert-danger">
          <b>Erreur!</b>Aucun cours  ! Veillez réessayer svp !
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
      <?php
    }
  }else{
    echo("<script>document.location.href='modifier_cours.php'</script>");
  }
?>
<?php
 if (isset($_REQUEST["enregistrer"])) {
        $id=$_REQUEST['id'];
        $nom_cours=$_REQUEST["nom"];
        $description=$_REQUEST["description"];
        $coef=$_REQUEST["coef"];
        $credit=$_REQUEST["credit"];
        $categorie=$_REQUEST['categorie'];
        update_cours($nom_cours, $description, $coef, $credit, $categorie, $id);  
?>
      <script>
      alert('Cours modifié avec succes');
       document.location.href="modifier_cours.php";
      </script>
<?php
}
?>

<script type="text/javascript" src="../dist/js/jquery.js"></script>
<script type="text/javascript" src="../dist/js/dataTables/jquery.dataTables.js"></script>
<script type="text/javascript" src="../dist/js/dataTables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="../dist/js/bootstrap.js"></script>

 <script>
 $(document).ready(function() {
     $('#mytable').dataTable();
    });

 </script>
<script type="text/javascript">
jQuery(function($) {

  //Preloader
  var preloader = $('.preloader');
  $(window).load(function(){
    preloader.remove();
  });
});
</script>

<script type="text/javascript">
$(function(){
$("div.alert").show("slow").delay(2000).hide("slow");
});
</script>

 </body>
 </html>  