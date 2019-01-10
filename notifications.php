<?php
	require_once 'core/init.php';
	$user = new user;
	$db = DB::getInstance();
	$profile = json_decode($user->data()->profile);

	if(input::exists('request'))
	{
		if (input::get('getnotes'))
		{
			if (isset($profile->notifications))
			{
				echo json_encode($profile->notifications);
				
			}
		}
		else if (input::get('addnotes'))
		{
			$profile->notifications[] = input::get('addnotes');
			$user->update(array('profile' => json_encode($profile)));			
		}
		else if(input::get('removenotes'))
		{
			unset($profile->notifications);
			$user->update(array('profile' => json_encode($profile)));
		}
	}
?>