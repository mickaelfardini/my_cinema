<?php

include(dirname(__FILE__) . '/../models/admin.php');
var_dump($_GET);
	if (!isset($_GET['id']))
	{
		$_GET['id'] = "1";
	}
	$offset = ($_GET['id'] -1) * 10;
	$films = getFilms(null, null, null, null, 10, $offset, false);
	$nbr_page = ceil(countResult($_GET) / 10);
include(dirname(__FILE__) . '/../views/admin.php');