<?php

include(dirname(__FILE__) . '/../models/myfilms.php');

if (!isset($_GET['id']))
{
	$_GET['id'] = "1";
}
$offset = ($_GET['id'] -1) * 9;
$films = getHistory($_COOKIE['username'], 9, $offset);
$nbr_page = ceil(countHistory($_COOKIE['username'])/9);

include(dirname(__FILE__) . '/../views/myfilms.php');