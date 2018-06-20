<?php

function register(array $request)
{
	global $db;
	$hash = password_hash($request[1], PASSWORD_DEFAULT);
	
	$query = $db->prepare('INSERT INTO users (name, password) VALUES(:user, :pass)');
	$query->bindParam(':user', $request[0]);
	$query->bindParam(':pass', $hash);
	$query->execute();
	var_dump($query);
	if (!$query) {
    echo "\nPDO::errorInfo():\n";
    var_dump($db->errorInfo());
}
	// var_dump($hash);
}