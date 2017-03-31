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
	<title>Supprimer cours</title>	
 </head>	
 <body>
  
<?php

  include_once("fonctionPedago.php");
  include_once("modal_cours.php");  
  include_once("header.php");
  include_once("crud_cours.php");
  ?>

  <?php
  $result=Listercours();  
  while($row=mysql_fetch_row($result))
  {
    $id[]=$row[0];
    $nom[]=$row[1];
    $description[]=$row[2];
    $coef[]=$row[3];
    $credit[]=$row[4];
    $cat[]=$row[5];
  }

if(!empty($id))
{
?>  
<div class="container-fluid">
  <diV class="row">
    <div class="col-md-12">
      <div class="table-responsive">
            <table class="table  table-bordered table-striped table-condensed" id="mytable">
                <thead>
                  <tr class="active default">
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Coefficient</th>
                    <th>Crédit</th>
                    <th>Catégorie</th>
                    <th>Action</th>
                  </tr>
                </thead>  
                <tbody>
                  <?php
                    for($i=0;$i<count($id);$i++)
                    {
                      echo "<tr>";
                       echo'<form method="Post" action="supprimer_cours.php">';
                  ?>  
                
                    <td> <?php echo $nom[$i];  ?></td>
                    <td> <?php echo $description[$i];  ?></td>
                    <td> <?php echo $coef[$i];  ?></td>
                    <td> <?php echo $credit[$i];  ?></td>
                    <td> <?php echo $cat[$i];  ?></td>
                    <input type="hidden" name="id" value="<?php echo $id[$i];  ?>" />
                    <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="submit"class="btn btn-default"  value="supprimer" onclick="return confirm('Voulez vous vraiment supprimer ce cours');" name="delete"></td>
                  </form>
                 </tr>
                 <?php  
                    }

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
          <b>Erreur!</b>Aucun UE  ! Veillez réessayer svp !
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
<?php
}
include_once("fonctionPedago.php");
  if(isset($_REQUEST["delete"]))
  {
    $id= $_REQUEST["id"];
     delete_cours($id);
     ?>
     <script>
      alert('cours supprimé avec succes');
       document.location.href="supprimer_cours.php";
      </script>
      <?php
   #header("location:supprimer_ue.php");
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