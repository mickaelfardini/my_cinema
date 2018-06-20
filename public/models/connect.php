<?php

function connect(array $request)
{
	global $db;

	$query = $db->prepare('SELECT password FROM users WHERE name = :username');
	$query->bindParam(':username', $request[0]);
	$query->execute();
	$result = $query->fetch();
	$hash = $result[0];
	
	$correctPassword = password_verify($request[1], $hash);

	if ($correctPassword) {
		setcookie('username', $request[0], time() + 365*24*3600, null, null, false, true);

		return true;
	}
	else
	{
		return false;
	}
}