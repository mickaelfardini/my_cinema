<?php

function idFilms(array $request)
{
	global $db;
	$id = array();

	$query = $db->prepare('SELECT * FROM film WHERE id_film=:id');
	$query->bindParam(':id', $request[0]);
	$query->execute();

	while ($data = $query->fetch()) {
		$id[] = $data;
	}
	return $id;

}

function delete(array $request)
{
	global $db;

	$query = $db->prepare('DELETE FROM articles WHERE id=:id');
	$query->bindParam(':id', $request[0]);
	$query->execute();
}

function updateEdit(array $request)
{
	global $db;

	$query = $db->prepare('UPDATE articles
							SET title = :title, 
								content = :content, 
								imgurl = :url
							WHERE id = :id');
	$query->bindParam(':title', $request[0]);
	$query->bindParam(':content', $request[1]);
	$query->bindParam(':url', $request[2]);
	$query->bindParam(':id', $request[3]);
	$query->execute();

}