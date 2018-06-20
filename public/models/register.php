<?php

function register(array $request)
{
	global $db;
	if ($request[0] == "" || $request[1] == "")
	{
		return false;
	}
	$hash = password_hash($request[1], PASSWORD_DEFAULT);
	
	$query = $db->prepare('INSERT INTO users (name, password) VALUES(:user, :pass)');
	$query->bindParam(':user', $request[0]);
	$query->bindParam(':pass', $hash);
	$query->execute();
}