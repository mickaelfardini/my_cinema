<?php

function getAbos()
{
	global $db;
	$films = array();

	$req = $db->prepare("SELECT * FROM abonnement ORDER BY prix DESC");
	$req->execute();

	while ($data = $req->fetch()) {
		$subs[] = $data;
	}
	return $subs;
}