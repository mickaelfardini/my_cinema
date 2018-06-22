<?php

include(dirname(__FILE__) . '/../models/films.php');
$films = getFilms(null,null,null,null,9, true);
$gender = getGender();

if (!empty($_POST))
{ 
	$films = checkPost($_POST);
}

$nbr_page = ceil(count($films) / 10);
include(dirname(__FILE__) . '/../views/films.php');