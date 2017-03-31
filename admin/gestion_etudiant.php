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
  include_once("menu_etudiant.php");
?>



  <?php
  include_once("formulaire_etudiant.php");
  include_once("fonction.php");
  //
  if(isset($_REQUEST["enregistrer"]))
  {
    $nom=$_REQUEST["nom"];
    $prenom=$_REQUEST["prenom"];
    $login=$_REQUEST["login"];
    $password=$_REQUEST["password"];
    $num_tel=$_REQUEST["numtel"];
    $email=$_REQUEST["email"];
    $option=$_REQUEST["option"];
    $numetudiant=$_REQUEST["numetudiant"];
    
    #On verifie si le login n'exite pas dega dans la base de donnée
    $result=getuser_by_login($login);
    while ($row=mysql_fetch_row($result)) 
    {
      $id[]=$row[0]; 
    }
    # si le id est vide alors on enregistre sinon on  ne fait rien

    if(empty($id))
    {

      addEtudiant($login,$password,$nom,$prenom,$email,$num_tel,$numetudiant,$option);
      ?>
      <script>
        alert('Etudiant ajouté avec succes');
       document.location.href="gestion_etudiant.php";
      </script>
      

    <?php
    }else
    {
      ?>
          <div class="alert alert-danger">
          <b>Erreur!</b> Ce login existe dégà! Veillez réessayer svp !
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>

  

      <?php
    }


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
 