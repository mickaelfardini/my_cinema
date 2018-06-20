<?php

include(dirname(__FILE__) . '/../models/index.php');
$films = getFilms();
$top = getFilms("Goodfellas");
include(dirname(__FILE__) . '/../views/index.php');