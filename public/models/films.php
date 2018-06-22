<?php

function checkPost(array $request, int $offset)
{
	$gender = ($request['gender'] == "") ? null : $request['gender'];
	$time = ($request['time'] == "") ? null : $request['time'];
	$year = ($request['year'] == "") ? null : $request['year'];

	$nbr_page = count(getFilms($request['title'], $gender, $year, $time));
	return getFilms($request['title'], $gender, $year, $time, $request['limit'], $offset);
}

function countResult(array $request, int $offset = 0)
{
	$gender = ($request['gender'] == "") ? null : $request['gender'];
	$time = ($request['time'] == "") ? null : $request['time'];
	$year = ($request['year'] == "") ? null : $request['year'];

	return count(getFilms($request['title'], $gender, $year, $time));
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