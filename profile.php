<?php
	require_once 'core/init.php';
	$user = new user;
	$db = DB::getInstance();
	if (Input::exists('request'))
	{
		if (!empty($_REQUEST['display_info']))
		{
			echo json_encode ($user->data());
		}
		/* if (!empty($_REQUEST['images']))
		{
			$db->action('SELECT img_name', 'gallery', array('user_id', '=', $user->data()->user_id));
			echo json_encode ($db->results());
		} */
	}

?>