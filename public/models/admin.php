<?php
	
function delete(array $request)
{
	global $db;

	$query = $db->prepare('DELETE FROM films WHERE id_film=:id');
	$query->bindParam(':id', $request[0]);
	$query->execute();
}