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
	$req = $db->prepare('UPDATE membre
		SET id_abo = :abo
		WHERE id_membre = :id');
	$req->bindParam(':abo', $request['id_abo']);
	$req->bindParam(':id', $request['id_membre']);
	$req->execute();

	$req = $db->prepare('UPDATE fiche_personne
		SET prenom = :prenom,
			nom = :nom,
			email = :email,
			cpostal = :cpostal,
			ville = :ville
		WHERE id_perso = :id');
	$req->bindParam(':prenom', $request['prenom']);
	$req->bindParam(':nom', $request['nom']);
	$req->bindParam(':email', $request['email']);
	$req->bindParam(':cpostal', $request['cpostal']);
	$req->bindParam(':ville', $request['ville']);
	$req->bindParam(':id', $request['id_membre']);
	$req->execute();
}