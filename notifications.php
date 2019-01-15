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
				
			}else{
				echo "0";
			}
		}
		else if (input::get('addnotes'))
		{
			$user2 = new user(input::get('name'));
			$profile2 = json_decode($user2->data()->profile);
			$profile2->notifications[] = input::get('addnotes');
			$user2->update(array('profile' => json_encode($profile)));			
		}
		else if(input::get('removenotes'))
		{
			unset($profile->notifications);
			$user->update(array('profile' => json_encode($profile)));
		}
	}
?>

