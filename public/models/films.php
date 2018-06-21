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
	return getFilms($request['title'], $gender, $year, $time, $request['limit']);
}