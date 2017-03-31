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
	<title> </title>	
 </head>	
 <body>
<?php
  include_once("menu.php");
  include_once("menu_user.php");
  include_once("fonction.php");
  if (isset($_GET["id"])) 
  {
    $id=$_GET["id"];
    //recuperation des données du user
    $result=getuser_by_login($id);
    while($row=mysql_fetch_row($result))
    {
      $login[]=$row[1];
      $password[]=$row[2];
      $nom[]=$row[3];
      $prenom[]=$row[4];
      $email[]=$row[5];
      $numtel[]=$row[6];
      $type[]=$row[8];
    }
    if(!empty($login))
    {
      ?>
        <div class="container">
          <div class="row">
            <diV class="col-md-offset-3 col-md-6">
                <div class="panel panel-success">
                    <diV class="panel-heading">
                      <div class="page-header">
                      <p>
                        <h1 class="text-center">  Modifier User</h1>
            
                      </p>
                    </div>

                    </diV>

                    <div class="panel-body">
                      <form action="modifuser.php" method="POST" id="form2">
                            <div class="row">
                              <div class="col-md-6">
                               
                              
                               <label for="text">Nom:</label> 
                               <input type="text" name="nom"  class="form-control" tabindex="1" required  autofocus value="<?php echo $nom[0]; ?>"> <br/>
                              
                              <label for="text"> login</label>
                              <input type="text" class="form-control" name="login" tabindex="3"  required readonly value="<?php echo $login[0]; ?>"><br/>

                              <label for="text"> Telephone</label>
                              <input type="text" class="form-control" name="numtel" tabindex="5" required value="<?php echo $numtel[0]; ?>"><br/>
                              
                                 <label for="text"> email</label>
                                 <input type="email" class="form-control" name="email" tabindex="7"  required value="<?php echo $email[0]; ?>"><br/>
                                

                              </div>


                              <div class="col-sm-6 col-xs-6 col-md-6 col-md-6">
                                  <label for="text">Prenom:</label> 
                                  <input type="text" name="prenom"  class="form-control" tabindex="2" required value="<?php echo $prenom[0]; ?>" > <br/>

                                 <label for="text"> Mot de passe</label>
                                 <input type="password" class="form-control" name="password" tabindex="4" required placeholder="Mot de passe l'utilisateur"><br/>

                                  <label for="text">  Rettapez le mot de passe</label>
                                 <input type="password" class="form-control" name="password2" tabindex="6" required placeholder="Mot de passe l'utilisateur"><br/>
                                 
                                   <label for="text"> Type</label> 
                                  <select class="form-control" name="type" tabindex="8"  required>
                                    <option>Etudiant</option>
                                    <option>Professeur</option>
                                    <option>Doctorant</option>
                                    <option>Chercheur</option>
                                  </select>
                              </div>
                              

                            </div>

                            </form>   




                    </div>
                    <div class="panel-footer">
                      <button type="submit" class="btn btn-success" name="enregistrer"  form="form2">Enregistrer</button>

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
          <b>Erreur!</b>Aucun user  ! Veillez réessayer svp !
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
      <?php
    }


  }else
  {
    header("location:modif_user.php");
  }

/// Le formulaire soummis
  if (isset($_REQUEST["enregistrer"])) 
  {
    # code...
     $login=$_REQUEST["login"];
     $nom=$_REQUEST["nom"];
     $prenom=$_REQUEST["prenom"];
     $numtel=$_REQUEST["numtel"];
     $email=$_REQUEST["email"];
     $type=$_REQUEST["type"];
     $password=$_REQUEST["password"];
     $password2=$_REQUEST["password2"];

     if ($password==$password2) 
     {
       update_user($login,$nom,$prenom,$numtel,$email,$type,$password);
       echo "<script>";
       echo "alert('Utilisateur modifier avec succes')";
        echo' document.location.href="modif_user.php"';
       echo "</script>";
     }else
     {
      ?>
           <div class="alert alert-danger">
          <b>Erreur!</b>Mot de passe non conforme ! Veillez réessayer svp !
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
      <?php
     }

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
 