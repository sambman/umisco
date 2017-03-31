<?php
	// definition des fonction ici
function connexion_base(){
	$host="mysql.hostinger.fr";
	$user="u351752605_esp";
	$bdd="u351752605_esp";
	$pwd="localhost";
	mysql_connect($host,$user,$pwd) or die(" Erreur de connexion au serveur");
	mysql_select_db($bdd)or die(" Erreur de connexion a la base de données");
}// appel de la fonction de connexion à la base de donnée
connexion_base();

// function Get info user

function getInfoUser($login)
{
	$query='select * from utilisateur where login="'.$login.'"';
	$result=mysql_query($query);
	return $result;
}	
//fonction qui permet de verifier les entrees avant l'ajout de l'utilisateur
	function verifLogin($login) {
		$login = trim($login);
		$login = stripslashes($login);
		$login = htmlspecialchars($login);
		$req = "select * from utilisateur where login = '".$login."'";
		$rep = mysql_query($req) or die("Impossible de trouver ce login");
		return $rep;
}	

function addUser($login,$password,$nom,$prenom,$email,$num_tel,$type,$numeroCarte)
{
	$query='insert into utilisateur values("","'.$login.'","'.$password.'","'.$nom.'","'.$prenom.'","'.$email.'","'.$num_tel.'",1,3)';
	mysql_query($query) or die(' Erreur de linsertion a la base de données'.$query.mysql_error());
	$id=mysql_insert_id();
	// Ajout dans la table Etudiant
	$query='insert into etudiant values("'.$id.'","'.$numeroCarte.'","'.$type.'")';
	mysql_query($query) or die(' Erreur de linsertion a la base de données'.$query.mysql_error());

}

# Fonction qui selectionne un professeur dans la table professeur
function getProfesseursbyId($id)
{
	$query='select * from professeur where idProfesseur="'.$id.'"';
	$result=mysql_query($query);
	return $result;
}



?>