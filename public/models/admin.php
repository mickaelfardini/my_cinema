<?php
	
function delete(array $request)
{
	global $db;

	$query = $db->prepare('DELETE FROM articles WHERE id=:id');
	$query->bindParam(':id', $request[0]);
	$query->execute();
}