<?php
	
function delete(array $request)
{
	global $db;

	$req = $db->prepare('DELETE FROM films WHERE id_film=:id');
	$req->bindParam(':id', $request[0]);
	$req->execute();
}

function countResult(array $request, int $offset = 0)
{
	return count(getFilms(null, null, null, null));
}