<?php
session_start();
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
  <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="dist/font-awesome-4.1.0/css/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="dist/css/style_front.css"/>
  <title>Accueil</title>  
 </head>  
 <body>
<div class="container">
  <div class="row">
    <diV class="col-md-offset-3 col-md-6">
        <div class="panel panel-info">
          <diV class="panel-heading">
            <div class="page-header">
                  <p>
                        <h1 class="text-center">  Sign in to MyApp</h1>
            
                  </p>
            </div>

          </diV>
          <div class="panel-body">
              <form class="text-center" id="form1" method="POST" action="connexion.php">
              
            <label for="text">UserName</label> 
                <div class="row">
                  <div class="col-md-offset-3 col-md-6">
              <input type="text" name="login"  class="form-control" tabindex="1" required placeholder="login de l'utilisateur" autofocus> <br/>                     
                  </div>
                </div>
             
             <label for="text">Password</label> 
                      <div class="row">
             
                      <div class="col-md-offset-3 col-md-6">
             <input type="password" name="password"  class="form-control" tabindex="2" required placeholder="login de l'utilisateur" autofocus> <br/>

                      </div>  
                      </div>
             

            </form>

          </div>

          <div class="panel-footer">
              <button type="submit" class="btn btn-success" name="connexion"  form="form1">Connexion</button>            
               <button type="#" class="btn btn-danger" data-toggle="modal" href="#modal_inscription">Inscription</button> 
              <button type="reset" class="btn btn-warning  pull-right" >Annuler</button>

          </div>

        </div>

    </div>  
  </div>


</div>

<?php
include_once("fonction.php");
  // Gestion de la connexion
  if(isset($_REQUEST["connexion"]))
  {
    $login=$_REQUEST["login"];
    $password=$_REQUEST["password"];

    // on va verifier ici si l'utilsateur existe
    $result=getInfoUser($login);
    while($row=mysql_fetch_row($result))
    {
      $id_user[]=$row[0];
      $pwd_from_serveur[]=$row[2];
      $nom[]=$row[3];
      $prenom[]=$row[4];
      $valide[]=$row[7];
      $type[]=$row[8];
    }
    //echo $login[0]."  ".$pwd_from_serveur[0];

    if(!empty($id_user))
    {

      if(($pwd_from_serveur[0]==$password) && ($valide[0]==0))
      {

        # si l'utilisateur est valide on verifie kel type d'ulisateur  
          if($type[0]==1)
          {
                  # Ici on sait que c'est un professeur on verifie par consequent si c'est un responsabe pedago
                  $rech=getProfesseursbyId($id_user[0]);
                  while($row=mysql_fetch_row($rech))
                  {
                    $grade[]=$row[1];
                    $specialite[]=$row[2];
                    $role[]=$row[3];

                  }

                  #  si le role  est egal à 1 c'est un responsable pedago sinon
                  if($role[0]==1)
                  {

                    // recuperation des variables de session
                    $_SESSION["login"]=$login;
                    $_SESSION["id_user"]=$id_user[0];
                    $_SESSION["nom"]=$nom[0];
                    $_SESSION["prenom"]=$prenom[0];
                    $_SESSION["grade"]=$grade[0];
                    $_SESSION["specialite"]=$specialite[0];
                    // redirection
                    header("location:responsable/index.php");
                    #redirection dans la page  responsable pedago

                  }else
                  # On fai la redirection vers la page de l'enseignant
                  {
                    // recuperation des variables de session
                    $_SESSION["login"]=$login;
                    $_SESSION["id_user"]=$id_user[0];
                    $_SESSION["nom"]=$nom[0];
                    $_SESSION["prenom"]=$prenom[0];
                    $_SESSION["grade"]=$$grade[0];
                    $_SESSION["specialite"]=$specialite[0];
                    header("location:professeur/index.php");
                    #redirection dans la page  responsable pedago

                    
                  }


          }
          if($type[0]==2)
          {
            # on le redirige dans la parie chercheur

            
          }

          if($type[0]==3)
          {
            # on le redirige dans la parie Etudiant
          }
        


      }else
        {
          ?>
           <div class="alert alert-danger">
          <b>Erreur!</b> Login ou mot de passe incorrect! Veillez réessayer svp !
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
      <?php


        }


    }else
    {
        ?>
           <div class="alert alert-danger">
          <b>Erreur!</b>Login ou mot de passe incorrect! Veillez réessayer svp !
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
      <?php
    }

  }


?>

<div class="modal fade" id="modal_inscription">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" type="button" data-dismiss="modal">x</button>
                  <h4 class="modal-title text-center">Inscription</h4>
                </div>
                <div class="modal-body">
          <form action="#" method="POST" id="form2">
          <div class="row">
            <div class="col-md-6">
             
            
             <label for="text">Nom:</label> 
             <input type="text" name="nom"  class="form-control" tabindex="1" required placeholder="Nom de l'utilisateur" autofocus> <br/>
            
            <label for="text"> login</label>
            <input type="text" class="form-control" name="login" tabindex="3"  required  placeholder="Prenom de l'utilisateur"><br/>

            <label for="text"> Telephone</label>
            <input type="text" class="form-control" name="numtel" tabindex="5" required><br/>
            
               <label for="text"> email</label>
               <input type="email" class="form-control" name="email" tabindex="7"  required><br/>

               <label for="text"> Numéro Carte Etudiant</label>
               <input type="text" class="form-control" name="num_carte" tabindex="7"  required><br/>
              

            </div>


            <div class="col-sm-6 col-xs-6 col-md-6 col-md-6">
                <label for="text">Prenom:</label> 
                <input type="text" name="prenom"  class="form-control" tabindex="2" required placeholder="Prenom du patient" > <br/>

               <label for="text"> Mot de passe</label>
               <input type="password" class="form-control" name="password" tabindex="4" required placeholder="Mot de passe l'utilisateur"><br/>

                <label for="text">  Rettapez le mot de passe</label>
               <input type="password" class="form-control" name="password2" tabindex="6" required placeholder="Mot de passe l'utilisateur"><br/>
               
                 <label for="text"> Option</label> 
                <select class="form-control" name="type" tabindex="8"  required>
                  <option>Mathematique</option>
                  <option>Informatique</option>
               </select>
            </div>
            

          </div>

          </form>   
                    
                </div>
                <div class="modal-footer">

             <button type="submit" class="btn btn-success" name="enregistrer"  form="form2">S'inscrire</button>
              <button type="reset" class="btn btn-warning" data-dismiss="modal">annuler</button>
                </div>

              </div>

            </div>

          </div>


<?php
  //gestion des inscription
if(isset($_REQUEST["enregistrer"]))
{
// recuperation des données de l'utilisateur
  $nom=$_REQUEST["nom"];
  $prenom=$_REQUEST["prenom"];
  $login=$_REQUEST["login"];
  $email=$_REQUEST["email"];
  $num_tel=$_REQUEST["numtel"];
  $password=$_REQUEST["password"];
  $password2=$_REQUEST["password2"];
  $type=$_REQUEST["type"];
  $num_carte=$_REQUEST["num_carte"];
// On va verifier si le login nexiste pas d'ga dans la base de donnees
  $result=verifLogin($login);
  while($row=mysql_fetch_row($result))
    {
      $id_user[]=$row[0];
    }

    if(empty($id_user))
    {# on sait ici que le login saisi nexiste pas dans la base de donné

      // verifions la concordance des mots de passes
      if($password==$password2)
      {
        // On enregistre ici
        addUser($login,$password,$nom,$prenom,$email,$num_tel,$type,$num_carte);
        ?>
           <div class="alert alert-info">
          <b>Félicitation!</b>Utilisateur ajouté Veillez attendre la validation du compte par l'administrateur !
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
      
      <?php



      }else
      {
        #  les mots de passe ne sont pas conherent
        ?>
           <div class="alert alert-danger">
          <b>Erreur!</b>Mot de passe non conforme ! Veillez réessayer svp !
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
      <?php
      }


    }else
    {
      // ici on sait que le login saisi existe dga dans la base
      ?>
           <div class="alert alert-danger">
          <b>Erreur!</b> Ce Login Existe dégà! Veillez changer de login svp !
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
      <?php
    }
     


}



?>



 	

<script type="text/javascript" src="dist/js/jquery.js"></script>
 <script type="text/javascript" src="dist/js/bootstrap.js"></script>
 <script type="text/javascript">
$(function(){
$("div.alert").show("slow").delay(2000).hide("slow");
});
 </script>
 </body>
 </html>  






















