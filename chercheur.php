<?php

	function verifier_chercheur($id_chercheur)
	{
		$query='select into chercheur where idChercheur="'.$id_chercheur.'"';
		$result=mysql_query($query);
		if ($row=mysql_fetch_row($result))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function verifier_article($id_article)
	{
		$query='select into article where idArticle="'.$id_article.'"';
		$result=mysql_query($query);
		if ($row=mysql_fetch_row($result))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function publier_article($titre_article,$date_article,$contenu_article,$id_chercheur)
	{
		$titre_article=htmlspecialchars($titre_article);
		$date_article=htmlspecialchars($date_article);
		$contenu_article=htmlspecialchars($contenu_article);
		$id_chercheur=htmlspecialchars($id_chercheur);
		if (verifier_chercheur($id_chercheur))
		{
			$query='insert into article Values("","'.$titre_article.'","'.$date_article.'","'.$contenu_article.'","'.$id_chercheur.'")';
			mysql_query($query);
		}
		else
			echo "Ce chercheur n\'existe pas";
		
	}	

	function uploading_file($nomFichier , $repertoire)
	{
		if (move_uploaded_file($nomFichier["tmp_name"], $repertoire.$nomFichier["name"]))
			return true;
		else
			return false;
	}

	function modifier_article ($id_article,$contenu_article,$id_chercheur)
	{
		$id_article=htmlspecialchars($id_article);
		$contenu_article=htmlspecialchars($contenu_article);
		$id_chercheur=htmlspecialchars($id_chercheur);
		if ((verifier_chercheur($id_chercheur)) && (verifier_article($id_article)))
		{
			$query='UPDATE article SET contenu_article ="'.$contenu_article.'" WHERE idArticle="'.$id_article.'" and idChercheur="'.$id_chercheur.'"';
			mysql_query($query) or die ("Erreur dans la mise a jour".$query.mysql_error());
		}
	} 

	function partager_document($nom_document,$adresse_doc,$id_chercheur)
	{
		$nom_document=htmlspecialchars($nom_document);
		$adresse_doc=htmlspecialchars($adresse_doc);
		$id_chercheur=htmlspecialchars($id_chercheur);
		$query='insert into article Values("","'.$nom_document.'","'.$adresse_doc.'","'.$id_chercheur.'")';
		mysql_query($query) or die ("Erreur d\'insertion d\'un nouveau document".$query.mysql_error());
	}	

	function organiser_VC($themeVD,$dateVD,$heureVD,$id_chercheur)
	{
		$themeVD=htmlspecialchars($themeVD);
		$dateVD=htmlspecialchars($dateVD);
		$heureVD=htmlspecialchars($heureVD);
		$id_chercheur=htmlspecialchars($id_chercheur);
		$query='insert into article Values("","'.$themeVD.'","'.$dateVD.'","'.$heureVD.'","'.$id_chercheur.'")';
		mysql_query($query) or die ("Erreur d\'ajout d\'une nouvelle video".$query.mysql_error());
	}	
?>