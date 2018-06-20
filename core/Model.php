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

function getFilms()
{
	global $db;
	$films = array();

	// $req = $db->query('SELECT * FROM film ORDER BY id_film LIMIT 15');
	$req = $db->query('SELECT *, UPPER(genre.nom) AS up_nom FROM film, genre WHERE genre.id_genre = film.id_genre LIMIT 9');

	while ($data = $req->fetch()) {
		$films[] = $data;
	}
	return $films;

}