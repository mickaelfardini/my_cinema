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

function getFilms($title = null, $gender = "genre.nom",
					$year = "film.annee_prod", $time = "film.duree_min",
					$limit = 9)
{
	global $db;
	$films = array();
	$query = "SELECT *, UPPER(genre.nom), * AS up_nom
		FROM film, genre, images 
		WHERE genre.id_genre = film.id_genre
		AND film.titre LIKE \"%" . $title .
		"%\" AND genre.nom = " . $gender .
		" AND film.annee_prod = " . $year .
		" AND film.duree_min <= " . $time .
		" ORDER BY RAND() LIMIT " . $limit;
		// var_dump($query);
	// $req = $db->query('SELECT * FROM film ORDER BY id_film LIMIT 15');
	// $req = $db->prepare('SELECT *, UPPER(genre.nom) AS up_nom
	// 	FROM film, genre 
	// 	WHERE genre.id_genre = film.id_genre 
	// 	AND film.titre = ?
	// 	ORDER BY RAND() LIMIT 9');

	$req = $db->prepare($query);
	$req->execute();

	while ($data = $req->fetch()) {
		$films[] = $data;
	}
	return $films;

}