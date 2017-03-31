<?php
session_start();
?>
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
	<title> Connexion Administrateur</title>	
 </head>	
 <body>
<!--.preloader-->
<div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>
<div class="container">
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<div class="panel panel-info">
				<div class="panel-heading text-center">
					<h3 class="panel-title "> Connectez-vous</h3>
				</div>
				<div class="panel-body">
					<div class="row">
				    	<div class="col-md-offset-2 col-md-8">
							<form action="index.php" method="POST" id="form1">
							   <div class="form-group">
                                 <input type="text" name="login" placeholder="Login" class="form-control"required autofocus>
                              </div>
                              <div class="form-group">
                               <input class="form-control" type="password" required name="password" placeholder="Mot de passe">
                             </div>
                                  <button type="submit" name="conexion" class="btn btn-success">connexion</button>                              
	
							</form>

					    </div>	
					</div>
					
				</div>


			</div> 	
		</div>


	</div>

</div>
<?php
	// si le formulaire à ete envoyé coté serveur
	if(isset($_REQUEST['conexion']))
	{
		// recuperation des informations coté serveur
		$login=htmlspecialchars($_REQUEST['login']);
		$password=htmlspecialchars($_REQUEST['password']);
		// verification si le login et le mot de passe sont conformes à ce qui se trouve dans la base de donnée
		include_once "fonction.php";
		$result=getPassword_Admin_by_login($login);

		while ($row=mysql_fetch_row($result)) 
		{
			$motpasse[]=$row[0];
		}
		// si le mot de passe nest pas vide alors on verifie sinon 
		if(!empty($motpasse))
		{
			// verifion si les mot de passes sont conformes
			if($motpasse[0]==$password)
			{
				
				// recuperation des variables de session
				$_SESSION["login"]=$login;
				// redirection
				header("location:accueil.php");

			} 
			else
			{
				echo "Login ou mot de passe incorrect";
			}

		}else
		{
			echo "Login ou mot de passe incorrect";
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
 
