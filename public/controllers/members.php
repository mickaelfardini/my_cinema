<?php

include(dirname(__FILE__) . '/../models/members.php');

if (isset($_GET['id_member']))
{
	$member = getMembers($_GET['id_member']);
}
else
{
	$members = getMembers();
}

include(dirname(__FILE__) . '/../views/members.php');