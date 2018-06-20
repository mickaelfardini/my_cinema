<?php

include(dirname(__FILE__) . '/../models/edit.php');

$films = getFilms();

include(dirname(__FILE__) . '/../views/edit.php');