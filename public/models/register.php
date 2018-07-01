<?php

function register(array $request)
{
	global $db;
	if ($request[0] == "" || $request[1] == "")
	{
		return false;
	}
	$hash = password_hash($request[1], PASSWORD_DEFAULT);
	
	$req = $db->prepare('INSERT INTO users (name, password) VALUES(:user, :pass)');
	$req->bindParam(':user', $request[0]);
	$req->bindParam(':pass', $hash);
	$req->execute();
}