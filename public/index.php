<?php
ob_start();

require_once ('../conf/config.php');
require_once ('../core/Controller.php');

if(!empty($_GET['page']) AND is_file('controllers/' . $_GET['page'] . '.php'))
{
	include ('controllers/' . $_GET['page'] . '.php');
}
else {
	include ('controllers/index.php');
}

ob_end_flush();
?>