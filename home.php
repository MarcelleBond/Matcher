<?php
require_once 'core/init.php';
$db = DB::getInstance();
$user = new user;
if (input::exists('request')) {
    if (input::get('all'))
    {
        $db->query('SELECT * FROM `users` WHERE `user_id` = ?', array('user_id' => $user->data()->user_id));
        $people = $db->results();
        $profiles = "";
        foreach ($people as $person => $details) {
            $info = json_decode($details->profile);
            $profiles .= '<div class="w3-container w3-card w3-white w3-round w3-margin"><br>
                <img src="' . $info->dp . '" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px; height:60px">
                <span class="w3-right w3-opacity">' . $info->last_login . '</span>
                <h4>' . $details->username . '</h4><br>
                <h5>' . $details->first_name . ' ' . $details->last_name . '</h5>
                <h5>Age: '. age($info->DOB) .'</h5>
                <hr class="w3-clear">
                <div class="w3-row-padding" style="margin:0 -16px">';
            $db->query('SELECT * FROM `gallery` WHERE `user_id` = ? LIMIT 2', array('user_id' => $details->user_id));
            $images = $db->results();
            foreach ($images as $image => $pic) {
                $profiles .= '<div class="w3-half">
                    <img src="' . $pic->img_name . '" style="width:100%" alt="' . $pic->img_name . '" class="w3-margin-bottom">
                    </div>';
            }
            $profiles .= '</div>
                </div>';
        }
        echo $profiles;
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