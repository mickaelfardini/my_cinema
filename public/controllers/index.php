<?php

include(dirname(__FILE__) . '/../models/index.php');
$films = getFilms();
include(dirname(__FILE__) . '/../views/index.php');