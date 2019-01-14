<?php
require_once 'core/init.php';

$db = DB::getInstance();

switch ($_REQUEST['action']) {
    case 'sendMessage':
    echo $_REQUEST['message'];
        /* if ($db->insert('messages', array('user' => 'Tyler', 'message' => escape($_REQUEST['message'])))) {
            echo 1;
            exit;
        } */
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
