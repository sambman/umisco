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
  include_once("menu_professeur.php");
?>



  <?php
  include_once("formulaire_professeur.php");
  include_once("fonction.php");
  
  $result=listingUser_by_type_user(1);  
  while($row=mysql_fetch_row($result))
  {
    $id[]=$row[0];
    $login[]=$row[1];
    $nom[]=$row[3];
    $prenom[]=$row[4];
    $valide[]=$row[7];
    $type[]=$row[8];
  }
  if(!empty($id))
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
                    <th>Type</th> 
                    <th>Statut du compte</th>
                  </tr>
                </thead>  
                <tbody>
                  <?php
                    for($i=0;$i<count($id);$i++)
                    {
                  ?>  
                  <tr>
                    <td> <?php echo $nom[$i];  ?></td>
                    <td> <?php echo $prenom[$i];  ?></td>
                    <td> <?php echo $login[$i];  ?></td>
                    <td> <?php echo $type[$i];  ?></td>
                   <?php
                        if ($valide[$i]==0) 
                        {
                         echo '<td> <span class="glyphicon glyphicon-ok"><span> </td>';
                        }else
                        {
                         echo '<td> <span class="glyphicon glyphicon-remove"><span> </td>';
                        }
                   ?>       
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
          <b>Erreur!</b>Aucun user  ! Veillez réessayer svp !
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
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
 </body>
 </html>  
 