<?php

include(dirname(__FILE__) . '/../models/films.php');
$films = getFilms(null,null,null,null,9, true);
$gender = getGender();
include(dirname(__FILE__) . '/../views/films.php');

$nbr_page = ceil(count($films) / 10);
echo $nbr_page;