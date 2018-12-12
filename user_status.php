<?php
	require_once 'core/init.php';

	$user = new user;
	if(input::exists('request'))
	{
		if (input::get('action') == 'login') {
			if($user->isloggedin())
				echo 1;
			else
				echo 0;
		}
		if(input::get('action') == 'p.p')
		{
			$test = $user->data()->profile;
			$test = json_decode($test);
			if (isset($test['p.p']))
				echo 1;
			else
				echo 0;
		}
	}
?>