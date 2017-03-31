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
if (isset($_GET["id"])) 
  {
    $id=$_GET["id"];
    //recuperation des données de l'ue
    $result=getUe_byId($id);
    while($row=mysql_fetch_row($result))
    {
      $codeUe[]=$row[1];
      $idProf[]=$row[2];
      $libelle[]=$row[3];
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
                        <h1 class="text-center">  Modifier UE</h1>
                      </p>
                    </div>
                    </div>
                    <div class="panel-body">
                        <form action="modif_ue.php" method="POST" id="form3">
                        <div class="row">
                          <div class="col-md-6">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                           <label for="text">Code UE:</label> 
                           <input type="text" name="code"  value="<?php echo $codeUe[0]; ?>" class="form-control" tabindex="1" required placeholder="Code de l'unité d'enseignement" autofocus> <br/>
                           <label for="text">Libellé UE:</label> 
                           <input type="text" name="libelle"  value="<?php echo $libelle[0]; ?>"class="form-control" tabindex="3" required placeholder="Libellé de l'unité d'enseignement" autofocus> <br/>
                           </div>
                          </div>
                        </form>                    
                    </div>
                    <div class="panel-footer">
                      <button type="submit" class="btn btn-success" name="enregistrer" onclick="return confirm('Voulez vous vraiment modifier cet UE');" form="form3">Enregistrer</button>
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
          <b>Erreur!</b>Aucun ue  ! Veillez réessayer svp !
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
      <?php
    }
  }else{
    echo("<script>document.location.href='modifier_ue.php'</script>");
  }
?>
<?php
 if (isset($_REQUEST["enregistrer"])) {
        $id=$_REQUEST['id'];
        $code=$_REQUEST["code"];
        $libelle=$_REQUEST["libelle"];
        update_ue($code, $libelle, $id);  
?>
      <script>
      alert('UE modifié avec succes');
       document.location.href="modifier_ue.php";
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