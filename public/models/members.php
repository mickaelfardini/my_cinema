<?php

function getMembers($id = null)
{
	global $db;

	$query = "SELECT membre.*,fiche_personne.*, abonnement.id_abo, abonnement.nom as aboname 
	FROM membre
	JOIN fiche_personne 
	ON membre.id_fiche_perso = fiche_personne.id_perso
	JOIN abonnement
	ON membre.id_abo = abonnement.id_abo
	AND abonnement.id_abo = abonnement.id_abo";
	$query .= $id == null ? "" : " WHERE membre.id_membre = :id";

	$req = $db->prepare($query . " ORDER BY id_membre ASC");
	if ($id !== null)
	{
		$req->bindValue(":id", (int) $id);
	}
	$req->execute();

	return $req->fetchAll();
}

function updateMember(array $request)
{
	global $db;

	$query = $db->prepare('UPDATE membre
		SET id_abo = :abo
		WHERE id_membre = :id');
	$query->bindParam(':abo', $request['id_abo']);
	$query->bindParam(':id', $request['id_membre']);
	$query->execute();

	$query = $db->prepare('UPDATE fiche_personne
		SET prenom = :prenom,
			nom = :nom,
			email = :email,
			cpostal = :cpostal,
			ville = :ville
		WHERE id_perso = :id');
	$query->bindParam(':prenom', $request['prenom']);
	$query->bindParam(':nom', $request['nom']);
	$query->bindParam(':email', $request['email']);
	$query->bindParam(':cpostal', $request['cpostal']);
	$query->bindParam(':ville', $request['ville']);
	$query->bindParam(':id', $request['id_membre']);
	$query->execute();
}