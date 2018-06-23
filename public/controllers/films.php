<?php

include(dirname(__FILE__) . '/../models/films.php');
$films = getFilms(null, null, null, null, 9, 0, true);
$gender = getGender();

if (count($_GET) > 2)
{
	if (!isset($_GET['id']))
	{
		$_GET['id'] = "1";
	}
	$offset = ($_GET['id'] -1) * $_GET['limit'];
	$films = checkPost($_GET, $offset);
	$nbr_page = ceil(countResult($_GET) / $_GET['limit']);
}

include(dirname(__FILE__) . '/../views/films.php');