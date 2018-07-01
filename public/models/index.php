<?php

function getTop()
{
	global $db;
	$req = $db->prepare("SELECT historique_membre.id_film, film.* FROM historique_membre, film
		WHERE historique_membre.id_film = film.id_film
		GROUP BY historique_membre.id_film
		ORDER BY COUNT(historique_membre.id_film) DESC
		LIMIT 5");
	$req->execute();
	return $req->fetchAll();
}