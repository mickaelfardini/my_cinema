<?php

include(dirname(__FILE__) . '/../models/films.php');
$films = getFilms(null,null,null,null,9);
include(dirname(__FILE__) . '/../views/films.php');