<?php

function isAdmin($name)
{
	global $db;
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

function queryFilm($title = null, string $gender = null,
	$year = null, $time = null,
	$limit = null, $offset = null, bool $rand = false)
{
	$query = "SELECT *, UPPER(genre.nom) AS up_nom
	FROM film, genre
	WHERE genre.id_genre = film.id_genre";
	if ($title !== null) {
		$query .= " AND film.titre LIKE :title";
	}
	if ($gender !== null) {
		$query .= " AND genre.nom = :gender";
	}
	if ($year !== null) {
		$query .= " AND film.annee_prod = :year";
	}
	if ($time !== null)	{
		$query .= " AND film.date_debut_affiche <= :time AND 
					film.date_fin_affiche >= :time";
	}
	if ($rand !== false) {
		$query .= " ORDER BY RAND()";
	}
	if ($limit !== null) {
		$query .= " LIMIT :limit";
	}
	if ($offset !== null) {
		$query .= " OFFSET :offset";
	}
}
function getFilms($title = null, string $gender = null,
	$year = null, $time = null,
	$limit = null, $offset = null)
{
	global $db;
	$req = $db->prepare($query);
	if ($title !== null) {
		$req->bindValue(":title", "%".$title."%");
	}
	if ($gender !== null) {
		$req->bindValue(":gender", $gender);
	}
	if ($year !== null) {
		$req->bindValue(":year", $year);
	}
	if ($time !== null) {
		$req->bindValue(":time", $time);
	}
	if ($limit !== null) {
		$req->bindValue(":limit", (int) trim($limit), PDO::PARAM_INT);
	}
	if ($offset !== null) {
		$req->bindValue(":offset", (int) trim($offset), PDO::PARAM_INT);
	}
	$req->execute();
	return $req->fetchAll();
}

function getPoster($title)
{
	$url = "http://www.omdbapi.com/?apikey=904c8570&t=" . urlencode($title);
	$content = file_get_contents($url);
	$img = json_decode($content, true);
	$img = $img['Response'] == "True" ? $img['Poster'] : "data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1642e2d867c%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1642e2d867c%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2299.125%22%20y%3D%2296.3%22%3EImage%20cap%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E";
	return $img;
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