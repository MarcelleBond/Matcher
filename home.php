<?php
require_once 'core/init.php';
$db = DB::getInstance();
$user = new user;
if (input::exists('request')) {
	if (input::get('all'))
	{
	$db->query('SELECT * FROM `users` WHERE `user_id` != ?', array('user_id' => $user->data()->user_id));
		$people = $db->results();
		$profiles = "";
		foreach ($people as $person => $details) {
			$info = json_decode($details->profile);
			$profiles .= '<div class="w3-container w3-card w3-white w3-round w3-margin"><br>
				<img src="' . $info->dp . '" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px; height:60px">
				<span class="w3-right w3-opacity">' . $info->last_login . '</span>
				<h4 style="cursor: pointer;" onclick="build_profile(this)">' . $details->username . '</h4><br>
				<h5>' . $details->first_name . ' ' . $details->last_name . '</h5>
				<h5>Age: '. age($info->DOB) .'</h5>
				<hr class="w3-clear">
				<div class="w3-row-padding" style="margin:0 -16px">';
			$db->query('SELECT * FROM `gallery` WHERE `user_id` = ? LIMIT 2', array('user_id' => $details->user_id));
			$images = $db->results();
			foreach ($images as $image => $pic) {
				$profiles .= '<div class="w3-half">
					<img src="' . $pic->img_name . '" style="max-width:100%" alt="' . $pic->img_name . '" class="w3-margin-bottom">
					</div>';
			}
			$profiles .= '</div>
				</div>';
		}
		echo $profiles;
	}
	else if (input::get('profile'))
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
		$db->query("SELECT users.*, gallery.img_name FROM `users` JOIN gallery ON gallery.user_id = users.user_id WHERE username = ?", array('username' => input::get('profile')));
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

}


function age($dob)
{
	date_default_timezone_set('Africa/Johannesburg');
	$date = date_create($dob);
	$today = date_create(date('Y-m-d'));
	$age = date_diff($date,$today);
	return $age->format('%y');
}