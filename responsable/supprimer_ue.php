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
	<title>Supprimer UE</title>	
 </head>	
 <body>
  
<?php
include_once("header.php");
  include_once("crud_ue.php");
  include_once("modal_ue.php");
  include_once("fonctionPedago.php");
  $result=Listerue();  
  while($row=mysql_fetch_row($result))
  {
    $id[]=$row[0];
    $codeUe[]=$row[1];
    $idProf[]=$row[2];
    $libelle[]=$row[3];
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
                    <th>Code</th>
                    <th>Libellé</th>
                    <th>Action</th>
                  </tr>
                </thead>  
                <tbody>
                  <?php
                    for($i=0;$i<count($id);$i++)
                    {
                      echo "<tr>";
                       echo'<form method="Post" action="supprimer_ue.php">';
                  ?>  
                
                    <td> <?php echo $codeUe[$i];  ?></td>
                    <td> <?php echo $libelle[$i];  ?></td>
                    <input type="hidden" name="id" value="<?php echo $id[$i];  ?>" />
                    <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="submit"class="btn btn-default"  value="supprimer" onclick="return confirm('Voulez vous vraiment supprimer cet UE');" name="delete"></td>
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
     delete_ue($id);
     ?>
     <script>
      alert('UE supprimée avec succes');
       document.location.href="supprimer_ue.php";
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