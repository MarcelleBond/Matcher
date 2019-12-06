<?php
require_once 'core/init.php';

$db = DB::getInstance();
$user = new user;

switch (input::get('action')) {
    case 'sendMessage':
        $db->query('UPDATE likes SET chat = ? WHERE `liker_id`= ' . $user->data()->user_id . ' AND `likee_id` = ? OR `likee_id`= ' . $user->data()->user_id . ' AND `liker_id`= ?', array('chat' => input::get('message'), 'likee_id' => input::get('person'), 'liker_id' => input::get('person') ));
        echo 1;
        exit;
        break;
    case 'getMessages':
        $db->query('SELECT * FROM messages');
        $res = $db->results();
        $chat = '';
        foreach ($res as $key) {
            $chat .= '<div class="single-message">
            <strong>' . $key->user . ': </strong><br /> <p>' . $key->message . '</p>
            <br/>
            <span>' . date('h:i a', strtotime($key->date)) . '</span>
            </div>
            <div class="clear"></div>
            ';
        }
        echo $chat;
        break;

    default:
        # code...
        break;
}

/* ' .  (($_SESSION['user'] == $key->user) ? 'right' : 'left') . ' */
