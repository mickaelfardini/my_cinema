<?php

function getMembers($id = null)
{
	global $db;

	$query = "SELECT membre.*,fiche_personne.*, abonnement.id_abo, abonnement.nom as aboname 
		FROM membre
		JOIN fiche_personne 
		ON membre.id_fiche_perso = fiche_personne.id_perso
		JOIN abonnement
		ON membre.id_abo = abonnement.id_abo";
	$query .= $id == null ? "" : " WHERE membre.id_membre = :id";

	$req = $db->prepare($query . " ORDER BY id_membre ASC");
	if ($id !== null)
	{
		$req->bindValue(":id", (int) $id);
	}
	$req->execute();

	return $req->fetchAll();
}