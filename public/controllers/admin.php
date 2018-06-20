<?php

include(dirname(__FILE__) . '/../models/admin.php');
$films = getFilms();
include(dirname(__FILE__) . '/../views/admin.php');