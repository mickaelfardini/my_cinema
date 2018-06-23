<?php
if (!isConnected() || !isAdmin($_COOKIE['username'])) {
	header('Location: index.html');
}

include 'inc/header.php';
include 'inc/navbar.php';
include 'inc/banner.php';
?>