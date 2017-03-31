<?php
	// definition des fonction ici
function connexion_base(){
	$host="mysql.hostinger.fr";
	$user="u351752605_esp";
	$bdd="u351752605_esp";
	$pwd="localhost";
	mysql_connect($host,$user,$pwd) or die(" Erreur de connexion au serveur");
	mysql_select_db($bdd)or die(" Erreur de connexion a la base de données");
}
// appel de la fonction de connexion à la base de donnée
connexion_base();


function listetudiant()
{
	$query="select * from utilisateur where type_user=3 and valide=0";
	$result=mysql_query($query);
	return $result;	
}


function Listercours()
{
	$query="select *  from cours";
	$result=mysql_query($query);
	return $result;
}


function addnote($note,$id_cours,$id_etudiant)
{
	$query='insert into  note value ("","'.$note.'","'.$id_cours.'","'.$id_etudiant.'")';
	mysql_query($query) or die(' Erreur d insertion de support'.$query.mysql_error());
}


function getPlanning($id)
{
	$query='select * from planning where IdProfesseur="'.$id.'"';
	$result=mysql_query($query);
	return $result;	

}

function  getIdbyLogin($login)
{
	$query='select id_user from utilisateur where login="'.$login.'"';
	$result=mysql_query($query);
	return $result;

}







?>