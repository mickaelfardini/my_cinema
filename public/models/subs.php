<?php

function getAbos()
{
	global $db;

	$req = $db->prepare("SELECT * FROM abonnement ORDER BY prix DESC");
	$req->execute();
	return $req->fetchAll();
}