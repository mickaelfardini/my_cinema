<?php

function checkPost(array $request)
{
	$gender = $request['gender'];
	$year = $request['year'];
	$time = $request['time'];

	if ($gender == "")
	{
		$gender = null;
	}
	if ($year == "")
	{
		$year = null;
	}
	if ($time == "")
	{
		$time = null;
	}
	return getFilms($request['title'], $gender, $year, $time/*, $request['limit']*/);
}

function getGender()
{
	global $db;
	$gender = array();

	$req = $db->prepare('SELECT nom FROM genre');
	$req->execute();

	while ($data = $req->fetch())
	{
		$gender[] = $data;
	}

	return $gender;
}

function getCount()
{
	global $db;
	$count = array();

	$req = $db->prepare();
	$req->execute();

	while ($data = $req->fetch())
	{
		$count[] = $data;
	}

	return $count;
}