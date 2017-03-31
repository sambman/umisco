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

function getPassword_Admin_by_login($login)
{
	$query=' select motpassadmin from admin where login_admin="'.$login.'"';
	$result=mysql_query($query);
	return $result;
}

function getuser_by_login($login)
{
	$query=' select *  from utilisateur where login="'.$login.'"';
	$result=mysql_query($query);
	return $result;
}





################################## Fonctions Ajout d'un Utilsateur######################################### 


###########    Ajout Etudiant

function addEtudiant($login,$password,$nom,$prenom,$email,$num_tel,$numeroCarte,$option)
{
	// ajout dans la table utilsateur
	$query='insert into utilisateur values("","'.$login.'","'.$password.'","'.$nom.'","'.$prenom.'","'.$email.'","'.$num_tel.'",0,3)';
	mysql_query($query) or die(' Erreur de linsertion a la base de données'.$query.mysql_error());

	//recupartion de l'ID
	$id=mysql_insert_id();
	// Ajout dans la table Etudiant
	$query='insert into etudiant values("'.$id.'","'.$numeroCarte.'","'.$option.'")';
	mysql_query($query) or die(' Erreur de linsertion a la base de données'.$query.mysql_error());
}

#####################  Ajout Professeur


function addProfesseur($login,$password,$nom,$prenom,$email,$num_tel,$grade,$specialite)
{
	// ajout dans la table utilsateur
	$query='insert into utilisateur values("","'.$login.'","'.$password.'","'.$nom.'","'.$prenom.'","'.$email.'","'.$num_tel.'",0,1)';
	mysql_query($query) or die(' Erreur de linsertion a la base de données'.$query.mysql_error());

	//recupartion de l'ID
	$id=mysql_insert_id();
	// Ajout dans la table Etudiant
	$query='insert into professeur values("'.$id.'","'.$grade.'","'.$specialite.'","NULL")';
	mysql_query($query) or die(' Erreur de linsertion a la base de données'.$query.mysql_error());

}

#Ajout chercheur
function addchercheur($login,$password,$nom,$prenom,$email,$num_tel,$domaine)
{

	// ajout dans la table utilsateur
	$query='insert into utilisateur values("","'.$login.'","'.$password.'","'.$nom.'","'.$prenom.'","'.$email.'","'.$num_tel.'",0,2)';
	mysql_query($query) or die(' Erreur de linsertion a la base de données'.$query.mysql_error());

	//recupartion de l'ID
	$id=mysql_insert_id();
	// Ajout dans la table Etudiant
	$query='insert into chercheur values("'.$id.'","'.$domaine.'")';
	mysql_query($query) or die(' Erreur de linsertion a la base de données'.$query.mysql_error());

}


####################################   Responsable pédagogique ###################################################
									
#FOnction qui selectionne tous les proff
function getProfesseurs()
{
	$query='select * from utilisateur where valide="0" and type_user="1"';
	$result=mysql_query($query);
	return $result;	
}

# Recuperation des profs qui ne sont pas responsables pedagoqigues
function getProfesseursbyId($id)
{
	$query='select * from professeur where idProfesseur="'.$id.'"';
	$result=mysql_query($query);
	return $result;

}

## definition en responsable pedago
function Update_to_responsable_pedago($id)
{
	$query='update professeur set role="1" where idProfesseur="'.$id.'"';
	$result=mysql_query($query);
	return $result;

}
##  Enlever la fonction de responsable pedago

function Update_responsable_pedago_prof($id)
{
	$query='update professeur set role="NULL" where idProfesseur="'.$id.'"';
	$result=mysql_query($query);
	return $result;
}





###########################################################################################################################

function listingUser()
{
	$query="select * from utilisateur";
	$result=mysql_query($query);
	return $result;	
}

function listingUser_by_type_user($type)
{
	$query='select * from utilisateur where type_user="'.$type.'"';
	$result=mysql_query($query);
	return $result;	
}
function listingUserNonValide()
{
	$query='select * from utilisateur where valide="1"';
	$result=mysql_query($query);
	return $result;	
}

function valider($id)
{
	$query='update utilisateur set valide="0" where id_user="'.$id.'"';
	mysql_query($query) or die(' Erreur de linsertion a la base de données'.$query.mysql_error());	
}

function delete($id)
{
	$query='delete from utilisateur  where id_user="'.$id.'"';
	mysql_query($query) or die(' Erreur de linsertion a la base de données'.$query.mysql_error());	
}

function update_user($login,$nom,$prenom,$numtel,$email,$type,$password)
{

$query='update utilisateur set motpass="'.$password.'",nom="'.$nom.'",prenom="'.$prenom.'",
email="'.$email.'",num_tel="'.$numtel.'",type="'.$type.'" where login="'.$login.'"
';
mysql_query($query)or die(' Erreur dans la mise à jour de la base de données'.$query.mysql_error());

}
?>