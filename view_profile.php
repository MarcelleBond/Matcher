<?php
require_once 'core/init.php';
$db = DB::getInstance();
$user = new user;
if (input::exists('request')) {
	if (input::get('profile'))
	{
		$user2 = new user(input::get('profile'));
		$views = json_decode($user2->data()->views);
		$pro = json_decode($user2->data()->profile);
		$pro->fame += 2;
		$user2->update(array('profile' => json_encode($pro)), $user2->data()->user_id);
		if ($views){
			if (!in_array($user->data()->username, $views)){
				$views[] = $user->data()->username;
				$user2->update(array('views' => json_encode($views)), $user2->data()->user_id);
			}
		}
		else{
			$views[] = $user->data()->username;
			$user2->update(array('views' => json_encode($views)), $user2->data()->user_id);
		}
		$db->query("SELECT users.*, gallery.img_name, likes.* FROM `users` LEFT JOIN gallery ON gallery.user_id = users.user_id Left JOIN likes ON likes.liker_id = users.user_id OR likes.likee_id = users.user_id WHERE username =  ?", array('username' => input::get('profile')));
		$data = $db->results();
		echo json_encode($data);
	}
	else if (input::get('block')) {
		$user2 = new user(input::get('block'));
		$blockee = json_decode($user2->data()->blocked);
		$blockee->blocker[] = $user->data()->username;
		$user2->update(array('blocked' => json_encode($blockee)), $user2->data()->user_id);
		$blocker = json_decode($user->data()->blocked);
		$blocker->blockee[] = input::get('block');
		$user->update(array('blocked' => json_encode($blocker)));
		echo 1;


	} else if (input::get('unblock')){
		$user2 = new user(input::get('unblock'));
		$blockee = json_decode($user2->data()->blocked);
		unset($blockee->blocker[$user->data()->username]);
		$user2->update(array('blocked' => json_encode($blockee)), $user2->data()->user_id);
		$blocker = json_decode($user->data()->blocked);
		unset($blocker->blockee[input::get('unblock')]);
		$user->update(array('blocked' => json_encode($blocker)));
		echo 1;
	}else if (input::get('likestatus')){
		
	} else if (input::get('blockstat')){
		$user2 = new user(input::get('blockstat'));
		$blockee = json_decode($user2->data()->blocked);
		if (in_array($user->data()->username, $blockee->blockee) || in_array($user->data()->username, $blockee->blocker)){
			echo 'unblock';
		}
		else {
			echo 'block';
		}
	}
	elseif (input::get('report')) {
		Email("report@mailinator.com", "Reported user", $user->data()->username . " has reported " . input::get('report') . " as a fake user");
	}

}


function age($dob)
{
	date_default_timezone_set('Africa/Johannesburg');
	$date = date_create($dob);
	$today = date_create(date('Y-m-d'));
	$age = date_diff($date,$today);
	return $age->format('%y');
}