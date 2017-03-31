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
	<title>Sélection des étudiants</title>	
 </head>	
 <body>
   <div class="container-fluid">
     <div class="page-header ">
         <h2 class="text-success"> Liste des Candidats  </h2>
     </div>
    </div>
  <?php

  include_once("fonctionPedago.php"); 
  include_once("header.php");
  ?>

  <?php
    $result=Listeretudiants();  
  while($row=mysql_fetch_row($result))
  {
    $id[]=$row[0];
    $nom[]=$row[3];
    $prenom[]=$row[4];
    $email[]=$row[5];
    
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
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                </thead>  
                <tbody>
                  <?php
                    for($i=0;$i<count($id);$i++)
                    {
                  ?>  
                  <tr>
                    <form method="post" action="gestion_selection.php">
                    <td> <?php echo $nom[$i];  ?></td>
                    <td> <?php echo $prenom[$i]; ?></td>
                    <td> <?php echo $email[$i]; ?></td>
                    <input type="hidden" name="id" value="<?php echo $id[$i];  ?>" />
                    <td> <input type="submit" class="btn btn-success"  value="valider"
                    onclick="return confirm('Voulez vous vraiment selectionner cet candidat en tant que étudiant');"
     name="valider">
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
          <b>Erreur!</b>Aucun Etudiant  ! Veillez réessayer svp !
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
<?php
}
  
?>

<?php
    if(isset($_REQUEST["valider"]))
    {
      $id=$_REQUEST["id"];
      Update_to_etudiant($id);
      ?>
      <script>
        alert('Cet candidat a ete ajouté comme étudiant');
       document.location.href="gestion_selection.php";
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