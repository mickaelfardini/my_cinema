<?php

include(dirname(__FILE__) . '/../models/film.php');

$film = getFilm($_GET['film']);
$img = getPoster($film['titre']);
$comments = getComments($_GET['film']);
if (isset($_POST['viewed']))
{
	addHistory($_COOKIE['username'], $_GET['film']);
}
if (isset($_POST['avis']) && $_POST['avis'] != "")
{
	pushComment($_COOKIE['username'], $_GET['film'], $_POST['avis']);
}
include(dirname(__FILE__) . '/../views/film.php');