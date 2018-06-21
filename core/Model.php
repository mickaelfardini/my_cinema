<?php

function isAdmin($name)
{
	global $db;
	$admin = false;

	$req = $db->prepare('SELECT admin FROM users WHERE name=:name');

	$req->bindParam(':name', $name);
	$req->execute();

	$result = $req->fetch();

	if ($result['admin'] == 1) {
		return true;
	}
	else
	{
		return false;
	}

}

function isConnected()
{
	if (isset($_COOKIE['username'])) {
		return true;
	}
	else {
		return false;
	}
}

function getFilms($title = null, string $gender = null,
	int $year = null, int $time = null,
	int $limit = null)
{
	global $db;
	$films = array();

	$query = "SELECT *, UPPER(genre.nom) AS up_nom
				FROM film, genre
				WHERE genre.id_genre = film.id_genre";
	if ($title !== null)
	{
		$query .= " AND film.titre LIKE :title";
	}
	if ($gender !== null)
	{
		$query .= " AND genre.nom = :gender";
	}
	if ($year !== null)
	{
		$query .= " AND film.annee_prod = :year";
	}
	if ($time !== null)
	{
		$query .= " AND film.duree_min <= :time";
	}
	if ($limit !== null)
	{
		$query .= " ORDER BY RAND() LIMIT :limit";
	}
	$req = $db->prepare($query);
	if ($title !== null)
	{
		$req->bindValue(":title", "%".$title."%");
	}
	if ($gender !== null)
	{
		$req->bindValue(":gender", $gender);
	}
	if ($year !== null)
	{
		$req->bindValue(":year", $year);
	}
	if ($time !== null)
	{
		$req->bindValue(":time", $time);
	}
	if ($limit !== null)
	{
		$req->bindValue(":limit", (int) trim($limit), PDO::PARAM_INT);
	}
	$req->execute();

	while ($data = $req->fetch()) {
		$films[] = $data;
	}
	return $films;
}