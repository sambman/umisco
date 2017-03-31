<?php
// definition de la fonction de connexion a la base de Donné
function connexion_base(){
	$host="mysql.hostinger.fr";
	$user="u351752605_ esp";
	$bdd="u351752605_ esp";
	$pwd="localhost";
	mysql_connect($host,$user,$pwd) or die(" Erreur de connexion au serveur");
	mysql_select_db($bdd)or die(" Erreur de connexion a la base de données");
}
// appel de la fonction de connexion à la base de donnée
connexion_base();

//fonction qui verifie qu'un enseignant est ou pas un responsable pedagogique
function verifResponsable($id) {
	$query = 'select * from professeur where idProfesseur="'.$id.'" and role not null';
	$result = mysql_query($query);
	if ($row = mysql_fetch_row($result))
		return true;
	else
		return false
}
//fonction qui ajoute un support
function ajouterSupport($nom, $type, $destination, $idProfesseur){
	$query='insert into support values("","'.$nom.'","'.$type.'","'.$destination.'")';
	mysql_query($query) or die(' Erreur d insertion de support'.$query.mysql_error());
	ajoutProfSup($idProfesseur);
}

//fonction qui ajoute les infos du planning
function ajoutPlanning($id, $date, $horaire, $cours){
	if (verifResponsable($id)) {
		$query='insert into planning values("","'.$date.'","'.$horaire.'","'.$cours.'","'.$id.'")';
		mysql_query($query) or die(' Erreur d insertion des infos du planning'.$query.mysql_error());
	}
}

//ajout de la table professeursupport
function ajoutProfSup($idProfesseur){
	$query='insert into professeursupport values ("'.$idProfesseur.'", LAST_INSERT_ID())';
	mysql_query($query) or die(' Erreur de linsertion a la base de données'.$query.mysql_error());
}

//lister support
function listerSupport(){
	$query="select * from support";
	$result=mysql_query($query);
	return $result;	
}

//lister les infos du planning
function listerInfosPlanning(){
	$query="select * planning";
	$result=mysql_query($query);
	return $result;	
}

//fonction qui ajoute une UE
function ajouterUe($id, $codeUe, $nomUe) {
	if (verifResponsable($id)) {
		$query = 'insert into ue values("","'.$codeUe.'","'.$nomUe.'")';
		mysql_query($query) or die ("Impossible d'inserer une UE");
	}
}

//fonction d'ajout de cours dediee au responsable pedagogique
function ajoutCours($id,$nomCours, $description, $coef, $quantum, $destination, $idUe) {
	if (verifResponsable($id)) {
		$query1 = 'insert into cours values("","'.$nomCours.'","'.$description.
			'","'.$coef.'","'.$quantum.'","'.$destination.'"');
		mysql_query($query1) or die ("Impossible d'ajouter un cours");

		$query2 = 'insert into coursue values(LAST_INSERT_ID() ,"'.$idUe.'")';
		mysql_query($query2) or die("Impossible d'ajouter le cours dans une UE");
	}
}
?>