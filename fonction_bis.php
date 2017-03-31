<?php
// definition des fonction ici
	function connexion_base(){
		$host="localhost";
		$user="root";
		$bdd="ummisco";
		$pwd="";
		mysql_connect($host,$user,$pwd) or die(" Erreur de connexion au serveur");
		mysql_select_db($bdd)or die(" Erreur de connexion a la base de données");
	}

	//fonction qui verifie qu'un enseignant est ou pas un responsable pedagogique
	function verifResponsable($id) {
		$query = 'select * from professeur where idProfesseur="'.$id.'" and role not null';
		$result = mysql_query($query);
		if ($row = mysql_fetch_row($result))
			return true;
		else
			return false;
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