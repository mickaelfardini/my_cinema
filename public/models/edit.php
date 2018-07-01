<?php

function idFilms(array $request)
{
	global $db;
	$req = $db->prepare('SELECT * FROM film WHERE id_film=:id');
	$req->bindParam(':id', $request[0]);
	$req->execute();
	return $req->fetchAll();
}

function delete(array $request)
{
	global $db;
	$req = $db->prepare('DELETE FROM articles WHERE id=:id');
	$req->bindParam(':id', $request[0]);
	$req->execute();
}

function updateEdit(array $request)
{
	global $db;

	$req = $db->prepare('UPDATE articles
							SET title = :title, 
								content = :content, 
								imgurl = :url
							WHERE id = :id');
	$req->bindParam(':title', $request[0]);
	$req->bindParam(':content', $request[1]);
	$req->bindParam(':url', $request[2]);
	$req->bindParam(':id', $request[3]);
	$req->execute();

}