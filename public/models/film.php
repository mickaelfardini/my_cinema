<?php

function getFilm($id)
{
	global $db;

	$req = $db->prepare("SELECT * FROM film WHERE id_film = :id");
	$req->bindValue(":id", $id);
	$req->execute();

	return $req->fetch();
}

function addHistory($username, $film)
{
	global $db;
	$id = getUserId($username);
	$req = $db->prepare("INSERT INTO historique_membre
							VALUES (:member, :film, NOW())");
	$req->bindValue(":member", (int) trim($id['id']), PDO::PARAM_INT);
	$req->bindValue(":film", (int) $film, PDO::PARAM_INT);
	$req->execute();
}

function pushComment($username, $film, $content)
{
	global $db;
	$id = getUserId($username);
	$req = $db->prepare("INSERT INTO avis
							VALUES (:film, :member, :content)");
	$req->bindValue(":film", (int) $film, PDO::PARAM_INT);
	$req->bindValue(":member", (int) trim($id['id']), PDO::PARAM_INT);
	$req->bindValue(":content", $content);
	$req->execute();
}

function getComments($id)
{
	global $db;

	$req = $db->prepare("SELECT content FROM avis
							WHERE id_film = :id");
	$req->bindValue(":id", (int) $id, PDO::PARAM_INT);
	$req->execute();
	return $req->fetchAll();
}