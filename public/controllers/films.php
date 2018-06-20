<?php

include(dirname(__FILE__) . '/../models/films.php');
$films = getFilms();
include(dirname(__FILE__) . '/../views/films.php');