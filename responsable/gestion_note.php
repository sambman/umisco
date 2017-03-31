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
	<title>Gestion des notes</title>	
 </head>	
 <body>
   <div class="container-fluid">
     <div class="page-header ">
         <h2 class="text-success"> Liste des étudiants avec leurs notes  </h2>
     </div>
    </div>
  <?php

  include_once("fonctionPedago.php"); 
  include_once("header.php");
  ?>


<?php
  $result=listerTous(); 
  while($row=mysql_fetch_row($result))
  {
    $id_et[]=$row[0];
    $nom_cours[]=$row[4];
    $coef[]=$row[6];
    $credit[]=$row[7];
    $cat[]=$row[8];
    $nom_et[]=$row[16];
    $note[]=$row[10];
    $prenom_et[]=$row[17];
    }
 

if(!empty($id_et))
{
?>  
<div class="container-fluid">
  <diV class="row">
    <div class="col-md-12">
      <div class="table-responsive">
            <table class="table  table-bordered table-striped table-condensed" id="mytable">
                <thead>
                  <tr class="active default">
                    <th>Etudiants</th>
                    <th>notes</th>
                    <th>cours</th>
                    <th>Action</th>
                  </tr>
                </thead>  
                <tbody>
                  <?php
                    for($i=0;$i<count($id_et);$i++)
                    {
                      echo "<tr>";
                    
                  ?>  
                
                    <td> <?php echo $prenom_et[$i]?>&nbsp;<?php echo strtoupper($nom_et[$i]);  ?></td>
                    <td> <?php echo $note[$i];  ?></td>
                     <td> <?php echo $nom_cours[$i];  ?></td>

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
          <b>Erreur!</b>Aucun planning  ! Veillez réessayer svp !
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

<script type="text/javascript">
$(function(){
$("div.alert").show("slow").delay(2000).hide("slow");
});
</script>
 </body>
 </html>  