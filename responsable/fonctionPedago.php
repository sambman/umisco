<?php
// definition de la fonction de connexion a la base de Donné
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

//fonction qui verifie qu'un enseignant est ou pas un responsable pedagogique
function verifResponsable($id) {
	$query = 'select * from professeur where idProfesseur="'.$id.'" and role not null';
	$result = mysql_query($query);
	if ($row = mysql_fetch_row($result))
		return true;
	else
		return false;
}
//fonction qui ajoute un support
function ajouterSupport($nom, $type, $destination, $idProfesseur){
	$query='insert into support values("","'.$nom.'","'.$type.'","'.$destination.'")';
	mysql_query($query) or die(' Erreur d insertion de support'.$query.mysql_error());
	ajoutProfSup($idProfesseur);
}

//fonction qui ajoute les infos du planning
function ajoutPlanning($id, $dated, $datef, $heured, $heuref, $cours){
	 
		$query='insert into planning values("","'.$dated.'","'.$datef.'","'.$heured.'","'.$heuref.'","'.$cours.'","'.$id.'")';
		mysql_query($query) or die(' Erreur d insertion des infos du planning'.$query.mysql_error());
	
}
function delete_planning($id){
	$query='delete from planning  where idPlanning="'.$id.'"';
    $result=mysql_query($query);  
  	return $result;
}


function getPlaning_byId($id)
{
	$query='select * from planning where idPlanning="'.$id.'"';
	$result=mysql_query($query);
	return $result;	
}

function update_planning($id, $dated, $datef, $heured, $heuref, $cours)
{
$query='update planning set date_debut="'.$dated.'", date_fin="'.$datef.'", heure_debut="'.$heured.'", heure_fin="'.$heuref.'", cours="'.$cours.'" where idPlanning="'.$id.'"';
$result=mysql_query($query);
return $result;
}

//lister les infos du planning
function listerPlanningProf(){
	$query='select * from professeur, planning, utilisateur where professeur.idProfesseur=planning.idProfesseur and professeur.idProfesseur=utilisateur.id_user order by professeur.idProfesseur';
	$result=mysql_query($query);
	return $result;	
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

function cpt(){
	$query='select distinct nomCours from etudiant,cours,note,utilisateur where note.idEtudiant=etudiant.idEtudiant and note.idCours=cours.idCours and etudiant.idEtudiant=utilisateur.id_user order by etudiant.idEtudiant';
	$result=mysql_query($query);
	return $result;

}
//lister notes
function listerTous(){
	$query='select * from etudiant,cours,note,utilisateur where note.idEtudiant=etudiant.idEtudiant and note.idCours=cours.idCours and etudiant.idEtudiant=utilisateur.id_user order by etudiant.idEtudiant';
	$result=mysql_query($query);
	return $result;
}
function listerNotes(){
	$query="select * from note";
	$result=mysql_query($query);
	return $result;	
}
//lister cours a partir de note
function listerCoursBy_note(){
	$query='select * from cours' ;
	$result=mysql_query($query);
	return $result;	
}
//lister etudiants a partit de note
function ListeretudiantsBy_note(){
	$query='select * from utilisateur where type_user=3 and valide=0';
	$result=mysql_query($query);
	return $result;	
}

//fonction qui ajoute une UE
function ajouterUe($id, $nomUe,$libelleUe) {
  $query = 'insert into ue values("","'.$nomUe.'","'.$id.'","'.$libelleUe.'")';
  mysql_query($query) or die ("Impossible d'inserer une UE");
	
}

function Listerue()
{
	$query="select *  from ue";
	$result=mysql_query($query);
	return $result;
}

function getId_nomUe($nom)
{
	$query='select idUe  from ue where nomUe="'.$nom.'"';
	$result=mysql_query($query);
	return $result;	

}

function getUe_byId($id)
{
	$query='select * from ue where idUe="'.$id.'"';
	$result=mysql_query($query);
	return $result;	
}

function update_ue($code, $libelle, $id)
{
$query='update ue set nomUe="'.$code.'",libelle="'.$libelle.'" where idUe="'.$id.'"';
$result=mysql_query($query);
return $result;
}

function delete_ue($id){
	$query='delete from ue  where idUe="'.$id.'"';
    $result=mysql_query($query);  
  	return $result;
}

function getId_prof($prof)
{

	return substr($prof,(strpos($prof, ':')+1));	

}



function getCours_byId($id)
{
	$query='select * from cours where idCours="'.$id.'"';
	$result=mysql_query($query);
	return $result;	

}



function Listercours()
{
	$query="select *  from cours";
	$result=mysql_query($query);
	return $result;
}
function delete_cours($id){
	$query='delete from cours  where idCours="'.$id.'"';
    $result=mysql_query($query);  
  	return $result;
}
function update_cours($nom, $des, $coef, $credit, $categorie, $id)
{

$query='update cours set nomCours="'.$nom.'",description="'.$des.'", coefficient="'.$coef.'", credit="'.$credit.'", categorie="'.$categorie.'" where idCours="'.$id.'"';
$result=mysql_query($query);
return $result;
}

function Listerprofs()
{
	$query="select *  from utilisateur where valide=0 and type_user=1";
	$result=mysql_query($query);
	return $result;
}

function Listeretudiants()
{
	$query='select *  from utilisateur where valide=1 and type_user=3';
	$result=mysql_query($query);
	return $result;
}

//fonction d'ajout de cours dediee au responsable pedagogique
function ajoutCours($nomCours, $description, $coef,  $credit, $categorie, $idUe) {
	
		$query1 = 'insert into cours values("","'.$nomCours.'","'.$description.'","'.$coef.'","'.$credit.'","'.$categorie.'")';
		mysql_query($query1) or die ("Impossible d'ajouter un cours");

		$query2 = 'insert into coursue values(LAST_INSERT_ID() ,"'.$idUe.'")';
		mysql_query($query2) or die("Impossible d'ajouter le cours dans une UE");
	
}

## definition etudiant
function Update_to_etudiant($id)
{
	$query='update utilisateur set valide="0" where id_user="'.$id.'"';
	$result=mysql_query($query);
	return $result;

}

?>