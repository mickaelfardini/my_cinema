<?php

function register(array $request)
{
	global $db;

	$hash = password_hash($request[1], PASSWORD_DEFAULT);
	
	$query = $db->prepare('INSERT INTO users (name, password) VALUES(:username, :password);');
	$query->bindParam(':username', $request[0]);
	$query->bindParam(':password', $hash);
	$query->execute();

}