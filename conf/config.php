<?php

$dbname = 'epitech_tp';
$host = 'localhost';
$user = 'root';
$password = '';

$dsn = 'mysql:dbname=' . $dbname . ';host=' . $host;


try {
	$db = new PDO($dsn,$user,$password);
	
} catch (Exception $e) {
	echo $e->getMessage();
}
