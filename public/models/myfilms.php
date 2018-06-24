<?php

function countHistory($username)
{
	return count(getHistory($username));
}

function getHistory($username, $limit = null, $offset = null)
{

	$id = getUserId($username);
	global $db;
	$films = array();
	$query = "SELECT * FROM film
				JOIN historique_membre
				ON film.id_film = historique_membre.id_film
				WHERE historique_membre.id_membre = :id";
	if ($limit !== null)
	{
		$query .= " LIMIT :limit";
	}
	if ($offset !== null)
	{
		$query .= " OFFSET :offset";
	}
	$req = $db->prepare($query);
	$req->bindValue(":id", (int) trim($id['id']), PDO::PARAM_INT);
	if ($limit !== null)
	{
		$req->bindValue(":limit", (int) trim($limit), PDO::PARAM_INT);
	}
	if ($offset !== null)
	{
		$req->bindValue(":offset", (int) trim($offset), PDO::PARAM_INT);
	}
	$req->execute();

	while ($data = $req->fetch()) {
		$films[] = $data;
	};
	return $films;
}

function getUserId($username)
{
	global $db;

	$req = $db->prepare(
		"SELECT id FROM users
		WHERE name = :username");
	$req->bindValue(":username", $username);
	$req->execute();

	return $req->fetch();
}