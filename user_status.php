<?php
	require_once 'core/init.php';

	$user = new user;
	if($user->isloggedin())
		echo 1;
	else
		echo 0;
?>