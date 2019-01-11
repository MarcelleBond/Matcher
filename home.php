
<?php 
    require_once 'core/init.php';
    $db = DB::getInstance();
    $user = new user;
    $db->query('SELECT * FROM `users` WHERE `user_id` = ?', array('user_id' => $user->data()->user_id));
    $people = $db->results();
    $profiles = "";
    foreach ($people as $person => $details) {
        $info = json_decode($details->profile);
        $profiles .= '<div class="w3-container w3-card w3-white w3-round w3-margin"><br>
		<img src="'.$info->dp.'" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px; height:60px">
        <span class="w3-right w3-opacity">'. $info->last_login.'</span>
		<h4>'.$details->username.'</h4><br>
		<h6>'.$details->first_name.' '.$details->last_name.'</h6>
		<hr class="w3-clear">
		<p>'.$info->bio.'</p>
        <div class="w3-row-padding" style="margin:0 -16px">';
        $db->query('SELECT * FROM `gallery` WHERE `user_id` = ?', array('user_id' => $details->user_id));
        $images = $db->results();
        foreach ($images as $image => $pic) {
            $profiles .= '<div class="w3-col w3-container m2 l2">
            <img src="'.$pic->img_name.'" style="width:100px; height:100px" alt="'.$pic->img_name.'" class="w3-margin-bottom">
            </div>';
        }
		$profiles .= '</div>
        </div>';
    }
    echo $profiles;
?>